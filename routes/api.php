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

Route::middleware('auth:api')->get('/User', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function(){ 

    Route::name('api.')->group(function(){
    Route::namespace('Posts')->group(function(){ 
        Route::name('posts.')->group(function(){
            Route::get('/get-posts', 'PostsController@index')->name('getPost');
            Route::post('/create-posts', 'PostsController@create')->name('createPost');
            Route::put('/update-posts/{id}', 'PostsController@update')->name('updatePost');
            Route::delete('/delete-posts/{id}', 'PostsController@delete')->name('deletePost');
        });
    });





});
    
});
