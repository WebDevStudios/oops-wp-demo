<?php
/**
 * Example Shortcode implementation.
 *
 * This particular example demonstrates how to override the Shortcode::process_output() method by making an API request
 * to BoardGameGeek.com, a website for board game enthusiasts.
 *
 * This implementation also provides an example for how the FilePathDependent trait is used. The ContentRegistrar
 * service also uses this trait, and as such, receives a file path from the main Plugin class. The shortcode uses
 * the value provided by its service to locate the path to its template file, located in the templates directory
 * from the root of the plugin.
 *
 * @see \WebDevStudios\OopsWPDemo\Content\ContentRegistrar
 * @see \WebDevStudios\OopsWP\Utility\FilePathDependent
 * @see \WebDevStudios\OopsWP\Structure\Content\Shortcode::process_output()
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
	 * An instance of a NewestGame object.
	 *
	 * @var NewestGame
	 * @since 2020-02-03
	 */
	private $game;

	/**
	 * Example override of the parent Shortcode::process_output method.
	 *
	 * In this example, we're checking to see if we have data about a particular game before we render it to
	 * the screen. The parent method by default simply assigns the `$atts` and `$content` properties passed in
	 * from WordPress, but certainly much more processing is likely necessary before the shortcode is ready for
	 * display.
	 *
	 * This example shortcode accepts a game ID from BoardGameGeek.com. If no ID is present, nothing will render.
	 * Otherwise, the shortcode will attempt to make an API request to the site to get data about a game, then
	 * display its title and description on the front-end. It also optionally accepts content, which will be displayed
	 * below the game description.
	 *
	 * The reason for splitting this into two steps - process_output and render - is that the render logic for the
	 * class should only care about how the data is displayed to the screen, not how or whether that data gets
	 * processed. Ultimately, OOPS-WP is structured so you _could_ do all the processing in render (since `$atts` and
	 * `$content` are already assigned to this object's properties by that point). We leave it to the implementing
	 * engineer to decide which approach works best for their project.
	 *
	 * @param array|string $atts    Array of shortcode attributes.
	 * @param string       $content Shortcode content, if any.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 * @return string
	 * @see    Shortcode::process_output()
	 */
	public function process_output( $atts, string $content = '' ) : string {
		if ( ! isset( $atts['id'] ) ) {
			return '';
		}

		$this->setup_game_data( filter_var( $atts['id'], FILTER_SANITIZE_STRING ) );

		return parent::process_output( $atts, $content );
	}

	/**
	 * Get the game data for the shortcode.
	 *
	 * @param string $game_id The ID of the game to retrieve.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	private function setup_game_data( $game_id ) {
		$data = get_transient( NewestGameData::CACHE_ID_PREFIX . $game_id );

		if ( ! $data ) {
			$data = $this->request_game_data( $game_id );
		}

		$this->game = $data ? new NewestGameData( $data ) : null;
	}

	/**
	 * Convert the BoardGameGeek API XML response to JSON.
	 *
	 * @param array $data Array of XML data.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 * @return array
	 */
	private function convert_xml_to_json( $data ) : array {
		if ( ! $data ) {
			return [];
		}

		libxml_use_internal_errors( true );

		$xml = simplexml_load_string( $data );

		if ( ! $xml ) {
			return [];
		}

		return json_decode( wp_json_encode( $xml ), true );
	}

	/**
	 * Make an API request to BoardGameGeek.com.
	 *
	 * @param string $game_id ID of the game to request. Expects numeric string.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 * @return array
	 */
	private function request_game_data( $game_id ) {
		if ( ! is_numeric( $game_id ) ) {
			return [];
		}

		try {
			$request = wp_remote_request( "https://www.boardgamegeek.com/xmlapi2/thing?id=${game_id}" );

			if ( 200 === wp_remote_retrieve_response_code( $request ) ) {
				$data = $this->convert_xml_to_json( wp_remote_retrieve_body( $request ) );

				set_transient(
					NewestGameData::CACHE_ID_PREFIX . $game_id,
					$data,
					1 * DAY_IN_SECONDS
				);

				return $data;
			}
		} catch ( \Exception $e ) { // phpcs:ignore
			// Example demo only. We might otherwise handle this.
		}

		return [];
	}

	/**
	 * Get the game from the shortcode data.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 * @return NewestGame
	 */
	public function get_game() {
		return $this->game;
	}

	/**
	 * Get the shortcode content.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 * @return string
	 */
	public function get_content() {
		return $this->content;
	}

	/**
	 * Render the shortcode.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 * @return string
	 */
	public function render() : string {
		if ( ! $this->game ) {
			return '';
		}

		// Assign this object to a variable that can be accessed by the template.
		$shortcode = $this;

		ob_start();

		include $this->file_path . 'templates/newest-game-shortcode.php';

		return ob_get_clean();
	}
}
