const gulp = require('gulp');
const $ = require('gulp-load-plugins')();

$.runSequence = require('run-sequence');
$.browserify = require("browserify");
$.source = require("vinyl-source-stream");
$.tsify = require("tsify");
$.buffer = require("vinyl-buffer");
$.browsersync = require("browser-sync");
$.watchify = require("watchify");
$.gutil = require("gulp-util");
$.del = require("del");
$.protractor = require("gulp-protractor");
$.conf = require("./conf/gulp.conf")();
$.scriptWatcher = require("./gulp/scripts").scriptWatcher(gulp, $)();
$.watchedBundler = require("./gulp/scripts").watchedBundler(gulp, $);
$.childProcess = require("child_process");
$.path = require("path");

gulp.task("browsersync", require('./gulp/browsersync')(gulp, $));
gulp.task('html', ['clean'], require('./gulp/html')(gulp, $));
gulp.task('images', ['clean'], require('./gulp/images')(gulp, $));
gulp.task('sass', ['clean'], require('./gulp/sass')(gulp, $));
gulp.task('scripts', ['clean'], require('./gulp/scripts').complete(gulp, $));
gulp.task('watch', require('./gulp/watch')(gulp, $));
gulp.task("clean", require("./gulp/clean")(gulp, $));
gulp.task("tests", require("./gulp/tests")(gulp, $));
gulp.task('default', ['clean', 'sass', 'scripts', 'images', 'html', 'browsersync', 'watch'], require("./gulp/default"));