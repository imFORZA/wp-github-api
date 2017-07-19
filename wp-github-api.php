<?php
/**
 * WP Github API
 * Designed to work with v3.0 (https://developer.github.com/v3) of the Github API.
 *
 * @package WP-Github-API
 */

/*
* Plugin Name: WP Github API
* Plugin URI: https://github.com/wp-api-libraries/wp-github-api
* Description: Perform API requests to Github in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-github-api
* GitHub Branch: master
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! class_exists( 'GithubAPI' ) ) {
	/**
	 * Github API Class.
	 */
	class GithubAPI {
		/**
		 * api_url
		 *
		 * (default value: 'https://api.github.com/')
		 *
		 * @var string
		 * @access private
		 */
		private $api_url = 'https://api.github.com/';
		public function __construct() {
		}
		public function _response() {}
	} // End Class.
} // End Class Exists Check.
