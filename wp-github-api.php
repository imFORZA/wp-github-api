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

        public function __construct() {
            
        }

        public function get_response() {
            
        }

        /* EVENTS. */

        /**
         * Get all public event
         * 
         * @access public
         * @return  $body Body.
         */
        public function get_public_events() {
            $response = wp_remote_get($this->api_url . "events");
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        /**
         * Get all repository events
         * 
         * @access public
         * @param mixed $repo repository name
         * @return  $body Body.
         */
        public function get_repo_events($repo) {
            $response = wp_remote_get($this->api_url . "repos/" . $repo . "/events");
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        /**
         * Get all repository issue events
         * 
         * @access public
         * @param mixed $repo repository name
         * @return  $body Body.
         */
        public function get_repo_issue_events($repo) {
            $response = wp_remote_get($this->api_url . "repos/" . $repo . "/issues/events");
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        /**
         * Get all network events
         * 
         * @access public
         * @param mixed $repo repository name
         * @return  $body Body.
         */
        public function get_network_events($repo) {
            $response = wp_remote_get($this->api_url . "networks/" . $repo . "/events");
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        /**
         * Get all organization events
         * 
         * @access public
         * @param mixed $org organization name
         * @return  $body Body.
         */
        public function get_organization_events($org) {
            $response = wp_remote_get($this->api_url . "orgs/" . $org . "/events");
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        /**
         * Get user received events
         * 
         * @access public
         * @param mixed $username username
         * @return  $body Body.
         */
        public function get_users_received_events($username) {
            $response = wp_remote_get($this->api_url . "users/" . $username . "/received_events");
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        /**
         * Get users public received events
         * 
         * @access public
         * @param mixed $username username
         * @return  $body Body.
         */
        public function get_users_public_received_events($username) {
            $response = wp_remote_get($this->api_url . "users/" . $username . "/received_events/public");
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        /**
         * Get users events
         * 
         * @access public
         * @param mixed $username username
         * @return  $body Body.
         */
        public function get_users_events($username) {
            $response = wp_remote_get($this->api_url . "users/" . $username . "/events");
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        /**
         * Get users public received events
         * 
         * @access public
         * @param mixed $username username
         * @return  $body Body.
         */
        public function get_users_public_events($username) {
            $response = wp_remote_get($this->api_url . "users/" . $username . "/events/public");
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        public function get_notifications($all, $participating, $since, $before) {
            
        }

        public function get_repo_stargazers() {
            
        }

        public function get_users_starred($username = '') {
            
        }

        /* GISTS. */

        /* GIT DATA. */

        // Blobs

        /**
         * Get blob
         * 
         * @param mixed $owner owner
         * @param mixed $repo repository
         * @param mixed $sha sha id
         * @return  $body Body.
         */
        public function get_blob($owner, $repo, $sha) {
            $response = wp_remote_get($this->api_url . "repos/" . $owner . "/" . $repo . "/git/blobs/" . $sha);
            $code = wp_remote_retrieve_response_code($response);
            if (200 !== $code) {
                return new WP_Error('response-error', sprintf(__('Server response code: %d', 'text-domain'), $code));
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body);
        }

        public function create_blob($owner, $repo) {
            
        }

        public function get_blob_custom_media_types() {
            return array(
                'application/json',
                'application/vnd.github.VERSION.raw'
            );
        }

        // Commits

        public function get_commit($owner, $repo, $sha) {
            
        }

        public function create_commit($owner, $repo) {
            
        }

        public function commit_signature_verification($owner, $repo, $sha) {
            
        }

        // References

        public function get_reference() {
            
        }

        public function get_all_references() {
            
        }

        public function create_reference() {
            
        }

        public function update_reference() {
            
        }

        public function delete_reference() {
            
        }

        // Tags

        public function get_tag() {
            
        }

        public function create_tag_object() {
            
        }

        public function tag_signature_verification() {
            
        }

        // Trees

        public function get_tree($owner, $repo, $sha) {
            
        }

        public function get_tree_recursively($owner, $repo, $sha) {
            
        }

        public function create_tree($owner, $repo) {
            
        }

        /* INTEGRATIONS. */

        public function find_installations() {
            
        }

        public function create_new_installation_token() {
            
        }

        /* ISSUES. */

        public function list_issues() {
            
        }

        public function list_org_issues($org) {
            
        }

        public function list_issues_for_repo($owner, $repo) {
            
        }

        public function get_single_issue($owner, $repo, $issue_number) {
            
        }

        public function create_issue($owner, $repo) {
            
        }

        public function edit_issue($owner, $repo, $issue_number) {
            
        }

        public function lock_issue($owner, $repo, $issue_number) {
            
        }

        public function unlock_issue($owner, $repo, $issue_number) {
            
        }

        public function get_issues_custom_media_types() {

            return array(
            'application/vnd.github.VERSION.raw+json',
            'application/vnd.github.VERSION.text+json',
            'application/vnd.github.VERSION.html+json',
            'application/vnd.github.VERSION.full+json'
            )
        }

        /* MIGRATIONS. */

        /* MISC. */

        /* ORGANIZATIONS. */

        public function get_your_orgs() {
            
        }

        public function get_all_orgs() {
            
        }

        public function get_user_orgs($username) {
            
        }

        public function get_org($org) {
            
        }

        public function edit_org() {
            
        }

        // Members
        // Outside Collaborators
        // Teams
        // Webhooks
        // Blocking Users (Organizations)

        /* PROJECTS. */

        public function get_projects_cards($column_id) {
            
        }

        public function get_project_card($card_id) {
            
        }

        public function add_project_card($column_id) {
            
        }

        public function update_project_card($card_id) {
            
        }

        public function delete_project_card() {
            
        }

        public function move_project_card() {
            
        }

        /* PULL REQUESTS. */

        /* REACTIONS. */

        /* REPOSITORIES. */

        /* SEARCH. */

        /* USERS. */
    }

    // End Class.
} // End Class Exists Check.
