const browserify = function(gulp, $) {
    "use strict";

    return $.browserify($.conf.conf.browserify).plugin($.tsify);
};

const bundle = function(b, gulp, $) {
    "use strict";

    b.transform('babelify', $.conf.conf.babelify)
        .bundle()
        .pipe($.source('bundle.js'))
        .pipe($.buffer())
        .pipe($.sourcemaps.init($.conf.conf.sourcemap))
        .pipe($.uglify())
        .pipe($.sourcemaps.write('./'))
        .pipe(gulp.dest($.conf.app.dist));
};

module.exports.scriptWatcher = function(gulp, $) {
    "use strict";

    return function() {
        return $.watchify(browserify(gulp, $));
    }
};

module.exports.watchedBundler = function(gulp, $) {
    "use strict";

    return function() {
        bundle($.scriptWatcher, gulp, $);
    }
};

module.exports.complete = function(gulp, $) {
    "use strict";

    return function () {
        bundle(browserify(gulp, $), gulp, $);
    };
};