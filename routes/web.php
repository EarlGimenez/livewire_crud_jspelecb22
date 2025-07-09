<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Products\Index as ProductsIndex;
use App\Livewire\Products\Create as ProductsCreate;
use App\Livewire\Products\Show as ProductsShow;
use App\Livewire\Products\Edit as ProductsEdit;
use App\Livewire\Users\Login as UsersLogin;
use App\Livewire\Users\Register as UsersRegister;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', UsersLogin::class)->name('login');
Route::get('/register', UsersRegister::class)->name('register');

Route::middleware('auth')->group(function () {
    Route::any('/logout', function () {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Logout successful.');
    })->name('logout');
    Route::get('/', ProductsIndex::class)->name('livewire.index');
    Route::get('/products', ProductsIndex::class)->name('livewire.index');
    Route::get('/productscreate', ProductsCreate::class);
    Route::get('/productshow/{product}', ProductsShow::class)->name('livewire.show');
    Route::get('/productedit/{product}', ProductsEdit::class)->name('livewire.edit');
});
