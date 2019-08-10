const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Backpack maintainers use mix to:
 | - install and update CSS and JS assets;
 | - copy everything that needs to be published into src/public
 |
 | All JS will be bundled into one file (see bundle.js).
 |
 | How to use (for maintainers only):
 | - cd vendor/backpack/base
 | - npm install
 | - npm run prod
 | (this will also publish the assets for you to test, so no need to do that too)
 */

// merge all neede JS into a big bundle file
mix.js('src/resources/assets/js/bundle.js', 'src/public/packages/backpack/base/js/');

// copy the Backstrap CSS
mix.copy('node_modules/@digitallyhappy/backstrap/dist/css', 'src/public/packages/@digitallyhappy/backstrap/css');

// copy fonts and other assets
mix.copy('node_modules/line-awesome/fonts', 'src/public/packages/line-awesome/fonts')
	.copy('node_modules/line-awesome/css', 'src/public/packages/line-awesome/css')
	.copy('node_modules/source-sans-pro', 'src/public/packages/source-sans-pro')
	.copy('node_modules/animate.css/animate.min.css', 'src/public/packages/animate.css/animate.min.css')
	.copy('node_modules/noty/lib', 'src/public/packages/noty');

// FOR MAINTAINERS
// copy asset files from Base's public folder the main app's public folder
// so that you don't have to publish the assets with artisan to test them
mix.copyDirectory('src/public', '../../../public')
