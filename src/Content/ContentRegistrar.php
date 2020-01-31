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
use WebDevStudios\OopsWP\Structure\Service;
use WebDevStudios\OopsWPDemo\Content\PostType;
use WebDevStudios\OopsWPDemo\Content\Taxonomy;

/**
 * Class ContentRegistrar
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo\Content
 */
class ContentRegistrar extends Service {
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
	 * Register content objects with WordPress.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	public function register_hooks() {
		add_action( 'init', [ $this, 'register_content' ] );
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
}
