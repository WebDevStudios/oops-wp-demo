<?php
/**
 * An example registrar for custom API routes.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Api
 */

namespace WebDevStudios\OopsWPDemo\Api;

use WebDevStudios\OopsWP\Structure\Service;
use WebDevStudios\OopsWP\Utility\Registerable;
use WebDevStudios\OopsWPDemo\Api\Route\BoardGame;

/**
 * Class RouteRegistrar
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Api
 */
class RouteRegistrar extends Service {
	/**
	 * Custom example routes.
	 *
	 * @var array
	 * @since 2020-02-03
	 */
	private $routes = [
		BoardGame::class,
	];

	/**
	 * Register this service's custom REST routes with WordPress.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_hooks() {
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	/**
	 * Register our custom routes.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_routes() {
		foreach ( $this->routes as $route_class ) {
			$this->register_route( new $route_class() );
		}
	}

	/**
	 * Register an API route with WordPress.
	 *
	 * @TODO Followers of OOPS-WP will recognize that we're type-hinting against an interface specific to REST routes
	 *       in this case. Rather, we're going for the more generic Registerable. The reason here is two-fold: 1. As of
	 *       version 0.3.0, there is not yet an abstraction for registering custom REST routes in OOPS-WP. 2. We still
	 *       want to type-hint against _some_ interface, and once there is an abstraction, you can _rest_ assured
	 *       that it will extend Registerable. Terribly sorry for the bad pun.
	 *
	 * @param Registerable $route A registerable object.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	private function register_route( Registerable $route ) {
		$route->register();
	}
}
