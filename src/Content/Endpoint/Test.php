<?php
/**
 * An example test API endpoint.
 *
 * @author  Evan Hildreth <evan.hildreth@webdevstudios.com>
 * @since   2020-02-28
 * @package WebDevStudios\OopsWPDemo
 */

namespace WebDevStudios\OopsWPDemo\Content\Endpoint;

use WebDevStudios\OopsWP\Structure\Content\ApiEndpoint;

/**
 * Class Test
 *
 * @author  Evan Hildreth <evan.hildreth@webdevstudios.com>
 * @since   2020-02-28
 * @package WebDevStudios\OopsWPDemo
 */
class Test extends ApiEndpoint {
	/**
	 * The endpoint namespace
	 *
	 * @var string
	 * @since 2020-01-30
	 */
	protected $namespace = 'oops-demo/v1';

	/**
	 * The endpoint route
	 *
	 * @var string
	 * @since 2020-01-30
	 */
	protected $route = '/test';

	public function run( $request = null ) {
		return new \WP_REST_Response( [ 'heman' => 'HEYYEYAAEYAAAEYAEYAA' ], 200 );
	}
}