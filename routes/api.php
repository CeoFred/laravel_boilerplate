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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('/login','\App\Http\Controllers\Auth\LoginController@authenticate');
Route::post('/register','\App\Http\Controllers\Auth\LoginController@create');
// Route::get('/check','\App\Http\Controllers\Auth\LoginController@check');
Route::post('login', 'PassportController@login');
// Route::post('v1/register/', 'PassportController@register');
 
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
    Route::resource('products', 'ProductController');
});
