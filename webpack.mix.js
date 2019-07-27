const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// create bundle files inside Base's public folder
mix.js('src/resources/assets/js/bundle.js', 'src/public/packages/backpack/base/js/')
	.sass('src/resources/assets/scss/bundle.scss', 'src/public/packages/backpack/base/css/');

// copy the Backstrap overlay CSS to Base's public folder
mix.copy('node_modules/@digitallyhappy/backstrap/dist/css/overlay.css', 'src/public/packages/@digitallyhappy/backstrap/css/overlay.css')
	.copy('node_modules/@digitallyhappy/backstrap/dist/css/overlay.css.map', 'src/public/packages/@digitallyhappy/backstrap/css/overlay.css.map');

// copy fonts to Base's public folder
mix.copy('node_modules/line-awesome/fonts', 'src/public/fonts/vendor/line-awesome')
	.copy('node_modules/source-sans-pro', 'src/public/fonts/vendor/source-sans-pro');

// copy asset files from Base's public folder the main app's public folder
mix.copyDirectory('src/public', '../../../public')
