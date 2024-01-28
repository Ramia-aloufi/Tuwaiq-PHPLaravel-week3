<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;


//Home
Route::get('/',[ItemsController::class,'Home'])->name('all-category');
Route::get('/category/{x}',[ItemsController::class,'Home'])->name('home-category');

//ITEM-GROUP
route::get('/item-group',[ItemsController::class,'getItemGroup'])->name('item-group');
route::post('/save-group',[ItemsController::class,'saveItemGroupName'])->name('save-group');
route::get('/del-group/{x}',[ItemsController::class,'delGroup'])->name('delete-group');
route::get('/item-group/{x}',[ItemsController::class,'getItemGroup'])->name('edit-group');
route::post('/update-group',[ItemsController::class,'updateGroup'])->name('update-group');

//ITEM
route::get('/items',[ItemsController::class,'getItem'])->name('items');
route::post('/save-item',[ItemsController::class,'saveItem'])->name('save-item');
route::get('/del-item/{x}',[ItemsController::class,'delItem'])->name('delete-item');
route::get('/items/{x}',[ItemsController::class,'getItem'])->name('edit-item');
route::post('/update-item',[ItemsController::class,'updateItem'])->name('update-item');

//Cart 
route::get('/add-to-cart/{x}',[ItemsController::class,'addToCart'])->name('add-to-cart');
route::get('/checkout',[ItemsController::class,'checkout'])->name('checkout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
