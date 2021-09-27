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

Route::group(['prefix' => 'bt-php'], function () {
  Route::get('bai-1', function() {
    return view('bt.bt1');
  });

  Route::get('bai-2', function() {
    return view('bt.bt2');
  });

  Route::get('bai-3', function() {
    return view('bt.bt3');
  });

  Route::get('bai-4', function() {
    return view('bt.bt4');
  });

  Route::get('bai-5', function() {
    return view('bt.bt5');
  });
});

