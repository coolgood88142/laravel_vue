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
    .js('resources/js/city.js', 'public/js')
    .js('resources/js/date.js', 'public/js')
    .js('resources/js/button.js', 'public/js')
    .js('resources/js/style.js', 'public/js')
    .js('resources/js/user.js', 'public/js')
    .js('resources/js/api.js', 'public/js')
    .js('resources/js/components/mixins/verification.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .version();

//'lodash', 'jquery', 'axios', 'vue
//mix.extract

