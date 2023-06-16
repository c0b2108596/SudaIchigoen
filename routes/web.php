<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CartController;



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

Route::controller(ItemController::class)->middleware(["auth"])->group(function(){
    Route::get('/items/item', 'item')->name('item');
    Route::post('/items', 'store')->name("item_store");
    Route::get('/items/create', 'create')->name('item_create');
    Route::get('/items/{item}', 'show')->name('item_show');
    Route::put('items/{item}', 'update')->name('item_update');
    Route::get('/items/{item}/edit', 'edit')->name('item_edit');
    Route::delete('/items/{item}', 'delete')->name('item_delete');
});

Route::controller(CartController::class)->middleware(['auth'])->group(function(){
    Route::get('/carts/{user}/show', 'show')->name('show_cart');
    Route::post('/items/addcart', "add_cart")->name("add_cart");
});

Route::controller(EventController::class)->middleware(["auth"])->group(function(){
    Route::get('/calendar', "show")->name("calendar_show");
    Route::post('/calendar/create', 'create')->name("create");
    Route::post('/calendar/get', "get")->name("get");
    Route::put('/calendar/update', 'update')->name("update");
    Route::delete('/calendar/delete', 'delete')->name("delete");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
