<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return response()->json($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $product = Product::create([
            'product' => $request->product,
        ]);
        $product->save();
        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     */
    /*public function show(string $id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    /*public function edit(string $id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::find($id);
        
        $product->update([
            'product' => $request->product,
        ]);
        $product->save();
        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        $product->delete();
    }

    /**
     * Remove all resource from storage.
     */
    public function destroyAll()
    {
        //
        $product = Product::all();
        $product->delete();
    }
}
