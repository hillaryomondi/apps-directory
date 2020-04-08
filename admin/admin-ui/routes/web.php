<?php

Route::middleware(['web', 'admin'])->group(function () {
    Route::namespace('Strathmore\AdminUI\Http\Controllers')->group(function () {
        Route::post('/admin/wysiwyg-media','WysiwygMediaUploadController@upload')->name('brackets/admin-ui::wysiwyg-upload');
    });
});
