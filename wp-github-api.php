<?php
/**
 * WP Github API Proper
 * Designed to work with v3.0 (https://developer.github.com/v3) of the Github API.
 *
 * @package WP-Github-API
 */

/*
* Plugin Name: WP Github API Proper
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
	exit; }
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


		/**
		 * API key
		 *
		 * @var string
		 */
		static private $api_key;
		/**
		 * Argum
		 *
		 * @var [type]
		 */
		private $default_args = array(
			'method' => 'GET',
		);
		/**
		 * Return format. XML or JSON.
		 *
		 * @var string
		 */
		static private $format;
		/**
		 * Indicate if json respone should be wrapped in a callback.
		 *
		 * @var int
		 */
		static private $callback;

		protected $args = array();

		/**
		 * Constructor.
		 *
		 * @param string $api_key  API key to the account.
		 * @param string $format   XML or JSON.
		 * @param int    $callback If specified, returns json wrapped in a callback with the name passed in.
		 */
		public function __construct( $api_key = '', $format = 'json', $callback = null, $debug = false ) {

					$this->args['headers'] = array(
						'Authorization' => 'token ' . $api_key,
					);

			if ( $debug ) {
				$this->debug = true;
			}
		}

		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		protected function fetch( $request ) {
			// error_log( $this->api_url . $request . print_r( $this->args, true ));
			$response = wp_remote_request( $this->api_url . $request, $this->args );
			// error_log(print_r( $response, true ));
			// if( $this->debug ){
			// return $response;
			// }
			$code = wp_remote_retrieve_response_code( $response );
			$body = json_decode( wp_remote_retrieve_body( $response ) );
			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Status: %d', 'wp-github-api' ), $code ), $body );
			}
			return $body;
		}
		protected function build_request( $args = array() ) {
			// Resetting arguments based on defaults (if the defaults have them set).
			$this->args = wp_parse_args( $this->default_args, $this->args );
			// Setting arguments based passsed array.
			$this->args = wp_parse_args( $args, $this->args );
			// if( $this->debug ){ // Prevents spam emails during debug mode.
			// if( isset( $this->args['body'] ) && isset( $this->args['body']['To'] ) ){
			// $this->args['body']['To'] = $this->blackhole_email;
			// }
			// }
			if ( isset( $args['body'] ) && gettype( $args['body'] ) !== 'string' ) {
				$this->args['body'] = wp_json_encode( $this->args['body'] );
			}
			// error_log( print_r( $this->args, true ));
			return $this;
		}

		public function _response() {}
			// OAuth Authorizations API
			/**
			 * Get_oauth_grants_list
			 *
			 * @return list
			 */
		public function get_oauth_grants_list(){}
			/**
			 * Get_oauth_single_grant
			 *
			 * @param  integer $id
			 * @return list
			 */
		public function get_oauth_single_grant( $id ) {}
			/**
			 * Delete_oauth_grant
			 *
			 * @param  integer $id identification number
			 * @return grant
			 */
		public function delete_oauth_grant( $id ) {}
			/**
			 * Get_oauth_authorizations_list
			 *
			 * @return null
			 */
		public function get_oauth_authorizations_list(){}
			/**
			 * Get_oauth_single_authorization
			 *
			 * @param  integer $id identification number
			 * @return list
			 */
		public function get_oauth_single_authorization( $id ) {}
			/**
			 * Post_oauth_authorization
			 *
			 * @return authorization
			 */
		public function post_oauth_authorization(){}
			/**
			 * Put_create_oauth_authorization_specific_app
			 *
			 * @param  string $client_id client identification
			 * @return authorization
			 */
		public function put_create_oauth_authorization_specific_app( $client_id ) {}
			/**
			 * Put_create_oauth_authorization_specific_app_fingerprint
			 *
			 * @param  string $client_id client identification
			 * @param  string $fingerprint fingetprint
			 * @return authorization
			 */
		public function put_create_oauth_authorization_specific_app_fingerprint( $client_id, $fingerprint ) {}
			/**
			 * Patch_oauth_authorization
			 *
			 * @param  integer $id identification number
			 * @return authorization
			 */
		public function patch_oauth_authorization( $id ) {}
			/**
			 * Delete_oauth_authorization
			 *
			 * @param  int $id identification
			 * @return null
			 */
		public function delete_oauth_authorization( $id ) {}
			/**
			 * Get_oauth_authorization
			 *
			 * @param  string $client_id client identification
			 * @param  string $access_token access token
			 * @return authorization
			 */
		public function get_oauth_authorization( $client_id, $access_token ) {}
			/**
			 * Post_oauth_reset_authorization
			 *
			 * @param string $client_id client identification
			 * @param  string $access_token access token
			 * @return authorization
			 */
		public function post_oauth_reset_authorization( $client_id, $access_token ) {}
			/**
			 * delete_oauth_authorization_app
			 *
			 * @param  string $client_id client identification
			 * @param  string $access_token access token
			 * @return authorization
			 */
		public function delete_oauth_authorization_app( $client_id, $access_token ) {}
			/**
			 * Delete_oauth_grant_app
			 *
			 * @param  string $client_id client identification
			 * @param  string $access_token access token
			 * @return grant
			 */
		public function delete_oauth_grant_app( $client_id, $access_token ) {}

			// Events
			/**
			 * Get_public_events_list description
			 *
			 * @return events public events
			 */
		public function get_public_events_list() {}
				/**
				 * Get_repo_events_list description
				 *
				 * @param string $owner owner of the repo
				 * @param string $repo specific repo of public events
				 * @return Event repostitory events
				 */
		public function get_repo_events_list( $owner, $repo ) {}
				/**
				 * Get_public_network_repo_events_list description
				 *
				 * @param  string $owner owner of the repo
				 * @param  string $repo specific repo
				 * @return Event public events for a network of repositories
				 */
		public function get_public_network_repo_events_list( $owner, $repo ) {}
				/**
				 * Get_public_organization_events_list description
				 *
				 * @param  array $org organization
				 * @return Event public events for an organization
				 */
		public function get_public_organization_events_list( $org ) {}
				/**
				 * Get_received_user_events_list description
				 *
				 * @param  string $username user of the repo
				 * @return Event events that are recieved by watching repos and following users
				 */
		public function get_received_user_events_list( $username ) {}
				/**
				 * Get_public_received_user_events_list description
				 *
				 * @param  string $username user of the repo
				 * @return Event public events that a user recieved
				 */
		public function get_public_received_user_events_list( $username ) {}
				/**
				 * Get_user_performed_events_list description
				 *
				 * @param  string $username user of the repo
				 * @return Event events performed by a user         [
				 */
		public function get_user_performed_events_list( $username ) {}
				/**
				 * Get_publice_events_user_list description
				 *
				 * @param  string $username user of the repo
				 * @return Event public events performed by a user
				 */
		public function get_publice_events_user_list( $username ) {}
				/**
				 * Get_organization_events_list description
				 *
				 * @param  string $username user of the repo
				 * @param  array  $org organization
				 * @return Event user's organization dashboard. Must be authenticated as a user to view
				 */
		public function get_organization_events_list( $username, $org ) {}

				// Events Types and Payloads
			/**
			 * _event_commit_comment description
			 *
			 * @param   $comment
			 * @return ?
			 */
		public function _event_commit_comment( $comment ) {}
			/**
			 * Post_event description
			 *
			 * @param  string $ref_type      The object that was created. Can be one of "repository", "branch", or "tag"
			 * @param  string $ref           The git ref (or null if only a repository was created).
			 * @param  string $master_branch The name of the repository's default branch (usually master).
			 * @param  string $description   The repository's current description.
			 * @return
			 */
		public function post_event( $ref_type, $ref, $master_branch, $description ) {}
			/**
			 * Delete_event description
			 *
			 * @param  string $ref_type The object that was deleted. Can be "branch" or "tag".
			 * @param  string $ref      The full git ref.
			 * @return
			 */
		public function delete_event( $ref_type, $ref ) {}
			/**
			 * Deployment_event description
			 *
			 * @param  object $deployment  The deployment
			 * @param  string $sha         The commit SHA for which this deployment was created.
			 * @param  string $payload     The optional extra information for this deployment.
			 * @param  string $enviroment  The optional environment to deploy to. Default: "production"
			 * @param  string $description The optional human-readable description added to the deployment.
			 * @param  object $repository  The repository for this deployment.
			 * @return
			 */
		public function deployment_event( $deployment, $sha, $payload, $enviroment, $description, $repository ) {}
			/**
			 * Deployment_event_stats description
			 *
			 * @param  object $deployment_status The deployment status.
			 * @param  string $state             The new state. Can be pending, success, failure, or error.
			 * @param  string $tar_url           The optional link added to the status.
			 * @param  string $description       The optional human-readable description added to the status.
			 * @param  object $deployment        The deployment that this status is associated with.
			 * @param  object $repository        The repository for this deployment.
			 * @return
			 */
		public function deployment_event_stats( $deployment_status, $state, $tar_url, $description, $deployment, $repository ) {}
			/**
			 * Download_event description
			 *
			 * @param  object $donwload The download that was just created.
			 * @return
			 */
		public function download_event( $donwload ) {}
			/**
			 * Follow_event description
			 *
			 * @param  object $tar The user that was just followed.
			 * @return
			 */
		public function follow_event( $tar ) {}
			/**
			 * [fork_event description
			 *
			 * @param  [type] $forkee [description]
			 * @return [type]         [description]
			 */
		public function fork_event( $forkee ) {}
		public function fork_event_apply( $head, $before, $after ) {}
		public function _gist_event( $action, $gist ) {}
		public function _gollum_event( $pages, $page_name, $title, $action, $sha, $html_url ) {}
		public function install_event( $action, $installation ) {}
		public function install_event_repo( $action, $installation, $repository_selection, $repositories_ed, $repositories_removed ) {}
		// public function _event_comment( $action, $changes, $changes, $issue, $comment ) {}
		// public function issues_event( $action, $issue, $changes, $changes, $chnages, $assignee, $label ) {}
		// public function label_event( $action, $label, $changes, $changes, $changes ) {}
		public function marketplace_event_purchase( $action ) {}
		// public function member_event( $member, $action, $changes, $changes ) {}
		public function membership_event( $action, $scope, $member, $team ) {}
		// public function milestone_event( $action, $milestone, $changes, $changes, $changes, $changes ) {}
		public function org_event( $action, $invitation, $membership, $organization ) {}
		public function org__event( $action, $ed_user, $organization, $sender ) {}
		public function page_build_event( $build ) {}
		// public function project_card_event( $action, $changes, $changes, $after_id, $project_card ) {}
		// public function project_column_event( $action, $changes, $changes, $after_id, $project_column ) {}
		// public function project_event( $action, $changes, $changes, $changes, $project ) {}
		public function public_event(){}
		// public function _request_event( $action, $number, $changes, $changes, $changes, $_request ) {}
		public function _request_review_event( $action, $_request, $review, $changes ) {}
		// public function _request_review_comment_event( $action, $changes, $changes, $_request, $comment ) {}
		// public function push_event( $ref, $head, $before, $size, $distinct_size, $commits, $commits, $commits, $commits, $commits, $commits, $commits, $commits ) {}
		public function release_event( $action, $release ) {}
		public function repo_event( $action, $repository ) {}
		public function status_event( $sha, $state, $description, $tar_url, $branches ) {}
		// public function team_event( $action, $team, $changes, $changes, $changes, $changes, $changes, $changes, $changes, $repository ) {}
		public function team__event( $team, $repository ) {}
		public function watch_event( $action ) {}

				// Feeds
				 /**
				  * Get_feeds_list description
				  *
				  * @return
				  */
		public function get_feeds_list() {}

				// Notifications
			/**
			 * Get_notifications_list description
			 *
			 * @param  bool   $all If true, show notifications marked as read. Default: false
			 * @param  bool   $participating If true, only shows notifications in which the user is directly participating or mentioned. Default: false
			 * @param  string $since Only show notifications updated after the given time. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Default: Time.now
			 * @param  string $before Only show notifications updated before the given time. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ.
			 * @return
			 */
		public function get_notifications_list( $all, $participating, $since, $before ) {}
			/**
			 * [get_repo_notifications_list description]
			 *
			 * @param  sruct  $owner The owner
			 * @param  string $repo The repository
			 * @param  bool   $all If true, show notifications marked as read. Default: false
			 * @param  bool   $participating If true, only shows notifications in which the user is directly participating or mentioned. Default: false
			 * @param  string $since Only show notifications updated after the given time. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Default: Time.now
			 * @param  string $before Only show notifications updated before the given time. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ.
			 * @return
			 */
		public function get_repo_notifications_list( $owner, $repo, $all, $participating, $since, $before ) {}
			/**
			 * Put_read description
			 *
			 * @return
			 */
		public function put_read() {}
			/**
			 * [put_repo_notifications_read description]
			 *
			 * @param  string $owner owner
			 * @param  string $repo repostitory
			 * @param  string $last_reat_at Describes the last point that notifications were checked. Anything updated since this time will not be updated. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Default: Time.now
			 * @return
			 */
		public function put_repo_notifications_read( $owner, $repo, $last_reat_at ) {}
			/**
			 * Get_single_thread description
			 *
			 * @param  integer $id identification number
			 * @return
			 */
		public function get_single_thread( $id ) {}
			/**
			 * Patch_thread_read description
			 *
			 * @param  integer $id identification number
			 * @return
			 */
		public function patch_thread_read( $id ) {}
			/**
			 * Get_thread_subscription description
			 *
			 * @param  integer $id identification number
			 * @return
			 */
		public function get_thread_subscription( $id ) {}
			/**
			 * Put_thread_subscription description
			 *
			 * @param  integer $id identification number
			 * @return
			 */
		public function put_thread_subscription( $id ) {}
			/**
			 * Delete_thread_subscription description
			 *
			 * @param  integer $id identification number
			 * @return
			 */
		public function delete_thread_subscription( $id ) {}

				// Starring
		/**
		 * Get_stargazers_list description
		 *
		 * @param  string $owner owner
		 * @param  string $repo  repository
		 * @return
		 */
		public function get_stargazers_list( $owner, $repo ) {}
			/**
			 * Get_starred_rep_list description
			 *
			 * @param  string $username username
			 * @return
			 */
		public function get_starred_rep_list( $username ) {}
			/**
			 * Get_star_repo_authentication description
			 *
			 * @param  string $owner owner
			 * @param  string $repo  repository
			 * @return
			 */
		public function get_star_repo_authentication( $owner, $repo ) {}
			/**
			 * Put_repo_star description
			 *
			 * @param  string $owner owner
			 * @param  string $repo  repository
			 * @return
			 */
		public function put_repo_star( $owner, $repo ) {}
			/**
			 * Delete_repo_star description
			 *
			 * @param  string $owner owner
			 * @param  string $repo  repository
			 * @return
			 */
		public function delete_repo_star( $owner, $repo ) {}

				// Watching
		  /**
		   * Get_watchers_list description
		   *
		   * @param  string $owner owner
		   * @param  string $repo  repository
		   * @return
		   */
		public function get_watchers_list( $owner, $repo ) {}
			/**
			 * Get_repo_subscription description
			 *
			 * @param  string $owner owner
			 * @param  string $repo  repository
			 * @return
			 */
		public function get_repo_subscription( $owner, $repo ) {}
			/**
			 * Put_repo_subscription description
			 *
			 * @param  string $owner owner
			 * @param  string $repo  repository
			 * @return
			 */
		public function put_repo_subscription( $owner, $repo ) {}
			/**
			 * Delete_repo_subscription description
			 *
			 * @param  string $owner owner
			 * @param  string $repo  repository
			 * @return
			 */
		public function delete_repo_subscription( $owner, $repo ) {}
			/**
			 * Get_legacy_repo_watch_authenticated description
			 *
			 * @param  string $owner owner
			 * @param  string $repo  repository
			 * @return
			 */
		public function get_legacy_repo_watch_authenticated( $owner, $repo ) {}
			/**
			 * Put_repo_legacy_authenticated description
			 *
			 * @param  string $owner owner
			 * @param  string $repo  repository
			 * @return
			 */
		public function put_repo_legacy_authenticated( $owner, $repo ) {}
			/**
			 * Delete_repo_legacy description
			 *
			 * @param  string $owner owner
			 * @param  string $repo  repository
			 * @return
			 */
		public function delete_repo_legacy( $owner, $repo ) {}

				// GISTS
		  /**
		   * Get_user_gist_list description
		   *
		   * @param  string $username username
		   * @param  string $since A timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Only gists updated at or after this time are returned.
		   * @return
		   */
		public function get_user_gist_list( $username, $since ) {}
			/**
			 * Get_all_public_gist_list description
			 *
			 * @param  string $since A timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Only gists updated at or after this time are returned.
			 * @return
			 */
		public function get_all_public_gist_list( $since ) {}
			/**
			 * Get_starred_gist_list description
			 *
			 * @param  string $since A timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Only gists updated at or after this time are returned.
			 * @return
			 */
		public function get_starred_gist_list( $since ) {}
			/**
			 * Get_single_gist description
			 *
			 * @param integer $id identification number
			 * @return
			 */
		public function get_single_gist( $id ) {}
			/**
			 * Get_specific_revision_gist description
			 *
			 * @param  integer $id  identification number
			 * @param  string  $sha The commit SHA for which this deployment was created.
			 * @return
			 */
		public function get_specific_revision_gist( $id, $sha ) {}
			/**
			 * Post_gist description
			 *
			 * @param  object  $files       Required. Files that make up this gist.
			 * @param  string  $description A description of the gist.
			 * @param  boolean $public      Indicates whether the gist is public. Default: false
			 * @return
			 */
		public function post_gist( $files, $description, $public ) {}
			/**
			 * Patch_gist description
			 *
			 * @param  integer $id identification number
			 * @param  string  $description A description of the gist.
			 * @param  object  $files       Files that make up this gist.
			 * @param  string  $content     Updated file contents.
			 * @param  string  $filename    New name for this file.
			 * @return
			 */
		public function patch_gist( $id, $description, $files, $content, $filename ) {}
			/**
			 * Get_gist_commits_list description
			 *
			 * @param  integer $id identification number
			 * @return
			 */
		public function get_gist_commits_list( $id ) {}
			/**
			 * Put_star_gist description
			 *
			 * @param integer $id identification number
			 * @return
			 */
		public function put_star_gist( $id ) {}
			/**
			 * Delete_star_gist description
			 *
			 * @param integer $id identification number
			 * @return
			 */
		public function delete_star_gist( $id ) {}
		public function get_star_gist( $id ) {}
		public function post_fork_gist( $id ) {}
		public function get_fork_gist_list( $id ) {}
		public function delete_gist( $id ) {}

				// Comments
		public function get_gist_comment_list( $gist_id ) {}
		public function get_single_comment( $gist_id, $id ) {}
		public function post_comment( $gist_id ) {}
		public function patch_comment( $gist_id, $id ) {}
		public function delete_comment( $gist_id, $id ) {}

				// Blobs
		public function get_blob( $owner, $repo, $sha ) {}
		public function post_blob( $owner, $repo ) {}
		public function _blob_custom_media_types() {
			return array(
				'application/json',
				'application/vnd.github.VERSION.raw',
			);
		}

				// Commits
		public function get_commit( $owner, $repo, $sha ) {}
		public function post_commit( $owner, $repo ) {}
		public function get_commit_signature_verification( $owner, $repo, $sha ) {}

				// References
		public function get_reference( $owner, $repo, $ref = null ) {}
		public function get_all_references( $owner, $repo ) {}
		public function post_reference( $owner, $repo ) {}
		public function patch_reference( $owner, $repo, $ref ) {}
		public function delete_reference( $owner, $repo, $ref ) {}

				// Tags
		public function get_tag( $owner, $repo, $sha ) {}
		public function post_tag_object( $owner, $repo ) {}
		public function tag_signature_verification( $owner, $repo, $sha ) {} //not sure

				// Trees
		public function get_tree( $owner, $repo, $sha ) {}
		public function get_tree_recursively( $owner, $repo, $sha ) {}
		public function post_tree( $owner, $repo ) {}

				// Github Apps
		public function get_installations(){}
		public function get_single_installation( $installation_id ) {}
		public function get_user_installations_list(){}
		public function post_installation_token( $installation_id ) {}

				// Installations
		public function get_repo_list(){}
		public function get_user_accessible_repo_installation_list( $installation_id ) {}
		public function put_installation_repo( $installation_id, $repository_id ) {}
		public function delete_installation_repo( $installation_id, $repository_id ) {}

				// Marketplace
		public function get_marketplace_all_plan_list(){}
		public function get_specific_plan_github_account_list( $id ) {}
		public function get_associated_marketplace_github_account( $id ) {}
		public function get_user_marketplace_purchases(){}

				// Github App Permissions
		public function get_repo_metadata_permission_collaborators( $repository_id ) {}
		public function get_access_token_install_metadata_permission( $installation_id ) {}
		public function post_repo_id_metadat_permission( $repository_id ) {}
		public function get_repo_metadata_permission_collaborator( $repository_id, $collab ) {}
		public function get_repo_metadata_permission_comments( $repository_id ) {}
		public function get_repo_metadata_permission_commit_commnets( $repository_id ) {}
		public function get_repo_metadata_permission_comment( $repository_id, $id ) {}
		public function get_repo_metadata_permission_commit( $repository_id ) {}
		public function get_repo_metadata_permission_commits( $repository_id ) {}
		public function get_repo_metadata_permission_contributor( $repository_id ) {}
		public function get_repo_metadata_permission_fork( $repository_id ) {}
		public function get_repo_metadata_permission_subscriber( $repository_id ) {}
		public function get_repo_metadata_permission_stargazer( $repository_id ) {}
		public function get_repo_metadata_permission_watcher( $repository_id ) {}
		public function get_repo_metadata_permission_license( $repository_id ) {}
		public function get_repo_metadata_permission_contributor_stats( $repository_id ) {}
		public function get_repo_metadata_permission_commit_activity_stats( $repository_id ) {}
		public function get_repo_metadata_permission_code_frequency_stats( $repository_id ) {}
		public function get_repo_metadata_permission_punch_card_stats( $repository_id ) {}
		public function get_repo_metadata_permission_participation_stats( $repository_id ) {}
		public function get_repo_metadata_permission_tags( $repository_id ) {}
		public function get_repo_metadata_permission_language( $repository_id ) {}
		public function get_metadata_permission_rate_limit(){}
		public function get_metadata_permission_hooks(){}
		public function get_metadata_permission_hook( $name ) {}
		public function get_metadata_permission_search_users(){}
		public function get_metadata_permission_search_code(){}
		public function get_matadata_permission_repo(){}
		public function get_metadata_permission_licenses( $license ) {}
		public function get_metadata_permission_user_org( $user_id ) {}
		public function get_metadata_permission_org(){}
		public function get_metadata_permission_users(){}
		public function get_metadata_permission_user( $user_id ) {}
		public function get_metadata_permission_user_keys( $user_id ) {}
		public function get_metadata_permission_user_recieved_events( $user_id ) {}
		public function get_metadata_permission_user_events( $user_id ) {}
		public function get_metadata_permission_events(){}
		public function get_metadata_permission_org_events( $organization_id ) {}
		public function get_metadata_permission_user_public_received_events( $user_id ) {}
		public function get_metadata_permission_user_public_events( $user_id ) {}
		public function get_metadata_permission_repo_comments_reactions( $owner, $repo, $id ) {}
		public function get_content_permission_repo_branches( $repository_id ) {}
		public function get_content_permission_repo_compare( $repository_id ) {}
		public function get_content_permission_repo_branch( $repository_id ) {}
		public function patch_conten_permission_repo_branches( $repository_id ) {}
		public function put_content_permission_repo__merge( $repository_id, $id ) {}
		public function post_content_permission_repo_merges( $repository_id ) {}
		public function get_content_permission_repo_readme( $repository_id ) {}
		public function get_content_permission_repo_contents( $repository_id ) {}
		public function put_content_permission_repo_contents( $repository_id ) {}
		public function delete_content_permission_repo_contents( $repository_id ) {}
		public function get_content_permission_repo_tarball( $repository_id ) {}
		public function get_content_permission_repo_zipball( $repository_id ) {}
		public function get_content_permission_repo_release( $repository_id ) {}
		public function get_content_permission_repo_release_latest( $repository_id ) {}
		public function get_content_permission_repo_release_tag( $repository_id ) {}
		public function get_content_permission_repo_release_id( $repository_id, $id ) {}
		public function get_content_permission_repo_release_ass( $repository_id, $id ) {}
		public function get_content_permission_repo_release_ass_id( $repository_id, $id ) {}
		public function delete_content_permission_repo_release_id( $repository_id, $id ) {}
		public function patch_content_permission_repo_release_id( $repository_id, $id ) {}
		public function post_content_permission_repo_release_id( $repository_id, $id ) {}
		public function post_content_permisison_repo_release( $repository_id ) {}
		public function patch_content_permission_repo_release_assets( $repository_id, $id ) {}
		public function post_content_permission_repo_release_assets( $repository_id, $id ) {}
		public function delete_content_permission_repo_release_assets( $repository_id, $id ) {}
		public function post_content_permission_repo_commits_comments( $repository_id ) {}
		public function patch_content_permission_repo_comments( $repository_id, $id ) {}
		public function post_content_permission_repo_comments( $repository_id, $id ) {}
		public function get_single_file_permission_repo_content( $owner, $repo, $path ) {}
		public function put_single_file_permission_repo_content( $owner, $repo, $path ) {}
		public function delete_single_file_permission_repo_content( $owner, $repo, $path ) {}
		public function get_admin_permission_repo_teams( $repository_id ) {}
		public function put_admin_permission_repo_collaborator( $repository_id, $collab ) {}
		public function delete_admin_permission_repo_collaborator( $repository_id, $collab ) {}
		public function patch_admin_permission_repo( $repository_id ) {}
		public function delete_admin_permission_repo( $repository_id ) {}
		public function get_admin_permission_repo_branches_protection_required_status_checks( $repository_id, $branch ) {}
		public function get_admin_permission_repo_branches_protection_required_status_checks_contexts( $repository_id, $branch ) {}
		public function get_issue_permission_repo_issue_comment( $repository_id, $id ) {}
		public function post_issue_permission_repo_issue( $repository_id ) {}
		public function get_issue_permission_repo_milestone( $repository_id ) {}
		// public function post_issue_permission_repo_issue( $repository_id, $id ) {}
		public function patch_issue_permission_repo_issue( $repository_id, $id ) {}
		public function get_issue_permission_repo_issue( $repository_id ) {}
		public function get_issue_permission_repo_issues( $repository_id, $id ) {}
		public function get_issue_permission_search_issue(){}
		public function post_issue_permission_repo_issues( $repository_id, $id ) {}
		public function get_issue_permission_repo_issue_events( $repository_id, $id ) {}
		public function get_issue_permission_repo_issues_event( $repository_id ) {}
		public function get_issue_permission_repo_issues_events( $repository_id, $id ) {}
		public function get_issue_permission_repo_assignee( $repository_id ) {}
		public function get_issue_permission_repo_assignees( $repository_id, $assignee ) {}
		public function get_issue_permission_repo_label( $repository_id ) {}
		public function get_issue_permission_repo_labels( $repository_id ) {}
		public function get_issue_permission_repo_issue_labels( $repository_id, $id ) {}
		public function post_issue_permission_repo_label( $repository_id ) {}
		public function patch_issue_permission_repo_labels( $repository_id ) {}
		public function post_issue_permission_repo_labels( $repository_id ) {}
		public function delete_issue_permission_repo_labels( $repository_id ) {}
		public function post_issue_permission_repo_issues_labels( $repository_id, $id ) {}
		public function delete_issue_permission_repo_issues_labels( $repository_id, $id ) {}
		public function put_issue_permission_repo_issue_labels( $repository_id, $id ) {}
		public function delete_issue_permission_repo_issue_labels( $repository_id, $id ) {}
		public function get_issue_permission_repo_milestones( $repository_id ) {}
		public function get_issue_permission_repo_milestones_id( $repository_id, $id ) {}
		public function get_issue_permission_repo_milestones_labels( $repository_id, $id ) {}
		public function post_issue_permission_repo_milestone( $repository_id ) {}
		public function patch_issue_permission_repo_milestones( $repository_id, $id ) {}
		public function post_issue_permission_repo_milestones( $repository_id, $id ) {}
		public function delete_issue_permission_repo_milestones( $repository_id, $id ) {}
		public function get_issue_permission_issues_comments( $repository_id ) {}
		public function post_issue_permission_repo_issues_comments( $repository_id ) {}
		public function get_issue_permission_repo_issue_comments( $repository_id, $id ) {}
		public function patch_issue_permision_repo_issue_comments( $repository_id, $id ) {}
		public function post_issue_permission_repo_issue_comments( $repository_id, $id ) {}
		public function delete_issue_permission_repo_issue_comments( $repository_id, $id ) {}
		public function get_issue_permission_repo_issues_reactions( $owner, $repo, $number ) {}
		public function get_issue_permission_repo_issues_comments_reactions( $owner, $repo, $id ) {}
		public function get_request_permission_repo_( $repository_id ) {}
		public function get_request_permission_repo_s( $repository_id, $id ) {}
		public function get_request_permission_repo_s_files( $repository_id, $id ) {}
		public function get_request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function get_request_permission_repo_milestones( $repository_id ) {}
		public function post_request_permission_repo_issues_comment( $repository_id, $id ) {}
		public function get_request_permission_repo__merge( $repository_id, $id ) {}
		public function get_request_permission_repo__commit( $repository_id, $id ) {}
		public function get_request_permission_repo__comment( $repository_id ) {}
		public function post_request_permission_repo__comment( $repository_id ) {}
		public function get_request_permission_repo__comments( $repository_id, $id ) {}
		public function get_request_permission_repo_s_comments( $repository_id, $id ) {}
		public function post_request_permission_repo__comments( $repository_id, $id ) {}
		public function patch_request_permission_repo__comments( $repository_id, $id ) {}
		// public function post_request_permission_repo__comment( $repository_id, $id ) {}
		public function delete__request_permission_repo__comments( $repository_id, $id ) {}
		public function get_request_permission_repo__reviews( $repository_id, $number ) {}
		public function post_request_permission_repo__reviews( $repository_id, $number ) {}
		public function get_request_permission_repo__review( $repository_id, $number, $id ) {}
		public function get_request_permission_repo__review_comments( $repository_id, $number, $id ) {}
		public function post_request_permission_repo_( $repository_id ) {}
		public function patch_request_permission_repo_( $repository_id, $id ) {}
		public function get_request_permission_repo_issue_events( $repository_id, $id ) {}
		public function get_request_permission_repo_issues_event( $repository_id ) {}
		public function get_request_permission_repo_issues_events( $repository_id, $id ) {}
		public function get_request_permission_repo_assignee( $repository_id ) {}
		public function get_request_permission_repo_assignees( $repository_id, $assignee ) {}
		public function get_request_permission_repo_label( $repository_id ) {}
		public function get_request_permission_repo_labels( $repository_id ) {}
		public function get_request_permission_repo_issues_labels( $repository_id, $id ) {}
		public function post_request_permission_repo_label( $repository_id ) {}
		public function patch_request_permission_repo_labels( $repository_id ) {}
		public function post_request_permission_repo_labels( $repository_id ) {}
		public function delete__request_permission_repo_labels( $repository_id ) {}
		public function post_request_permission_repo_issues_lable( $repository_id, $id ) {}
		public function delete__request_permission_repo_issues_labels( $repository_id, $id ) {}
		public function put_request_permission_repo_issues_label( $repository_id, $id ) {}
		public function delete__request_permission_repo_issues_label( $repository_id, $id ) {}
		public function get_request_permission_repo_milestone( $repository_id ) {}
		public function get_reuqest_permission_repo_milesstones( $repository_id, $id ) {}
		public function get_reuqest_permission_repo_milesstones_labels( $repository_id, $id ) {}
		public function post_reuqest_permission_repo_milesstones( $repository_id ) {}
		public function patch_reuqest_permission_repo_milesstones( $repository_id, $id ) {}
		public function post_reuqest_permission_repo_milesstone( $repository_id, $id ) {}
		public function delete__reuqest_permission_repo_milesstones( $repository_id, $id ) {}
		public function get_request_permission_repo_issue_comment( $repository_id ) {}
		// public function get_request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function patch_request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function post_request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function delete__request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function gey_request_permission_repo__comment_reactions( $owner, $repo, $id ) {}
		public function post_status_permission_repo_status( $repository_id, $sha ) {}
		public function get_status_permission_repo_statuses( $repository_id ) {}
		public function get_status_permission_repo_status( $repository_id ) {}
		public function get_deployment_permission_repo_deployment( $repository_id, $id ) {}
		public function post_deployment_permission_repo_deployments_statuses( $repository_id, $deployment_id ) {}
		public function post_deployment_permission_repo_deployments( $repository_id ) {}
		public function get_deployment_permission_repo_deployments_statusest( $repository_id, $deployment_id ) {}
		public function get_deployment_permission_repo_deployments( $repository_id ) {}
		public function get_pages_permission_repo_pages( $repository_id ) {}
		public function get_pages_permission_repo_pages_build( $repository_id ) {}
		public function get_pages_permission_repo_pages_builds_latest( $repository_id ) {}
		public function get_pages_permission_repo_pages_builds( $repository_id, $id ) {}
		public function post_pages_permission_repo_pages_builds( $repository_id ) {}
		public function get_org_members_permission_org_teams( $organization_id ) {}
		public function get_org_members_permission_teams( $id ) {}
		public function get_org_members_permission_teams_members( $id ) {}
		public function get_org_members_permission_teams_memberships( $id, $user ) {}
		public function get_org_members_permissions_teams_repos( $id ) {}
		public function get_org_members_permission_org_members( $organization_id ) {}
		public function put_org_members_permission_org_memberships( $organization_id, $user ) {}
		public function get_org_members_permission_org_memberships( $organization_id, $user ) {}
		public function get_repo_projects_permission_repo_projects( $owner, $repo ) {}
		public function get_repo_prjects_permission_projects( $id ) {}
		public function post_repo_projects_permission_repo_projects( $owner, $repo ) {}
		public function patch_repo_projects_permission_projects( $id ) {}
		public function delete_repo_projects_permission_projects( $id ) {}
		public function get_org_projects_permission_orgs_projects( $org ) {}
		public function get_org_projects_permission_projects( $id ) {}
		public function post_org_projects_permission_orgs_projects( $org ) {}
		public function patch_org_projects_permission_projects( $id ) {}
		public function delete_org_projects_permission_projects( $id ) {}
		public function get_org_members_permission_orgs_member( $org ) {}
		public function get_org_members_permission_orgs_members( $org, $username ) {}
		public function delete_org_members_permission_orgs_members( $org, $username ) {}
		public function put_org_members_permission_orgs_memberships( $org, $username ) {}
		public function get_org_members_permission_orgs_memberships( $org, $username ) {}
		public function delete_org_members_permission_orgs_memberships( $org, $username ) {}

			// Issues
		public function get_issues_list( $org ) {}
		public function get_repo_issues_list( $owner, $repo ) {}
		public function get_single_issue( $owner, $repo, $number ) {}
		public function post_issue( $owner, $repo ) {}
		public function patch_issue( $owner, $repo, $number ) {}
		public function put_lock_issue_lock( $owner, $repo, $number ) {}
		public function delete_lock_issue_lock( $owner, $repo, $number ) {}
		public function _issues_custom_media_types() {
			return array(
				'application/vnd.github.VERSION.raw+json',
				'application/vnd.github.VERSION.text+json',
				'application/vnd.github.VERSION.html+json',
				'application/vnd.github.VERSION.full+json',
			);
		}
			// Assignees
		public function get_assignees_list( $owner, $repo ) {}
		public function get_assignee( $owner, $repo, $assignee ) {}
		public function post_issue_assignee( $owner, $repo, $number ) {}
		public function delete_issue_assignee( $owner, $repo, $number ) {}

			// Issue Comments
		public function get_issue_comment_list( $owner, $repo, $number ) {}
		public function get_repo_comment_list( $owner, $repo ) {}
		public function get_issue_single_comment( $owner, $repo, $id ) {}
		public function get_issue_comment( $owner, $repo, $number ) {}
		public function post_issue_comment( $owner, $repo, $id ) {}
		public function patch_issue_comment( $owner, $repo, $id ) {}
		public function delete_issue_comment( $owner, $repo, $id ) {}

			// Issue Events
		public function get_issue_event_list( $owner, $repo, $issue_number ) {}
		public function get_issue_repo_event_list( $owner, $repo ) {}
		public function get_issue_single_event( $owner, $repo, $id ) {}

			// Issue Labels
		public function get_all_issue_repo_labels( $owner, $repo ) {}
		public function get_single_issue_label( $owner, $repo, $name ) {}
		// public function post_issue_label( $owner, $owner ) {}
		public function patch_issue_label( $owner, $repo, $name ) {}
		public function delete_issue_label( $owner, $repo, $name ) {}
		public function get_issue_label_issue_list( $owner, $repo, $number ) {}
		public function post_issue_label_issue( $owner, $repo, $number ) {}
		public function delete_issue_label_issue( $owner, $repo, $number, $name ) {}
		public function put_all_issue_labels_issue( $ower, $repo, $number ) {}
		public function delete_all_issue_labels_issue( $owner, $repo, $number ) {}
		public function get_all_issue_labels_milestone( $owner, $repo, $number ) {}

			// Milestones
		public function get_milestone_repo_list( $owner, $repo ) {}
		public function get_single_milestone( $owner, $repo, $number ) {}
		public function post_milestone( $owner, $repo ) {}
		public function patch_milestone( $owner, $repo, $number ) {}
		public function delete_milestone( $owner, $repo, $number ) {}

			// Migrations
		public function post_start_migration( $orgn ) {}
		public function get_migrations_list( $org ) {}
		public function get_migration_status( $org, $id ) {}
		public function get_migration_archive( $org, $id ) {}
		public function delete_migration_archive( $org, $id ) {}
		public function delete_lock_migration_repo( $org, $id, $repo_name ) {}

			// Source Imports
		public function put_import( $owner, $repo ) {}
		public function get_import_progress( $owner, $repo ) {}
		public function patch_existing_import( $owner, $repo ) {}
		public function get_commit_authors( $owner, $repo ) {}
		public function patch_map_commit_author( $owner, $repo, $author_id ) {}
		public function patch_git_lfs_preference( $owner, $name ) {}
		public function get_large_files( $owner, $name ) {}
		public function delete_import( $owner, $repo ) {}

			// Codes of Conduct
		public function get_all_code_conduct_list(){}
		public function get_individual_code_conduct( $id ) {}
		public function get_repo_code_conduct( $owner, $repo ) {}
		public function get_repo_contents_code_conduct( $owner, $repo ) {}

			// Emojis
		public function get_emojis(){}

			// Gitignore
		public function get_available_templates(){}
		public function get_single_template(){}

			// Licenses
		public function get_all_licenses_list(){}
		public function get_individual_license( $license ) {}
		public function get_repo_license( $owner, $repo ) {}
		public function get_repo_contents_license( $owner, $repo ) {}

			// Markdown
		public function post_markdown_document(){}
		public function post_markdown_document_raw(){}

			// Meta
		public function get_meta(){}

			// Rate limit
		public function get_current_rate_limit(){}

			// Organizations
		public function get_org_list(){}
		public function get_org_all_list(){}
		public function get_user_org_list( $username ) {}
		public function get_org( $org ) {}
		public function patch_org( $org ) {}

			// Members
		public function get_members_list( $org ) {}
		public function get_membership( $org, $username ) {}
		public function put_member(){}
		public function delete_member( $org, $username ) {}
		public function get_public_members_list( $org ) {}
		public function get_user_public_membership( $org, $username ) {}
		public function put_user_membership_member( $org, $username ) {}
		public function delete_user_membership( $org, $username ) {}
		public function get_org_membership_member( $org, $username ) {}
		public function put_org_membership_member( $org, $username ) {}
		public function delete_org_membership_member( $org, $username ) {}
		public function get_pending_org_invitation_member( $org ) {}
		public function get_user_org_membership_member_list(){}
		public function get_user_org_membership_member( $org ) {}
		public function patch_user_org_membership_member( $org ) {}

			// Outside Collaborators
		public function get_outside_collaborator_list( $org ) {}
		public function delete_outside_collaborator( $org, $username ) {}
		public function put_member_outside_collaborator( $org, $username ) {}

			// Teams
		public function get_team_list( $org ) {}
		public function get_team( $id ) {}
		public function post_team( $org ) {}
		public function patch_team( $id ) {}
		public function delete_team( $id ) {}
		public function get_list_team_member( $id ) {}
		public function get_team_member( $id, $username ) {}
		public function put_team_member( $id, $username ) {}
		public function delete_team_member( $id, $username ) {}
		public function get_team_membership( $id, $username ) {}
		public function put_team_membership( $id, $username ) {}
		public function delete_team_membership( $id, $username ) {}
		public function get_team_repo_list( $id ) {}
		public function get_pending_team_invitations_list( $id ) {}
		public function get_team_manages_repo( $id, $owner, $repo ) {}
		public function put_team_repo( $id, $org, $repo ) {}
		public function delete_team_repo( $id, $owner, $repo ) {}
		public function get_user_team_list(){}

			// Webhooks
		public function get_hook_list( $org ) {}
		public function get_single_hook( $org, $id ) {}
		public function post_hook( $org ) {}
		public function patch_hook( $org, $id ) {}
		public function post_ping_hook( $org, $id ) {}
		public function delete_hook( $org, $id ) {}

			// Blocking Users(Organizations)
		public function get_block_user_list( $org ) {}
		public function get_block_user_org( $org, $username ) {}
		public function put_block_user( $org, $username ) {}
		public function delete_block_user( $org, $username ) {}

			// Projects
		public function get_repo_project_list( $owner, $repo ) {}
		public function get_org_project_list( $org ) {}
		public function get_project( $id ) {}
		public function post_repo_project( $owner, $repo ) {}
		public function post_org_project( $org ) {}
		public function patch_project( $id ) {}
		public function delete_project( $id ) {}

			// Project Cards
		public function get_project_card_list( $column_id ) {}
		public function get_project_card( $id ) {}
		public function post_project_card( $column_id ) {}
		public function patch_project_card( $id ) {}
		public function delete_project_card( $id ) {}
		public function post_move_project_card( $id ) {}

			// Project Column
		public function get_project_columns_list( $project_id ) {}
		public function get_project_column( $id ) {}
		public function post_project_column( $project_id ) {}
		public function patch_project_column( $id ) {}
		public function delete_project_column( $id ) {}
		public function post_move_project_column( $id ) {}

				// Pull Requests
		public function get_pull_requests( $owner, $repo ) {}
		public function get_single_pull_request( $owner, $repo, $number ) {}
		public function post_pull_request( $owner, $repo ) {}
		public function patch_pull_request( $owner, $repo, $number ) {}
		public function get_commits_on_pull_request( $owner, $repo, $number ) {}
		public function get_pull_requests_files( $owner, $repo, $number ) {}
		public function get_pull_request_if_merged( $owner, $repo, $number ) {}
		public function put_merge_pull_request( $owner, $repo, $number ) {}


			// Reviews
		public function get_request_review_list( $owner, $repo, $number ) {}
		public function get_single_review( $owner, $repo, $number, $id ) {}
		public function delete_pending_review( $owner, $repo, $number, $id ) {}
		public function get_single_review_comments( $owner, $repo, $number, $id ) {}
		public function post_request_review( $owner, $repo, $number ) {}
		// public function post_request_review( $owner, $repo, $number, $id ) {}
		public function delete_request_review( $owner, $repo, $number, $id ) {}

			// Review Comments
		public function get_request_comments_list( $owner, $repo, $number ) {}
		public function get_repo_comments_list( $owner, $repo ) {}
		// public function get_single_comment( $owner, $repo, $id ) {}
		// public function post_comment( $owner, $repo, $number ) {}
		// public function patch_comment( $owner, $repo, $id ) {}
		// public function delete_comment( $owner, $repo, $id ) {}
			// Review Requests
		public function get_review_requests_list( $owner, $repo, $number ) {}
		public function post_review_request( $owner, $repo, $number ) {}
		public function delete_review_request( $owner, $repo, $number ) {}

			// Reactions
		public function get_commit_comment_reaction_list( $owner, $repo, $id ) {}
		public function post_commit_comment_reaction( $owner, $repo, $id ) {}
		public function get_issue_reaction_list( $owner, $repo, $number ) {}
		public function post_issue_reaction( $owner, $repo, $number ) {}
		public function get_issue_comment_reactions_list( $owner, $repo, $id ) {}
		public function get_issue_comment_reaction( $owner, $repo, $id ) {}
		public function post_request_review_comment_reaction_list( $owner, $repo, $id ) {}
		public function get_request_review_comment_reaction( $owner, $repo, $id ) {}
		public function delete_reaction( $id ) {}

		// Repositories
		/**
		 * Get_your_repo_list
		 *
		 * @return array/list
		 */
		public function get_your_repo_list() {
			$args = array(
				'visibility' => 'all',
				'affiliation' => 'owner,collaborator,organization_member',
				'type' => 'all',
				'sort' => 'full_name',
				'direction' => 'asc',
			);
			return $this->build_request( $args )->fetch( 'user/repos' );
		}
		/**
		 * get_user_repo_list
		 *
		 * @param  string $username
		 * @param  string $type
		 * @param  string $sort
		 * @param  string $direction
		 * @return array/string
		 */
		public function get_user_repo_list( $username, $type = 'owner', $sort = 'full_name', $direction = 'asc' ) {
			return $this->build_request()->fetch( 'users/' . $username . '/repos' );
		}
		/**
		 * Get_org_repo_list
		 *
		 * @param  string $org
		 * @param  string $type
		 * @return array/string
		 */
		public function get_org_repo_list( $org, $type = 'all' ) {
			return $this->build_request()->fetch( 'orgs/' . $org . '/repos' );
		}
		/**
		 * Get_all_public_repo_list
		 *
		 * @param  string $since
		 * @return array/string
		 */
		public function get_all_public_repo_list( $since = '' ) {
			if ( $since == '' ) {
				return $this->build_request()->fetch( 'repositories' );
			} else {
				return $this->build_request()->fetch( 'orgs/' . $org . '/repos' );
			}
		}
		/**
		 * Create_repo
		 *
		 * @param  string $org
		 * @return Object
		 */
		public function create_repo( $org ) {
				$args = array(
					'method' => 'POST',
				);
				return $this->build_request( $args )->fetch( 'orgs/' . $org . '/repos' );
		}
			/**
			 * Get_repo
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/list
			 */
		public function get_repo( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo );
		}
		/**
		 * Edit_repo
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return
		 */
		public function edit_repo( $owner, $repo ) {
			$args = array(
				'method' => 'PATCH',
			);
			return build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo );
		}
			/**
			 * Get_all_repo_topics_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_all_repo_topics_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/topics' );
		}
		public function put_all_repo_topics( $owner, $repo ) {}
			/**
			 * Get_repo_contributor_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_contributor_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/contributors' );
		}
		/**
		 * Get_language_repo_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_language_repo_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/languages' );
		}
		/**
		 * Get_repo_team_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_team_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/teams' );
		}
		/**
		 * Get_repo_tag_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_tag_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/tags' );
		}
		/**
		 * Delete_repo
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return Object
		 */
		public function delete_repo( $owner, $repo ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo );
		}

			// Branches
			/**
			 * Get_branch_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_branch_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches' );
		}
		/**
		 * Get_branch
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return array/string
		 */
		public function get_branch( $owner, $repo, $branch ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch );
		}
		/**
		 * Get_branch_protection
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return array/string
		 */
		public function get_branch_protection( $owner, $repo, $branch ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection' );
		}
		/**
		 * Update_branch_protection
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return Object
		 */
		public function update_branch_protection( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'PUT',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection' );
		}
		/**
		 * Delete_branch_protection
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return
		 */
		public function delete_branch_protection( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection' );
		}
		/**
		 * Get_protected_branch_req_status
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return array/string
		 */
		public function get_protected_branch_req_status( $owner, $repo, $branch ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks' );
		}
		/**
		 * Update_protected_branch_req_status
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return
		 */
		public function update_protected_branch_req_status( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'PATCH',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks' );
		}
		/**
		 * Delete_protected_branch_req_status
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return
		 */
		public function delete_protected_branch_req_status( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks' );
		}
		/**
		 * Get_protected_branch_req_status_context_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return array/string
		 */
		public function get_protected_branch_req_status_context_list( $owner, $repo, $branch ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks/contexts' );
		}
		/**
		 * Replace_protected_branch_req_status_context
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return Object
		 */
		public function replace_protected_branch_req_status_context( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'PUT',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks/contexts' );
		}
		/**
		 * Add_protected_branch_req_status_context
		 *
		 * @param string $owner
		 * @param string $repo
		 * @param string $branch
		 * @return
		 */
		public function add_protected_branch_req_status_context( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks/contexts' );
		}
		/**
		 * Delete_protected_branch_req_status_context
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return
		 */
		public function delete_protected_branch_req_status_context( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks/contexts' );
		}
		/**
		 * Get_protected_branch__req_review_enforce
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return array/string
		 */
		public function get_protected_branch__req_review_enforce( $owner, $repo, $branch ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_pull_request_reviews' );
		}
		/**
		 * Update_protected_branch__req_review_enforce
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return
		 */
		public function update_protected_branch__req_review_enforce( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'PATCH',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_pull_request_reviews/context' );
		}
		/**
		 * Delete_protected_branch__req_review_enforce
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return Object
		 */
		public function delete_protected_branch__req_review_enforce( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_pull_request_reviews' );
		}
		/**
		 * Get_protected_branch_admin_enforce
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return array/string
		 */
		public function get_protected_branch_admin_enforce( $owner, $repo, $branch ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/enforce_admins' );
		}
		/**
		 * Add_protected_branch_admin_enforce
		 *
		 * @param string $owner
		 * @param string $repo
		 * @param string $branch
		 * @return
		 */
		public function add_protected_branch_admin_enforce( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/enforce_admins' );
		}
		/**
		 * Delete_protected_branch_admin_enforce
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return Object
		 */
		public function delete_protected_branch_admin_enforce( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/enforce_admins' );
		}
		/**
		 * Get_protected_branch_restrictions
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return array/string
		 */
		public function get_protected_branch_restrictions( $owner, $repo, $branch ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions' );
		}
		/**
		 * Delete_protected_branch_restrictions
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return Object
		 */
		public function delete_protected_branch_restrictions( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions' );
		}
		/**
		 * Get_protected_branch_team_restrictions_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return array/string
		 */
		public function get_protected_branch_team_restrictions_list( $owner, $repo, $branch ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/teams' );
		}
		/**
		 * replace_protected_branch_team_restrictions
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return
		 */
		public function replace_protected_branch_team_restrictions( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'PUT',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/teams' );
		}
		/**
		 * Add_protected_branch_team_restrictions
		 *
		 * @param string $owner
		 * @param string $repo
		 * @param string $branch
		 * @return
		 */
		public function add_protected_branch_team_restrictions( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/teams' );
		}
		/**
		 * Delete_protected_branch_team_restrictions
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return Object
		 */
		public function delete_protected_branch_team_restrictions( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/teams' );
		}
		/**
		 * Get_protected_branch_user_restrictions_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return array/string
		 */
		public function get_protected_branch_user_restrictions_list( $owner, $repo, $branch ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/users' );
		}
		/**
		 * Replace_protected_branch_user_restrictions
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return
		 */
		public function replace_protected_branch_user_restrictions( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'PUT',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/users' );
		}
		/**
		 * Add_protected_branch_user_restrictions
		 *
		 * @param string $owner
		 * @param string $repo
		 * @param string $branch
		 * @return
		 */
		public function add_protected_branch_user_restrictions( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/users' );
		}
		/**
		 * Delete_protected_branch_user_restrictions
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $branch
		 * @return Object
		 */
		public function delete_protected_branch_user_restrictions( $owner, $repo, $branch ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/users' );
		}

			// Repo Collaborators
		/**
		 * Get_repo_collaborator_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_collaborator_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/collaborators' );
		}
		/**
		 * Get_repo_collaborator_user
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $username
		 * @return array/string
		 */
		public function get_repo_collaborator_user( $owner, $repo, $username ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/collaborators/' . $username );
		}
		/**
		 * Get_repo_collaborator_user_permission_level
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $username
		 * @return array/string
		 */
		public function get_repo_collaborator_user_permission_level( $owner, $repo, $username ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/collaborators/' . $username . '/permission' );
		}
		/**
		 * Add_repo_collaborator_user
		 *
		 * @param string $owner
		 * @param string $repo
		 * @param string $username
		 * @return
		 */
		public function add_repo_collaborator_user( $owner, $repo, $username ) {
			$args = array(
				'method' => 'PUT',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/collaborators/' . $username );
		}
		/**
		 * Delete_repo_collaborator_user
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $username
		 * @return
		 */
		public function delete_repo_collaborator_user( $owner, $repo, $username ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/collaborators/' . $username );
		}

			// Repo Comments
			/**
			 * Get_repo_comment_commit_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_comment_commit_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/comments' );
		}
		/**
		 * Get_repo_single_commit_comment_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $ref
		 * @return array/string
		 */
		public function get_repo_single_commit_comment_list( $owner, $repo, $ref ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/commits/' . $ref . '/comments' );
		}
		/**
		 * Create_repo_comment_commit
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $sha
		 * @return
		 */
		public function create_repo_comment_commit( $owner, $repo, $sha ) {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/commits/' . $sha . '/comments' );
		}
		/**
		 * Get_repo_single_commit_comment
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  int    $id
		 * @return array/string
		 */
		public function get_repo_single_commit_comment( $owner, $repo, $id ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/comments/' . $id );
		}
		/**
		 * Update_repo_comment_commit
		 *
		 * @param string $owner
		 * @param string $repo
		 * @param int    $id
		 * @return
		 */
		public function update_repo_comment_commit( $owner, $repo, $id ) {
			$args = array(
				'method' => 'PATCH',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/comments/' . $id );
		}
		/**
		 * Delete_repo_comment_commit
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  int    $id
		 * @return
		 */
		public function delete_repo_comment_commit( $owner, $repo, $id ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/comments/' . $id );
		}

			// Repo commit
			/**
			 * Get_repo_commit_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_commit_list( $owner, $repo ) {
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/commits' );
		}
			/**
			 * Get_repo_single_commit
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @param  string $sha
			 * @return array/string
			 */
		public function get_repo_single_commit( $owner, $repo, $sha ) {
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/commits/' . $sha );
		}
			/**
			 * Get_repo_sha_1_commit_reference
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @param  string $ref
			 * @return array/string
			 */
		public function get_repo_sha_1_commit_reference( $owner, $repo, $ref ) {
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/commits/' . $ref );
		}
			/**
			 * Get_two_commits
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @param  string $base
			 * @param  string $head
			 * @return array/string
			 */
		public function get_two_commits( $owner, $repo, $base, $head ) {
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/commits/' . $base . '...' . $head );
		}
			/**
			 * Get_repo_verification_signature_commit
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @param  string $sha
			 * @return array/string
			 */
		public function get_repo_verification_signature_commit( $owner, $repo, $sha ) {
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/commits/' . $sha );
		}

			// Repo Community Profile
			/**
			 * Get_repo_metrics_profile_commun
			 *
			 * @param  string $owner
			 * @param  string $name
			 * @return array/string
			 */
		public function get_repo_metrics_profile_commun( $owner, $name ) {
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $name . '/community/profile' );
		}

			// Repo Contents
			/**
			 * Get_repo_readme
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_readme( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/readme' );
		}
			/**
			 * Get_repo_contents
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @param  string $path
			 * @return array/string
			 */
		public function get_repo_contents( $owner, $repo, $path ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/contents/' . $path );
		}
			/**
			 * Create_repo_file
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @param  string $path
			 * @return
			 */
		public function create_repo_file( $owner, $repo, $path ) {
			$args = array(
				'method' => 'PUT',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/contents/' . $path );

		}
		/**
		 * Update_repo_file
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $path
		 * @return
		 */
		public function update_repo_file( $owner, $repo, $path ) {
			$args = array(
				'method' => 'PUT',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/contents/' . $path );
		}
		/**
		 * Delete_repo_file
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $path
		 * @return
		 */
		public function delete_repo_file( $owner, $repo, $path ) {
			$args = array(
				'method' => 'DELETE',
				'path' => '',
				'message' => '',
				'sha' => '',
				'branch' => '',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/contents/' . $path );
		}
		/**
		 * Get_repo_archive_link
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $archive_format
		 * @param  string $ref
		 * @return array/string
		 */
		public function get_repo_archive_link( $owner, $repo, $archive_format, $ref ) {
			$args = array(
				'archive_format' => 'tarall',
				'ref' => 'master',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . $archive_format . '/' . $ref );
		}

			// Repo Deploy Keys
			/**
			 * Get_repo_deploy_key_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_deploy_key_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/keys' );
		}
		/**
		 * Get_repo_deploy_key
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return array/string
		 */
		public function get_repo_deploy_key( $owner, $repo, $id ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/keys/' . $id );
		}
		/**
		 * Add_repo_deploy_key
		 *
		 * @param string $owner
		 * @param string $repo
		 * @return
		 */
		public function add_repo_deploy_key( $owner, $repo ) {
			$args = array(
				'method' => 'POST',
				'title' => '',
				'key' => '',
				'read_only' => '', // boolean
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/keys' );
		}
		/**
		 * Edit_repo_deploy_key
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function edit_repo_deploy_key( $owner, $repo, $id ) {
			$args = array(
				'metod' => '',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/keys' );
		}
		/**
		 * Delete_repo_deploy_key
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function delete_repo_deploy_key( $owner, $repo, $id ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/keys/' . $id );
		}

			// Repo Deployments
			/**
			 * Get_repo_deploy_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_deploy_list( $owner, $repo ) {
			$args = array(
				'sha' => '',
				'ref' => '',
				'task' => '',
				'enviroment' => '',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/deployments' );
		}
		/**
		 * Get_single_repo_deploy
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $deployment_id
		 * @return array/string
		 */
		public function get_single_repo_deploy( $owner, $repo, $deployment_id ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/deployments/' . $deployment_id );
		}
		/**
		 * Create_repo_deploy
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return
		 */
		public function create_repo_deploy( $owner, $repo ) {
			$args = array(
				'method' => 'POST',
				'ref' => '',
				'task' => 'deploy',
				'auto_merge' => 'true',
				'required_contexts' => '',
				'paylod' => '',
				'environment' => 'production',
				'description' => '',
				'transient_environment' => 'false',
				'production_environment' => 'true',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/deployments' );
		}
		/**
		 * Get_repo_deploy_status_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return array/string
		 */
		public function get_repo_deploy_status_list( $owner, $repo, $id ) {
			$args = array(
				'id' => '', // integer
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/deployments/' . $id . '/statuses' );
		}
		/**
		 * Get_repo_single_deploy_status
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @param  string $status_id
		 * @return array/string
		 */
		public function get_repo_single_deploy_status( $owner, $repo, $id, $status_id ) {
			$args = array(
				'id' => '', // integer
				'status_id' => '', // integar
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/deployments/' . $id . '/statuses/' . $status_id );
		}
		/**
		 * Create_repo_deploy_status
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function create_repo_deploy_status( $owner, $repo, $id ) {
			$args = array(
				'method' => 'POST',
				'state' => '',
				'target_url' => '',
				'log_url' => '',
				'description' => '',
				'environment_url' => '',
				'auto_inactive' => 'true',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/deployments/' . $id . '/statuses' );
		}

			// Repo Downloads
		/**
		 * Get_repo_download_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_download_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/downloads' );
		}
		/**
		 * Get_single_repo_download
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return array/string
		 */
		public function get_single_repo_download( $owner, $repo, $id ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/downloads/' . $id );
		}
		/**
		 * Delete_repo_download
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function delete_repo_download( $owner, $repo, $id ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/downloads/' . $id );
		}

			// Repo Forks
			/**
			 * Get_repo_fork_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_fork_list( $owner, $repo ) {
			$args = array(
				'sort' => 'newest',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/forks' );
		}
		/**
		 * Create_repo_fork
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return
		 */
		public function create_repo_fork( $owner, $repo ) {
			$args = array(
				'method' => 'POST',
				'organization' => '',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/forks' );
		}

			// Repo Invitations
			/**
			 * Get_repo_invite_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_invite_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/invitations' );
		}
		/**
		 * Delete_repo_invite
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $invitation_id
		 * @return
		 */
		public function delete_repo_invite( $owner, $repo, $invitation_id ) {
			$args = array(
				'method' => 'DELETE',
			);
				return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/invitations/' . $invitation_id );
		}
		/**
		 * Update_repo_invite
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $invitation_id
		 * @return
		 */
		public function update_repo_invite( $owner, $repo, $invitation_id ) {
			$args = array(
				'method' => 'PATCH',
				'permissions' => '',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/invitations/' . $invitation_id );
		}
		/**
		 * Get_repo_user_invite_list
		 *
		 * @return array/string
		 */
		public function get_repo_user_invite_list() {
			return $this->build_request()->fetch( '/user/repository_invitations' );
		}
		/**
		 * Accept_repo_invite
		 *
		 * @param  int $invitation_id
		 * @return
		 */
		public function accept_repo_invite( $invitation_id ) {
			$args = array(
				'method' => 'PATCH',
			);
			return $this->build_request( $args )->fetch( '/user/repository_invitations/' . $invitation_id );
		}
		/**
		 * Delete_repo_invite
		 *
		 * @param  int $invitation_id
		 * @return
		 */
		public function decline_repo_invite( $invitation_id ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( '/user/repository_invitations/' . $invitation_id );
		}

			// Repo Merging
		/**
		 * Perform_repo_merge
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return
		 */
		public function perform_repo_merge( $owner, $repo ) {
			$args = array(
				'method' => 'POST',
				'base' => '',
				'head' => '',
				'commit_message' => '',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/merges' );
		}

			// Repo Pages
			/**
			 * Get_repo_page_site_info
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_page_site_info( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/pages' );
		}
		/**
		 * Request_repo_page_build
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return
		 */
		public function request_repo_page_build( $owner, $repo ) {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/pages/builds' );
		}
		/**
		 * Get_repo_page_build_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_page_build_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/pages/builds' );
		}
		/**
		 * Get_repo_latest_page_build_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_latest_page_build_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/pages/builds/latest' );
		}
		/**
		 * Get_repo_specific_page_build_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return array/string
		 */
		public function get_repo_specific_page_build_list( $owner, $repo, $id ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/pages/builds/' . $id );
		}

			// Repo releases
			/**
			 * Get_repo_release_list
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_release_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/releases' );
		}
		/**
		 * Get_repo_single_release
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return array/string
		 */
		public function get_repo_single_release( $owner, $repo, $id ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/releases/' . $id );
		}
		/**
		 * Get_repo_latest_release
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_latest_release( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/releases/latest' );
		}
		/**
		 * Get_repo_release_tag_name
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $tag
		 * @return array/string
		 */
		public function get_repo_release_tag_name( $owner, $repo, $tag ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/releases/tags/' . $tag );
		}
		/**
		 * Create_repo_release
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return
		 */
		public function create_repo_release( $owner, $repo ) {
			$args = array(
				'method' => 'POST',
				'tag_name' => '',
				'target_commitish' => 'master',
				'name' => '',
				'body' => '',
				'draft' => 'false',
				'prerelease' => 'false',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/releases' );
		}
		/**
		 * Edit_repo_release
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function edit_repo_release( $owner, $repo, $id ) {
			$args = array(
				'method' => 'PATCH',
				'tag_name' => '',
				'target_commitish' => 'master',
				'name' => '',
				'body' => '',
				'draft' => 'false',
				'prerelease' => 'false',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/releases/' . $id );
		}
		/**
		 * Delete_repo_release
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function delete_repo_release( $owner, $repo, $id ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/releases/' . $id );
		}
		/**
		 * Get_repo_release_as_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return array/string
		 */
		public function get_repo_release_asset_list( $owner, $repo, $id ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/releases/' . $id . '/assets' );
		}
		/**
		 * Update_repo_release_as
		 *
		 * @param  string $owner
		 * @param  string $id
		 * @return
		 */
		public function update_repo_release_asset( $owner, $id ) {
			$args = array(
				'method' => 'POST',
				'Content-Type' => '',
				'name' => '',
				'label' => '',
			);
			// return $this->build_request($args)->fetch( 'repos/' . $owner . '/' . $repo . '/releases' );
		}
		/**
		 * Get_repo_release_single_asset
		 *
		 * @param string $owern
		 * @param string $repo
		 * @param string $id
		 * @return array/string
		 */
		public function get_repo_release_single_asset( $owern, $repo, $id ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/releases/assets/' . $id );
		}
		/**
		 * Edit_repo_release_asset
		 *
		 * @param string $owner
		 * @param string $repo
		 * @param string $id
		 * @return
		 */
		public function edit_repo_release_asset( $owner, $repo, $id ) {
			$args = array(
				'method' => 'PATCH',
				'name' => '',
				'label' => '',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/releases/assets/' . $id );
		}
		/**
		 * Delete_repo_release_asset
		 *
		 * @param string $owner
		 * @param string $repo
		 * @param string $id
		 * @return
		 */
		public function delete_repo_release_asset( $owner, $repo, $id ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/releases/assets/' . $id );
		}

			// Repo Statistics
			/**
			 * Get_repo_delete_commit_count_contributors
			 *
			 * @param  string $owner
			 * @param  string $repo
			 * @return array/string
			 */
		public function get_repo_delete_commit_count_contributors( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/stats/contributors' );
		}
		/**
		 * Get_repo_commit_activity_data_last_year
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_commit_activity_data_last_year( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/stats/commit_activity' );
		}
		/**
		 * Get_number_delete_week
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_number_delete_week( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/stats/code_frequency' );
		}
		/**
		 * Get_repo_commit_count_weekly
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_commit_count_weekly( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/stats/participation' );
		}
		/**
		 * Get_number_commit_hour_day
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_number_commit_hour_day( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/stats/punch_card' );
		}

			// Repo Status
		/**
		 * Create_repo_status
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $sha
		 * @return
		 */
		public function create_repo_status( $owner, $repo, $sha ) {
			$args = array(
				'method' => 'POST',
				'state' => '',
				'target_url' => '',
				'description' => '',
				'context' => 'default',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/statuses/' . $sha );
		}
		/**
		 * Get_repo_specific_ref_status_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $ref
		 * @return array/string
		 */
		public function get_repo_specific_ref_status_list( $owner, $repo, $ref ) {
			$args = array(
				'ref' => '',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/commits/' . $ref . '/statuses' );
		}
		/**
		 * Get_repo_specific_ref_combined_status
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $ref
		 * @return array/string
		 */
		public function get_repo_specific_ref_combined_status( $owner, $repo, $ref ) {
			$args = array(
				'ref' => '',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/commits/' . $ref . '/status' );
		}

			// Repo traffic
		/**
		 * Get_repo_referrers_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_referrers_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/traffic/popular/referrers' );
		}
		/**
		 * Get_repo_path_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_path_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/traffic/popular/paths' );
		}
		/**
		 * Get_repo_views
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_views( $owner, $repo ) {
			$args = array(
				'per' => 'day',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/traffic/views' );
		}
		/**
		 * Get_repo_clone
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_clone( $owner, $repo ) {
			$args = array(
				'per' => 'day',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/traffic/clones' );
		}

			// Repo Webhooks
		/**
		 * Get_repo_hook_list
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return array/string
		 */
		public function get_repo_hook_list( $owner, $repo ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/hooks' );
		}
		/**
		 * Get_repo_single_hook
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return array/string
		 */
		public function get_repo_single_hook( $owner, $repo, $id ) {
			return $this->build_request()->fetch( 'repos/' . $owner . '/' . $repo . '/hooks/' . $id );
		}
		/**
		 * Create_repo_hook
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @return
		 */
		public function create_repo_hook( $owner, $repo ) {
			$args = array(
				'method' => 'POST',
				'name' => '',
				'config' => '',
				'events' => [ 'push' ],
				'active' => '', // bool
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/hooks' );
		}
		/**
		 * Edit_repo_hook
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function edit_repo_hook( $owner, $repo, $id ) {
			$args = array(
				'method' => 'PATCH',
				'config' => '', // Object
				'events' => [ 'push' ],
				'add_events' => '', // Array
				'remove_events' => '', // Array
				'active' => '', // bool
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/hooks/' . $id );
		}
		/**
		 * Test_repo_hook
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function test_repo_hook( $owner, $repo, $id ) {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/hooks/' . $id . '/tests' );
		}
		/**
		 * Ping_repo_hook
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function ping_repo_hook( $owner, $repo, $id ) {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/hooks/' . $id . '/pings' );
		}
		/**
		 * Delete_repo_hook
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $id
		 * @return
		 */
		public function delete_repo_hook( $owner, $repo, $id ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'repos/' . $owner . '/' . $repo . '/hooks/' . $id );
		}
		/**
		 * Pub_sub_hub_bub
		 *
		 * @param   $owner
		 * @param   $repo
		 * @param   $event
		 * @return
		 */
		public function pub_sub_hub_bub( $owner, $repo, $event ) {
			$args = array(
				'method' => 'POST',
				'hub.mode' => '',
				'hub.topic' => '',
				'hub.callback' => '',
				'hub.secret' => '',
			);
			return $this->build_request( $args )->fetch( 'hub' );
		}
		public function response_format( $owner, $repo ) {}

			// Search
		/**
		 * Get_search_repo
		 *
		 * @return array/string
		 */
		public function get_search_repo() {
			$args = array(
				'q' => '',
				'sort' => '',
				'order' => 'desc',
			);
			return $this->build_request( $args )->fetch( 'search/repositories' );
		}
		/**
		 * Get_search_commit
		 *
		 * @return array/string
		 */
		public function get_search_commit() {
			$args = array(
				'q' => '',
				'sort' => '',
				'order' => 'desc',
			);
			return $this->build_request( $args )->fetch( 'search/commits' );
		}
		/**
		 * Get_search_code
		 *
		 * @return array/string
		 */
		public function get_search_code() {
			$args = array(
				'q' => '',
				'sort' => '',
				'order' => 'desc',
			);
			return $this->build_request( $args )->fetch( 'search/code' );
		}
		/**
		 * Get_search_issues
		 *
		 * @return array/string
		 */
		public function get_search_issues() {
			$args = array(
				'q' => '',
				'sort' => '',
				'order' => 'desc',
			);
					return $this->build_request( $args )->fetch( 'search/issues' );
		}
				/**
				 * Get_search_users
				 *
				 * @return array/string
				 */
		public function get_search_users() {
			$args = array(
				'q' => '',
				'sort' => '',
				'order' => 'desc',
			);
			return $this->build_request( $args )->fetch( 'search/users' );
		}
		/**
		 * Text_match_metadata
		 *
		 * @return array/string
		 */
		public function text_match_metadata() {
			$args = array(
				'object_url' => '',
				'object_type' => '',
				'property' => '',
				'fragment' => '',
				'matches' => '',
			);
			return $this->build_request( $args )->fetch( 'search/issues' );
		}

			// Legacy Search
		/**
		 * Get_legacy_search_issues
		 *
		 * @param  string $owner
		 * @param  string $repo
		 * @param  string $state
		 * @param  string $keyword
		 * @return array/string
		 */
		public function get_legacy_search_issues( $owner, $repo, $state, $keyword ) {
			$args = array(
				'state' => '',
				'keyword' => '',
			);
			return $this->build_request( $args )->fetch( 'legacy/issues/search/' . $owner . '/' . $repo . '/' . $state . '/' . $keyword );
		}
		/**
		 * Get_legacy_search_repo
		 *
		 * @param  string $keyword
		 * @return array/string
		 */
		public function get_legacy_search_repo( $keyword ) {
			$args = array(
				'keyword' => '',
				'language' => '',
				'start_page' => '',
				'sort' => '',
				'order' => '',
			);
			return $this->build_request( $args )->fetch( 'legacy/repos/search/' . $keyword );
		}
		/**
		 * Get_legacy_search_user
		 *
		 * @param  string $keyword
		 * @return array/string
		 */
		public function get_legacy_search_user( $keyword ) {
			$args = array(
				'keyword' => '',
				'start_page' => '',
				'sort' => '',
				'order' => '',
			);
			return $this->build_request( $args )->fetch( 'legacy/user/search/' . $keyword );
		}
		/**
		 * Get_legacy_search_email
		 *
		 * @param  string $email
		 * @return array/string
		 */
		public function get_legacy_search_email( $email ) {
			$args = array(
				'email' => '',
			);
			return $this->build_request( $args )->fetch( 'legacy/user/email/' . $email );
		}

			// SCIM
			/**
			 * Get_scim_supported_user_attributes
			 *
			 * @param  string $org
			 * @param  string $id
			 * @return array/string
			 */
		public function get_scim_supported_user_attributes( $org, $id ) {
			$args = array(
				'userName' => '',
				'name.givenName' => '',
				'name.lastName' => '',
				'emails' => '', // Array
				'externalId' => '',
				'id' => '',
				'active' => '', // bool
			);
			return $this->build_request( $args )->fetch( 'scim/v2/organizations/' . $org . '/Users/' . $id );
		}
		/**
		 * Get_scim_provisioned_identities_list
		 *
		 * @param  string $organization
		 * @return array/string
		 */
		public function get_scim_provisioned_identities_list( $org ) {
			$args = array(
				'startIndex' => '', // integer
				'count' => '', // integer
				'filter' => 'eq',
			);
			return $this->build_request( $args )->fetch( 'scim/v2/organizations/' . $org . '/Users' );
		}
		/**
		 * Get_scim_single_user_provision_details
		 *
		 * @param  string $org
		 * @param  string $id
		 * @return array/string
		 */
		public function get_scim_single_user_provision_details( $org, $id ) {
			return $this->build_request()->fetch( 'scim/v2/organizations/' . $org . '/Users/' . $id );
		}
		/**
		 * Send_scim_user_invite_provision
		 *
		 * @param  string $org
		 * @return
		 */
		public function send_scim_user_invite_provision( $org ) {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request( $args )->fetch( '/scim/v2/organizations/' . $org . '/Users' );
		}
		/**
		 * Update_scim_memembership_org_provision
		 *
		 * @param  string $org
		 * @param  string $id
		 * @return string
		 */
		public function update_scim_memembership_org_provision( $org, $id ) {
			return $this->build_request()->fetch( '/scim/v2/organizations/' . $org . '/Users/' . $id );
		}
		/**
		 * Update_scim_user_attribute
		 *
		 * @param  string $org
		 * @param  string $id
		 * @return
		 */
		public function update_scim_user_attribute( $org, $id ) {
			$args = array(
				'method' => 'PATCH',
			);
			return $this->build_request( $args )->fetch( '/scim/v2/organizations/' . $org . '/Users/' . $id );
		}
		/**
		 * Delete_scim_org_user
		 *
		 * @param  string $org
		 * @param  string $id
		 * @return
		 */
		public function delete_scim_org_user( $org, $id ) {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( '/scim/v2/organizations/' . $org . '/Users/' . $id );
		}

			// Users
		/**
		 * Get_single_user
		 *
		 * @param  string $username
		 * @return array/string
		 */
		public function get_single_user( $username ) {
			return $this->build_request()->fetch( 'users/' . $username );
		}
		/**
		 * Get_authenticated_user
		 *
		 * @return array/string
		 */
		public function get_authenticated_user() {
			return $this->build_request()->fetch( 'user' );
		}
		/**
		 * Update_authenticated_user
		 *
		 * @return
		 */
		public function update_authenticated_user() {
			$args = array(
				'method' => 'PATCH',
				'name' => '',
				'email' => '',
				'blog' => '',
				'company' => '',
				'location' => '',
				'hireable' => '', // bool
				'bio' => '',
			);
			return $this->build_request( $args )->fetch( 'user' );
		}
		/**
		 * Get_all_users
		 *
		 * @return array/string
		 */
		public function get_all_users() {
			$args = array(
				'since' => '',
			);
			return $this->build_request( $args )->fetch( 'users' );
		}

			// User emails
		/**
		 * Get_user_email_ress_list
		 *
		 * @return array/string
		 */
		public function get_user_email_address_list() {
			return $this->build_request()->fetch( 'user/emails' );
		}
		/**
		 * Get_user_public_email_address_list
		 *
		 * @return array/string
		 */
		public function get_user_public_email_address_list() {
			return $this->build_request()->fetch( 'user/public_emails' );
		}
		/**
		 * Add_user_email_address
		 *
		 * @return
		 */
		public function add_user_email_address() {
			$args = array(
				'method' => 'POST',
			);
			return $this->build_request( $args )->fetch( 'user/emails' );
		}
		/**
		 * Delete_user_email_address
		 *
		 * @return
		 */
		public function delete_user_email_address() {
			$args = array(
				'method' => 'DELETE',
			);
			return $this->build_request( $args )->fetch( 'user/emails' );
		}
		/**
		 * Toggle_user_primary_email_visibiltiy
		 *
		 * @return
		 */
		public function toggle_user_primary_email_visibiltiy() {
			$args = array(
				'method' => 'PATCH',
			);
			return $this->build_request( $args )->fetch( 'user/email/visibility' );
		}

			// User Followers
			/**
			 * Get_user_follower_list
			 *
			 * @param  string $username
			 * @return array/string
			 */
		public function get_user_follower_list( $username ) {
			return $this->build_request()->fetch( 'users/' . $username . '/followers' );
		}
		/**
		 * Get_user_follow_user_list
		 *
		 * @param  string $username
		 * @return array/string
		 */
		public function get_user_follow_user_list( $username ) {
			return $this->build_request()->fetch( 'user/followers' );
		}
		/**
		 * Get_user_follow_personal_user
		 *
		 * @param  string $username
		 * @return array/string
		 */
		public function get_user_follow_personal_user( $username ) {
			return $this->build_request()->fetch( 'user/following/' . $username );
		}
		/**
		 * Get_user_follows_user
		 *
		 * @param  string $username
		 * @param  string $target_user
		 * @return array/string
		 */
		public function get_user_follows_user( $username, $target_user ) {
			return $this->build_request()->fetch( 'users/' . $username . '/following/' . $target_user );
		}
		/**
		 * User_follow
		 *
		 * @param  string $username
		 * @return
		 */
		public function user_follow( $username ) {
			$args = array(
				'method' => 'PUT',
			);
			return $this->build_request( $args )->fetch( 'user/following/' . $username );
		}
		/**
		 * Delete_user_follow
		 *
		 * @param  string $username
		 * @return
		 */
		public function delete_user_follow( $username ) {
			return $this->build_request()->fetch( 'user/following/' . $username );
		}

			// User Git SSH Keys
		public function get_user_public_key_list( $username ) {}
		public function get_personal_public_key_list(){}
		public function get_user_single_public_key( $id ) {}
		public function post_user_public_key(){}
		// public function post_user_public_key(){}
		public function delete_user_public_key( $id ) {}

			// GPG Keys
		public function get_user_gpg_key_list( $username ) {}
		public function get_personal_gpg_key_list(){}
		public function get_single_user_gpg_key( $id ) {}
		public function post_gpg_key(){}
		public function delete_gpg_key( $id ) {}

			// User  Another User
		public function get_user_block_user_list(){}
		public function get_personal_user_block_user( $username ) {}
		// public function put_block_user( $username ) {}
		// public function delete_block_user( $username ) {}
			// Admin Stats Enterprise
		public function get_enterprise_admin_stats( $type ) {}

			// LDAP Enterprise
		public function patch_enterprise_ldap_user_mapping( $usernmae ) {}
		public function post_enterprise_ldap_user_mapping( $usernmae ) {}
		public function patch_enterprise_ldap_team_mapping( $team_id ) {}
		public function post_enterprise_ldap_team_mapping( $team_id ) {}

			// Enterprise Lincense
		public function get_enterprise_license_infromation(){}

			// Enterprise Management Console
		public function post_enterprise_first_time_license(){}
		public function post_enterprise_license(){}
		public function get_enterprise_configuration_status(){}
		public function post_enterprise_config_process(){}
		public function get_enterprise_settings(){}
		public function put_enterprise_settings(){}
		public function get_enterprise_maintenance_status(){}
		public function post_enterprise_maintence_mode(){}
		public function get_enterprise_auth_ssh_keys(){}
		public function post_enterprise_new_auth_ssh_key(){}
		public function delete_enterprise_auth_ssh_key(){}

			// Enterprise Pre-recive Enviroment
		public function get_enterprise_single_pre_recieve_enviroment( $id ) {}
		public function get_enterprise_pre_recieve_enviroment_list(){}
		public function post_enterprise_pre_recieve_enviroment(){}
		public function patch_enterprise_pre_recieve_enviroment( $id ) {}
		public function delete_enterprise_pre_recieve_enviroment( $id ) {}
		public function get_enterprise_pre_recieve_enviroment_download_status( $id ) {}
		public function post_pre_recieve_enviroment_download( $id ) {}

			// Enterprise Pre-recieve Hooks
		public function get_enterprise_single_pre_recieve_hook( $id ) {}
		public function get_enterprise_pre_recieve_hook_list(){}
		public function post_enterprise_pre_recieve_hook(){}
		public function patch_enterprise_pre_recieve_hook( $id ) {}
		public function delete_enterprise_pre_recieve_hook( $id ) {}

			// Enterprise Search Indexing
		public function post_enterprise_indexing_job_queue(){}

			// Enterprise Organization Administration
		public function post_enterprise_organization(){}
		public function patch_enterprise_organization_name(){}
	} // End Class.
} // End Class Exists Check.
