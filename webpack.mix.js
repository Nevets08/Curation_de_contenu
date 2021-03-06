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

const tailwindcss = require('tailwindcss');

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/initSlider.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')
    .sass('resources/scss/appLogin.scss', 'public/css')
    .copyDirectory('resources/img', 'public/img')
    .setResourceRoot('../')
    .options({
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
        ]
    });
