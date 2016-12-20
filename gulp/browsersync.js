module.exports = function(gulp, $) {
    return function(cb) {
        return $.browsersync({
            server: {
                baseDir: '../dist'
            }
        }, cb);
    }
};