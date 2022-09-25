<?php

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
Route::prefix('admin')->middleware('auth','admin')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('category')->group(function(){
        Route::get('/index', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/{category}/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
        // Route::get('/{category}/delete', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.category.delete');
    });
    Route::prefix('brand')->group(function(){
        Route::get('/index', [App\Http\Controllers\Admin\BrandController::class, 'index'])->name('admin.brand.index');
        
    });
});