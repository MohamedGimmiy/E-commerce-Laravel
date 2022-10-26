<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [pagesController::class, 'home'])->name('home');
Route::get('cart', [pagesController::class, 'cart'])->name('cart');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');


Route::post('/register', [AuthController::class, 'postRegister'])->name('register')->middleware('guest');

Route::post('/login', [AuthController::class, 'postLogin'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// AdminPanel group
Route::group(['prefix' => 'adminpanel', 'middleware' => 'admin'],function (){

    Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');

    // products
    Route::group(['prefix' => 'products'], function (){
        Route::get('/', [ProductController::class, 'index'])->name('adminpanel.products');
        Route::get('/create', [ProductController::class, 'create'])->name('adminpanel.products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('adminpanel.products.store');
    });

    // categories
    Route::group(['prefix' => 'categories'], function (){
        Route::get('/', [CategoryController::class, 'index'])->name('adminpanel.categories');
        Route::post('/', [CategoryController::class, 'store'])->name('adminpanel.category.store');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('adminpanel.category.destroy');
    });

    // colors
    Route::group(['prefix' => 'colors'], function (){
        Route::get('/', [ColorsController::class, 'index'])->name('adminpanel.colors');
        Route::post('/', [ColorsController::class, 'store'])->name('adminpanel.color.store');
        Route::delete('/{id}', [ColorsController::class, 'destroy'])->name('adminpanel.color.destroy');
    });

});
