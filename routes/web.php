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

Route::get('/', 'HomeController@index')->name('home');
Route::resource('kategori','KategoriControllers');
Route::resource('sejarah','SejarahControllers');
Route::get('/sejarah/gallery/{id}', 'GalleryController@createGallery');
Route::post('/sejarah/gallery/{sj_id}', 'GalleryController@insertGallery');
Route::delete('/sejarah/gallery/{gs_id}', 'GalleryController@deleteGallery');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();


