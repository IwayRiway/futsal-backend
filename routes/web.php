<?php

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
    return view('templates/blank');
});

Route::resource('promo', 'PromoController');
Route::post('promo/updateActive', 'PromoController@updateActive')->name('promo.updateActive');
Route::get('promo/{id}/destroy', 'PromoController@destroy')->name('promo.destroy');

Route::resource('field', 'FieldController');
Route::get('field/{id}/destroy', 'FieldController@destroy')->name('field.destroy');

Route::resource('food', 'FoodController');
Route::get('food/{id}/destroy', 'FoodController@destroy')->name('food.destroy');

Route::resource('hour', 'HourController');
Route::get('hour/{id}/destroy', 'HourController@destroy')->name('hour.destroy');

Route::resource('help', 'HelpController');
Route::get('help/{id}/destroy', 'HelpController@destroy')->name('help.destroy');
