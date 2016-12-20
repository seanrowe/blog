module.exports.config = {
    seleniumAddress: 'http://127.0.0.1:4444/wd/hub',
    getPageTimeout: 60000,
    allScriptsTimeout: 500000,
    framework: 'custom',
    frameworkPath: "../node_modules/protractor-cucumber-framework",
    baseURL: 'http://localhost:8080/',
    capabilities: {
        'browserName': 'chrome'
    },
    specs: [
        '../app/tests/features/*.feature'
    ],
    cucumberOpts: {
        require: '../app/tests/features/step_definitions/stepDefinitions.js',
        tags: false,
        format: 'pretty',
        profile: false,
        'no-source': true
    }
};