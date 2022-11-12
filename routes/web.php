<?php

//use auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth','isAdmin')->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\dashboardController::class, 'index']);

    // Category Route
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/createC', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}','update');
        
    });  

    // Product Route
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/createP', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}','update');
        Route::get('/products/{product}/delete','destroy');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
        
    });

    // Brand Route
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);

    // Colors
    Route::controller(App\Http\Controllers\Admin\ColorsController::class)->group(function() {
        Route::get('/colors', 'index');
        Route::get('/colors/createCol', 'create');
        Route::post('/colors', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color}', 'update');
        Route::get('/colors/{color}/delete', 'destroy');

    });

});