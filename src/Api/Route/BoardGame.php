<?php
/**
 * An example custom API route.
 *
 * Astute followers of OOPS-WP will notice that there's not yet an abstraction for this class. Don't worry, it's coming
 * eventually.
 *
 * For now, I wanted to register a custom endpoint that I could ping to leverage the transients we established in the
 * Shortcode example for the EditorBlock one. That is, if a game already exists in our transient cache, let's return
 * its data so that the Game editor block can render itself in the editor. If not, we'll hit up the BoardGameGeek API
 * to see whether a given ID is a valid one.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Api\Route
 */

namespace WebDevStudios\OopsWPDemo\Api\Route;

use WebDevStudios\OopsWP\Utility\Registerable;
use WebDevStudios\OopsWPDemo\Content\Shortcode\NewestGameData;

/**
 * Class BoardGame
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Api\Route
 */
class BoardGame extends \WP_REST_Controller implements Registerable {
	/**
	 * The route namespace.
	 *
	 * @var string
	 * @since 2020-02-03
	 */
	protected $namespace = 'oops-wp-demo/v1';

	/**
	 * The route base name.
	 *
	 * @var string
	 * @since 2020-02-03
	 */
	protected $rest_base = 'boardgame';

	/**
	 * Register custom rest routes to work with game data.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register() {
		$this->register_routes();

	}

	/**
	 * Register custom routes.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			"/{$this->rest_base}/?P<id>\d+)",
			[
				'methods'  => \WP_REST_Server::READABLE,
				'callback' => [ $this, 'get_item' ],
			]
		);
	}

	/**
	 * Get data for a given board game.
	 *
	 * @param \WP_REST_Request $request A request instance.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 * @return void|\WP_Error|\WP_REST_Response
	 */
	public function get_item( $request ) {
		$game_id = $request->get_param( 'id' );
		$data    = get_transient( NewestGameData::CACHE_ID_PREFIX . $game_id );

		if ( $data ) {
			return $data;
		}
	}
}

