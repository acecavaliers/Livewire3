<?php

use App\Livewire\Customers\Create;
use App\Livewire\Customers\Index;
use App\Livewire\Products\Index as ProductsIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/customer',Index::class)->name('customer.index');
Route::get('/customer/create',Create::class)->name('customer.create');

Route::get('/product',ProductsIndex::class)->name('product.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
