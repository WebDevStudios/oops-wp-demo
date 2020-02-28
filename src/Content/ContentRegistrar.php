<?php
/**
 * Custom service responsible for registering different content types with WordPress.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo\Content
 */

namespace WebDevStudios\OopsWPDemo\Content;

use WebDevStudios\OopsWP\Structure\Content\ContentTypeInterface;
use WebDevStudios\OopsWP\Structure\Content\ShortcodeInterface;
use WebDevStudios\OopsWP\Structure\Service;
use WebDevStudios\OopsWP\Utility\FilePathDependent;
use WebDevStudios\OopsWPDemo\Content\PostType;
use WebDevStudios\OopsWPDemo\Content\Taxonomy;
use WebDevStudios\OopsWPDemo\Content\Shortcode;

/**
 * Class ContentRegistrar
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo\Content
 */
class ContentRegistrar extends Service {
	use FilePathDependent;

	/**
	 * ContentType entities to register.
	 *
	 * @var array
	 * @since 2019-01-31
	 */
	private $content_types = [
		PostType\Game::class,
		Taxonomy\GameType::class,
	];

	/**
	 * Shortcode entities to register.
	 *
	 * @var array
	 * @since 2020-01-30
	 */
	private $shortcodes = [
		Shortcode\NewestGame::class,
	];

	/**
	 * API Endpoints to register.
	 *
	 * @var array
	 * @since 2020-01-30
	 */
	private $endpoints = [
		Endpoint\Test::class,
	];

	/**
	 * Register content objects with WordPress.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	public function register_hooks() {
		add_action( 'init', [ $this, 'register_content' ] );
		add_action( 'init', [ $this, 'register_shortcodes' ] );
		add_action( 'rest_api_init', [ $this, 'register_endpoints' ] );
	}

	/**
	 * Initialize and register content objects.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	public function register_content() {
		foreach ( $this->content_types as $content_type_class ) {
			$this->register_content_type( new $content_type_class() );
		}
	}

	/**
	 * Register shortcodes with WordPress.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	public function register_shortcodes() {
		foreach ( $this->shortcodes as $shortcode_class ) {
			$this->register_shortcode( new $shortcode_class() );
		}
	}

	/**
	 * Initialize and register API Endpoints.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	public function register_endpoints() {
		foreach ( $this->endpoints as $endpoint_class ) {
			$this->register_content_type( new $endpoint_class() );
		}
	}

	/**
	 * Register a content type with WordPress.
	 *
	 * @param ContentTypeInterface $content_type Class instance.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	private function register_content_type( ContentTypeInterface $content_type ) {
		$content_type->register();
	}

	/**
	 * Register a shortcode.
	 *
	 * @param ShortcodeInterface $shortcode Object instance.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	private function register_shortcode( ShortcodeInterface $shortcode ) {
		if ( in_array( FilePathDependent::class, class_uses( $shortcode ), true ) ) {
			/* @var $shortcode \WebDevStudios\OopsWP\Utility\FilePathDependent Class instance. */
			$shortcode->set_file_path( plugin_dir_path( $this->file_path ) );
		}

		$shortcode->register();
	}
}
