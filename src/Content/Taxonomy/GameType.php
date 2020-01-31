<?php
/**
 * Register the game type taxonomy.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo\Content\Taxonomy
 */

namespace WebDevStudios\OopsWPDemo\Content\Taxonomy;

use WebDevStudios\OopsWP\Structure\Content\Taxonomy;

/**
 * Class GameType
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo\Content\Taxonomy
 */
class GameType extends Taxonomy {
	/**
	 * Taxonomy slug.
	 *
	 * @var string
	 * @since 2020-01-31
	 */
	protected $slug = 'wds-game-type';

	/**
	 * Objects this taxonomy supports.
	 *
	 * @var array
	 * @since 2020-01-31
	 */
	protected $object_types = [ 'wds-game' ];

	/**
	 * Get the taxonomy labels.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 * @return array
	 */
	protected function get_labels() : array {
		return [
			'name'              => _x( 'Game Types', 'taxonomy general name', 'oops-wp-demo' ),
			'singular_name'     => _x( 'Game Type', 'taxonomy singular name', 'oops-wp-demo' ),
			'search_items'      => __( 'Search Game Types', 'oops-wp-demo' ),
			'all_items'         => __( 'All Game Types', 'oops-wp-demo' ),
			'parent_item'       => __( 'Parent Game Type', 'oops-wp-demo' ),
			'parent_item_colon' => __( 'Parent Game Type:', 'oops-wp-demo' ),
			'edit_item'         => __( 'Edit Game Type', 'oops-wp-demo' ),
			'update_item'       => __( 'Update Game Type', 'oops-wp-demo' ),
			'add_new_item'      => __( 'Add New Game Type', 'oops-wp-demo' ),
			'new_item_name'     => __( 'New Game Type Name', 'oops-wp-demo' ),
			'menu_name'         => __( 'Game Type', 'oops-wp-demo' ),
		];
	}
}
