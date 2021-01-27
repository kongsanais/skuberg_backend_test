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


// user route
Route::post('/register_user','c_user_system@register');
Route::post('/login','c_user_system@login');
Route::post('/get_user_wallet_and_crytro','c_user_system@get_wallet_andCrytro');

//trade route
Route::post('/trade_add_sale','c_trade_system@add_sale_list');
Route::post('/trade_add_buy','c_trade_system@add_buy_list');

Route::get('/get_sale_list','c_trade_system@get_sale_list');
Route::get('/get_buy_list','c_trade_system@get_buy_list');

Route::post('/action_buy','c_trade_system@action_buy');
Route::post('/action_sale','c_trade_system@action_sale');
