<?php
/**
 * An example footer menu.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Navigation\Menu
 */

namespace WebDevStudios\OopsWPDemo\Navigation\Menu;

use WebDevStudios\OopsWP\Structure\Menu\Menu;

/**
 * Class Footer
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Navigation\Menu
 */
class Footer extends Menu {
	/**
	 * Menu location.
	 *
	 * @var string
	 * @since 2020-02-03
	 */
	protected $location = 'footer_menu';

	/**
	 * Menu description.
	 *
	 * @var string
	 * @since 2020-02-03
	 */
	protected $description = 'The main footer menu.';
}
