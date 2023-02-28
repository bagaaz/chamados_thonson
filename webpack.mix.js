const requirejs = require('requirejs');

requirejs.config({
    nodeRequire: require
});

const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        alias: {
            'jQuery': 'jquery',
        },
    },
});

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

mix.js('resources/js/app.js', 'public/assets/js/argon-dashboard.js')
    .sass('resources/scss/argon-dashboard.scss', 'public/assets/css/argon-dashboard.css', [
        //
    ]);

mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/fonts');
mix.copy('node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'public/css');
