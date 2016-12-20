module.exports = function(gulp, $) {
    return function() {
        $.scriptWatcher.on("update", $.watchedBundler);
        $.scriptWatcher.on("log", $.gutil.log);
    }
};
