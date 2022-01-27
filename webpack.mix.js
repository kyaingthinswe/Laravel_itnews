const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 | app.js ကို public/js ထဲက folder ထဲကို လှမ်းထည့်
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/theme.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/theme.scss', 'public/css');
