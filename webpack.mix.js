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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/tinymce.js', 'public/js')
    .js('resources/js/image_preview.js', 'public/js')
    .copyDirectory('node_modules/tinymce/plugins', 'public/node_modules/tinymce/plugins')
    .copyDirectory('node_modules/tinymce/skins', 'public/node_modules/tinymce/skins')
    .copyDirectory('node_modules/tinymce/themes', 'public/node_modules/tinymce/themes')
    .copy('node_modules/tinymce/jquery.tinymce.js', 'public/node_modules/tinymce/jquery.tinymce.js')
    .copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/node_modules/tinymce/jquery.tinymce.min.js')
    .copy('node_modules/tinymce/tinymce.js', 'public/node_modules/tinymce/tinymce.js')
    .copy('node_modules/tinymce/tinymce.min.js', 'public/node_modules/tinymce/tinymce.min.js');
