<?php
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

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@signup');
Route::get('logout', 'API\AuthController@logout');
Route::get('admin', 'API\AuthController@admin');

Route::group(['prefix' => 'category'], function ()
{
    Route::get('all/{slug?}', 'API\CategoryController@index');
    Route::get('/{id}/{slug?}', 'API\CategoryController@show');
    Route::get('category/{id}/all_products', 'API\CategoryController@getCategoryWithProducts');
});

Route::group(['prefix' => 'product'], function()
{
    Route::get('/all', 'API\ProductController@index');
    Route::get('/{id}', 'API\ProductController@show');
    Route::get('/{id}/variations/specifications', 'API\ProductController@getProductWithVariationsWithSpecifications');

    Route::group(['prefix' => 'variation'], function ()
        {
            Route::get('/all', 'API\VariationController@index');
            Route::get('/{id}', 'API\VariationController@show');
            Route::group(['prefix' => 'specification'], function ()
            {
                Route::get('/all', 'API\SpecificationController@index');
                Route::get('/{id}', 'API\SpecificationController@show');
            });
        });
    });

/**
 * Admin Routes
 */
Route::group(['middleware' => ['auth:api', 'admin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'category'], function () {
            Route::post('create', 'API\CategoryController@store');
            Route::post('update/{id}', 'API\CategoryController@update');
            Route::delete('delete/{id}', 'API\CategoryController@destroy');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::post('/create', 'API\ProductController@store');
            Route::post('/{id}', 'API\ProductController@update');
            Route::post('/upload', 'API\ProductController@upload');
            Route::post('/{id}/update/{image_id}', 'API\ProductImageController@updateImage');

            Route::group(['prefix' => 'variation'], function () {
                Route::post('/create', 'API\VariationController@store');
                Route::post('/{id}', 'API\VariationController@update');

                Route::group(['prefix' => 'specification'], function () {
                    Route::post('/create', 'API\SpecificationController@store');
                    Route::post('/update', 'API\SpecificationController@update');
                    Route::delete('/delete/{id}', 'API\SpecificationController@destroy');
                });
            });
        });
    });
});


//Route::post('products/{id}/{image_id}', 'TestController@update');




