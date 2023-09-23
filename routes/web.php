<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\Controller;

Route::get('/dashboard', function (){
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*ホーム画面*/
Route::get('/', [HomeController::class, 'home'])->name('home'); //ホーム画面のビュー

/*お知らせ*/
Route::get('/posts/', [PostController::class,'index'])->name('post_index'); //お知らせ画面のビュー
Route::controller(PostController::class)->middleware(['auth'])->group(function(){ //管理者用
    Route::post('/posts', 'store')->name('post_store'); //新規投稿の保存
    Route::get('/posts/create', 'create')->name('post_create'); //新規投稿の作成画面のビュー
    Route::delete('/posts/{post}', 'delete')->name('post_delete'); //投稿の削除
    Route::get('/posts/{post}/edit', 'edit')->name('post_edit'); //投稿の編集画面のビュー
    Route::put('/posts/{post}', 'update')->name('post_update'); //投稿編集を保存する
});
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post_show'); //投稿の詳細画面のビュー

/*カテゴリー*/
Route::get('/categories/{category}', [CategoryController::class,'index']); //並び変えたお知らせ画面のビュー

/*お問い合わせフォーム(ログイン時のみ)*/
Route::controller(FormController::class)->middleware(["auth"])->group(function(){
    Route::post('/forms/form', 'store')->name('form_store'); //お問い合わせ保存
    Route::get('/forms/form', 'form')->name('form'); //お問い合わせフォーム画面のビュー
    Route::get('/forms/index', 'index')->name('form_index'); ////お問い合わせ一覧のビュー(管理者用)
});

/*商品投稿*/
Route::get('/items/item', [ItemController::class, 'item'])->name('item'); //商品一覧の画面のビュー
Route::controller(ItemController::class)->middleware(["auth"])->group(function(){ //管理者用
    Route::post('/items', 'store')->name("item_store"); //新規商品の保存
    Route::get('/items/create', 'create')->name('item_create'); //新規商品の登録
    Route::put('items/{item}', 'update')->name('item_update'); //商品情報の更新
    Route::get('/items/{item}/edit', 'edit')->name('item_edit'); //商品情報の更新画面のビュー
    Route::delete('/items/{item}', 'delete')->name('item_delete'); //商品の削除
});
Route::get('/items/{item}', [ItemController::class, 'show'])->name('item_show'); //商品の詳細画面のビュー

/*カート機能(ログイン時のみ)*/
Route::controller(CartController::class)->middleware(['auth'])->group(function(){
    Route::post('/purchase', 'purchase')->name('cart_purchase');
    Route::get('/carts/{user}/show', 'show')->name('show_cart'); //ユーザー毎のカートの中身のビュー
    Route::post('/items/addcart', "add_cart")->name("add_cart"); //カートへの商品追加
});

/*カレンダー機能*/
Route::get('/calendar', [EventController::class, "show"])->name("calendar_show"); //カレンダー画面のビュー
Route::controller(EventController::class)->middleware(["auth"])->group(function(){ //管理者用
    Route::post('/calendar/create', 'create')->name("create"); //予定の作成
    Route::post('/calendar/get', "get")->name("get"); //予定の表示
    Route::put('/calendar/update', 'update')->name("update"); //予定の更新
    Route::delete('/calendar/delete', 'delete')->name("delete"); //予定の削除
});

/*マップ機能*/
Route::get('/map', [Controller::class,'googlemap'])->name('map'); //マップ画面のビュー

/*決済機能*/
Route::controller(CashController::class)->group(function(){
    Route::post('/cash/store', 'store')->name('cash.store');
    Route::get('/cash/create/{order}', 'create')->name('cash.create');
});

/*プロフィール機能*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); //プロフィール変更画面のビュー
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); //プロフィールの更新
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); //プロフィールの削除
});

require __DIR__.'/auth.php';
