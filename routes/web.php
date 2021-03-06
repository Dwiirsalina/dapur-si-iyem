<?php

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

Route::group(['prefix' => '/api/v1', 'namespace' => 'Api\V1', 'middleware' => 'cors'], function() {
    Route::group(['prefix' => 'food'], function() {
        Route::post('/', 'FoodController@index')->name('api.food.index');
        Route::get('/{food}', 'FoodController@show')->name('api.food.show');
    });

    Route::group(['prefix' => 'glosary'], function() {
        Route::get('/', 'GlosaryController@index')->name('api.glosary.index');
        Route::get('/{glosary}', 'GlosaryController@show')->name('api.glosary.show');
    });

    Route::group(['prefix' => 'ingredient'], function() {
        Route::get('/', 'IngredientController@index')->name('api.ingredient.index');
        Route::get('/{ingredient}', 'IngredientController@show')->name('api.ingredient.show');
    });
});


Route::group(['prefix' => 'food'], function() {
    Route::get('create', 'FoodController@create')->name('food.create');
    Route::post('store', 'FoodController@store')->name('food.store');
    Route::get('download','FoodController@download')->name('food.download');
    Route::get('download/{id}','FoodController@download')->name('food.download');
});

Route::group(['prefix' => 'glosary'], function() {
    Route::get('create', 'GlosaryController@create')->name('glosary.create');
    Route::post('store', 'GlosaryController@store')->name('glosary.store');
});

Route::group(['prefix' => 'ingredient'], function() {
    Route::get('create', 'IngredientController@create')->name('ingredient.create');
    Route::post('store', 'IngredientController@store')->name('ingredient.store');
    Route::get('download', 'IngredientController@download');
});