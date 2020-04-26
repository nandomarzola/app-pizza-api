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

Route::group([ 'middleware' => 'api'], function ($router) {
    Route::group([ 'prefix' => 'auth' ], function ($router) {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');

        Route::group(['middleware' => 'auth.jwt'], function() {
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::post('me', 'AuthController@me');
        });
    });

    Route::group([ 'prefix' => 'categories' ], function ($router) {
        Route::get('', 'CategoryController@fetch');
        Route::get('{id}', 'CategoryController@fetchOne');

        Route::group(['middleware' => ['auth.jwt', 'auth.admin']], function() {
            Route::post('', 'CategoryController@store');
            Route::put('{id}', 'CategoryController@update');
            Route::delete('{id}', 'CategoryController@destroy');
        });
    });
});

Route::fallback(function () {
    throw new Error(
        'Page Not Found. If this error persists, contact: dev.mathiusso@gmail.com',
        404
    );
});
