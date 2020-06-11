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
Route::group(['middleware' => "auth:sanctum,api", "namespace" =>"Api", "as" =>"api."], function () {
    /**
     * ROLE
     */
    Route::group(['as' => "roles.","prefix" => "roles"], function () {
        Route::get("", "RoleController@index")->name("index");
        Route::get("{role}", "RoleController@get")->name('get');
        Route::get("{role}/permissions","RoleController@permissions")->name('permissions');
        Route::post("{role}/permissions/toggle", "RoleController@togglePermission")->name("permissions.toggle");
        Route::post("{role}/permissions/toggle-all", "RoleController@toggleAllPermissions")->name("permissions.toggle-all");
    });
});

Route::get("search", "Api\SuApplicationController@search")->name('search');


Route::group(['as' =>'departments.', 'prefix' => 'departments', 'middleware' => []], function (){
    //
    Route::get("", "Api\DepartmentController@index")->name('index');
});

Route::group(['as' => 'tickets.', 'prefix' => 'tickets', 'middleware' => []], function (){
    Route::get("", "Api\TicketController@index")->name('index');
});

Route::group(['as' => 'su-applications.', 'prefix' => 'su-applications', 'middleware' => []], function (){
    Route::get("", "Api\SuApplicationController@index")->name('index');
});

