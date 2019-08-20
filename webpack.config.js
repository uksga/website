const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())

    .addEntry('js/app', './assets/js/main.js')
    .addStyleEntry('css/app', './assets/sass/main.scss')
    .addStyleEntry('css/app_admin', './assets/sass/main_admin.scss')

    .enableSassLoader()
;

module.exports = Encore.getWebpackConfig();
