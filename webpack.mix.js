const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/service-worker.js', 'public');


mix.sass('resources/scss/themes/classic/app.scss', 'public/css/classic')
mix.sass('resources/scss/themes/desert/app.scss', 'public/css/desert')
mix.sass('resources/scss/themes/forest/app.scss', 'public/css/forest')
mix.sass('resources/scss/themes/ocean/app.scss', 'public/css/ocean');
mix.sass('resources/scss/themes/galaxy/app.scss', 'public/css/galaxy');
