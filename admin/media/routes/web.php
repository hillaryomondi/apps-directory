<?php

Route::middleware(['auth:' . config('admin-auth.defaults.guard')])->group(static function () {
    Route::namespace('Strathmore\Media\Http\Controllers')->group(static function () {
        Route::post('upload', 'FileUploadController@upload')->name('strathmore/media::upload');
        Route::get('view', 'FileViewController@view')->name('strathmore/media::view');
    });
});
