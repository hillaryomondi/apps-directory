<?php

return [

    /*
     * Language lines will be fetched by these loaders. You can put any class here that implements
     * the Strathmore\AdminTranslations\TranslationLoaders\TranslationLoader-interface.
     */
    'translation_loaders' => [
        Strathmore\AdminTranslations\TranslationLoaders\Db::class,
    ],

    /*
     * This is the model used by the Db Translation loader. You can put any model here
     * that extends Strathmore\AdminTranslations\Translation.
     */
    'model' => Strathmore\AdminTranslations\Translation::class,

    /*
     * This is the translation manager which overrides the default Laravel `translation.loader`
     */
    'translation_manager' => Strathmore\AdminTranslations\TranslationLoaderManager::class,

    /*
     * This option controls if package routes are used or not
     */
    'use_routes' => true,

    'scanned_directories' => [
        app_path(),
        resource_path('views'),
        // here you can add your own directories
    ],

];
