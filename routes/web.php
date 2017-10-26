<?php

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

Route::get('/', 'ClientController@index');
Route::get('admin', 'HomeController@index')->name('home');
Route::resource('admin/kategori','KategoriControllers');
Route::resource('admin/sejarah','SejarahControllers');
Route::get('admin/sejarah/gallery/{id}', 'GalleryController@createGallery');
Route::post('admin/sejarah/gallery/{sj_id}', 'GalleryController@insertGallery');
Route::delete('admin/sejarah/gallery/{gs_id}', 'GalleryController@deleteGallery');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();
