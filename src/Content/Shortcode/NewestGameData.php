<?php
/**
 * Value object for the NewestGame shortcode.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Content\Shortcode
 */

namespace WebDevStudios\OopsWPDemo\Content\Shortcode;

/**
 * Class NewestGameData
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\Content\Shortcode
 */
class NewestGameData {
	/**
	 * The name of the newest game.
	 *
	 * @var string
	 * @since 2020-02-03
	 */
	private $name;

	/**
	 * The description of the newest game.
	 *
	 * @var string
	 * @since 2020-02-03
	 */
	private $description;

	/**
	 * NewestGameData constructor.
	 *
	 * @param array $data Data from the BoardGameGeek API.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function __construct( array $data ) {
		$this->name        = $data['item']['name'][0]['@attributes']['value'] ?? '';
		$this->description = $data['item']['description'] ?? '';
	}

	/**
	 * Check whether we have a valid value object.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 * @return bool
	 */
	public function is_valid() : bool {
		return $this->name;
	}

	/**
	 * Get the name of the newest game.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 * @return string
	 */
	public function get_name() : string {
		return $this->name;
	}

	/**
	 * Get the description of the newest game.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 * @return string
	 */
	public function get_description() : string {
		return $this->description;
	}
}
