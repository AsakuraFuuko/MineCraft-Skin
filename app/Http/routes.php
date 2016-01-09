<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::resource('/myid', 'MCIDController');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/skins/{mcid}/head', 'SkinController@head');
        Route::get('/skins/{mcid}/preview', 'SkinController@preview');
        Route::post('/skins/{mcid}', 'SkinController@update');


//        Route::post('/cape/{mcid}', 'CapeController@update');
    });

});

Route::get('/skins/{mcid}', 'SkinController@show');
Route::get('/MinecraftSkins/{mcid}.png', 'SkinController@show');

//Route::get('/capes/{mcid}', 'CapeController@show');
//Route::get('/MinecraftCloaks/{mcid}.png', 'CapeController@show');