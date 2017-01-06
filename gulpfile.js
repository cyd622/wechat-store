const elixir = require('laravel-elixir');

var production = elixir.config.production;
require('laravel-elixir-vue-2');

var basejs = [
    'node_modules/sweetalert/dist/sweetalert.min.js',
    'node_modules/social-share.js/dist/js/social-share.min.js'
];

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix
        .sass('app.scss')

        .copy('node_modules/font-awesome/fonts', 'public/build/fonts')
        .copy('node_modules/social-share.js/dist/fonts', 'public/build/fonts/iconfont')
        .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js/sweetalert.min.js')
        .copy('node_modules/social-share.js/dist/js/social-share.min.js', 'public/js/social-share.min.js')

        .webpack('app.js')

        //.webpack(
        //    'app.js',
        //    './public/js/app_tmp.js'
        //)

        //.scripts(basejs.concat(['public/js/app_tmp.js']), 'public/js/app.js', './')

        .version([
            'public/css/app.css',
            'public/js/app.js'
        ])

    //if (production) {
    //    mix.compress();
    //}

    mix.browserSync({
        proxy: 'wewx.app',
        browser: 'google-chrome',
        logConnections  : false,
        reloadOnRestart : false,
        notify          : false
    })
})
