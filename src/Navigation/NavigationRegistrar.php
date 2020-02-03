<?php
/**
 * An example service which registers navigation elements.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Menu
 */

namespace WebDevStudios\OopsWPDemo\Navigation;

use WebDevStudios\OopsWP\Structure\Menu\MenuInterface;
use WebDevStudios\OopsWP\Structure\Service;
use WebDevStudios\OopsWPDemo\Navigation\Menu\Footer;
use WebDevStudios\OopsWPDemo\Navigation\Menu\Header;

/**
 * Class NavRegistrar
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Menu
 */
class NavigationRegistrar extends Service {
	/**
	 * Example menus for this demo.
	 *
	 * @var array
	 * @since 2020-02-03
	 */
	protected $menus = [
		Header::class,
		Footer::class,
	];

	/**
	 * Register this service's hooks with WordPress.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_hooks() {
		add_action( 'init', [ $this, 'register_menus' ] );
	}

	/**
	 * Register this service's menus.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_menus() {
		foreach ( $this->menus as $menu_class ) {
			$this->register_menu( new $menu_class() );
		}
	}

	/**
	 * Register a menu.
	 *
	 * Typehint against the MenuInterface to ensure that only objects which implement it are allowed.
	 *
	 * @param MenuInterface $menu An object which implements this interface.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	private function register_menu( MenuInterface $menu ) {
		$menu->register();
	}
}
