module.exports = function(gulp, $) {
    "use strict";

    return function() {
        const args = [
            $.conf.conf.protractor.path,
            $.conf.conf.protractor.conf
        ];

        $.childProcess.execFile('node', args, (error, stdout, stderr) => {
            if (error) {
                let err = new $.gutil.PluginError('test', stdout, {showStack: false});
                console.log($.gutil.colors.red(err.toString()));
                return;
            }
            console.log(stdout);
        });
    }
};
