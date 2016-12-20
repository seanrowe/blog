module.exports = function (gulp, $) {
    return function () {
        gulp.src('src/sass/styles.scss')
            .pipe($.sass())
            .pipe(gulp.dest('dest'));
    };
};