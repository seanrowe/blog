module.exports = function(gulp, $) {
    "use strict";

    return function() {
        gulp.watch($.app.src.views + '**/*.html', runSequence('html', $.browsersync.reload));
        gulp.watch($.app.assets.images + '**/*.*', runSequence('images', $.browsersync.reload));
        gulp.watch($.app.assets.sass + '**/*.{sass,scss}', runSequence('sass', $.browsersync.reload));

        gulp.watch([
            $.app.src.controllers + '**/*.ts',
            $.app.src.directives + "**/*.ts",
            $.app.src.models + "**/*.ts",
            $.app.src.services + "**/*.ts"
        ], runSequence('scripts', $.browsersync.reload));
    }
};
