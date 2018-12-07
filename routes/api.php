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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'auth'], function ()
{
    Route::post('login', 'API\AuthController@login');
//    Route::post('signup', 'API\AuthController@signUp');
});

Route::group(['middleware' => 'auth:api'], function ()
{
    Route::get('logout', 'API\AuthController@logout');
    Route::get('admin', 'API\AuthController@admin');
});

Route::group(['prefix' => 'category'], function ()
{
    Route::get('all/{slug?}', 'API\CategoryController@index');
    Route::get('/{id}/{slug?}', 'API\CategoryController@show');
    Route::post('create', 'API\CategoryController@store');
    Route::post('update/{id}', 'API\CategoryController@update');
    Route::delete('delete/{id}', 'API\CategoryController@destroy');
});

Route::group(['prefix' => 'product'], function()
{
    Route::get('/all', 'API\ProductController@index');
    Route::post('/create', 'API\ProductController@store');
});

//Route::get('cat', 'API\ProductController@index');