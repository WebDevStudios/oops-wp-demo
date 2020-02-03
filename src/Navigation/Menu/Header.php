<?php
/**
 * An example header menu
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Navigation\Menu
 */

namespace WebDevStudios\OopsWPDemo\Navigation\Menu;

use WebDevStudios\OopsWP\Structure\Menu\Menu;

/**
 * Class Header
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Navigation\Menu
 */
class Header extends Menu {
	/**
	 * Location name of the menu.
	 *
	 * @var string
	 * @since 2020-02-03
	 */
	protected $location = 'header_menu';

	/**
	 * Description of the menu.
	 *
	 * @var string
	 * @since 2020-02-03
	 */
	protected $description = 'The main header menu';
}
