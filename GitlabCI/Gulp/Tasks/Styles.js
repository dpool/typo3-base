'use strict';

/*
########################################################################################################################################################################################################
### VARIABLES ###
########################################################################################################################################################################################################
*/
var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var touch = require('gulp-touch-cmd');

var config = require('../../../../../../../gulp-config');


/*
########################################################################################################################################################################################################
### FUNCTIONS ###
########################################################################################################################################################################################################
*/
gulp.task('styles', function () {
    return gulp
        .src(config.cssInputFiles)
        .pipe(sourcemaps.init())
        .pipe(sass(config.sassOptions).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(gulp.dest(config.cssOutputDist))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(cleanCSS())
        .pipe(touch())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(config.cssOutputDist));
});
