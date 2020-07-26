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

// General plugins css
mix.styles([
    'resources/assets/css/plugins/fontawesome-free/all.min.css',
    'resources/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
    'resources/assets/css/plugins/adminlte/adminlte.min.css'
], 'public/css/plugins.css');

// General Styles css
mix.styles([
    'resources/assets/css/plugins/adminlte/adminlte.min.css'
], 'public/css/stylus.css');

// General plugins js
mix.scripts([
    'resources/assets/js/plugins/jquery/jquery.min.js',
    'resources/assets/js/plugins/bootstrap/bootstrap.bundle.min.js',
    'resources/assets/js/plugins/adminlte/adminlte.min.js',
    'resources/assets/js/plugins/adminlte/demo.js',
], 'public/js/plugins.js')

// General plugins js
mix.scripts([
    'resources/assets/js/plugins/adminlte/adminlte.min.js',
    'resources/assets/js/plugins/adminlte/demo.js',
], 'public/js/app.js')

// Admin plugins js
mix.styles([
    'resources/assets/admin/css/plugins/datatables/dataTables.bootstrap4.min.css',
    'resources/assets/admin/css/plugins/datatables/responsive.bootstrap4.min.css',
], 'public/css/admin/plugins-datatables.css')

// Admin plugins js
mix.scripts([
    'resources/assets/admin/js/plugins/datatables/jquery.dataTables.min.js',
    'resources/assets/admin/js/plugins/datatables/dataTables.bootstrap4.min.js',
    'resources/assets/admin/js/plugins/datatables/dataTables.responsive.min.js',
    'resources/assets/admin/js/plugins/datatables/responsive.bootstrap4.min.js',
], 'public/js/admin/plugins-datatables.js')

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');
