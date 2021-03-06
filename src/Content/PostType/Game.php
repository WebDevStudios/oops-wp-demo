<?php
/**
 * An example Game post type.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo
 */

namespace WebDevStudios\OopsWPDemo\Content\PostType;

use WebDevStudios\OopsWP\Structure\Content\PostType;

/**
 * Class Game
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo
 */
class Game extends PostType {
	/**
	 * The post type slug.
	 *
	 * @var string
	 * @since 2020-01-30
	 */
	protected $slug = 'wds-game';

	protected function get_args() : array {
		return array_merge( parent::get_args(), [ 'show_in_rest' => true ] ); // TODO: Change the autogenerated stub
	}

	/**
	 * Get the labels for this post type.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 * @return array
	 */
	protected function get_labels() : array {
		return [
			'name'               => _x( 'Games', 'post type general name', 'oops-wp-demo' ),
			'singular_name'      => _x( 'Game', 'post type singular name', 'oops-wp-demo' ),
			'menu_name'          => _x( 'Games', 'admin menu', 'oops-wp-demo' ),
			'name_admin_bar'     => _x( 'Game', 'add new on admin bar', 'oops-wp-demo' ),
			'add_new'            => _x( 'Add New', 'game', 'oops-wp-demo' ),
			'add_new_item'       => __( 'Add New Game', 'oops-wp-demo' ),
			'new_item'           => __( 'New Game', 'oops-wp-demo' ),
			'edit_item'          => __( 'Edit Game', 'oops-wp-demo' ),
			'view_item'          => __( 'View Game', 'oops-wp-demo' ),
			'all_items'          => __( 'All Games', 'oops-wp-demo' ),
			'search_items'       => __( 'Search Games', 'oops-wp-demo' ),
			'parent_item_colon'  => __( 'Parent Games:', 'oops-wp-demo' ),
			'not_found'          => __( 'No games found.', 'oops-wp-demo' ),
			'not_found_in_trash' => __( 'No games found in Trash.', 'oops-wp-demo' ),
		];
	}
}
