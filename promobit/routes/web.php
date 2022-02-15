<?php

use Illuminate\Support\Facades\Route;
use Admin\TagController;
use Admin\ProductController;
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

Route::get('admin/product/{id}/tags', 'Admin\TagProductController@tags')->name('tags.product.index');
Route::get('admin/product/{id}/tags/list', 'Admin\TagProductController@tagsAvaiable')->name('tags.product.avaiable');
Route::post('admin/product/{id}/tags/list/store', 'Admin\TagProductController@storeListTags')->name('tags.product.avaiable.list.store');
Route::any('admin/product/{id}/tags/list/search', 'Admin\TagProductController@search')->name('tags.product.avaiable.list.search');
Route::delete('admin/product/{id}/tags/delete', 'Admin\TagProductController@delete')->name('tags.product.destroy');
/**
 * Search para produtos
 */
Route::any('admin/product/{id}/tags/search', 'Admin\TagProductController@search')->name('tags.product.search');

Route::any('admin/tags/search', 'Admin\TagController@search')->name('tags.search');
Route::any('admin/products/search', 'Admin\ProductController@search')->name('products.search');
Route::resource('admin/tags', TagController::class);
Route::resource('admin/products', ProductController::class);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
