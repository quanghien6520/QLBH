<?php

use App\Http\Controllers\BuyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'goods-type'], function () {
  Route::post('store', 'GoodsTypeController@store');
  Route::post('update/{id}', 'GoodsTypeController@update');
  Route::post('destroy/{id}', 'GoodsTypeController@destroy');
  Route::post('get', 'GoodsTypeController@get');
});

Route::group(['prefix' => 'provider'], function () {
  Route::post('store', 'ProviderController@store');
  Route::post('update/{id}', 'ProviderController@update');
  Route::post('destroy/{id}', 'ProviderController@destroy');
  Route::post('get', 'ProviderController@get');
});

Route::group(['prefix' => 'goods'], function () {
  Route::post('store', 'GoodsController@store');
  Route::get('detail/{id}', 'GoodsController@show');
  Route::get('detail-code/{id}', 'GoodsController@showByCode');
  Route::post('detail', 'GoodsController@show');
  Route::post('update/{id}', 'GoodsController@update');
  Route::post('destroy/{id}', 'GoodsController@destroy');
  Route::get('get', 'GoodsController@get');
  Route::post('search', 'GoodsController@getSearch');

});

Route::group(['prefix' => 'buy'], function () {
  Route::post('search-import','BuyController@search');
  Route::post('store', 'BuyController@store');
  Route::post('update/{id}', 'BuyController@update');
  Route::post('destroy/{id}', 'BuyController@destroy');
  Route::get('get', 'BuyController@get');
});

Route::group(['prefix' => 'sell'], function () {
  Route::post('store', 'SellController@store');
  Route::post('search','SellController@getSearch');
  Route::post('update/{id}', 'SellController@update');
  Route::post('destroy/{id}', 'SellController@destroy');
  Route::get('get', 'SellController@get');
});

Route::group(['prefix' => 'report'], function () {
  Route::get('/', 'ReportController@index');
  Route::get('import', 'ReportController@getImport');
  Route::get('export', 'ReportController@getExport');
  Route::get('in-storage', 'ReportController@getStorage');
});

Route::get('csrf-token','UserController@getToken');

Route::group(['prefix' => 'user'], function () {
  Route::post('login','UserController@login');
  Route::post('store','UserController@store');
  Route::post('update','UserController@update');
  Route::post('update-password/{id}','UserController@updatePassword');
  Route::post('allow-user/{id}','UserController@allowUser');
  Route::get('get','UserController@get');
  Route::post('detail','UserController@detail');
});