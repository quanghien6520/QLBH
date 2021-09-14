<?php
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
  return view('welcome');
});


Route::group(['prefix' => 'goods-type'], function () {
  Route::post('store', 'GoodsTypeController@store');
  Route::post('update/{id}', 'GoodsTypeController@update');
  Route::post('destroy/{id}', 'GoodsTypeController@destroy');
  Route::get('get', 'GoodsTypeController@get');
});

Route::group(['prefix' => 'provider'], function () {
  Route::post('store', 'ProviderController@store');
  Route::post('update/{id}', 'ProviderController@update');
  Route::post('destroy/{id}', 'ProviderController@destroy');
  Route::get('get', 'ProviderController@get');
});

Route::group(['prefix' => 'goods'], function () {
  Route::post('store', 'GoodsController@store');
  Route::post('update/{id}', 'GoodsController@update');
  Route::post('destroy/{id}', 'GoodsController@destroy');
  Route::get('get', 'GoodsController@get');
});

Route::group(['prefix' => 'buy'], function () {
  Route::post('store', 'BuyController@store');
  Route::post('update/{id}', 'BuyController@update');
  Route::post('destroy/{id}', 'BuyController@destroy');
  Route::get('get', 'BuyController@get');
});

Route::group(['prefix' => 'sell'], function () {
  Route::post('store', 'SellController@store');
  Route::post('update/{id}', 'SellController@update');
  Route::post('destroy/{id}', 'SellController@destroy');
  Route::get('get', 'SellController@get');
});

Route::group(['prefix' => 'report'], function () {
  Route::get('import', 'ReportController@getImport');
  Route::get('export', 'ReportController@getExport');
  Route::get('in-storage', 'ReportController@getStorage');
});

Route::get('csrf-token','UserController@getToken');

Route::group(['prefix' => 'user'], function () {
  Route::post('login','UserController@login');
  Route::post('store','UserController@store');
  Route::post('update/{id}','UserController@update');
  Route::post('update-password/{id}','UserController@updatePassword');
  Route::post('allow-user/{id}','UserController@allowUser');
  Route::get('get','UserController@get');
});