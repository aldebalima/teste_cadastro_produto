<?php

use Illuminate\Support\Facades\Route;
use Admin\TagController;
use Admin\ProductController;
use Admin\AdminController;
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

/**
 * Rotas de cadastros de tags de produtos
 */

Route::middleware(['auth'])->group(function () {

    Route::get('admin/product/{id}/tags', 'Admin\TagProductController@tags')->name('tags.product.index');
    Route::get('admin/product/{id}/tags/list', 'Admin\TagProductController@tagsAvaiable')->name('tags.product.avaiable');
    Route::post('admin/product/{id}/tags/list/store', 'Admin\TagProductController@storeListTags')->name('tags.product.avaiable.list.store');

    Route::delete('admin/product/{id}/tags/delete', 'Admin\TagProductController@delete')->name('tags.product.destroy');
    /**
     * Rotas de Busca
     */

    Route::any('admin/product/{id}/tags/search', 'Admin\TagProductController@search')->name('tags.product.search');
    Route::any('admin/product/{id}/tags/add/search', 'Admin\TagProductController@addSearch')->name('tags.product.avaiable.add.search');
    Route::any('admin/tags/search', 'Admin\TagController@search')->name('tags.search');
    Route::any('admin/products/search', 'Admin\ProductController@search')->name('products.search');

    /**
     * Rotas de produtos e tags
     */
    Route::resource('admin/tags', TagController::class);
    Route::resource('admin/products', ProductController::class);
    Route::get('admin/', 'Admin\AdminController@index')->name('admin.index');
});
    /**
 * Rotas de Autenticação
 */
Auth::routes();
/**
 * Rotas de painel administrativo
 */
Route::get('/home', 'HomeController@index')->name('home');
