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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});
Route::post('/register', 'api\AuthController@register');
Route::post('/login', 'api\AuthController@login');
Route::get('/index', 'api\DepartmentsController@index');
Route::get('/index', 'api\SuApplicationController@index');
Route::get('/index', 'api\BugController@index');


