<?php
/**
 * Plugin Name: OOPS-WP Demo
 * Description: An example plugin to demonstrate usage of OOPS-WP structures and utilities.
 * Author: WebDevStudios
 * Author URI: https://webdevstudios.com
 * Version: 0.3.0
 */

use WebDevStudios\OopsWPDemo\OopsWPDemo;

$autoload = __DIR__ . '/vendor/autoload.php';

if ( is_readable( $autoload ) ) {
	require_once $autoload;
}

add_action( 'plugins_loaded', function() {
	try {
		( new OopsWPDemo( __FILE__ ) )->run();
	} catch ( Error $e ) {
		add_action( 'admin_notices', function() {
			$message = __(
				'Could not locate OOPS-WP Demo class files. Did you remember to run composer install?',
				'oops-wp-demo'
			);

			echo wp_kses_post( '<div class="notice notice-error"><p>' . $message . '</p></div>' );
		} );
	}
} );
