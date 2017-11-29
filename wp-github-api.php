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
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'GithubAPI' ) ) {
	/**
	 * Github API Class.
	 */
	class GithubAPI {

		/**
		 * API base uri.
		 *
		 * (default value: 'https://api.github.com/')
		 *
		 * @var string
		 * @access private
		 */
		protected $base_uri = 'https://api.github.com/';

		/**
		 * API token
		 *
		 * @var string
		 */
		static protected $api_token;

		/**
		 * Return format. XML or JSON.
		 *
		 * @var string
		 */
		static protected $format;

		/**
		 * Indicate if json respone should be wrapped in a callback.
		 *
		 * @var int
		 */
		static protected $callback;

		/**
		 * Request query args.
		 *
		 * @var array
		 */
		protected $args = array();

		/**
		 * Route being called.
		 *
		 * @var string
		 */
		protected $route = '';

		/**
		 * Pagination links.
		 *
		 * @var string
		 */
		public $links;

		/**
		 * Constructor.
		 *
		 * @param string $api_key  API key to the account.
		 * @param string $format   XML or JSON.
		 * @param int    $callback If specified, returns json wrapped in a callback with the name passed in.
		 */
		public function __construct( string $api_token = '') {
			static::$api_token = trim( $api_token );
		}

		/**
		 * Prepares API request.
		 *
		 * @param  string $route   API route to make the call to.
		 * @param  array  $args    Arguments to pass into the API call.
		 * @param  array  $method  HTTP Method to use for request.
		 * @return self            Returns an instance of itself so it can be chained to the fetch method.
		 */
		protected function build_request( $route, $args = array(), $method = 'GET' ) {
			// Headers get added first.
			$this->set_headers();

			// Add Method and Route.
			$this->args['method'] = $method;
			$this->route = $route;

			// Generate query string for GET requests.
			if ( 'GET' === $method ) {
				$this->route = add_query_arg( array_filter( $args ), $route );
			}
			// Add to body for all other requests. (Json encode if content-type is json).
			elseif ( 'application/json' === $this->args['headers']['Content-Type'] ) {
				$this->args['body'] = wp_json_encode( $args );
			} else {
				$this->args['body'] = $args;
			}

			return $this;
		}


		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @return array|WP_Error Request results or WP_Error on request failure.
		 */
		protected function fetch() {
			// Make the request.
			$response = wp_remote_request( $this->base_uri . $this->route, $this->args );

			// Retrieve Status code & body.
			$code = wp_remote_retrieve_response_code( $response );
			$body = json_decode( wp_remote_retrieve_body( $response ) );

      $this->set_links( $response );

			$this->clear();

			// Return WP_Error if request is not successful.
			if ( ! $this->is_status_ok( $code ) ) {
				return new WP_Error( 'response-error', sprintf( __( 'Status: %d', 'wp-untappd-api' ), $code ), $body );
			}

			return $body;
		}

		public function get_next_args(){
			if( $this->has_next() ){
				return wp_parse_args( wp_parse_url( $this->links['next'], PHP_URL_QUERY ) , array() );
			}
		}

		public function has_next(){
			$result = false;

			if( isset( $this->links['next'] ) ){
				$result = true;
			}

			return $result;
		}

		/**
		 * Set request headers.
		 */
		protected function set_headers() {
			// Set request headers.
			$this->args['headers'] = array(
				'Content-Type' => 'application/json',
				//'Accept' => 'application/vnd.github.v3+json',
				'Accept' => 'application/vnd.github.mercy-preview+json',
				'Authorization' => 'token ' . trim( static::$api_token ),
			);
		}

		/**
		 * Clear query data.
		 */
		protected function clear() {
			$this->args = array();
		}

		/**
		 * Check if HTTP status code is a success.
		 *
		 * @param  int $code HTTP status code.
		 * @return boolean       True if status is within valid range.
		 */
		protected function is_status_ok( $code ) {
			return ( 200 <= $code && 300 > $code );
		}

		protected function set_links( $response ){
		  $this->links = array();

			// Get links from response header.
			$links = wp_remote_retrieve_header( $response, 'link' );

			// Parse the string into a convenient array.
			$links = explode( ',', $links );
			if( ! empty( $links ) ){

				foreach ( $links as $link ) {
					$tmp =  explode( ";", $link );
					$res = preg_match('~<(.*?)>~',$tmp[0], $match );

					if( ! empty( $res ) ){
						// Some string magic to set array key. Changes 'rel="next"' => 'next'.
						$key = str_replace( array( 'rel=', '"' ),'',trim($tmp[1]));
						$this->links[$key] = $match[1];

					}
				}
			}
		}

		/**
		 * Get all orgs
		 *
		 * @access public
		 * @param  int    $section_id ID of menu section.
		 * @return void
		 */
		public function get_all_orgs( ) {
			return $this->build_request( "organizations"  )->fetch();
		}

		/**
		 * Get org.
		 *
		 * @access public
		 * @param  int    $section_id ID of menu section.
		 * @return void
		 */
		public function get_org( $org ) {
			return $this->build_request( "orgs/$org"  )->fetch();
		}

		/**
		 * Get org repos.
		 *
		 * @access public
		 * @param  string  $org  Name of org.
		 * @param  string  $args Aadditional query args.
		 * @return array
		 */
		public function get_org_repos( $org, $args = array() ) {
			return $this->build_request( "orgs/$org/repos", $args )->fetch();
		}

	} // End Class.
} // End Class Exists Check.
