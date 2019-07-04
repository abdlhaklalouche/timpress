<?php

namespace Timpress\Providers;

class Enqueue extends Provider {
  public function register() 
	{
		add_action('wp_enqueue_scripts',[$this, 'enqueue_scripts' ]);
	}
	/**
   * Inject scripts inside html files.
   * 
   * @return void
	 */
	public function enqueue_scripts() 
	{
		// Stylesheet
		wp_enqueue_style( 'main', mix('css/app.css'), [], '1.0.0', 'all' );
		wp_deregister_style( 'wp-block-library' );

		// Javascript
		wp_enqueue_script( 'main', mix('js/app.js'), [], '1.0.0', true );
		wp_deregister_script( 'wp-embed' );
	}
}