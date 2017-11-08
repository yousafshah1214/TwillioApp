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
     'bower_components/bootstrap/dist/css/bootstrap.min.css',
     'resources/assets/css/signin.css',
     'resources/assets/css/footer.css',
     'resources/assets/css/dashboard.css',
 ], 'public/css/all.css').version();

 mix.scripts([
  'bower_components/jquery/dist/jquery.slim.min.js',
  'bower_components/popper.js/dist/umd/popper.min.js',
  'bower_components/bootstrap/dist/js/bootstrap.min.js',
  'bower_components/bootstrap/dist/js/util.js'
 ], 'public/js/all.js').version();
