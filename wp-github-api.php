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
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('GithubAPI')) {
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
        private $default_args = array('method' => 'GET');
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

        protected $args = array( );

        /**
         * Route being called.
         *
         * @var string
         */
        protected $route = '';

        /**
         * Constructor.
         *
         * @param string $api_key  API key to the account.
         * @param string $format   XML or JSON.
         * @param int    $callback If specified, returns json wrapped in a callback with the name passed in.
         */
        public function __construct($api_key = '', $format = 'json', $callback = null, $debug = false) {

            $this->args['headers'] = array(
                'Authorization' => 'token ' . $api_key
            );

            if ($debug) {
                $this->debug = true;
            }
        }

        /**
         * Prepares API request.
         *
         * @param string $route   API route to make the call to.
         * @param  array  $args    Arguments to pass into the API call.
         * @param  array  $method  HTTP Method to use for request.
         * @return self            Returns an instance of itself so it can be chained to the fetch method.
         */
        protected function build_request($route, $args = array( ), $method = 'GET') {
            // Start building query.
            $this->args['method'] = $method;
            $this->route          = $route;
            // Generate query string for GET requests.
            if ('GET' === $method) {
                $this->route = add_query_arg(array_filter($args), $route);
            } elseif ('application/json' === $this->args['headers']['Content-Type']) {
                $this->args['body'] = wp_json_encode($args);
            } else {
                $this->args['body'] = $args;
            }
            return $this;
        }

        /**
         * Check if HTTP status code is a success.
         *
         * @param  int $code HTTP status code.
         * @return boolean       True if status is within valid range.
         */
        protected function is_status_ok($code) {
            return (200 <= $code && 300 > $code);
        }

        /**
         * Clear query data.
         */
        protected function clear( ) {
            $this->args       = array( );
            $this->query_args = array( );
        }

        /**
         * Fetch the request from the API.
         *
         * @access private
         * @return array|WP_Error Request results or WP_Error on request failure.
         */
        protected function fetch( ) {
            // Make the request.
            $response = wp_remote_request($this->api_url . $this->route, $this->args);
            // Retrieve Status code & body.
            $code     = wp_remote_retrieve_response_code($response);
            $body     = json_decode(wp_remote_retrieve_body($response));
            // Return WP_Error if request is not successful.
            if (!$this->is_status_ok($code)) {
                return new WP_Error('response-error', sprintf(__('Status: %d', 'wp-github-api'), $code), $body);
            }
            $this->clear();
            return $body;
        }
        public function _response( ) {
        }
        // OAuth Authorizations API
        /**
         * Get_oauth_grants_list
         *
         * @return list
         */
        public function get_oauth_grants_list( ) {
        }
        /**
         * Get_oauth_single_grant
         *
         * @param int $id
         * @return list
         */
        public function get_oauth_single_grant($id) {
        }
        /**
         * Delete_oauth_grant
         *
         * @param int $id identification number
         * @return grant
         */
        public function delete_oauth_grant($id) {
        }
        /**
         * Get_oauth_authorizations_list
         *
         * @return null
         */
        public function get_oauth_authorizations_list( ) {
        }
        /**
         * Get_oauth_single_authorization
         *
         * @param int $id identification number
         * @return list
         */
        public function get_oauth_single_authorization($id) {
        }
        /**
         * Post_oauth_authorization
         *
         * @return authorization
         */
        public function post_oauth_authorization( ) {
        }
        /**
         * Put_create_oauth_authorization_specific_app
         *
         * @param string $client_id client identification
         * @return authorization
         */
        public function put_create_oauth_authorization_specific_app($client_id) {
        }
        /**
         * Put_create_oauth_authorization_specific_app_fingerprint
         *
         * @param string $client_id client identification
         * @param string $fingerprint fingetprint
         * @return authorization
         */
        public function put_create_oauth_authorization_specific_app_fingerprint($client_id, $fingerprint) {
        }
        /**
         * Patch_oauth_authorization
         *
         * @param int $id identification number
         * @return authorization
         */
        public function patch_oauth_authorization($id) {
        }
        /**
         * Delete_oauth_authorization
         *
         * @param int $id identification
         * @return null
         */
        public function delete_oauth_authorization($id) {
        }
        /**
         * Get_oauth_authorization
         *
         * @param string $client_id client identification
         * @param string $access_token access token
         * @return authorization
         */
        public function get_oauth_authorization($client_id, $access_token) {
        }
        /**
         * Post_oauth_reset_authorization
         *
         * @param string $client_id client identification
         * @param string $access_token access token
         * @return authorization
         */
        public function post_oauth_reset_authorization($client_id, $access_token) {
        }
        /**
         * delete_oauth_authorization_app
         *
         * @param string $client_id client identification
         * @param string $access_token access token
         * @return authorization
         */
        public function delete_oauth_authorization_app($client_id, $access_token) {
        }
        /**
         * Delete_oauth_grant_app
         *
         * @param string $client_id client identification
         * @param string $access_token access token
         * @return grant
         */
        public function delete_oauth_grant_app($client_id, $access_token) {
        }

        // Events
        /**
         * Get_public_events_list description
         *
         * @return events public events
         */
        public function get_public_events_list( ) {
        }
        /**
         * Get_repo_events_list description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return Event repostitory events
         */
        public function get_repo_events_list($owner, $repo) {
        }
        /**
         * Get_public_network_repo_events_list description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return Event public events for a network of repositories
         */
        public function get_public_network_repo_events_list($owner, $repo) {
        }
        /**
         * Get_public_organization_events_list description
         *
         * @param  array $org organization
         * @return Event public events for an organization
         */
        public function get_public_organization_events_list($org) {
        }
        /**
         * Get_received_user_events_list description
         *
         * @param string $username user of the repo
         * @return Event events that are recieved by watching repos and following users
         */
        public function get_received_user_events_list($username) {
        }
        /**
         * Get_public_received_user_events_list description
         *
         * @param string $username user of the repo
         * @return Event public events that a user recieved
         */
        public function get_public_received_user_events_list($username) {
        }
        /**
         * Get_user_performed_events_list description
         *
         * @param string $username user of the repo
         * @return Event events performed by a user         [
         */
        public function get_user_performed_events_list($username) {
        }
        /**
         * Get_publice_events_user_list description
         *
         * @param string $username user of the repo
         * @return Event public events performed by a user
         */
        public function get_publice_events_user_list($username) {
        }
        /**
         * Get_organization_events_list description
         *
         * @param string $username user of the repo
         * @param  array  $org organization
         * @return Event user's organization dashboard. Must be authenticated as a user to view
         */
        public function get_organization_events_list($username, $org) {
        }

        // Events Types and Payloads
        /**
         * _event_commit_comment description
         *
         * @param   $comment
         * @return ?
         */
        public function _event_commit_comment($comment) {
        }
        /**
         * Post_event description
         *
         * @param string $ref_type      The object that was created. Can be one of "repository", "branch", or "tag"
         * @param string $ref           The git ref (or null if only a repository was created).
         * @param string $master_branch The name of the repository's default branch (usually master).
         * @param string $description   The repository's current description.
         * @return
         */
        public function post_event($ref_type, $ref, $master_branch, $description) {
        }
        /**
         * Delete_event description
         *
         * @param string $ref_type The object that was deleted. Can be "branch" or "tag".
         * @param string $ref      The full git ref.
         * @return
         */
        public function delete_event($ref_type, $ref) {
        }
        /**
         * Deployment_event description
         *
         * @param  object $deployment  The deployment
         * @param string $sha         The commit SHA for which this deployment was created.
         * @param string $payload     The optional extra information for this deployment.
         * @param string $enviroment  The optional environment to deploy to. Default: "production"
         * @param string $description The optional human-readable description added to the deployment.
         * @param  object $repository  The repository for this deployment.
         * @return
         */
        public function deployment_event($deployment, $sha, $payload, $enviroment, $description, $repository) {
        }
        /**
         * Deployment_event_stats description
         *
         * @param  object $deployment_status The deployment status.
         * @param string $state             The new state. Can be pending, success, failure, or error.
         * @param string $tar_url           The optional link added to the status.
         * @param string $description       The optional human-readable description added to the status.
         * @param  object $deployment        The deployment that this status is associated with.
         * @param  object $repository        The repository for this deployment.
         * @return
         */
        public function deployment_event_stats($deployment_status, $state, $tar_url, $description, $deployment, $repository) {
        }
        /**
         * Download_event description
         *
         * @param  object $donwload The download that was just created.
         * @return
         */
        public function download_event($donwload) {
        }
        /**
         * Follow_event description
         *
         * @param  object $tar The user that was just followed.
         * @return
         */
        public function follow_event($tar) {
        }
        /**
         * [fork_event description
         *
         * @param  [type] $forkee [description]
         * @return [type]         [description]
         */
        public function fork_event($forkee) {
        }
        public function fork_event_apply($head, $before, $after) {
        }
        public function _gist_event($action, $gist) {
        }
        public function _gollum_event($pages, $page_name, $title, $action, $sha, $html_url) {
        }
        public function install_event($action, $installation) {
        }
        public function install_event_repo($action, $installation, $repository_selection, $repositories_ed, $repositories_removed) {
        }
        // public function _event_comment( $action, $changes, $changes, $issue, $comment ) {}
        // public function issues_event( $action, $issue, $changes, $changes, $chnages, $assignee, $label ) {}
        // public function label_event( $action, $label, $changes, $changes, $changes ) {}
        public function marketplace_event_purchase($action) {
        }
        // public function member_event( $member, $action, $changes, $changes ) {}
        public function membership_event($action, $scope, $member, $team) {
        }
        // public function milestone_event( $action, $milestone, $changes, $changes, $changes, $changes ) {}
        public function org_event($action, $invitation, $membership, $organization) {
        }
        public function org__event($action, $ed_user, $organization, $sender) {
        }
        public function page_build_event($build) {
        }
        // public function project_card_event( $action, $changes, $changes, $after_id, $project_card ) {}
        // public function project_column_event( $action, $changes, $changes, $after_id, $project_column ) {}
        // public function project_event( $action, $changes, $changes, $changes, $project ) {}
        public function public_event( ) {
        }
        // public function _request_event( $action, $number, $changes, $changes, $changes, $_request ) {}
        public function _request_review_event($action, $_request, $review, $changes) {
        }
        // public function _request_review_comment_event( $action, $changes, $changes, $_request, $comment ) {}
        // public function push_event( $ref, $head, $before, $size, $distinct_size, $commits, $commits, $commits, $commits, $commits, $commits, $commits, $commits ) {}
        public function release_event($action, $release) {
        }
        public function repo_event($action, $repository) {
        }
        public function status_event($sha, $state, $description, $tar_url, $branches) {
        }
        // public function team_event( $action, $team, $changes, $changes, $changes, $changes, $changes, $changes, $changes, $repository ) {}
        public function team__event($team, $repository) {
        }
        public function watch_event($action) {
        }

        // Feeds
        /**
         * Get_feeds_list description
         *
         * @return
         */
        public function get_feeds_list( ) {
        }

        // Notifications
        /**
         * Get_notifications_list description
         *
         * @param  bool   $all If true, show notifications marked as read. Default: false
         * @param  bool   $participating If true, only shows notifications in which the user is directly participating or mentioned. Default: false
         * @param string $since Only show notifications updated after the given time. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Default: Time.now
         * @param string $before Only show notifications updated before the given time. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ.
         * @return
         */
        public function get_notifications_list($all, $participating, $since, $before) {
        }
        /**
         * [get_repo_notifications_list description]
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @param  bool   $all If true, show notifications marked as read. Default: false
         * @param  bool   $participating If true, only shows notifications in which the user is directly participating or mentioned. Default: false
         * @param string $since Only show notifications updated after the given time. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Default: Time.now
         * @param string $before Only show notifications updated before the given time. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ.
         * @return
         */
        public function get_repo_notifications_list($owner, $repo, $all, $participating, $since, $before) {
        }
        /**
         * Put_read description
         *
         * @return
         */
        public function put_read( ) {
        }
        /**
         * [put_repo_notifications_read description]
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @param string $last_reat_at Describes the last point that notifications were checked. Anything updated since this time will not be updated. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Default: Time.now
         * @return
         */
        public function put_repo_notifications_read($owner, $repo, $last_reat_at) {
        }
        /**
         * Get_single_thread description
         *
         * @param int $id identification number
         * @return
         */
        public function get_single_thread($id) {
        }
        /**
         * Patch_thread_read description
         *
         * @param int $id identification number
         * @return
         */
        public function patch_thread_read($id) {
        }
        /**
         * Get_thread_subscription description
         *
         * @param int $id identification number
         * @return
         */
        public function get_thread_subscription($id) {
        }
        /**
         * Put_thread_subscription description
         *
         * @param int $id identification number
         * @return
         */
        public function put_thread_subscription($id) {
        }
        /**
         * Delete_thread_subscription description
         *
         * @param int $id identification number
         * @return
         */
        public function delete_thread_subscription($id) {
        }

        // Starring
        /**
         * Get_stargazers_list description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function get_stargazers_list($owner, $repo) {
        }
        /**
         * Get_starred_rep_list description
         *
         * @param string $username username
         * @return
         */
        public function get_starred_rep_list($username) {
        }
        /**
         * Get_star_repo_authentication description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function get_star_repo_authentication($owner, $repo) {
        }
        /**
         * Put_repo_star description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function put_repo_star($owner, $repo) {
        }
        /**
         * Delete_repo_star description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function delete_repo_star($owner, $repo) {
        }

        // Watching
        /**
         * Get_watchers_list description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function get_watchers_list($owner, $repo) {
        }
        /**
         * Get_repo_subscription description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function get_repo_subscription($owner, $repo) {
        }
        /**
         * Put_repo_subscription description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function put_repo_subscription($owner, $repo) {
        }
        /**
         * Delete_repo_subscription description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function delete_repo_subscription($owner, $repo) {
        }
        /**
         * Get_legacy_repo_watch_authenticated description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function get_legacy_repo_watch_authenticated($owner, $repo) {
        }
        /**
         * Put_repo_legacy_authenticated description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function put_repo_legacy_authenticated($owner, $repo) {
        }
        /**
         * Delete_repo_legacy description
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return
         */
        public function delete_repo_legacy($owner, $repo) {
        }

        // GISTS
        /**
         * Get_user_gist_list description
         *
         * @param string $username username
         * @param string $since A timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Only gists updated at or after this time are returned.
         * @return
         */
        public function get_user_gist_list($username, $since) {
        }
        /**
         * Get_all_public_gist_list description
         *
         * @param string $since A timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Only gists updated at or after this time are returned.
         * @return
         */
        public function get_all_public_gist_list($since) {
        }
        /**
         * Get_starred_gist_list description
         *
         * @param string $since A timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ. Only gists updated at or after this time are returned.
         * @return
         */
        public function get_starred_gist_list($since) {
        }
        /**
         * Get_single_gist description
         *
         * @param int $id identification number
         * @return
         */
        public function get_single_gist($id) {
        }
        /**
         * Get_specific_revision_gist description
         *
         * @param int    $id  identification number
         * @param string $sha The commit SHA for which this deployment was created.
         * @return
         */
        public function get_specific_revision_gist($id, $sha) {
        }
        /**
         * Post_gist description
         *
         * @param  object  $files       Required. Files that make up this gist.
         * @param string  $description A description of the gist.
         * @param  boolean $public      Indicates whether the gist is public. Default: false
         * @return
         */
        public function post_gist($files, $description, $public) {
        }
        /**
         * Patch_gist description
         *
         * @param int    $id identification number
         * @param string $description A description of the gist.
         * @param  object $files       Files that make up this gist.
         * @param string $content     Updated file contents.
         * @param string $filename    New name for this file.
         * @return
         */
        public function patch_gist($id, $description, $files, $content, $filename) {
        }
        /**
         * Get_gist_commits_list description
         *
         * @param int $id identification number
         * @return
         */
        public function get_gist_commits_list($id) {
        }
        /**
         * Put_star_gist description
         *
         * @param int $id identification number
         * @return
         */
        public function put_star_gist($id) {
        }
        /**
         * Delete_star_gist description
         *
         * @param int $id identification number
         * @return
         */
        public function delete_star_gist($id) {
        }
        public function get_star_gist($id) {
        }
        public function post_fork_gist($id) {
        }
        public function get_fork_gist_list($id) {
        }
        public function delete_gist($id) {
        }

        // Comments
        public function get_gist_comment_list($gist_id) {
        }
        public function get_single_comment($gist_id, $id) {
        }
        public function post_comment($gist_id) {
        }
        public function patch_comment($gist_id, $id) {
        }
        public function delete_comment($gist_id, $id) {
        }

        // Blobs
        public function get_blob($owner, $repo, $sha) {
        }
        public function post_blob($owner, $repo) {
        }
        public function _blob_custom_media_types( ) {
            return array(
                'application/json',
                'application/vnd.github.VERSION.raw'
            );
        }

        // Commits
        public function get_commit($owner, $repo, $sha) {
        }
        public function post_commit($owner, $repo) {
        }
        public function get_commit_signature_verification($owner, $repo, $sha) {
        }

        // References
        public function get_reference($owner, $repo, $ref = null) {
        }
        public function get_all_references($owner, $repo) {
        }
        public function post_reference($owner, $repo) {
        }
        public function patch_reference($owner, $repo, $ref) {
        }
        public function delete_reference($owner, $repo, $ref) {
        }

        // Tags
        public function get_tag($owner, $repo, $sha) {
        }
        public function post_tag_object($owner, $repo) {
        }
        public function tag_signature_verification($owner, $repo, $sha) {
        } //not sure

        // Trees
        public function get_tree($owner, $repo, $sha) {
        }
        public function get_tree_recursively($owner, $repo, $sha) {
        }
        public function post_tree($owner, $repo) {
        }

        // Github Apps
        public function get_installations( ) {
        }
        public function get_single_installation($installation_id) {
        }
        public function get_user_installations_list( ) {
        }
        public function post_installation_token($installation_id) {
        }

        // Installations
        public function get_repo_list( ) {
        }
        public function get_user_accessible_repo_installation_list($installation_id) {
        }
        public function put_installation_repo($installation_id, $repository_id) {
        }
        public function delete_installation_repo($installation_id, $repository_id) {
        }

        // Marketplace
        public function get_marketplace_all_plan_list( ) {
        }
        public function get_specific_plan_github_account_list($id) {
        }
        public function get_associated_marketplace_github_account($id) {
        }
        public function get_user_marketplace_purchases( ) {
        }

        // Github App Permissions
        public function get_repo_metadata_permission_collaborators($repository_id) {
        }
        public function get_access_token_install_metadata_permission($installation_id) {
        }
        public function post_repo_id_metadat_permission($repository_id) {
        }
        public function get_repo_metadata_permission_collaborator($repository_id, $collab) {
        }
        public function get_repo_metadata_permission_comments($repository_id) {
        }
        public function get_repo_metadata_permission_commit_commnets($repository_id) {
        }
        public function get_repo_metadata_permission_comment($repository_id, $id) {
        }
        public function get_repo_metadata_permission_commit($repository_id) {
        }
        public function get_repo_metadata_permission_commits($repository_id) {
        }
        public function get_repo_metadata_permission_contributor($repository_id) {
        }
        public function get_repo_metadata_permission_fork($repository_id) {
        }
        public function get_repo_metadata_permission_subscriber($repository_id) {
        }
        public function get_repo_metadata_permission_stargazer($repository_id) {
        }
        public function get_repo_metadata_permission_watcher($repository_id) {
        }
        public function get_repo_metadata_permission_license($repository_id) {
        }
        public function get_repo_metadata_permission_contributor_stats($repository_id) {
        }
        public function get_repo_metadata_permission_commit_activity_stats($repository_id) {
        }
        public function get_repo_metadata_permission_code_frequency_stats($repository_id) {
        }
        public function get_repo_metadata_permission_punch_card_stats($repository_id) {
        }
        public function get_repo_metadata_permission_participation_stats($repository_id) {
        }
        public function get_repo_metadata_permission_tags($repository_id) {
        }
        public function get_repo_metadata_permission_language($repository_id) {
        }
        public function get_metadata_permission_rate_limit( ) {
        }
        public function get_metadata_permission_hooks( ) {
        }
        public function get_metadata_permission_hook($name) {
        }
        public function get_metadata_permission_search_users( ) {
        }
        public function get_metadata_permission_search_code( ) {
        }
        public function get_matadata_permission_repo( ) {
        }
        public function get_metadata_permission_licenses($license) {
        }
        public function get_metadata_permission_user_org($user_id) {
        }
        public function get_metadata_permission_org( ) {
        }
        public function get_metadata_permission_users( ) {
        }
        public function get_metadata_permission_user($user_id) {
        }
        public function get_metadata_permission_user_keys($user_id) {
        }
        public function get_metadata_permission_user_recieved_events($user_id) {
        }
        public function get_metadata_permission_user_events($user_id) {
        }
        public function get_metadata_permission_events( ) {
        }
        public function get_metadata_permission_org_events($organization_id) {
        }
        public function get_metadata_permission_user_public_received_events($user_id) {
        }
        public function get_metadata_permission_user_public_events($user_id) {
        }
        public function get_metadata_permission_repo_comments_reactions($owner, $repo, $id) {
        }
        public function get_content_permission_repo_branches($repository_id) {
        }
        public function get_content_permission_repo_compare($repository_id) {
        }
        public function get_content_permission_repo_branch($repository_id) {
        }
        public function patch_conten_permission_repo_branches($repository_id) {
        }
        public function put_content_permission_repo__merge($repository_id, $id) {
        }
        public function post_content_permission_repo_merges($repository_id) {
        }
        public function get_content_permission_repo_readme($repository_id) {
        }
        public function get_content_permission_repo_contents($repository_id) {
        }
        public function put_content_permission_repo_contents($repository_id) {
        }
        public function delete_content_permission_repo_contents($repository_id) {
        }
        public function get_content_permission_repo_tarball($repository_id) {
        }
        public function get_content_permission_repo_zipball($repository_id) {
        }
        public function get_content_permission_repo_release($repository_id) {
        }
        public function get_content_permission_repo_release_latest($repository_id) {
        }
        public function get_content_permission_repo_release_tag($repository_id) {
        }
        public function get_content_permission_repo_release_id($repository_id, $id) {
        }
        public function get_content_permission_repo_release_ass($repository_id, $id) {
        }
        public function get_content_permission_repo_release_ass_id($repository_id, $id) {
        }
        public function delete_content_permission_repo_release_id($repository_id, $id) {
        }
        public function patch_content_permission_repo_release_id($repository_id, $id) {
        }
        public function post_content_permission_repo_release_id($repository_id, $id) {
        }
        public function post_content_permisison_repo_release($repository_id) {
        }
        public function patch_content_permission_repo_release_assets($repository_id, $id) {
        }
        public function post_content_permission_repo_release_assets($repository_id, $id) {
        }
        public function delete_content_permission_repo_release_assets($repository_id, $id) {
        }
        public function post_content_permission_repo_commits_comments($repository_id) {
        }
        public function patch_content_permission_repo_comments($repository_id, $id) {
        }
        public function post_content_permission_repo_comments($repository_id, $id) {
        }
        public function get_single_file_permission_repo_content($owner, $repo, $path) {
        }
        public function put_single_file_permission_repo_content($owner, $repo, $path) {
        }
        public function delete_single_file_permission_repo_content($owner, $repo, $path) {
        }
        public function get_admin_permission_repo_teams($repository_id) {
        }
        public function put_admin_permission_repo_collaborator($repository_id, $collab) {
        }
        public function delete_admin_permission_repo_collaborator($repository_id, $collab) {
        }
        public function patch_admin_permission_repo($repository_id) {
        }
        public function delete_admin_permission_repo($repository_id) {
        }
        public function get_admin_permission_repo_branches_protection_required_status_checks($repository_id, $branch) {
        }
        public function get_admin_permission_repo_branches_protection_required_status_checks_contexts($repository_id, $branch) {
        }
        public function get_issue_permission_repo_issue_comment($repository_id, $id) {
        }
        public function post_issue_permission_repo_issue($repository_id) {
        }
        public function get_issue_permission_repo_milestone($repository_id) {
        }
        // public function post_issue_permission_repo_issue( $repository_id, $id ) {}
        public function patch_issue_permission_repo_issue($repository_id, $id) {
        }
        public function get_issue_permission_repo_issue($repository_id) {
        }
        public function get_issue_permission_repo_issues($repository_id, $id) {
        }
        public function get_issue_permission_search_issue( ) {
        }
        public function post_issue_permission_repo_issues($repository_id, $id) {
        }
        public function get_issue_permission_repo_issue_events($repository_id, $id) {
        }
        public function get_issue_permission_repo_issues_event($repository_id) {
        }
        public function get_issue_permission_repo_issues_events($repository_id, $id) {
        }
        public function get_issue_permission_repo_assignee($repository_id) {
        }
        public function get_issue_permission_repo_assignees($repository_id, $assignee) {
        }
        public function get_issue_permission_repo_label($repository_id) {
        }
        public function get_issue_permission_repo_labels($repository_id) {
        }
        public function get_issue_permission_repo_issue_labels($repository_id, $id) {
        }
        public function post_issue_permission_repo_label($repository_id) {
        }
        public function patch_issue_permission_repo_labels($repository_id) {
        }
        public function post_issue_permission_repo_labels($repository_id) {
        }
        public function delete_issue_permission_repo_labels($repository_id) {
        }
        public function post_issue_permission_repo_issues_labels($repository_id, $id) {
        }
        public function delete_issue_permission_repo_issues_labels($repository_id, $id) {
        }
        public function put_issue_permission_repo_issue_labels($repository_id, $id) {
        }
        public function delete_issue_permission_repo_issue_labels($repository_id, $id) {
        }
        public function get_issue_permission_repo_milestones($repository_id) {
        }
        public function get_issue_permission_repo_milestones_id($repository_id, $id) {
        }
        public function get_issue_permission_repo_milestones_labels($repository_id, $id) {
        }
        public function post_issue_permission_repo_milestone($repository_id) {
        }
        public function patch_issue_permission_repo_milestones($repository_id, $id) {
        }
        public function post_issue_permission_repo_milestones($repository_id, $id) {
        }
        public function delete_issue_permission_repo_milestones($repository_id, $id) {
        }
        public function get_issue_permission_issues_comments($repository_id) {
        }
        public function post_issue_permission_repo_issues_comments($repository_id) {
        }
        public function get_issue_permission_repo_issue_comments($repository_id, $id) {
        }
        public function patch_issue_permision_repo_issue_comments($repository_id, $id) {
        }
        public function post_issue_permission_repo_issue_comments($repository_id, $id) {
        }
        public function delete_issue_permission_repo_issue_comments($repository_id, $id) {
        }
        public function get_issue_permission_repo_issues_reactions($owner, $repo, $number) {
        }
        public function get_issue_permission_repo_issues_comments_reactions($owner, $repo, $id) {
        }
        public function get_request_permission_repo_($repository_id) {
        }
        public function get_request_permission_repo_s($repository_id, $id) {
        }
        public function get_request_permission_repo_s_files($repository_id, $id) {
        }
        public function get_request_permission_repo_issues_comments($repository_id, $id) {
        }
        public function get_request_permission_repo_milestones($repository_id) {
        }
        public function post_request_permission_repo_issues_comment($repository_id, $id) {
        }
        public function get_request_permission_repo__merge($repository_id, $id) {
        }
        public function get_request_permission_repo__commit($repository_id, $id) {
        }
        public function get_request_permission_repo__comment($repository_id) {
        }
        public function post_request_permission_repo__comment($repository_id) {
        }
        public function get_request_permission_repo__comments($repository_id, $id) {
        }
        public function get_request_permission_repo_s_comments($repository_id, $id) {
        }
        public function post_request_permission_repo__comments($repository_id, $id) {
        }
        public function patch_request_permission_repo__comments($repository_id, $id) {
        }
        // public function post_request_permission_repo__comment( $repository_id, $id ) {}
        public function delete__request_permission_repo__comments($repository_id, $id) {
        }
        public function get_request_permission_repo__reviews($repository_id, $number) {
        }
        public function post_request_permission_repo__reviews($repository_id, $number) {
        }
        public function get_request_permission_repo__review($repository_id, $number, $id) {
        }
        public function get_request_permission_repo__review_comments($repository_id, $number, $id) {
        }
        public function post_request_permission_repo_($repository_id) {
        }
        public function patch_request_permission_repo_($repository_id, $id) {
        }
        public function get_request_permission_repo_issue_events($repository_id, $id) {
        }
        public function get_request_permission_repo_issues_event($repository_id) {
        }
        public function get_request_permission_repo_issues_events($repository_id, $id) {
        }
        public function get_request_permission_repo_assignee($repository_id) {
        }
        public function get_request_permission_repo_assignees($repository_id, $assignee) {
        }
        public function get_request_permission_repo_label($repository_id) {
        }
        public function get_request_permission_repo_labels($repository_id) {
        }
        public function get_request_permission_repo_issues_labels($repository_id, $id) {
        }
        public function post_request_permission_repo_label($repository_id) {
        }
        public function patch_request_permission_repo_labels($repository_id) {
        }
        public function post_request_permission_repo_labels($repository_id) {
        }
        public function delete__request_permission_repo_labels($repository_id) {
        }
        public function post_request_permission_repo_issues_lable($repository_id, $id) {
        }
        public function delete__request_permission_repo_issues_labels($repository_id, $id) {
        }
        public function put_request_permission_repo_issues_label($repository_id, $id) {
        }
        public function delete__request_permission_repo_issues_label($repository_id, $id) {
        }
        public function get_request_permission_repo_milestone($repository_id) {
        }
        public function get_reuqest_permission_repo_milesstones($repository_id, $id) {
        }
        public function get_reuqest_permission_repo_milesstones_labels($repository_id, $id) {
        }
        public function post_reuqest_permission_repo_milesstones($repository_id) {
        }
        public function patch_reuqest_permission_repo_milesstones($repository_id, $id) {
        }
        public function post_reuqest_permission_repo_milesstone($repository_id, $id) {
        }
        public function delete__reuqest_permission_repo_milesstones($repository_id, $id) {
        }
        public function get_request_permission_repo_issue_comment($repository_id) {
        }
        // public function get_request_permission_repo_issues_comments( $repository_id, $id ) {}
        public function patch_request_permission_repo_issues_comments($repository_id, $id) {
        }
        public function post_request_permission_repo_issues_comments($repository_id, $id) {
        }
        public function delete__request_permission_repo_issues_comments($repository_id, $id) {
        }
        public function gey_request_permission_repo__comment_reactions($owner, $repo, $id) {
        }
        public function post_status_permission_repo_status($repository_id, $sha) {
        }
        public function get_status_permission_repo_statuses($repository_id) {
        }
        public function get_status_permission_repo_status($repository_id) {
        }
        public function get_deployment_permission_repo_deployment($repository_id, $id) {
        }
        public function post_deployment_permission_repo_deployments_statuses($repository_id, $deployment_id) {
        }
        public function post_deployment_permission_repo_deployments($repository_id) {
        }
        public function get_deployment_permission_repo_deployments_statusest($repository_id, $deployment_id) {
        }
        public function get_deployment_permission_repo_deployments($repository_id) {
        }
        public function get_pages_permission_repo_pages($repository_id) {
        }
        public function get_pages_permission_repo_pages_build($repository_id) {
        }
        public function get_pages_permission_repo_pages_builds_latest($repository_id) {
        }
        public function get_pages_permission_repo_pages_builds($repository_id, $id) {
        }
        public function post_pages_permission_repo_pages_builds($repository_id) {
        }
        public function get_org_members_permission_org_teams($organization_id) {
        }
        public function get_org_members_permission_teams($id) {
        }
        public function get_org_members_permission_teams_members($id) {
        }
        public function get_org_members_permission_teams_memberships($id, $user) {
        }
        public function get_org_members_permissions_teams_repos($id) {
        }
        public function get_org_members_permission_org_members($organization_id) {
        }
        public function put_org_members_permission_org_memberships($organization_id, $user) {
        }
        public function get_org_members_permission_org_memberships($organization_id, $user) {
        }
        public function get_repo_projects_permission_repo_projects($owner, $repo) {
        }
        public function get_repo_prjects_permission_projects($id) {
        }
        public function post_repo_projects_permission_repo_projects($owner, $repo) {
        }
        public function patch_repo_projects_permission_projects($id) {
        }
        public function delete_repo_projects_permission_projects($id) {
        }
        public function get_org_projects_permission_orgs_projects($org) {
        }
        public function get_org_projects_permission_projects($id) {
        }
        public function post_org_projects_permission_orgs_projects($org) {
        }
        public function patch_org_projects_permission_projects($id) {
        }
        public function delete_org_projects_permission_projects($id) {
        }
        public function get_org_members_permission_orgs_member($org) {
        }
        public function get_org_members_permission_orgs_members($org, $username) {
        }
        public function delete_org_members_permission_orgs_members($org, $username) {
        }
        public function put_org_members_permission_orgs_memberships($org, $username) {
        }
        public function get_org_members_permission_orgs_memberships($org, $username) {
        }
        public function delete_org_members_permission_orgs_memberships($org, $username) {
        }

        // Issues
        public function get_issues_list($org) {
        }
        public function get_repo_issues_list($owner, $repo) {
        }
        public function get_single_issue($owner, $repo, $number) {
        }
        public function post_issue($owner, $repo) {
        }
        public function patch_issue($owner, $repo, $number) {
        }
        public function put_lock_issue_lock($owner, $repo, $number) {
        }
        public function delete_lock_issue_lock($owner, $repo, $number) {
        }
        public function _issues_custom_media_types( ) {
            return array(
                'application/vnd.github.VERSION.raw+json',
                'application/vnd.github.VERSION.text+json',
                'application/vnd.github.VERSION.html+json',
                'application/vnd.github.VERSION.full+json'
            );
        }
        // Assignees
        public function get_assignees_list($owner, $repo) {
        }
        public function get_assignee($owner, $repo, $assignee) {
        }
        public function post_issue_assignee($owner, $repo, $number) {
        }
        public function delete_issue_assignee($owner, $repo, $number) {
        }

        // Issue Comments
        public function get_issue_comment_list($owner, $repo, $number) {
        }
        public function get_repo_comment_list($owner, $repo) {
        }
        public function get_issue_single_comment($owner, $repo, $id) {
        }
        public function get_issue_comment($owner, $repo, $number) {
        }
        public function post_issue_comment($owner, $repo, $id) {
        }
        public function patch_issue_comment($owner, $repo, $id) {
        }
        public function delete_issue_comment($owner, $repo, $id) {
        }

        // Issue Events
        public function get_issue_event_list($owner, $repo, $issue_number) {
        }
        public function get_issue_repo_event_list($owner, $repo) {
        }
        public function get_issue_single_event($owner, $repo, $id) {
        }

        // Issue Labels
        public function get_all_issue_repo_labels($owner, $repo) {
        }
        public function get_single_issue_label($owner, $repo, $name) {
        }
        // public function post_issue_label( $owner, $owner ) {}
        public function patch_issue_label($owner, $repo, $name) {
        }
        public function delete_issue_label($owner, $repo, $name) {
        }
        public function get_issue_label_issue_list($owner, $repo, $number) {
        }
        public function post_issue_label_issue($owner, $repo, $number) {
        }
        public function delete_issue_label_issue($owner, $repo, $number, $name) {
        }
        public function put_all_issue_labels_issue($ower, $repo, $number) {
        }
        public function delete_all_issue_labels_issue($owner, $repo, $number) {
        }
        public function get_all_issue_labels_milestone($owner, $repo, $number) {
        }

        // Milestones
        public function get_milestone_repo_list($owner, $repo) {
        }
        public function get_single_milestone($owner, $repo, $number) {
        }
        public function post_milestone($owner, $repo) {
        }
        public function patch_milestone($owner, $repo, $number) {
        }
        public function delete_milestone($owner, $repo, $number) {
        }

        // Migrations
        public function post_start_migration($orgn) {
        }
        public function get_migrations_list($org) {
        }
        public function get_migration_status($org, $id) {
        }
        public function get_migration_archive($org, $id) {
        }
        public function delete_migration_archive($org, $id) {
        }
        public function delete_lock_migration_repo($org, $id, $repo_name) {
        }

        // Source Imports
        public function put_import($owner, $repo) {
        }
        public function get_import_progress($owner, $repo) {
        }
        public function patch_existing_import($owner, $repo) {
        }
        public function get_commit_authors($owner, $repo) {
        }
        public function patch_map_commit_author($owner, $repo, $author_id) {
        }
        public function patch_git_lfs_preference($owner, $name) {
        }
        public function get_large_files($owner, $name) {
        }
        public function delete_import($owner, $repo) {
        }

        // Codes of Conduct
        public function get_all_code_conduct_list( ) {
        }
        public function get_individual_code_conduct($id) {
        }
        public function get_repo_code_conduct($owner, $repo) {
        }
        public function get_repo_contents_code_conduct($owner, $repo) {
        }

        // Emojis
        public function get_emojis( ) {
        }

        // Gitignore
        public function get_available_templates( ) {
        }
        public function get_single_template( ) {
        }

        // Licenses
        public function get_all_licenses_list( ) {
        }
        public function get_individual_license($license) {
        }
        public function get_repo_license($owner, $repo) {
        }
        public function get_repo_contents_license($owner, $repo) {
        }

        // Markdown
        public function post_markdown_document( ) {
        }
        public function post_markdown_document_raw( ) {
        }

        // Meta
        public function get_meta( ) {
        }

        // Rate limit
        public function get_current_rate_limit( ) {
        }

        // Organizations
        public function get_org_list( ) {
        }
        public function get_org_all_list( ) {
        }
        public function get_user_org_list($username) {
        }
        public function get_org($org) {
        }
        public function patch_org($org) {
        }

        // Members
        public function get_members_list($org) {
        }
        public function get_membership($org, $username) {
        }
        public function put_member( ) {
        }
        public function delete_member($org, $username) {
        }
        public function get_public_members_list($org) {
        }
        public function get_user_public_membership($org, $username) {
        }
        public function put_user_membership_member($org, $username) {
        }
        public function delete_user_membership($org, $username) {
        }
        public function get_org_membership_member($org, $username) {
        }
        public function put_org_membership_member($org, $username) {
        }
        public function delete_org_membership_member($org, $username) {
        }
        public function get_pending_org_invitation_member($org) {
        }
        public function get_user_org_membership_member_list( ) {
        }
        public function get_user_org_membership_member($org) {
        }
        public function patch_user_org_membership_member($org) {
        }

        // Outside Collaborators
        public function get_outside_collaborator_list($org) {
        }
        public function delete_outside_collaborator($org, $username) {
        }
        public function put_member_outside_collaborator($org, $username) {
        }

        // Teams
        public function get_team_list($org) {
        }
        public function get_team($id) {
        }
        public function post_team($org) {
        }
        public function patch_team($id) {
        }
        public function delete_team($id) {
        }
        public function get_list_team_member($id) {
        }
        public function get_team_member($id, $username) {
        }
        public function put_team_member($id, $username) {
        }
        public function delete_team_member($id, $username) {
        }
        public function get_team_membership($id, $username) {
        }
        public function put_team_membership($id, $username) {
        }
        public function delete_team_membership($id, $username) {
        }
        public function get_team_repo_list($id) {
        }
        public function get_pending_team_invitations_list($id) {
        }
        public function get_team_manages_repo($id, $owner, $repo) {
        }
        public function put_team_repo($id, $org, $repo) {
        }
        public function delete_team_repo($id, $owner, $repo) {
        }
        public function get_user_team_list( ) {
        }

        // Webhooks
        public function get_hook_list($org) {
        }
        public function get_single_hook($org, $id) {
        }
        public function post_hook($org) {
        }
        public function patch_hook($org, $id) {
        }
        public function post_ping_hook($org, $id) {
        }
        public function delete_hook($org, $id) {
        }

        // Blocking Users(Organizations)
        public function get_block_user_list($org) {
        }
        public function get_block_user_org($org, $username) {
        }
        public function put_block_user($org, $username) {
        }
        public function delete_block_user($org, $username) {
        }

        // Projects
        public function get_repo_project_list($owner, $repo) {
        }
        public function get_org_project_list($org) {
        }
        public function get_project($id) {
        }
        public function post_repo_project($owner, $repo) {
        }
        public function post_org_project($org) {
        }
        public function patch_project($id) {
        }
        public function delete_project($id) {
        }

        // Project Cards
        public function get_project_card_list($column_id) {
        }
        public function get_project_card($id) {
        }
        public function post_project_card($column_id) {
        }
        public function patch_project_card($id) {
        }
        public function delete_project_card($id) {
        }
        public function post_move_project_card($id) {
        }

        // Project Column
        public function get_project_columns_list($project_id) {
        }
        public function get_project_column($id) {
        }
        public function post_project_column($project_id) {
        }
        public function patch_project_column($id) {
        }
        public function delete_project_column($id) {
        }
        public function post_move_project_column($id) {
        }

        // Pull Requests
        public function get_pull_requests($owner, $repo) {
        }
        public function get_single_pull_request($owner, $repo, $number) {
        }
        public function post_pull_request($owner, $repo) {
        }
        public function patch_pull_request($owner, $repo, $number) {
        }
        public function get_commits_on_pull_request($owner, $repo, $number) {
        }
        public function get_pull_requests_files($owner, $repo, $number) {
        }
        public function get_pull_request_if_merged($owner, $repo, $number) {
        }
        public function put_merge_pull_request($owner, $repo, $number) {
        }


        // Reviews
        public function get_request_review_list($owner, $repo, $number) {
        }
        public function get_single_review($owner, $repo, $number, $id) {
        }
        public function delete_pending_review($owner, $repo, $number, $id) {
        }
        public function get_single_review_comments($owner, $repo, $number, $id) {
        }
        public function post_request_review($owner, $repo, $number) {
        }
        // public function post_request_review( $owner, $repo, $number, $id ) {}
        public function delete_request_review($owner, $repo, $number, $id) {
        }

        // Review Comments
        public function get_request_comments_list($owner, $repo, $number) {
        }
        public function get_repo_comments_list($owner, $repo) {
        }
        // public function get_single_comment( $owner, $repo, $id ) {}
        // public function post_comment( $owner, $repo, $number ) {}
        // public function patch_comment( $owner, $repo, $id ) {}
        // public function delete_comment( $owner, $repo, $id ) {}
        // Review Requests
        public function get_review_requests_list($owner, $repo, $number) {
        }
        public function post_review_request($owner, $repo, $number) {
        }
        public function delete_review_request($owner, $repo, $number) {
        }

        // Reactions
        public function get_commit_comment_reaction_list($owner, $repo, $id) {
        }
        public function post_commit_comment_reaction($owner, $repo, $id) {
        }
        public function get_issue_reaction_list($owner, $repo, $number) {
        }
        public function post_issue_reaction($owner, $repo, $number) {
        }
        public function get_issue_comment_reactions_list($owner, $repo, $id) {
        }
        public function get_issue_comment_reaction($owner, $repo, $id) {
        }
        public function post_request_review_comment_reaction_list($owner, $repo, $id) {
        }
        public function get_request_review_comment_reaction($owner, $repo, $id) {
        }
        public function delete_reaction($id) {
        }

        // Repositories
        /**
         * Get_your_repo_list
         *
         * List repositories for the specified org.
         *
         * @param string $visibility  Can be one of all, public, or private. Default: all
         * @param string $affiliation Comma-separated list of values. Can include: owner: Repositories that are owned by the authenticated user. collaborator: Repositories that the user has been added to as a collaborator. organization_member: Repositories that the user has access to through being a member of an organization. This includes every repository on every team that the user is on. Default: owner,collaborator,organization_member
         * @param string $type        Can be one of all, owner, public, private, member. Default: all Will cause a 422 error if used in the same request as visibility or affiliation.
         * @param string $sort        Can be one of created, updated, pushed, full_name. Default: full_name
         * @param string $direction   Can be one of asc or desc. Default: when using full_name: asc; otherwise desc
         * @return array|string
         */
        public function get_your_repo_list($visibility = 'all', $affiliation = 'owner,collaborator,organization_member', $type = 'all', $sort = 'full_name', $direction = 'asc') {
            $args = array(
                'visibility' => $visibility,
                'affiliation' => $affiliation,
                'type' => $type,
                'sort' => $sort,
                'direction' => $direction
            );
            return $this->build_request('user/repos', $args)->fetch();
        }

        /**
         * Get_user_repo_list
         *
         * List public repositories for the specified user.
         *
         * @param string $username Github username
         * @param string $type Can be one of all, owner, member. Default: owner
         * @param string $sort Can be one of created, updated, pushed, full_name. Default: full_name
         * @param string $direction Can be one of asc or desc. Default: when using full_name: asc, otherwise desc
         * @return array|string
         */
        public function get_user_repo_list($username, $type = 'owner', $sort = 'full_name', $direction = 'asc') {
            $args = array(
                'type' => $type,
                'sort' => $sort,
                'direction' => $direction
            );
            return $this->build_request('users/' . $username . '/repos', $args)->fetch();
        }

        /**
         *
         * Get_org_repo_list
         *
         * List repositories for the specified org.
         *
         * @param string $org organization
         * @param string $type Can be one of all, public, private, forks, sources, member. Default: all
         * @return array|string
         */
        public function get_org_repo_list($org, $type = 'all') {
            $args = array(
                'type' => $type
            );
            return $this->build_request('orgs/' . $org . '/repos', $args)->fetch();
        }

        /**
         * Get_all_public_repo_list
         *
         * This provides a dump of every public repository, in the order that they were created.
         * Note: Pagination is powered exclusively by the since parameter. Use the Link header to get the URL for the next page of repositories.
         *
         * @param string $since
         * @return array|string
         */
        public function get_all_public_repo_list($since = '') {
            if ($since == '') {
                return $this->build_request('repositories')->fetch();
            } else {
                return $this->build_request('orgs/' . $org . '/repos')->fetch();
            }
        }

        /**
         * Create_repo
         *
         * Create a new repository for the authenticated user.
         *
         * @return Object
         */
        public function create_repo( ) {
            $args = array( );
            return $this->build_request('user/repos', $args, 'POST')->fetch();
        }

        /**
         * Create_org_repo
         *
         * Create a new repository in this organization. The authenticated user must be a member of the specified organization.
         *
         * @param string  $org                organization
         * @param string  $name               Required. The name of the repository.
         * @param string  $description         A short description of the repository.
         * @param string  $homepage           A URL with more information about the repository.
         * @param  boolean $private                Either true to create a private repository or false to create a public one. Creating private repositories requires a paid GitHub account. Default: false.
         * @param  boolean $has_issues         Either true to enable issues for this repository or false to disable them. Default: true.
         * @param  boolean $has_projects       Either true to enable projects for this repository or false to disable them. Default: true. Note: If you're creating a repository in an organization that has disabled repository projects, the default is false, and if you pass true, the API returns an error.
         * @param  boolean $has_wiki           Either true to enable the wiki for this repository or false to disable it. Default: true.
         * @param int     $team_id            The id of the team that will be granted access to this repository. This is only valid when creating a repository in an organization.
         * @param string  $auto_init               Pass true to create an initial commit with empty README. Default: false.
         * @param string  $gitignore_template Desired language or platform .gitignore template to apply. Use the name of the template without the extension. For example, "Haskell".
         * @param string  $license_template   Desired LICENSE template to apply. Use the name of the template without the extension. For example, "mit" or "mozilla".
         * @param  boolean $allow_squash_merge     Either true to allow squash-merging pull requests, or false to prevent squash-merging. Default: true
         * @param  boolean $allow_merge_commit Either true to allow merging pull requests with a merge commit, or false to prevent merging pull requests with merge commits. Default: true
         * @param  boolean $allow_rebase_merge     Either true to allow rebase-merging pull requests, or false to prevent rebase-merging. Default: true
         * @return Object                      [description]
         */
        public function create_org_repo($org, $name, $description = '', $homepage = '', $private = false, $has_issues = true, $has_projects = true, $has_wiki = true, $team_id, $auto_init = false, $gitignore_template, $license_template, $allow_squash_merge = true, $allow_merge_commit = true, $allow_rebase_merge = true) {
            $args = array(
                'name' => $name,
                'description' => $description,
                'homepage' => $homepage,
                'private' => $private,
                'has_issues' => $has_issues,
                'has_projects' => $has_projects,
                'has_wiki' => $has_wiki,
                'team_id' => $team_id,
                'auto_init' => $auto_init,
                'gitignore_template' => $gitignore_template,
                'license_template' => $license_template,
                'allow_squash_merge' => $allow_squash_merge,
                'allow_merge_commit' => $allow_merge_commit,
                'allow_rebase_merge' => $allow_rebase_merge
            );
            return $this->build_request('orgs/' . $org . '/repos', $args, 'POST')->fetch();
        }

        /**
         * Get_repo
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return array/list
         */
        public function get_repo($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo)->fetch();
        }

        /**
         * Edit_repo
         *
         * Edits specified repository
         *
         * @param string  $owner  The owner of the repository`
         * @param string  $repo   The specified repository
         * @param string  $name               Required. The name of the repository.
         * @param string  $description        A short description of the repository.
         * @param string  $homepage           A URL with more information about the repository.
         * @param  boolean $private             Either true to make the repository private or false to make it public. Creating private repositories requires a paid GitHub account. Default: false.
         * @param  boolean $has_issues         Either true to enable issues for this repository or false to disable them. Default: true.
         * @param  boolean $has_projects       Either true to enable projects for this repository or false to disable them. Default: true. Note: If you're creating a repository in an organization that has disabled repository projects, the default is false, and if you pass true, the API returns an error.
         * @param  boolean $has_wiki           Either true to enable the wiki for this repository or false to disable it. Default: true.
         * @param string  $default_branch     Updates the default branch for this repository.
         * @param  boolean $allow_squash_merge Either true to allow squash-merging pull requests, or false to prevent squash-merging. Default: true
         * @param  boolean $allow_merge_commit  Either true to allow merging pull requests with a merge commit, or false to prevent merging pull requests with merge commits. Default: true
         * @param  boolean $allow_rebase_merge Either true to allow rebase-merging pull requests, or false to prevent rebase-merging. Default: true
         * @return [type]                      [description]
         */
        public function edit_repo($owner, $repo, $name, $description = '', $homepage = '', $private = false, $has_issues = true, $has_projects = true, $has_wiki = true, $default_branch = '', $allow_squash_merge = true, $allow_merge_commit = true, $allow_rebase_merge = true) {
            $args = array(
                'name' => $name,
                'description' => $description,
                'homepage' => $homepage,
                'private' => $private,
                'has_issues' => $has_issues,
                'has_projects' => $has_projects,
                'has_wiki' => $has_wiki,
                'default_branch' => $default_branch,
                'allow_squash_merge' => $allow_squash_merge,
                'allow_merge_commit' => $allow_merge_commit,
                'allow_rebase_merge' => $allow_rebase_merge
            );
            return build_request('repos/' . $owner . '/' . $repo, $args, 'PATCH')->fetch();
        }

        /**
         * Get_all_repo_topics_list
         *
         * Gets all the repository topics for developers to see.
         *
         * @param string $owner  The owner of the repository
         * @param string $repo   The specified repository
         * @return array|string
         */
        public function get_all_repo_topics_list($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/topics')->fetch();
        }

        /**
         * Replace_all_repo_topics
         *
         * Replace all the repository topics that developers can see.
         *
         * @param string    $owner  The owner of the repository`
         * @param string    $repo   The specified repository
         * @param string [] $names Required. An array of topics to add to the repository. Pass one or more topics to replace the set of existing topics. Send an empty array ([]) to clear all topics from the repository.
         * @return [type]
         */
        public function replace_all_repo_topics($owner, $repo, $names) {
            $args = array(
                'names' => $names
            );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/topics', $args, 'PUT');
        }

        /**
         * Get_repo_contributor_list
         *
         * List contributors to the specified repository, sorted by the number of commits per contributor in descending order.
         *
         * @param string $owner  The owner of the repository
         * @param string $repo   The specified repository
         * @return array|string
         */
        public function get_repo_contributor_list($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/contributors')->fetch();
        }

        /**
         * Get_language_repo_list
         *
         * List languages for the specified repository. The value on the right of a language is the number of bytes of code written in that language.
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_language_repo_list($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/languages')->fetch();
        }

        /**
         * Get_repo_team_list
         *
         * List the teams and the repos
         *
         * @param string $owner  The owner of the repository
         * @param string $repo   The specified repository
         * @return array|string
         */
        public function get_repo_team_list($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/teams')->fetch();
        }

        /**
         * Get_repo_tag_list
         *
         * List of tags that are connected to the repository
         *
         * @param string $owner  The owner of the repository`
         * @param string $repo   The specified repository
         * @return array|string
         */
        public function get_repo_tag_list($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/tags')->fetch();
        }

        /**
         * Delete_repo
         *
         * Deleting a repository requires admin access. If OAuth is used, the delete_repo scope is required.
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @return Object
         */
        public function delete_repo($owner, $repo) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo, $args, 'DELETE')->fetch();
        }

        // Branches
        /**
         * Get_branch_list
         *
         * List branches for that are connected to the repository
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @param  bool   $protected  Set to true to only return protected branches
         * @return array|string
         */
        public function get_branch_list($owner, $repo, $protcted = false) {
            $args = array(
                'protected' => $protected
            );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches', $args)->fetch();
        }

        /**
         * Get_branch
         *
         * Get specific branch that is connected to the repository
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch The specic branch that is connected to the repository
         * @return array|string
         */
        public function get_branch($owner, $repo, $branch) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch)->fetch();
        }

        /**
         * Get_branch_protection
         *
         * Get specific branch that is protected in the repository
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch  The specific branch that is connected to the repository
         * @return array|string
         */
        public function get_branch_protection($owner, $repo, $branch) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection')->fetch();
        }

        /**
         * Update_branch_protection
         *
         * TODO: Need to finish this one
         *
         * Protecting a branch requires admin access.
         *
         * @param string $owner                  The owner of the repository
         * @param string $repo                   The specified repository
         * @param string $branch                 The specific branch that is connected to the repository
         * @param  array  $required_status_checks
         * @param  array  $enforce_admins
         * @param  array  $restrictions
         * @return Object
         */
        public function update_branch_protection($owner, $repo, $branch, $required_status_checks = null, $enforce_admins = null, $restrictions = null) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection', $args, 'PUT')->fetch();
        }

        /**
         * Delete_branch_protection
         *
         * Deletes the protection on a branch
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch The specific branch that is connected to the repostiory
         * @return
         */
        public function delete_branch_protection($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection', $args, 'DELETE')->fetch();
        }

        /**
         * Get_protected_branch_req_status
         *
         * list the required status checks of the specific protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repostiory
         * @param string $branch The specific branch that is connected to the repository
         * @return array|string
         */
        public function get_protected_branch_req_status($owner, $repo, $branch) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks')->fetch();
        }

        /**
         * Update_protected_branch_req_status
         *
         * Updating required status checks requires admin access and branch protection to be enabled.
         *
         * @param string $owner The owner of the respository
         * @param string $repo  The specified repository
         * @param string $branch  The specific branch that is connected to the repository
         * @param  bool   $strict   Require branches to be up to date before merging.
         * @param array  $contexts  The list of status checks to require in order to merge into this branch
         * @return
         */
        public function update_protected_branch_req_status($owner, $repo, $branch, $strict, $contexts) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks', $args, 'PATCH')->fetch();
        }

        /**
         * Delete_protected_branch_req_status
         *
         * Deletes required status checks of protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch The specific branch that is connected to the repository
         * @return
         */
        public function delete_protected_branch_req_status($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks', $args, 'DELETE')->fetch();
        }

        /**
         * Get_protected_branch_req_status_context_list
         *
         * List required status checks contexts of protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repostiory
         * @param string $branch The specific branch that is connected to the repository
         * @return array|string
         */
        public function get_protected_branch_req_status_context_list($owner, $repo, $branch) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks/contexts')->fetch();
        }

        /**
         * Replace_protected_branch_req_status_context
         *
         * Replaces required status checks contexts of protected branch
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch  The specific branch that is connected to the repository
         * @return Object
         */
        public function replace_protected_branch_req_status_context($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks/contexts', $args, 'PUT')->fetch();
        }

        /**
         * Add_protected_branch_req_status_context
         *
         * Adds required status checks contexts of protected branch
         *
         * @param string $owner  The owner of the respository
         * @param string $repo  The specified repostiory
         * @param string $branch  The specific branch that is connected to the repostiory
         * @return
         */
        public function add_protected_branch_req_status_context($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks/contexts', $args, 'POST')->fetch();
        }

        /**
         * Delete_protected_branch_req_status_context
         *
         * Deletes required status checks contexts of protected branch
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch The specific branch that is connected to the repostiory
         * @return
         */
        public function delete_protected_branch_req_status_context($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_status_checks/contexts', $args, 'DELETE')->fetch();
        }

        /**
         * Get_protected_branch__req_review_enforce
         *
         * Get pull request review enforcement of protected branch
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch  The specific branch that is connected to the repository
         * @return array|string
         */
        public function get_protected_branch__req_review_enforce($owner, $repo, $branch) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_pull_request_reviews')->fetch();
        }

        /**
         * Update_protected_branch__req_review_enforce
         *
         * TODO: Must comeback and finish
         *
         * @param string $owner
         * @param string $repo
         * @param string $branch
         * @return
         */
        public function update_protected_branch__req_review_enforce($owner, $repo, $branch) {
            $args = array(
                'method' => 'PATCH'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_pull_request_reviews/context');
        }

        /**
         * Delete_protected_branch__req_review_enforce
         *
         * Deletes pull request review enforcement of protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo The specified repository
         * @param string $branch The specific branch that is connected to the repository
         * @return Object
         */
        public function delete_protected_branch__req_review_enforce($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/required_pull_request_reviews', $args, 'DELETE')->fetch();
        }

        /**
         * Get_protected_branch_admin_enforce
         * Get admin enforcement of protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repostiory
         * @param string $branch The speific branch that is connected to the repository
         * @return array|string
         */
        public function get_protected_branch_admin_enforce($owner, $repo, $branch) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/enforce_admins')->fetch();
        }

        /**
         * Add_protected_branch_admin_enforce
         *
         * Adding admin enforcement requires admin access and branch protection to be enabled.
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch  The specific branch that is connected to the repostiory
         * @return
         */
        public function add_protected_branch_admin_enforce($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/enforce_admins', $args, 'POST')->fetch();
        }

        /**
         * Delete_protected_branch_admin_enforce
         *
         * Deleting admin enforcement requires admin access and branch protection to be enabled.
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch  The specific branch that is connected to the repository
         * @return Object
         */
        public function delete_protected_branch_admin_enforce($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/enforce_admins', $args, 'DELETE')->fetch();
        }

        /**
         * Get_protected_branch_restrictions
         *
         * Get restrictions of protected branch
         * Teams and users restrictions are only available for organization-owned repositories.
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch  The specific branch that is connected to the repository
         * @return array|string
         */
        public function get_protected_branch_restrictions($owner, $repo, $branch) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions')->fetch();
        }

        /**
         * Delete_protected_branch_restrictions
         *
         * Deletes restrictions of protected branch
         *
         * @param string $owner  The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch  The specific branch that is conencted to the repository
         * @return
         */
        public function delete_protected_branch_restrictions($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions', $args, 'DELETE')->fetch();
        }

        /**
         * Get_protected_branch_team_restrictions_list
         *
         * List team restrictions of protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch  The specific branch that is connected to the repository
         * @return array|string
         */
        public function get_protected_branch_team_restrictions_list($owner, $repo, $branch) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/teams')->fetch();
        }

        /**
         * Replace_protected_branch_team_restrictions
         *
         * Replace team restrictions of protected branch
         *
         * @param string $owner  The owner of the repository
         * @param string $repo   The specified repository
         * @param string $branch The specific branch that is connected to the repository
         * @return
         */
        public function replace_protected_branch_team_restrictions($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/teams', $args, 'PUT')->fetch();
        }

        /**
         * Add_protected_branch_team_restrictions
         *
         * Adds team restrictions of protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repostiory
         * @param string $branch The specific branch that is connected to the repository
         * @return
         */
        public function add_protected_branch_team_restrictions($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/teams', $args, 'POST')->fetch();
        }

        /**
         * Delete_protected_branch_team_restrictions
         *
         * Delete team restrictions of protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch The specific branch that is connected to the repository
         * @return Object
         */
        public function delete_protected_branch_team_restrictions($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/teams', $args, 'DELETE')->fetch();
        }

        /**
         * Get_protected_branch_user_restrictions_list
         *
         * List user restrictions of protected branch
         *
         * @param string $owner  The owner of the repository
         * @param string $repo   The specified repository
         * @param string $branch The specific branch that is connected to the repository
         * @return array|string
         */
        public function get_protected_branch_user_restrictions_list($owner, $repo, $branch) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/users')->fetch();
        }

        /**
         * Replace_protected_branch_user_restrictions
         *
         * Replace user restrictions of protected branch
         *
         * @param string $owner  The owner of the repository
         * @param string $repo   The specified repository
         * @param string $branch The specific branch that is connected to the repository
         * @return
         */
        public function replace_protected_branch_user_restrictions($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/users', $args, 'PUT')->fetch();
        }

        /**
         * Add_protected_branch_user_restrictions
         *
         * Adds user restrictions of protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch The specific branch that is connected to the repository
         * @return
         */
        public function add_protected_branch_user_restrictions($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/users', $args, 'POST')->fetch();
        }

        /**
         * Delete_protected_branch_user_restrictions
         *
         * Deletes user restrictions of protected branch
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $branch The specific branch that is connected to the repository
         * @return Object
         */
        public function delete_protected_branch_user_restrictions($owner, $repo, $branch) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/branches/' . $branch . '/protection/restrictions/users', $args, 'DELETE')->fetch();
        }

        // Repo Collaborators
        /**
         * Get_repo_collaborator_list
         *
         *List collaborators
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_collaborator_list($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/collaborators')->fetch();
        }

        /**
         * Get_repo_collaborator_user
         *
         * Check if a user is a collaborator
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $username
         * @return array|string
         */
        public function get_repo_collaborator_user($owner, $repo, $username) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/collaborators/' . $username)->fetch();
        }

        /**
         * Get_repo_collaborator_user_permission_level
         *
         * Review a user's permission level
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $username
         * @return array|string
         */
        public function get_repo_collaborator_user_permission_level($owner, $repo, $username) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/collaborators/' . $username . '/permission')->fetch();
        }

        /**
         * Add_repo_collaborator_user
         *
         * Add user as a collaborator
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $username
         * @return
         */
        public function add_repo_collaborator_user($owner, $repo, $username) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/collaborators/' . $username, $args, 'PUT')->fetch();
        }

        /**
         * Delete_repo_collaborator_user
         *
         * DElete user as a collaborator
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $username
         * @return array
         */
        public function delete_repo_collaborator_user($owner, $repo, $username) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/collaborators/' . $username, $args, 'DELETE')->fetch();
        }

        // Repo Comments
        /**
         * Get_repo_comment_commit_list
         *
         * Commit Comments use these custom media types. You can read more about the use of media types in the API here.
				 * Comments are ordered by ascending ID.
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_comment_commit_list($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/comments')->fetch();
        }

        /**
         * Get_repo_single_commit_comment_list
         *
         * List comments for a single comment
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $ref
         * @return array|string
         */
        public function get_repo_single_commit_comment_list($owner, $repo, $ref) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/commits/' . $ref . '/comments')->fetch();
        }

        /**
         * Create_repo_comment_commit
         *
         * Create a commit comment
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $sha
         * @return array
         */
        public function create_repo_comment_commit($owner, $repo, $sha) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/commits/' . $sha . '/comments', $args, 'POST')->fetch();
        }

        /**
         * Get_repo_single_commit_comment
         *
         * Get a single commit comment
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return array|string
         */
        public function get_repo_single_commit_comment($owner, $repo, $id) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/comments/' . $id)->fetch();
        }

        /**
         * Update_repo_comment_commit
         *
         * Update a commit comment
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function update_repo_comment_commit($owner, $repo, $id) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/comments/' . $id, $args, 'PATCH')->fetch();
        }

        /**
         * Delete_repo_comment_commit
         *
         * Delete a commit comment
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function delete_repo_comment_commit($owner, $repo, $id) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/comments/' . $id, $args, 'DELETE')->fetch();
        }

        // Repo commit
        /**
         * Get_repo_commit_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_commit_list($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/commits')->fetch();
        }

        /**
         * Get_repo_single_commit
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $sha
         * @return array|string
         */
        public function get_repo_single_commit($owner, $repo, $sha) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/commits/' . $sha)->fetch();
        }

        /**
         * Get_repo_sha_1_commit_reference
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $ref
         * @return array|string
         */
        public function get_repo_sha_1_commit_reference($owner, $repo, $ref) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/commits/' . $ref)->fetch();
        }

        /**
         * Get_two_commits
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $base
         * @param string $head
         * @return array|string
         */
        public function get_two_commits($owner, $repo, $base, $head) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/commits/' . $base . '...' . $head)->fetch();
        }

        /**
         * Get_repo_verification_signature_commit
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $sha
         * @return array|string
         */
        public function get_repo_verification_signature_commit($owner, $repo, $sha) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/commits/' . $sha)->fetch();
        }

        // Repo Community Profile
        /**
         * Get_repo_metrics_profile_commun
         *
         * @param string $owner The owner of the repository
         * @param string $name
         * @return array|string
         */
        public function get_repo_metrics_profile_commun($owner, $name) {
            return $this->build_request('repos/' . $owner . '/' . $name . '/community/profile')->fetch();
        }

        // Repo Contents
        /**
         * Get_repo_readme
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_readme($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/readme')->fetch();
        }

        /**
         * Get_repo_contents
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $path
         * @return array|string
         */
        public function get_repo_contents($owner, $repo, $path) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/contents/' . $path)->fetch();
        }

        /**
         * Create_repo_file
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $path
         * @return
         */
        public function create_repo_file($owner, $repo, $path) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/contents/' . $path, $args, 'PUT')->fetch();

        }
        /**
         * Update_repo_file
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $path
         * @return
         */
        public function update_repo_file($owner, $repo, $path) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/contents/' . $path, $args, 'PUT')->fetch();
        }

        /**
         * Delete_repo_file
         *
         * TODO: need to finish
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $path
         * @return
         */
        public function delete_repo_file($owner, $repo, $path) {
            $args = array(
                'path' => '',
                'message' => '',
                'sha' => '',
                'branch' => ''
            );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/contents/' . $path, $args, 'DELETE')->fetch();
        }

        /**
         * Get_repo_archive_link
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $archive_format
         * @param string $ref
         * @return array|string
         */
        public function get_repo_archive_link($owner, $repo, $archive_format, $ref) {
            $args = array(
                'archive_format' => 'tarall',
                'ref' => 'master'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . $archive_format . '/' . $ref);
        }

        // Repo Deploy Keys
        /**
         * Get_repo_deploy_key_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_deploy_key_list($owner, $repo) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/keys')->fetch();
        }

        /**
         * Get_repo_deploy_key
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return array|string
         */
        public function get_repo_deploy_key($owner, $repo, $id) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/keys/' . $id)->fetch();
        }

        /**
         * Add_repo_deploy_key
         *
         * TODO: need to finish
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return
         */
        public function add_repo_deploy_key($owner, $repo) {
            $args = array(
                'title' => '',
                'key' => '',
                'read_only' => '' // boolean
            );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/keys', $args, 'POST')->fetch();
        }

        /**
         * Edit_repo_deploy_key
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function edit_repo_deploy_key($owner, $repo, $id) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/keys', $args, '')->fetch();
        }

        /**
         * Delete_repo_deploy_key
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function delete_repo_deploy_key($owner, $repo, $id) {
            $args = array( );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/keys/' . $id, $args, 'DELETE')->fetch();
        }

        // Repo Deployments
        /**
         * Get_repo_deploy_list
         *
         * TODO: need to finish
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_deploy_list($owner, $repo) {
            $args = array(
                'sha' => '',
                'ref' => '',
                'task' => '',
                'enviroment' => ''
            );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/deployments', $args)->fetch();
        }

        /**
         * Get_single_repo_deploy
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $deployment_id
         * @return array|string
         */
        public function get_single_repo_deploy($owner, $repo, $deployment_id) {
            return $this->build_request('repos/' . $owner . '/' . $repo . '/deployments/' . $deployment_id)->fetch();
        }

        /**
         * Create_repo_deploy
         *
         * TODO: need to finish
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return
         */
        public function create_repo_deploy($owner, $repo) {
            $args = array(
                'ref' => '',
                'task' => 'deploy',
                'auto_merge' => 'true',
                'required_contexts' => '',
                'paylod' => '',
                'environment' => 'production',
                'description' => '',
                'transient_environment' => 'false',
                'production_environment' => 'true'
            );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/deployments', $args, 'POST')->fetch();
        }

        /**
         * Get_repo_deploy_status_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return array|string
         */
        public function get_repo_deploy_status_list($owner, $repo, $id) {
            $args = array(
                'id' => $id // int
            );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/deployments/' . $id . '/statuses', $args)->fetch();
        }

        /**
         * Get_repo_single_deploy_status
         *
         * TODO: need to finish
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @param string $status_id
         * @return array|string
         */
        public function get_repo_single_deploy_status($owner, $repo, $id, $status_id) {
            $args = array(
                'id' => '', // int
                'status_id' => '' // integar
            );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/deployments/' . $id . '/statuses/' . $status_id, $args)->fetch();
        }

        /**
         * Create_repo_deploy_status
         *
         * TODO: need to finish
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function create_repo_deploy_status($owner, $repo, $id) {
            $args = array(
                'state' => '',
                'target_url' => '',
                'log_url' => '',
                'description' => '',
                'environment_url' => '',
                'auto_inactive' => 'true'
            );
            return $this->build_request('repos/' . $owner . '/' . $repo . '/deployments/' . $id . '/statuses', $args, 'POST')->fetch();
        }

        // Repo Downloads
        /**
         * Get_repo_download_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_download_list($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/downloads');
        }

        /**
         * Get_single_repo_download
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return array|string
         */
        public function get_single_repo_download($owner, $repo, $id) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/downloads/' . $id);
        }

        /**
         * Delete_repo_download
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function delete_repo_download($owner, $repo, $id) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/downloads/' . $id);
        }

        // Repo Forks
        /**
         * Get_repo_fork_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_fork_list($owner, $repo) {
            $args = array(
                'sort' => 'newest'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/forks');
        }

        /**
         * Create_repo_fork
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return
         */
        public function create_repo_fork($owner, $repo) {
            $args = array(
                'method' => 'POST',
                'organization' => ''
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/forks');
        }

        // Repo Invitations
        /**
         * Get_repo_invite_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_invite_list($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/invitations');
        }

        /**
         * Delete_repo_invite
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $invitation_id
         * @return
         */
        public function delete_repo_invite($owner, $repo, $invitation_id) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/invitations/' . $invitation_id);
        }

        /**
         * Update_repo_invite
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $invitation_id
         * @return
         */
        public function update_repo_invite($owner, $repo, $invitation_id) {
            $args = array(
                'method' => 'PATCH',
                'permissions' => ''
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/invitations/' . $invitation_id);
        }

        /**
         * Get_repo_user_invite_list
         *
         * @return array|string
         */
        public function get_repo_user_invite_list( ) {
            return $this->build_request()->fetch('/user/repository_invitations');
        }

        /**
         * Accept_repo_invite
         *
         * @param int $invitation_id
         * @return
         */
        public function accept_repo_invite($invitation_id) {
            $args = array(
                'method' => 'PATCH'
            );
            return $this->build_request($args)->fetch('/user/repository_invitations/' . $invitation_id);
        }

        /**
         * Delete_repo_invite
         *
         * @param int $invitation_id
         * @return
         */
        public function decline_repo_invite($invitation_id) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('/user/repository_invitations/' . $invitation_id);
        }

        // Repo Merging
        /**
         * Perform_repo_merge
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return
         */
        public function perform_repo_merge($owner, $repo) {
            $args = array(
                'method' => 'POST',
                'base' => '',
                'head' => '',
                'commit_message' => ''
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/merges');
        }

        // Repo Pages
        /**
         * Get_repo_page_site_info
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_page_site_info($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/pages');
        }

        /**
         * Request_repo_page_build
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return
         */
        public function request_repo_page_build($owner, $repo) {
            $args = array(
                'method' => 'POST'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/pages/builds');
        }

        /**
         * Get_repo_page_build_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_page_build_list($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/pages/builds');
        }

        /**
         * Get_repo_latest_page_build_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_latest_page_build_list($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/pages/builds/latest');
        }

        /**
         * Get_repo_specific_page_build_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return array|string
         */
        public function get_repo_specific_page_build_list($owner, $repo, $id) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/pages/builds/' . $id);
        }

        // Repo releases
        /**
         * Get_repo_release_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_release_list($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/releases');
        }

        /**
         * Get_repo_single_release
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return array|string
         */
        public function get_repo_single_release($owner, $repo, $id) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/releases/' . $id);
        }

        /**
         * Get_repo_latest_release
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_latest_release($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/releases/latest');
        }

        /**
         * Get_repo_release_tag_name
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $tag
         * @return array|string
         */
        public function get_repo_release_tag_name($owner, $repo, $tag) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/releases/tags/' . $tag);
        }

        /**
         * Create_repo_release
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return
         */
        public function create_repo_release($owner, $repo) {
            $args = array(
                'method' => 'POST',
                'tag_name' => '',
                'target_commitish' => 'master',
                'name' => '',
                'body' => '',
                'draft' => 'false',
                'prerelease' => 'false'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/releases');
        }

        /**
         * Edit_repo_release
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function edit_repo_release($owner, $repo, $id) {
            $args = array(
                'method' => 'PATCH',
                'tag_name' => '',
                'target_commitish' => 'master',
                'name' => '',
                'body' => '',
                'draft' => 'false',
                'prerelease' => 'false'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/releases/' . $id);
        }

        /**
         * Delete_repo_release
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function delete_repo_release($owner, $repo, $id) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/releases/' . $id);
        }

        /**
         * Get_repo_release_as_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return array|string
         */
        public function get_repo_release_asset_list($owner, $repo, $id) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/releases/' . $id . '/assets');
        }

        /**
         * Update_repo_release_as
         *
         * @param string $owner The owner of the repository
         * @param int    $id
         * @return
         */
        public function update_repo_release_asset($owner, $id) {
            $args = array(
                'method' => 'POST',
                'Content-Type' => '',
                'name' => '',
                'label' => ''
            );
            // return $this->build_request($args)->fetch( 'repos/' . $owner . '/' . $repo . '/releases' );
        }

        /**
         * Get_repo_release_single_asset
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return array|string
         */
        public function get_repo_release_single_asset($owner, $repo, $id) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/releases/assets/' . $id);
        }

        /**
         * Edit_repo_release_asset
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function edit_repo_release_asset($owner, $repo, $id) {
            $args = array(
                'method' => 'PATCH',
                'name' => '',
                'label' => ''
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/releases/assets/' . $id);
        }

        /**
         * Delete_repo_release_asset
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function delete_repo_release_asset($owner, $repo, $id) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/releases/assets/' . $id);
        }

        // Repo Statistics
        /**
         * Get_repo_delete_commit_count_contributors
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_delete_commit_count_contributors($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/stats/contributors');
        }

        /**
         * Get_repo_commit_activity_data_last_year
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_commit_activity_data_last_year($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/stats/commit_activity');
        }

        /**
         * Get_number_delete_week
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_number_delete_week($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/stats/code_frequency');
        }

        /**
         * Get_repo_commit_count_weekly
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_commit_count_weekly($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/stats/participation');
        }

        /**
         * Get_number_commit_hour_day
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_number_commit_hour_day($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/stats/punch_card');
        }

        // Repo Status
        /**
         * Create_repo_status
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $sha
         * @return
         */
        public function create_repo_status($owner, $repo, $sha) {
            $args = array(
                'method' => 'POST',
                'state' => '',
                'target_url' => '',
                'description' => '',
                'context' => 'default'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/statuses/' . $sha);
        }

        /**
         * Get_repo_specific_ref_status_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $ref
         * @return array|string
         */
        public function get_repo_specific_ref_status_list($owner, $repo, $ref) {
            $args = array(
                'ref' => ''
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/commits/' . $ref . '/statuses');
        }

        /**
         * Get_repo_specific_ref_combined_status
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $ref
         * @return array|string
         */
        public function get_repo_specific_ref_combined_status($owner, $repo, $ref) {
            $args = array(
                'ref' => ''
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/commits/' . $ref . '/status');
        }

        // Repo traffic
        /**
         * Get_repo_referrers_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_referrers_list($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/traffic/popular/referrers');
        }

        /**
         * Get_repo_path_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_path_list($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/traffic/popular/paths');
        }

        /**
         * Get_repo_views
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_views($owner, $repo) {
            $args = array(
                'per' => 'day'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/traffic/views');
        }

        /**
         * Get_repo_clone
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_clone($owner, $repo) {
            $args = array(
                'per' => 'day'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/traffic/clones');
        }

        // Repo Webhooks
        /**
         * Get_repo_hook_list
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return array|string
         */
        public function get_repo_hook_list($owner, $repo) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/hooks');
        }

        /**
         * Get_repo_single_hook
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return array|string
         */
        public function get_repo_single_hook($owner, $repo, $id) {
            return $this->build_request()->fetch('repos/' . $owner . '/' . $repo . '/hooks/' . $id);
        }

        /**
         * Create_repo_hook
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @return
         */
        public function create_repo_hook($owner, $repo) {
            $args = array(
                'method' => 'POST',
                'name' => '',
                'config' => '',
                'events' => 'push',
                'active' => '' // bool
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/hooks');
        }

        /**
         * Edit_repo_hook
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function edit_repo_hook($owner, $repo, $id) {
            $args = array(
                'method' => 'PATCH',
                'config' => '', // Object
                'events' => 'push',
                'add_events' => '', // Array
                'remove_events' => '', // Array
                'active' => '' // bool
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/hooks/' . $id);
        }

        /**
         * Test_repo_hook
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function test_repo_hook($owner, $repo, $id) {
            $args = array(
                'method' => 'POST'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/hooks/' . $id . '/tests');
        }

        /**
         * Ping_repo_hook
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function ping_repo_hook($owner, $repo, $id) {
            $args = array(
                'method' => 'POST'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/hooks/' . $id . '/pings');
        }

        /**
         * Delete_repo_hook
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param int    $id
         * @return
         */
        public function delete_repo_hook($owner, $repo, $id) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('repos/' . $owner . '/' . $repo . '/hooks/' . $id);
        }
        /**
         * Pub_sub_hub_bub
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param   $event
         * @return
         */
        public function pub_sub_hub_bub($owner, $repo, $event) {
            $args = array(
                'method' => 'POST',
                'hub.mode' => '',
                'hub.topic' => '',
                'hub.callback' => '',
                'hub.secret' => ''
            );
            return $this->build_request($args)->fetch('hub');
        }

        public function response_format($owner, $repo) {
        }

        // Search
        /**
         * Get_search_repo
         *
         * @return array|string
         */
        public function get_search_repo( ) {
            $args = array(
                'q' => '',
                'sort' => '',
                'order' => 'desc'
            );
            return $this->build_request($args)->fetch('search/repositories');
        }

        /**
         * Get_search_commit
         *
         * @return array|string
         */
        public function get_search_commit( ) {
            $args = array(
                'q' => '',
                'sort' => '',
                'order' => 'desc'
            );
            return $this->build_request($args)->fetch('search/commits');
        }

        /**
         * Get_search_code
         *
         * @return array|string
         */
        public function get_search_code( ) {
            $args = array(
                'q' => '',
                'sort' => '',
                'order' => 'desc'
            );
            return $this->build_request($args)->fetch('search/code');
        }

        /**
         * Get_search_issues
         *
         * @return array|string
         */
        public function get_search_issues( ) {
            $args = array(
                'q' => '',
                'sort' => '',
                'order' => 'desc'
            );
            return $this->build_request($args)->fetch('search/issues');
        }

        /**
         * Get_search_users
         *
         * @return array|string
         */
        public function get_search_users( ) {
            $args = array(
                'q' => '',
                'sort' => '',
                'order' => 'desc'
            );
            return $this->build_request($args)->fetch('search/users');
        }

        /**
         * Text_match_metadata
         *
         * @return array|string
         */
        public function text_match_metadata( ) {
            $args = array(
                'object_url' => '',
                'object_type' => '',
                'property' => '',
                'fragment' => '',
                'matches' => ''
            );
            return $this->build_request($args)->fetch('search/issues');
        }

        // Legacy Search
        /**
         * Get_legacy_search_issues
         *
         * @param string $owner The owner of the repository
         * @param string $repo  The specified repository
         * @param string $state
         * @param string $keyword
         * @return array|string
         */
        public function get_legacy_search_issues($owner, $repo, $state, $keyword) {
            $args = array(
                'state' => '',
                'keyword' => ''
            );
            return $this->build_request($args)->fetch('legacy/issues/search/' . $owner . '/' . $repo . '/' . $state . '/' . $keyword);
        }

        /**
         * Get_legacy_search_repo
         *
         * @param string $keyword
         * @return array|string
         */
        public function get_legacy_search_repo($keyword) {
            $args = array(
                'keyword' => '',
                'language' => '',
                'start_page' => '',
                'sort' => '',
                'order' => ''
            );
            return $this->build_request($args)->fetch('legacy/repos/search/' . $keyword);
        }

        /**
         * Get_legacy_search_user
         *
         * @param string $keyword
         * @return array|string
         */
        public function get_legacy_search_user($keyword) {
            $args = array(
                'keyword' => '',
                'start_page' => '',
                'sort' => '',
                'order' => ''
            );
            return $this->build_request($args)->fetch('legacy/user/search/' . $keyword);
        }

        /**
         * Get_legacy_search_email
         *
         * @param string $email
         * @return array|string
         */
        public function get_legacy_search_email($email) {
            $args = array(
                'email' => ''
            );
            return $this->build_request($args)->fetch('legacy/user/email/' . $email);
        }

        // SCIM
        /**
         * Get_scim_supported_user_attributes
         *
         * @param string $org
         * @param int    $id
         * @return array|string
         */
        public function get_scim_supported_user_attributes($org, $id) {
            $args = array(
                'userName' => '',
                'name.givenName' => '',
                'name.lastName' => '',
                'emails' => '', // Array
                'externalId' => '',
                'id' => '',
                'active' => '' // bool
            );
            return $this->build_request($args)->fetch('scim/v2/organizations/' . $org . '/Users/' . $id);
        }

        /**
         * Get_scim_provisioned_identities_list
         *
         * @param string $organization
         * @return array|string
         */
        public function get_scim_provisioned_identities_list($org) {
            $args = array(
                'startIndex' => '', // int
                'count' => '', // int
                'filter' => 'eq'
            );
            return $this->build_request($args)->fetch('scim/v2/organizations/' . $org . '/Users');
        }

        /**
         * Get_scim_single_user_provision_details
         *
         * @param string $org
         * @param int    $id
         * @return array|string
         */
        public function get_scim_single_user_provision_details($org, $id) {
            return $this->build_request()->fetch('scim/v2/organizations/' . $org . '/Users/' . $id);
        }

        /**
         * Send_scim_user_invite_provision
         *
         * @param string $org
         * @return
         */
        public function send_scim_user_invite_provision($org) {
            $args = array(
                'method' => 'POST'
            );
            return $this->build_request($args)->fetch('/scim/v2/organizations/' . $org . '/Users');
        }

        /**
         * Update_scim_memembership_org_provision
         *
         * @param string $org
         * @param int    $id
         * @return string
         */
        public function update_scim_memembership_org_provision($org, $id) {
            return $this->build_request()->fetch('/scim/v2/organizations/' . $org . '/Users/' . $id);
        }

        /**
         * Update_scim_user_attribute
         *
         * @param string $org
         * @param int    $id
         * @return
         */
        public function update_scim_user_attribute($org, $id) {
            $args = array(
                'method' => 'PATCH'
            );
            return $this->build_request($args)->fetch('/scim/v2/organizations/' . $org . '/Users/' . $id);
        }

        /**
         * Delete_scim_org_user
         *
         * @param string $org
         * @param int    $id
         * @return
         */
        public function delete_scim_org_user($org, $id) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('/scim/v2/organizations/' . $org . '/Users/' . $id);
        }

        // Users
        /**
         * Get_single_user
         *
         * @param string $username
         * @return array|string
         */
        public function get_single_user($username) {
            return $this->build_request()->fetch('users/' . $username);
        }

        /**
         * Get_authenticated_user
         *
         * @return array|string
         */
        public function get_authenticated_user( ) {
            return $this->build_request()->fetch('user');
        }

        /**
         * Update_authenticated_user
         *
         * @return
         */
        public function update_authenticated_user( ) {
            $args = array(
                'method' => 'PATCH',
                'name' => '',
                'email' => '',
                'blog' => '',
                'company' => '',
                'location' => '',
                'hireable' => '', // bool
                'bio' => ''
            );
            return $this->build_request($args)->fetch('user');
        }

        /**
         * Get_all_users
         *
         * @return array|string
         */
        public function get_all_users( ) {
            $args = array(
                'since' => ''
            );
            return $this->build_request($args)->fetch('users');
        }

        // User emails
        /**
         * Get_user_email_ress_list
         *
         * @return array|string
         */
        public function get_user_email_address_list( ) {
            return $this->build_request()->fetch('user/emails');
        }

        /**
         * Get_user_public_email_address_list
         *
         * @return array|string
         */
        public function get_user_public_email_address_list( ) {
            return $this->build_request()->fetch('user/public_emails');
        }

        /**
         * Add_user_email_address
         *
         * @return
         */
        public function add_user_email_address( ) {
            $args = array(
                'method' => 'POST'
            );
            return $this->build_request($args)->fetch('user/emails');
        }

        /**
         * Delete_user_email_address
         *
         * @return
         */
        public function delete_user_email_address( ) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('user/emails');
        }

        /**
         * Toggle_user_primary_email_visibiltiy
         *
         * @return
         */
        public function toggle_user_primary_email_visibiltiy( ) {
            $args = array(
                'method' => 'PATCH'
            );
            return $this->build_request($args)->fetch('user/email/visibility');
        }

        // User Followers
        /**
         * Get_user_follower_list
         *
         * @param string $username
         * @return array|string
         */
        public function get_user_follower_list($username) {
            return $this->build_request()->fetch('users/' . $username . '/followers');
        }

        /**
         * Get_user_follow_user_list
         *
         * @param string $username
         * @return array|string
         */
        public function get_user_follow_user_list($username) {
            return $this->build_request()->fetch('user/followers');
        }

        /**
         * Get_user_follow_personal_user
         *
         * @param string $username
         * @return array|string
         */
        public function get_user_follow_personal_user($username) {
            return $this->build_request()->fetch('user/following/' . $username);
        }

        /**
         * Get_user_follows_user
         *
         * @param string $username
         * @param string $target_user
         * @return array|string
         */
        public function get_user_follows_user($username, $target_user) {
            return $this->build_request()->fetch('users/' . $username . '/following/' . $target_user);
        }

        /**
         * User_follow
         *
         * @param string $username
         * @return
         */
        public function user_follow($username) {
            $args = array(
                'method' => 'PUT'
            );
            return $this->build_request($args)->fetch('user/following/' . $username);
        }

        /**
         * Delete_user_follow
         *
         * @param string $username
         * @return
         */
        public function delete_user_follow($username) {
            return $this->build_request()->fetch('user/following/' . $username);
        }

        // User Git SSH Keys
        /**
         * Get_user_public_key_list
         *
         * @param string $username
         * @return array|string
         */
        public function get_user_public_key_list($username) {
            return $this->build_request()->fetch('users/' . $username . '/keys');
        }

        /**
         * Get_personal_public_key_list
         *
         * @return array|string
         */
        public function get_personal_public_key_list( ) {
            return $this->build_request()->fetch('user/keys');
        }

        /**
         * Get_user_single_public_key
         *
         * @param int $id
         * @return array|string
         */
        public function get_user_single_public_key($id) {
            return $this->build_request()->fetch('user/keys/' . $id);
        }

        /**
         * Create_user_public_key
         *
         * @return
         */
        public function create_user_public_key( ) {
            $args = array(
                'method' => 'POST'
            );
            return $this->build_request($args)->fetch('user/keys');
        }

        /**
         * Update_ost_user_public_key
         *
         * @return
         */
        public function update_user_public_key( ) {
        }

        /**
         * Delete_user_public_key
         *
         * @param int $id
         * @return
         */
        public function delete_user_public_key($id) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('user/keys/' . $id);
        }

        // GPG Keys
        /**
         * Get_user_gpg_key_list
         *
         * @param string $username
         * @return array|string
         */
        public function get_user_gpg_key_list($username) {
            return $this->build_request()->fetch('users/' . $username . '/gpg_keys');
        }

        /**
         * Get_personal_gpg_key_list
         *
         * @return array/list
         */
        public function get_personal_gpg_key_list( ) {
            return $this->build_request()->fetch('user/gpg_keys');
        }

        /**
         * Get_single_user_gpg_key
         *
         * @param int $id
         * @return array|string
         */
        public function get_single_user_gpg_key($id) {
            return $this->build_request()->fetch('user/gpg_keys/' . $id);
        }

        /**
         * Create_gpg_key
         *
         * @return
         */
        public function create_gpg_key( ) {
            $args = array(
                'method' => 'POST'
            );
            return $this->build_request($args)->fetch('user/gpg_keys');
        }

        /**
         * Delete_gpg_key
         *
         * @param int $id
         * @return
         */
        public function delete_gpg_key($id) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('user/gpg_keys/' . $id);
        }

        // User  Another User
        /**
         * Get_user_block_user_list
         *
         * @return array|string
         */
        public function get_user_block_user_list( ) {
            return $this->build_request()->fetch('user/blocks');
        }

        /**
         * Get_personal_user_block_user
         *
         * @param string $username
         * @return array|string
         */
        public function get_personal_user_block_user($username) {
            return $this->build_request()->fetch('user/blocks/' . $username);
        }

        /**
         * Block_user
         *
         * @param string $username
         * @return
         */
        public function block_user($username) {
            $args = array(
                'method' => 'PUT'
            );
            return $this->build_request($args)->fetch('user/blocks/' . $username);
        }

        /**
         * Unblock_user
         *
         * @param string $username
         * @return
         */
        public function unblock_user($username) {
            $args = array(
                'method' => 'DELETE'
            );
            return $this->build_request($args)->fetch('user/blocks/' . $username);
        }

        // Admin Stats Enterprise
        /**
         * Get_enterprise_admin_stats
         *
         * @param string $type
         * @return array|string
         */
        public function get_enterprise_admin_stats($type) {
            $args = array(
                'issues' => '', // int
                'hooks' => '', // int
                'milestones' => '', // int
                'orgs' => '', // int
                'comments' => '', // int
                'pages' => '', // int
                'users' => '', // int
                'gists' => '', // int
                'pulls' => '', // int
                'repos' => '', // int
                'all' => ''
            );
            return $this->build_request($args)->fetch('enterprise/stats/' . $type);
        }

        // LDAP Enterprise
        /**
         * Update_enterprise_ldap_user_mapping
         *
         * @param string $usernmae
         * @return
         */
        public function update_enterprise_ldap_user_mapping($usernmae) {
            $args = array(
                'method' => 'PATCH'
            );
            return $this->build_request($args)->fetch('admin/ldap/users/' . $username . '/mapping');
        }

        /**
         * Sync_enterprise_ldap_user_mapping
         *
         * @param string $usernmae
         * @return
         */
        public function sync_enterprise_ldap_user_mapping($usernmae) {
            $args = array(
                'method' => 'POST'
            );
            return $this->build_request($args)->fetch('admin/ldap/users/' . $usernmae . '/sync');
        }

        /**
         * Update_enterprise_ldap_team_mapping
         *
         * @param string $team_id
         * @return
         */
        public function patch_enterprise_ldap_team_mapping($team_id) {
        }

        public function post_enterprise_ldap_team_mapping($team_id) {
        }

        // Enterprise Lincense
        public function get_enterprise_license_infromation( ) {
        }

        // Enterprise Management Console
        public function post_enterprise_first_time_license( ) {
        }
        public function post_enterprise_license( ) {
        }
        public function get_enterprise_configuration_status( ) {
        }
        public function post_enterprise_config_process( ) {
        }
        public function get_enterprise_settings( ) {
        }
        public function put_enterprise_settings( ) {
        }
        public function get_enterprise_maintenance_status( ) {
        }
        public function post_enterprise_maintence_mode( ) {
        }
        public function get_enterprise_auth_ssh_keys( ) {
        }
        public function post_enterprise_new_auth_ssh_key( ) {
        }
        public function delete_enterprise_auth_ssh_key( ) {
        }

        // Enterprise Pre-recive Enviroment
        public function get_enterprise_single_pre_recieve_enviroment($id) {
        }
        public function get_enterprise_pre_recieve_enviroment_list( ) {
        }
        public function post_enterprise_pre_recieve_enviroment( ) {
        }
        public function patch_enterprise_pre_recieve_enviroment($id) {
        }
        public function delete_enterprise_pre_recieve_enviroment($id) {
        }
        public function get_enterprise_pre_recieve_enviroment_download_status($id) {
        }
        public function post_pre_recieve_enviroment_download($id) {
        }

        // Enterprise Pre-recieve Hooks
        public function get_enterprise_single_pre_recieve_hook($id) {
        }
        public function get_enterprise_pre_recieve_hook_list( ) {
        }
        public function post_enterprise_pre_recieve_hook( ) {
        }
        public function patch_enterprise_pre_recieve_hook($id) {
        }
        public function delete_enterprise_pre_recieve_hook($id) {
        }

        // Enterprise Search Indexing
        public function post_enterprise_indexing_job_queue( ) {
        }

        // Enterprise Organization Administration
        public function post_enterprise_organization( ) {
        }
        public function patch_enterprise_organization_name( ) {
        }
    } // End Class.
} // End Class Exists Check.
