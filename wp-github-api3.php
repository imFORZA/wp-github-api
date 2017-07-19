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
		public function __construct() {}
		public function _response() {}
		public function get_oauth_grants_list(){}
		public function get_oauth_single_grant( $id ) {}
		public function delete_oauth_grant( $id ) {}
		public function get_oauth_authorizations_list(){}
		public function get_oauth_single_authorization( $id ) {}
		public function post_oauth_authorization(){}
		public function put_create_oauth_authorization_specific_app( $client_id ) {}
		public function put_create_oauth_authorization_specific_app_fingerprint( $client_id, $fingerprint ) {}
		public function patch_oauth_authorization( $id ) {}
		public function delete_oauth_authorization( $id ) {}
		public function get_oauth_authorization( $client_id, $access_token ) {}
		public function post_oauth_reset_authorization( $client_id, $access_token ) {}
		public function delete_oauth_authorization_app( $client_id, $access_token ) {}
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
			public function _event_commit_comment( $comment ) {}
			public function post_event( $ref_type, $ref, $master_branch, $description ) {}
			public function delete_event( $ref_type, $ref ) {}
			public function deployment_event( $deployment, $sha, $payload, $enviroment, $description, $repository ) {}
			public function deployment_event_stats( $deployment_status, $state, $tar_url, $deployment, $repository ) {}
			public function download_event( $donwload ) {}
			public function follow_event( $tar ) {}
			public function fork_event( $forkee ) {}
			public function fork_event_apply( $head, $before, $after ) {}
			public function _gist_event( $action, $gist ) {}
			public function _gollum_event( $pages, $page_name, $title, $action, $sha, $html_url ) {}
			public function install_event( $action, $installation ) {}
			public function install_event_repo( $action, $installation, $repository_selection, $repositories_ed, $repositories_removed ) {}
			public function _event_comment( $action, $changes, $changes, $issue, $comment ) {}
			public function issues_event( $action, $issue, $changes, $changes, $chnages, $assignee, $label ) {}
			public function label_event( $action, $label, $changes, $changes, $changes ) {}
			public function marketplace_event_purchase( $action ) {}
			public function member_event( $member, $action, $changes, $changes ) {}
			public function membership_event( $action, $scope, $member, $team ) {}
			public function milestone_event( $action, $milestone, $changes, $changes, $changes, $changes ) {}
			public function org_event( $action, $invitation, $membership, $organization ) {}
			public function org__event( $action, $ed_user, $organization, $sender ) {}
			public function page_build_event( $build ) {}
			public function project_card_event( $action, $changes, $changes, $after_id, $project_card ) {}
			public function project_column_event( $action, $changes, $changes, $after_id, $project_column ) {}
			public function project_event( $action, $changes, $changes, $changes, $project ) {}
			public function public_event(){}
			public function _request_event( $action, $number, $changes, $changes, $changes, $_request ) {}
			public function _request_review_event( $action, $_request, $review, $changes ) {}
			public function _request_review_comment_event( $action, $changes, $changes, $_request, $comment ) {}
			public function push_event( $ref, $head, $before, $size, $distinct_size, $commits, $commits, $commits, $commits, $commits, $commits, $commits, $commits ) {}
			public function release_event( $action, $release ) {}
			public function repo_event( $action, $repository ) {}
			public function status_event( $sha, $state, $description, $tar_url, $branches ) {}
			public function team_event( $action, $team, $changes, $changes, $changes, $changes, $changes, $changes, $changes, $repository ) {}
			public function team__event( $team, $repository ) {}
			public function watch_event( $action ) {}

			// Feeds
			public function get_feeds_list(){}

			// Notifications
			public function get_notifications_list(){}
			public function get_repo_notifications_list( $owner, $repo ) {}
			public function put_read(){}
			public function put_repo_notifications_read( $owner, $repo ) {}
			public function get_single_thread( $id ) {}
			public function patch_thread_read( $id ) {}
			public function get_thread_subscription( $id ) {}
			public function put_thread_subscription( $id ) {}
			public function delete_thread_subscription( $id ) {}

			// Starring
			public function get_stargazers_list( $owner, $repo ) {}
			public function get_starred_rep_list( $username ) {}
			public function get_star_repo_authentication( $owner, $repo ) {}
			public function put_repo_star( $owner, $repo ) {}
			public function delete_repo_star( $owner, $repo ) {}

			// Watching
			public function get_watchers_list( $owner, $repo ) {}
			public function get_repo_subscription( $owner, $repo ) {}
			public function put_repo_subscription( $owner, $repo ) {}
			public function delete_repo_subscription( $owner, $repo ) {}
			public function get_legacy_repo_watch_authenticated( $owner, $repo ) {}
			public function put_repo_legacy_authenticated( $owner, $repo ) {}
			public function delete_repo_legacy( $owner, $repo ) {}

			// GISTS
			public function get_user_gist_list( $username ) {}
			public function get_all_public_gist_list(){}
			public function get_starred_gist_list(){}
			public function get_single_gist( $id ) {}
			public function get_specific_revision_gist( $id, $sha ) {}
			public function post_gist(){}
			public function patch_gist( $id ) {}
			public function get_gist_commits_list( $id ) {}
			public function put_star_gist( $id ) {}
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
			public function _blob_custom_media_types() { //not sure
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
			public function post_issue_permission_repo_issue( $repository_id, $id ) {}
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
			public function post_request_permission_repo__comment( $repository_id, $id ) {}
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
			public function get_request_permission_repo_issues_comments( $repository_id, $id ) {}
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
      public function get_org_members_permissions_teams_repos($id) {}
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
			public function _issues_list( $org = null ) {}
			public function _repo_issues_list( $owner, $repo ) {}
			public function _single_issue( $owner, $repo, $number ) {}
			public function _issue( $owner, $repo ) {}
			public function _issue( $owner, $repo, $number ) {}
			public function _issue_lock( $owner, $repo, $number ) {}
			public function delete_issue_lock( $owner, $repo, $number ) {}
			public function _issues_custom_media_types() {
				return array(
					'application/vnd.github.VERSION.raw+json',
					'application/vnd.github.VERSION.text+json',
					'application/vnd.github.VERSION.html+json',
					'application/vnd.github.VERSION.full+json',
				);
			}
			// Assignees
			public function _assignees_list( $owner, $repo ) {}
			public function _assignee( $owner, $repo, $assignee ) {}
			public function _issue_assignee( $owner, $repo, $number ) {}
			public function delete_issue_assignee( $owner, $repo, $number ) {}

			// Issue Comments
			public function _issue_comment_list( $owner, $repo, $number ) {}
			public function _repo_comment_list( $owner, $repo ) {}
			public function _issue_single_comment( $owner, $repo, $id ) {}
			public function _issue_comment( $owner, $repo, $number ) {}
			public function _issue_comment( $owner, $repo, $id ) {}
			public function delete_issue_comment( $owner, $repo, $id ) {}

			// Issue Events
			public function _issue_event_list( $owner, $repo, $issue_number ) {}
			public function _issue_repo_event_list( $owner, $repo ) {}
			public function _issue_single_event( $owner, $repo, $id ) {}

			// Issue Labels
			public function _all_issue_repo_labels( $owner, $repo ) {}
			public function _single_issue_label( $owner, $repo, $name ) {}
			public function _issue_label( $owner, $owner ) {}
			public function _issue_label( $owner, $repo, $name ) {}
			public function delete_issue_label( $owner, $repo, $name ) {}
			public function _issue_label_issue_list( $owner, $repo, $number ) {}
			public function _issue_label_issue( $owner, $repo, $number ) {}
			public function delete_issue_label_issue( $owner, $repo, $number, $name ) {}
			public function delete_all_issue_labels_issue( $owner, $repo, $number ) {}
			public function _all_issue_labels_milestone( $owner, $repo, $number ) {}

			// Milestones
			public function _milestone_repo_list( $owner, $repo ) {}
			public function _single_milestone( $owner, $repo, $number ) {}
			public function _milestone( $owner, $repo ) {}
			public function _mileston( $owner, $repo, $number ) {}
			public function delete_milestone( $owner, $repo, $number ) {}

			// Migrations
			public function start_migration( $orgn ) {}
			public function _migrations_list( $org ) {}
			public function _migration_status( $org, $id ) {}
			public function _migration_archive( $org, $id ) {}
			public function delete_migration_archive( $org, $id ) {}
			public function delete_migration_repo( $org, $id, $repo_name ) {}

			// Source Imports
			public function start_import( $owner, $repo ) {}
			public function _import_progress( $owner, $repo ) {}
			public function _existing_import( $owner, $repo ) {}
			public function _commit_authors( $owner, $repo ) {}
			public function map_commit_author( $owner, $repo, $author_id ) {}
			public function _git_lfs_preference( $owner, $name ) {}
			public function _large_files( $owner, $name ) {}
			public function delete_import( $owner, $repo ) {}

			// Codes of Conduct
			public function _all_code_conduct_list(){}
			public function _individual_code_conduct( $id ) {}
			public function _repo_code_conduct( $owner, $repo ) {}
			public function _repo_contents_code_conduct( $owner, $repo ) {}

			// Emojis
			public function _emojis(){}

			// Gitignore
			public function _available_templates(){}
			public function _single_template(){}

			// Licenses
			public function _licenses_list(){}
			public function _individual_license( $license ) {}
			public function _repo_license( $owner, $repo ) {}
			public function _repo_contents_license( $owner, $repo ) {}

			// Markdown
			public function _markdown_document(){}
			public function _markdown_document_raw(){}

			// Meta
			public function _meta(){}

			// Rate link
			public function _current_rate_limit(){}

			// Organizations
			public function _org_list(){}
			public function _org_all(){}
			public function _user_org_list( $username ) {}
			public function _org( $org ) {}
			public function _org( $org ) {}

			// Organization Members
			public function _org_members_list( $org ) {}
			public function _org_membership( $org, $username ) {}
			public function _org_member(){}
			public function delete_org_member( $org, $username ) {}
			public function _public_org_member_list( $org ) {}
			public function _public_membership( $org, $username ) {}
			public function _org_user_membership( $org, $username ) {}
			public function delete_org_user_membership( $org, $username ) {}
			public function _org_user_membership( $org, $username ) {}
			public function _org_membership( $org, $username ) {}
			public function delete_org_membership( $org, $username ) {}
			public function _org_invitations_pending_list( $org ) {}
			public function _user_org_membership_list(){}
			public function _user_org_membership( $org ) {}
			public function _user_org_membership( $org ) {}

			// Members
			public function _members_list( $org ) {}
			public function _membership( $org, $username ) {}
			public function _member(){}
			public function delete_member( $org, $username ) {}
			public function _public_members_list( $org ) {}
			public function _user_public_membership( $org, $username ) {}
			public function _user_membership_member( $org, $username ) {}
			public function delete_user_membership( $org, $username ) {}
			public function _org_membership_member( $org, $username ) {}
			public function _org_membership_member( $org, $username ) {}
			public function delete_org_membership_member( $org, $username ) {}
			public function _pending_org_invitation_member( $org ) {}
			public function _user_org_membership_member_list(){}
			public function _user_org_membership_member( $org ) {}
			public function _user_org_membership_member( $org ) {}

			// Outside Collaborators
			public function _outside_collaborator_list( $org ) {}
			public function delete_outside_collaborator( $org, $username ) {}
			public function convert_member_outside_collaborator( $org, $username ) {}

			// Teams
			public function _team_list( $org ) {}
			public function _team( $id ) {}
			public function _team( $org ) {}
			public function _team( $id ) {}
			public function delete_team( $id ) {}
			public function _list_team_member( $id ) {}
			public function _team_member( $id, $username ) {}
			public function _team_member( $id, $username ) {}
			public function delete_team_member( $id, $username ) {}
			public function _team_membership( $id, $username ) {}
			public function _team_membership( $id, $username ) {}
			public function delete_team_membership( $id, $username ) {}
			public function _team_repo_list( $id ) {}
			public function _pending_team_invitations_list( $id ) {}
			public function _team_manages_repo( $id, $owner, $repo ) {}
			public function _team_repo( $id, $org, $repo ) {}
			public function delete_team_repo( $id, $owner, $repo ) {}
			public function _user_team_list(){}

			// Webhooks
			public function _hook_list( $org ) {}
			public function _single_hook( $org, $id ) {}
			public function _hook( $org ) {}
			public function _hook( $org, $id ) {}
			public function _ping_hook( $org, $id ) {}
			public function delete_hook( $org, $id ) {}

			// ing Users(Organizations)
			public function _ed_user_list( $org ) {}
			public function _ed_user_org( $org, $username ) {}
			public function __user( $org, $username ) {}
			public function delete__user( $org, $username ) {}

			// Projects
			public function _repo_project_list( $owner, $repo ) {}
			public function _org_project_list( $org ) {}
			public function _project( $id ) {}
			public function _repo_project( $owner, $repo ) {}
			public function _org_project( $org ) {}
			public function _project( $id ) {}
			public function delete_project( $id ) {}

			// Project
			public function _project_card_list( $column_id ) {}
			public function _project_card( $id ) {}
			public function _project_card( $column_id ) {}
			public function _project_card( $id ) {}
			public function delete_project_card( $id ) {}
			public function move_project_card( $id ) {}

			// Project Column
			public function _project_columns_list( $project_id ) {}
			public function _project_column( $id ) {}
			public function _project_column( $project_id ) {}
			public function _project_column( $id ) {}
			public function delete_project_column( $id ) {}
			public function move_project_column( $id ) {}

			//  Pull Requests
			public function get_pull_requests( $owner, $repo) {}
      public function get_single_pull_request( $owner, $repo, $number) {}
      public function post_pull_request( $owner, $repo) {}
      public function patch_pull_request( $owner, $repo, $number) {}
      public function get_commits_on_pull_request( $owner, $repo, $number) {}
      public function get_pull_requests_files( $owner, $repo, $number) {}
      public function get_pull_request_if_merged( $owner, $repo, $number) {}
      public function put_merge_pull_request( $owner, $repo, $number) {}
      
			// Reviews
			public function __request_review_list( $owner, $repo, $number ) {}
			public function _single_review( $owner, $repo, $number, $id ) {}
			public function delete_pending_review( $owner, $repo, $number, $id ) {}
			public function _single_review_comments( $owner, $repo, $number, $id ) {}
			public function __request_review( $owner, $repo, $number ) {}
			public function __request_review( $owner, $repo, $number, $id ) {}
			public function delete__request_review( $owner, $repo, $number, $id ) {}

			// Review Comments
			public function __request_comments_list( $owner, $repo, $number ) {}
			public function _repo_comments_list( $owner, $repo ) {}
			public function _single_comment( $owner, $repo, $id ) {}
			public function _comment( $owner, $repo, $number ) {}
			public function _comment( $owner, $repo, $id ) {}
			public function delete_comment( $owner, $repo, $id ) {}

			// Review Requests
			public function _review_requests_list( $owner, $repo, $number ) {}
			public function _review_request( $owner, $repo, $number ) {}
			public function delete_review_request( $owner, $repo, $number ) {}

			// Reactions
			public function _commit_comment_reaction_list( $owner, $repo, $id ) {}
			public function _commit_comment_reaction( $owner, $repo, $id ) {}
			public function _issue_reaction_list( $owner, $repo, $number ) {}
			public function _issue_reaction( $owner, $repo, $number ) {}
			public function _issue_comment_reactions_list( $owner, $repo, $id ) {}
			public function _issue_comment_reaction( $owner, $repo, $id ) {}
			public function __request_review_comment_reaction_list( $owner, $repo, $id ) {}
			public function __request_review_comment_reaction( $owner, $repo, $id ) {}
			public function delete_reaction( $id ) {}

			// Repositories
			public function _user_repo_list(){}
			public function _org_repo_list( $org ) {}
			public function _all_public_repo_list(){}
			public function _user_authenticated_repo(){}
			public function _user_authenticated_org_repo( $org ) {}
			public function __forked_repo( $owner, $repo ) {}
			public function _repo( $owner, $repo ) {}
			public function _repo_contributors_list( $owner, $repo ) {}
			public function _repo_language_list( $owner, $repo ) {}
			public function _repo_team_list( $owner, $repo ) {}
			public function _repo_tag_list( $owner, $repo ) {}
			public function delete_repo( $owner, $repo ) {}

			// Branches
			public function _branch_list( $owner, $repo ) {}
			public function _branch( $owner, $repo, $branch ) {}
			public function _branch_protection( $owner, $repo, $branch ) {}
			public function _branch_protection( $owner, $repo, $branch ) {}
			public function delete_branch_protection( $owner, $repo, $branch ) {}
			public function _protected_branch_req_status( $owner, $repo, $branch ) {}
			public function _protected_branch_req_status( $owner, $repo, $branch ) {}
			public function delete_protected_branch_req_status( $owner, $repo, $branch ) {}
			public function _protected_branch_req_status_context_list( $owner, $repo, $branch ) {}
			public function _protected_branch_req_status_context( $owner, $repo, $branch ) {}
			public function _protected_branch_req_status_context( $owner, $repo, $branch ) {}
			public function delete_protected_branch_req_status_context( $owner, $repo, $branch ) {}
			public function _protected_branch__req_review_enforce( $owner, $repo, $branch ) {}
			public function _protected_branch__req_review_enforce( $owner, $repo, $branch ) {}
			public function delete_protected_branch__req_review_enforce( $owner, $repo, $branch ) {}
			public function _protected_branch_admin_enforce( $owner, $repo, $branch ) {}
			public function _protected_branch_admin_enforce( $owner, $repo, $branch ) {}
			public function delete_protected_branch_admin_enforce( $owner, $repo, $branch ) {}
			public function _protected_branch_restrictions( $owner, $repo, $branch ) {}
			public function delete_protected_branch_restrictions( $owner, $repo, $branch ) {}
			public function _protected_branch_team_restrictions_list( $owner, $repo, $branch ) {}
			public function _protected_branch_team_restrictions( $owner, $repo, $branch ) {}
			public function _protected_branch_team_restrictions( $owner, $repo, $branch ) {}
			public function delete_protected_branch_team_restrictions( $owner, $repo, $branch ) {}
			public function _protected_branch_user_restrictions_list( $owner, $repo, $branch ) {}
			public function _protected_branch_user_restrictions( $owner, $repo, $branch ) {}
			public function _protected_branch_user_restrictions( $owner, $repo, $branch ) {}
			public function delete_protected_branch_user_restrictions( $owner, $repo, $branch ) {}

			// Repo Collaborators
			public function _repo_collaborator_list( $owner, $repo ) {}
			public function _repo_collaborator_user( $owner, $repo, $username ) {}
			public function _repo_collaborator_user_permission_level( $owner, $repo, $username ) {}
			public function _repo_collaborator_user( $owner, $repo, $username ) {}
			public function delete_repo_collaborator_user( $owner, $repo, $username ) {}

			// Repo Comments
			public function _repo_comment_commit_list( $owner, $repo ) {}
			public function _repo_single_commit_comment_list( $owner, $repo, $ref ) {}
			public function _repo_comment_commit( $owner, $repo, $sha ) {}
			public function _repo_single_commit_comment( $owner, $repo, $id ) {}
			public function _repo_comment_commit( $owner, $repo, $id ) {}
			public function delete_repo_comment_commit( $owner, $repo, $id ) {}

			// Repo commit
			public function _repo_commit_list( $owner, $repo ) {}
			public function _repo_single_commit( $owner, $repo, $sha ) {}
			public function _repo_sha_1_commit_reference( $owner, $repo, $ref ) {}
			public function compare_commits( $owner, $repo, $base, $head ) {}
			public function _repo_verification_signature_commit( $owner, $repo, $sha ) {}

			// Repo Community Profile
			public function _repo_metrics_profile_commun( $owner, $name ) {}

			// Repo Contents
			public function _repo_readme( $owner, $repo ) {}
			public function _repo_contents( $owner, $repo, $path ) {}
			public function _repo_file( $owner, $repo, $path ) {}
			public function _repo_file( $owner, $repo, $path ) {}
			public function delete_repo_file( $owner, $repo, $path ) {}
			public function _repo_archive_link( $owner, $repo, $archive_format, $ref ) {}

			// Repo Deploy Keys
			public function _repo_deploy_key_list( $owner, $repo ) {}
			public function _repo_deploy_key( $owner, $repo, $id ) {}
			public function _repo_deploy_key( $owner, $repo ) {}
			public function _repo_deploy_key( $owner, $repo, $id ) {}
			public function delete_repo_deploy_key( $owner, $repo, $id ) {}

			// Repo Deployments
			public function _repo_deploy_list( $owner, $repo ) {}
			public function _single_repo_deploy( $owner, $repo, $deployment_id ) {}
			public function _repo_deploy( $owner, $repo ) {}
			public function _repo_deploy_status_list( $owner, $repo, $id ) {}
			public function _repo_single_deploy_status( $owner, $repo, $id, $status_id ) {}
			public function _repo_deploy_status( $owner, $repo, $id ) {}

			// Repo Downloads
			public function _repo_download_list( $owner, $repo ) {}
			public function _single_repo_download( $owner, $repo, $id ) {}
			public function delete_repo_download( $owner, $repo, $id ) {}

			// Repo Forks
			public function _repo_fork_list( $owner, $repo ) {}
			public function _repo_fork( $owner, $repo ) {}

			// Repo Invitations
			public function _repo_invite_list( $owner, $repo ) {}
			public function delete_repo_invite( $owner, $repo, $invitation_id ) {}
			public function _repo_invite( $owner, $repo, $invitation_id ) {}
			public function _repo_user_invite_list(){}
			public function accept_repo_invite( $invitation_id ) {}
			public function decline_repo_invite( $invitation_id ) {}

			// Repo Merging
			public function perform_repo_merge( $owner, $repo ) {}

			// Repo Pages
			public function _repo_page_site_info( $owner, $repo ) {}
			public function request_repo_page_build( $owner, $repo ) {}
			public function _repo_page_build_list( $owner, $repo ) {}
			public function _repo_latest_page_build_list( $owner, $repo ) {}
			public function _repo_specific_page_build_list( $owner, $repo, $id ) {}

			// Repo releases
			public function _repo_release_list( $owner, $repo ) {}
			public function _repo_single_release( $owner, $repo, $id ) {}
			public function _repo_latest_release( $owner, $repo ) {}
			public function _repo_release_tag_name( $owner, $repo, $tag ) {}
			public function _repo_release( $owner, $repo ) {}
			public function _repo_release( $owner, $repo, $id ) {}
			public function delete_repo_release( $owner, $repo, $id ) {}
			public function _repo_release_as_list( $owner, $repo, $id ) {}
			public function upload_repo_release_as( $owner, $id ) {}
			public function _repo_release_single_as( $owern, $repo, $id ) {}
			public function _repo_release_as( $owner, $repo, $id ) {}
			public function delete_repo_release_as( $owner, $repo, $id ) {}

			// Repo Statistics
			public function _repo__delete_commit_count_contributors( $owner, $repo ) {}
			public function _repo_commit_activity_data_last_year( $owner, $repo ) {}
			public function _number__delete_week( $owner, $repo ) {}
			public function _repo_commit_count_weekly( $owner, $repo ) {}
			public function _number_commit_hour_day( $owner, $repo ) {}

			// Repo Status
			public function _repo_status( $owner, $repo, $sha ) {}
			public function _repo_specific_ref_status_list( $owner, $repo, $ref ) {}
			public function _repo_specific_ref_combined_status( $owner, $repo, $ref ) {}

			// Repo traffic
			public function _repo_referrers_list( $owner, $repo ) {}
			public function _repo_path_list( $owner, $repo ) {}
			public function _repo_views( $owner, $repo ) {}
			public function _repo_clone( $owner, $repo ) {}

			// Repo Webhooks
			public function _repo_hook_list( $owner, $repo ) {}
			public function _repo_single_hook( $owner, $repo, $id ) {}
			public function _repo_hook( $owner, $repo ) {}
			public function _repo_hook( $owner, $repo, $id ) {}
			public function push_repo_hook( $owner, $repo, $id ) {}
			public function ping_repo_hook( $owner, $repo, $id ) {}
			public function delete_repo_hook( $owner, $repo, $id ) {}
			public function pub_sub_hub_bub( $owner, $repo, $event ) {}
			public function response_format( $owner, $repo ) {}

			// Search
			public function _search_repo(){}
			public function _search_commit(){}
			public function _search_code(){}
			public function _search_issues(){}
			public function _search_users(){}

			// Legacy Search
			public function _legacy_search_issues( $owner, $repo, $state, $keyword ) {}
			public function _legacy_search_repo( $keyword ) {}
			public function _legacy_search_user( $keyword ) {}
			public function _legacy_search_email( $email ) {}

			// SCIM
			public function _provisioned_identities_list( $organization ) {}
			public function _single_user_provision_details( $organization, $id ) {}
			public function send_user_invite_provision( $organization ) {}
			public function _memembership_org_provision( $organization, $id ) {}
			public function _user_attribute( $organization, $id ) {}
			public function delete_org_user( $organization, $id ) {}

			// Users
			public function _single_user( $username ) {}
			public function _authenticated_user(){}
			public function _authenticated_user(){}
			public function _all_users(){}

			// User emails
			public function _user_email_ress_list(){}
			public function _user_public_email_ress_list(){}
			public function _user_email_ress(){}
			public function delete_user_email_ress(){}
			public function toggle_user_primary_email_visibiltiy(){}

			// User Followers
			public function _user_follower_list( $username ) {}
			public function _user_follow_user_list( $username ) {}
			public function _user_follow_personal_user( $username ) {}
			public function _user_follows_user( $username, $tar_user ) {}
			public function follow_user( $username ) {}
			public function unfollow_user( $username ) {}

			// User Git SSH Keys
			public function _user_public_key_list( $username ) {}
			public function _personal_public_key_list(){}
			public function _user_single_public_key( $id ) {}
			public function _user_public_key(){}
			public function _user_public_key(){}
			public function delete_user_public_key( $id ) {}

			// GPG Keys
			public function _user_gpg_key_list( $username ) {}
			public function _personal_gpg_key_list(){}
			public function _single_user_gpg_key( $id ) {}
			public function _gpg_key(){}
			public function delete_gpg_key( $id ) {}

			// User  Another User
			public function _user__user_list(){}
			public function _personal_user__user( $username ) {}
			public function _user( $username ) {}
			public function _user( $username ) {}

			// Admin Stats Enterprise
			public function _enterprise_admin_stats( $type ) {}

			// LDAP Enterprise
			public function _enterprise_ldap_user_mapping( $usernmae ) {}
			public function _enterprise_ldap_user_mapping( $usernmae ) {}
			public function _enterprise_ldap_team_mapping( $team_id ) {}
			public function _enterprise_ldap_team_mapping( $team_id ) {}

			// Enterprise Lincense
			public function _enterprise_license_infromation(){}

			// Enterprise Management Console
			public function _enterprise_first_time_license(){}
			public function _enterprise_license(){}
			public function _enterprise_configuration_status(){}
			public function _enterprise_config_process(){}
			public function _enterprise_tings(){}
			public function _enterprise_tings(){}
			public function _enterprise_maintenance_status(){}
			public function _enterprise_maintence_mode(){}
			public function _enterprise_auth_ssh_keys(){}
			public function _enterprise_new_auth_ssh_key(){}
			public function delete_enterprise_auth_ssh_key(){}

			// Enterprise Pre-recive Enviroment
			public function _enterprise_single_pre_recieve_enviroment( $id ) {}
			public function _enterprise_pre_recieve_enviroment_list(){}
			public function _enterprise_pre_recieve_enviroment(){}
			public function _enterprise_pre_recieve_enviroment( $id ) {}
			public function delete_enterprise_pre_recieve_enviroment( $id ) {}
			public function _enterprise_pre_recieve_enviroment_download_status( $id ) {}
			public function _pre_recieve_enviroment_download( $id ) {}

			// Enterprise Pre-recieve Hooks
			public function _enterprise_single_pre_recieve_hook( $id ) {}
			public function _enterprise_pre_recieve_hook_list(){}
			public function _enterprise_pre_recieve_hook(){}
			public function _enterprise_pre_recieve_hook( $id ) {}
			public function delete_enterprise_pre_recieve_hook( $id ) {}

			// Enterprise Search Indexing
			public function _enterprise_indexing_job_queue(){}

			// Enterprise Organization Administration
			public function _enterprise_organization(){}
			public function _enterprise_organization_name(){}

	} // End Class.
} // End if().
