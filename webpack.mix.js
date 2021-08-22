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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);



let styles = [
    "public/frontend/css/main.css",
]

let scripts = [
    'public/frontend/js/jquery-3.3.1.min.js',
    'public/frontend/js/popper.min.js',
    'public/frontend/js/bootstrap.min.js',
    'public/frontend/js/main.js',
    'public/frontend/js/plugins/pace.min.js',
]

mix.styles(styles, 'public/css/app.css').scripts(scripts, 'public/js/app.js').version()