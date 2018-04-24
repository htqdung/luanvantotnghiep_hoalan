let mix = require('laravel-mix');

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
    'public/trangchinh_asset/css/jquery-ui.css',
    'public/trangchinh_asset/css/bootstrap.css',
    'public/trangchinh_asset/css/ont-awesome.css',
    'public/trangchinh_asset/css/style.css',
    'public/trangchinh_asset/css/easy-responsive-tabs.css',
    'public/trangchinh_asset/css/flexslider.css',
    'public/trangchinh_asset/css/team.css',
    'public/trangchinh_asset/css/fonts_1.css',
    'public/trangchinh_asset/css/fonts_1.css',
    'public/trangchinh_asset/css/style.default.css',
], 'public/app/css/all.css');
