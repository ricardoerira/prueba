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

mix.styles([
    'resources/assets/css/plugins/fontawesome-free/all.min.css',
    'resources/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
    'resources/assets/css/plugins/adminlte/adminlte.min.css'
], 'public/css/stylus.css');

mix.scripts([
    'resources/assets/js/plugins/jquery/jquery.min.js',
    'resources/assets/js/plugins/bootstrap/bootstrap.bundle.min.js',
    'resources/assets/js/plugins/adminlte/adminlte.min.js',
    'resources/assets/js/plugins/adminlte/demo.js',
], 'public/js/app.js')

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');
