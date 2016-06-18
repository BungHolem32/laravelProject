var gulp = require('gulp'),
    less = require('gulp-less'),
    path = require('path');

//DEFAULT COMPILE FOR THE FILE FROM LESS TO CSS
gulp.task('default', function () {
    return gulp.src('resources/assets/less/style.less')
        .pipe(less())
        .pipe(gulp.dest('public/css'))
});

//DEFAULT COMPILE WATCHER
gulp.task('watch', ['default'], function () {
    gulp.watch(['resources/assets/less/style.less','resources/assets/less/**/*.less'], ['default'])
});



// var elixir = require('laravel-elixir');
//
// /*
//  |--------------------------------------------------------------------------
//  | Elixir Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Elixir provides a clean, fluent API for defining some basic Gulp tasks
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for our application, as well as publishing vendor resources.
//  |
//  */
//
// elixir(function(mix) {
//     mix.sass('app.scss');
// });
