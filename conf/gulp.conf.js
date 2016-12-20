module.exports = function() {
    return {
        app: {
            dist: "../app/dist/",
            src: {
                controllers: "../app/src/controllers/",
                directives: "../app/src/directives/",
                models: "../app/src/models/",
                services: "../app/src/services/",
                views: "../app/src/views/"
            },
            assets: {
                images: "../app/assets/images/",
                sass: "../app/assets/sass/"
            },
            tests: {
                features: "../app/tests/features/",
                spec: "../app/tests/spec/"
            }
        },
        api: {
            data: "../api/data/",
            tests: {
                features: "../api/tests/features/",
                spec: "../api/tests/spec/"
            }
        },
        conf: {
            browserify: {
                basedir: '.',
                debug: true,
                entries: [],
                cache: {},
                packageCache: {}
            },
            babelify: {
                presets: ['es2015'],
                extensions: ['.ts']
            },
            sourcemap: {
                loadMaps: true
            },
            childProcess: {
                stdio: 'inherit'
            },
            protractor: {
                conf: "./conf/protractor.conf.js",
                path: "./node_modules/protractor/bin/protractor"
            },
        }
    };
};