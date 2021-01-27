<?php

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

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');
Route::post('update', 'API\AuthController@update');

Route::get('promo', 'API\PromoController@promo');
Route::get('promo/detail', 'API\PromoController@detail');

Route::get('field', 'API\FieldController@field');

Route::get('food', 'API\FoodController@food');
Route::get('food/detail', 'API\FoodController@detail');

Route::get('help', 'API\HelpController@help');

Route::post('transaction', 'API\TransactionController@transaction');
Route::get('history', 'API\TransactionController@history');
Route::get('schedule', 'API\TransactionController@schedule');
