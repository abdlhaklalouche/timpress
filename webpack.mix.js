/*
 * Laravel documentation
 * https://laravel.com/docs/5.8/mix
 * 
 */

let mix = require( 'laravel-mix' );

// Define the public path that final transpiled files will be inside.
mix.setPublicPath( './public' );

// Transpile assets
mix.js('assets/js/app.js', 'public/js')
	.js('assets/js/admin.js', 'public/js')
	.sass('assets/sass/app.scss', 'public/css')
	.sass('assets/sass/admin.scss', 'public/css');

// Minify assets if it is in production environment.
if (mix.inProduction())
	mix.version();