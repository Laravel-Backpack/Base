const mix = require('laravel-mix');

// copy asset files from Base's public folder the main app's public folder
mix.copyDirectory('vendor/backpack/base/src/public', 'public');

mix.js('vendor/backpack/base/src/resources/assets/js/bundle.js', 'public/packages/backpack/base/js/')
	.sass('vendor/backpack/base/src/resources/assets/scss/bundle.scss', 'public/packages/backpack/base/css/');