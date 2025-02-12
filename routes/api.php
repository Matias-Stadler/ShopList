<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/products',[ProductController::class,'index'])->name('apihome');
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('apidestroy');
Route::post('/products', [ProductController::class,'store'])->name('apistore');
Route::put('/products/{id}',[ProductController::class, 'update'])->name('apiupdate');
Route::delete('/products',[ProductController::class, 'destroyAll'])->name('apidestroyall');
