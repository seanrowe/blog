module.exports = function(gulp, $) {
    return function() {
        gulp.src('../assets/images/*')
            .pipe($.imagemin())
            .pipe(gulp.dest('../dist/img'));
    }
};