<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Livewire\Products\Index as ProductsIndex;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', ProductsIndex::class);


Route::resource('products', ProductController::class);