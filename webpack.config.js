var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())

    .addEntry('js/app', './assets/js/_member-form-interaction.js')
    .addStyleEntry('css/app', './assets/sass/main.scss')
    .addStyleEntry('css/app_admin', './assets/sass/main_admin.scss')

    .enableSassLoader()
;

module.exports = Encore.getWebpackConfig();
