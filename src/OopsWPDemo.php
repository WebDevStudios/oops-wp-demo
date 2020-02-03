<?php
/**
 * The main class file.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo
 */

namespace WebDevStudios\OopsWPDemo;

use WebDevStudios\OopsWP\Structure\Plugin\Plugin;
use WebDevStudios\OopsWPDemo\Content\ContentRegistrar;
use WebDevStudios\OopsWPDemo\Navigation\NavigationRegistrar;

/**
 * Class OopsWPDemo
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo
 */
class OopsWPDemo extends Plugin {
	/**
	 * OopsWPDemo constructor.
	 *
	 * @param string $file_path The plugin file path.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	public function __construct( $file_path ) {
		$this->file_path = $file_path;
	}

	/**
	 * Services that this plugin registers.
	 *
	 * @var array
	 * @since 0.1.0
	 */
	protected $services = [
		ContentRegistrar::class,
		NavigationRegistrar::class,
	];
}
