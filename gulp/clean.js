module.exports = function(gulp, $) {
    "use strict";

    return function() {
        $.del("../dist");
        $.gutil.log($.gutil.colors.red('Deleted dist folder...'));
    }
};
