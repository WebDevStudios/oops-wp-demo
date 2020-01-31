<?php
/**
 *
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo\Content\Shortcode
 */

namespace WebDevStudios\OopsWPDemo\Content\Shortcode;

use WebDevStudios\OopsWP\Structure\Content\Shortcode;
use WebDevStudios\OopsWP\Utility\FilePathDependent;

/**
 * Class NewestGame
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo\Content\Shortcode
 */
class NewestGame extends Shortcode {
	use FilePathDependent;

	/**
	 * The shortcode tag.
	 *
	 * @var string
	 * @since 2020-01-31
	 */
	protected $tag = 'newest_game';

	/**
	 * Print the shortcode content.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	public function content() {
		echo wp_kses_post( $this->content );
	}

	/**
	 * Render the shortcode.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 * @return string
	 */
	public function render() : string {
		if ( ! $this->content ) {
			return '';
		}

		// Assign this object to a variable that can be accessed by the template.
		$shortcode = $this;

		ob_start();

		include $this->file_path . 'templates/newest-game-shortcode.php';

		return ob_get_clean();
	}
}
