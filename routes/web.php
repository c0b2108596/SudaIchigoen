<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;



Route::get('/dashboard', function (){
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
});

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::controller(FormController::class)->middleware(["auth"])->group(function(){
    Route::get('/forms/form', 'form')->name('form');
    Route::get('/forms/show', "show")->name('show');
    Route::post('/forms', 'store')->name('store');
    Route::get('/forms/{index}', 'index')->name('form_index');
});

Route::controller(StockController::class)->middleware(["auth"])->group(function(){
    Route::get('/stocks/stock', 'stock')->name('stock');
    Route::post('/stocks', 'store')->name("stock_store");
    Route::get('/stocks/create', 'create')->name('stock_create');
    Route::get('/stocks/{stock}', 'show')->name('stock_show');
    Route::put('stocks/{stock}', 'update')->name('stock_update');
    Route::get('/stocks/{stock}/edit', 'edit')->name('stock_edit');
    Route::delete('/stocks/{stock}', 'delete')->name('stock_delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
