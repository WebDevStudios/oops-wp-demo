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
	 * Get the labels for this post type.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 * @return array
	 */
	protected function get_labels() : array {
		return [];
	}
}
