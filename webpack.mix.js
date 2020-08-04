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

// Admin datatables plugins css
mix.styles([
    'resources/assets/admin/css/plugins/datatables/dataTables.bootstrap4.min.css',
    'resources/assets/admin/css/plugins/datatables/responsive.bootstrap4.min.css',
], 'public/css/admin/plugins-datatables.css')

// Admin datatables plugins js
mix.scripts([
    'resources/assets/admin/js/plugins/datatables/jquery.dataTables.min.js',
    'resources/assets/admin/js/plugins/datatables/dataTables.bootstrap4.min.js',
    'resources/assets/admin/js/plugins/datatables/dataTables.responsive.min.js',
    'resources/assets/admin/js/plugins/datatables/responsive.bootstrap4.min.js',
], 'public/js/admin/plugins-datatables.js')

// General forms plugins css
mix.styles([
    'resources/assets/css/plugins/forms/daterangepicker.css',
    'resources/assets/css/plugins/forms/icheck-bootstrap.min.css',
    'resources/assets/css/plugins/forms/bootstrap-colorpicker.min.css',
    'resources/assets/css/plugins/forms/tempusdominus-bootstrap-4.min.css',
    'resources/assets/css/plugins/forms/select2.min.css',
    'resources/assets/css/plugins/forms/select2-bootstrap4.min.css',
    'resources/assets/css/plugins/forms/bootstrap-duallistbox.min',
], 'public/css/plugins-forms.css')

// General forms plugins js
mix.scripts([
    'resources/assets/js/plugins/forms/select2.full.min.js',
    'resources/assets/js/plugins/forms/jquery.bootstrap-duallistbox.min.js',
    'resources/assets/js/plugins/forms/moment.min.js',
    'resources/assets/js/plugins/forms/jquery.inputmask.bundle.min.js',
    'resources/assets/js/plugins/forms/daterangepicker.js',
    'resources/assets/js/plugins/forms/bootstrap-colorpicker.min.js',
    'resources/assets/js/plugins/forms/tempusdominus-bootstrap-4.min.js',
    'resources/assets/js/plugins/forms/bootstrap-switch.min.js',
], 'public/js/plugins-forms.js')

mix.styles([
    'resources/assets/home/styles.css'
],'public/css/home/styles.css')

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');
