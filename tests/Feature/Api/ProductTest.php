<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_CheckIfReceiveAllEntryOfProductInJsonFile(){
        $product = Product::factory(2)->create();

        $response = $this->get(route('apihome'));

        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }

    public function test_CheckIfCanDeleteEntryInProductWithApi(){
        $product = Product::factory(2)->create();

        $response = $this->delete(route('apidestroy',1));
        $this->assertDatabaseCount('products',1);

        $response = $this->get(route('apihome'));

        $response->assertJsonCount(1);
    }

    public function test_CheckIfCanCreateNewEntryInProductWithJsonFile(){

        $response = $this->post(route('apistore'),[
            'product' => 'limon',
        ]);

        $response = $this->get(route('apihome'));
        $response->assertStatus(200)
                 ->assertJsonCount(1);

    }

    public function test_CheckIfCanUpdateEntryInProductEhitJsonFile(){

        $response = $this->post(route('apistore'),[
            'product' => 'limon',
        ]);

        $data = ['product' => 'limon'];
        $response = $this->get(route('apihome'));
        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonFragment($data);

        $response = $this->put('/api/products/1', [
            'product' => 'naranja',
        ]);

        $data = ['product' => 'naranja'];
        $response = $this->get(route('apihome'));
        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonFragment($data);
    }
}