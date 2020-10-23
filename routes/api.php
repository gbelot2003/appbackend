<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/v1/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');

    Route::middleware('auth:api')->group(function () {
        Route::get('logout', 'Api\AuthController@logout');

        /** crear invoice */
        Route::post('invoice', 'Api\InvoiceController@store');
        /** invoices usuario */
        Route::get('invoice', 'Api\InvoiceController@historial');

        Route::get('zone/{id}', 'Api\ZoneController@show');
        Route::get('like/{product_id}', 'Api\LikesController@like');
        Route::get('liked/{user_id}', 'Api\LikesController@show');
        Route::get('dislike/{product_id}', 'Api\LikesController@dislike');

        Route::resource('productos', 'Api\ProductController')->only(['index', 'show']);
        Route::resource('productos-ofertas', 'Api\ProductOfferController')->only(['index']);
        Route::resource('categorias', 'Api\CategoriesController')->only(['index', 'show']);
    });
});
