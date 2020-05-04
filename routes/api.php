<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
URL::forceScheme(env('FORCE_SCHEME','https'));
URL::forceRootUrl(config('app.url'));
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

Route::group(['as' =>'departments', 'prefix' => 'departments', 'middleware' => []], function (){
    //
    Route::get("", "Api\DepartmentController@index")->name('index');
});

Route::group(['as' => 'bugs', 'prefix' => 'bugs', 'middleware' => []], function (){
    Route::get("", "Api\BugController@index")->name('index');
});

Route::group(['as' => 'su-applications', 'prefix' => 'su-applications', 'middleware' => []], function (){
    Route::get("", "Api\SuApplicationController@index")->name('index');
});


