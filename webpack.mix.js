const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setResourceRoot(`/${process.env.MIX_APP_URI || ''}/`);

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


mix.js(['resources/js/admin/admin.js'], 'public/js')
    .js(['resources/js/web/frontend.js'],'public/js')
    .sass('resources/sass/admin/admin.scss', 'public/css');

if (mix.inProduction()) {
    mix.version();
}
