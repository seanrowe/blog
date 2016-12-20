module.exports = function(gulp, $) {
    return function() {
        gulp.src("../app/src/views")
            .pipe(gulp.dest("../dist/views"));
    };
};