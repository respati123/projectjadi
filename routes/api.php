<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$options = [
    'middleware' => 'auth:api',
];

Route::group($options, function() {

  Route::get('/getslider','APIController@getSliderSejarah');
  Route::get('/getmaps','APIController@getMapsSejarah');
  Route::get('/getkategori','APIController@getKategoriSejarah');
  Route::get('/getlist/{id}','APIController@getListSejarah');
  Route::get('/getdetail/{id}','APIController@getDetailSejarah');
  Route::get('/getgallery/{id}','APIController@getGallerySejarah');

});
