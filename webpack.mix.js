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

mix.copyDirectory('resources/img', 'public/dist/img');
mix.sass('resources/sass/app.scss', 'public/css/admin/vendor.css');

mix.styles([
    'public/css/admin/vendor.css',
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/Ionicons/css/ionicons.min.css',
    'node_modules/admin-lte/dist/css/AdminLTE.css',
    'node_modules/admin-lte/dist/css/skins/_all-skins.min.css',
], 'public/common/css/admin/admin.css');

mix.js([
    'resources/js/bootstrap.js',
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/admin-lte/dist/js/demo.js'
], 'public/common/js/admin/admin.js');
