<?php
/**
 * WP Github API Test
 * Designed to work with v3.0 (https://developer.github.com/v3) of the Github API.
 *
 *
 */

/*
* Plugin Name: WP Github API Test
* Plugin URI: https://github.com/wp-api-libraries/wp-github-api
* Description: Perform API requests to Github in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-github-api
* GitHub Branch: master
*/


if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! class_exists( 'Test' ) ) {
	/**
	 * test Class.
	 */

	 include_once('wp-github-api.php');

	 $client = new GithubAPI();

	 error_log(print_r($client->get_user_repo_list('AppleMaster2000'),true));
	class Test {

	}
}
