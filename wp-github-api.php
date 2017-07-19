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
if ( ! class_exists( 'GithubAPI' ) {
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
		public function get_response() {}

		// OAuth Authorizations API
		public function get_oauth_grants_list(){}
		public function get_oauth_single_grant( $id ) {}
		public function delete_oauth_grant( $id ) {}
		public function get_oauth_authorizations_list(){}
		public function get_oauth_single_authorization( $id ) {}
		public function create_oauth_authorization(){}
		public function get_create_oauth_authorization_specific_app( $client_id ) {}
		public function get_create_oauth_authorization_specific_app_fingerprint( $client_id, $fingerprint ) {}
		public function update_oauth_authorization( $id ) {}
		public function delete_oauth_authorization( $id ) {}
		public function get_oauth_authorization( $client_id, $access_token ) {}
		public function set_oauth_authorization( $client_id, $access_token ) {}
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
			 * @param owner $owner owner of the repo
			 * @param repo  $repo specific repo of public events
			 * @return events repostitory events
			 */
		public function get_repo_events_list( $owner, $repo ) {}
			/**
			 * Get_public_network_repo_events_list description
			 *
			 * @param  owner $owner owner of the repo
			 * @param  repo  $repo specific repo
			 * @return events public events for a network of repositories
			 */
		public function get_public_network_repo_events_list( $owner, $repo ) {}
			/**
			 * Get_public_organization_events_list description
			 *
			 * @param  org $org organization
			 * @return events public events for an organization
			 */
		public function get_public_organization_events_list( $org ) {}
			/**
			 * Get_received_user_events_list description
			 *
			 * @param  username $username user of the repo
			 * @return events events that are recieved by watching repos and following users
			 */
		public function get_received_user_events_list( $username ) {}
			/**
			 * Get_public_received_user_events_list description
			 *
			 * @param  username $username user of the repo
			 * @return events public events that a user recieved
			 */
		public function get_public_received_user_events_list( $username ) {}
			/**
			 * Get_user_performed_events_list description
			 *
			 * @param  username $username user of the repo
			 * @return events events performed by a user         [
			 */
		public function get_user_performed_events_list( $username ) {}
			/**
			 * Get_publice_events_user_list description
			 *
			 * @param  username $username user of the repo
			 * @return events public events performed by a user
			 */
		public function get_publice_events_user_list( $username ) {}
			/**
			 * Get_organization_events_list description
			 *
			 * @param  username $username user of the repo
			 * @param  org      $org organization
			 * @return events user's organization dashboard. Must be authenticated as a user to view
			 */
		public function get_organization_events_list( $username, $org ) {}


		// Events Types and Payloads
		public function create_event_commit_comment( $comment ) {}
		public function create_event( $ref_type, $ref, $master_branch, $description ) {}
		public function delete_event( $ref_type, $ref ) {}
		public function deployment_event( $deployment, $sha, $payload, $enviroment, $description, $repository ) {}
		public function deployment_event_stats( $deployment_status, $state, $target_url, $deployment, $repository ) {}
		public function download_event( $donwload ) {}
		public function follow_event( $target ) {}
		public function fork_event( $forkee ) {}
		public function fork_event_apply( $head, $before, $after ) {}
		public function create_gist_event( $action, $gist ) {}
		public function create_gollum_event( $pages, $page_name, $title, $action, $sha, $html_url ) {}
		public function install_event( $action, $installation ) {}
		public function install_event_repo( $action, $installation, $repository_selection, $repositories_added, $repositories_removed ) {}
		public function create_event_comment( $action, $changes, $changes, $issue, $comment ) {}
		public function issues_event( $action, $issue, $changes, $changes, $chnages, $assignee, $label ) {}
		public function label_event( $action, $label, $changes, $changes, $changes ) {}
		public function marketplace_event_purchase( $action ) {}
		public function member_event( $member, $action, $changes, $changes ) {}
		public function membership_event( $action, $scope, $member, $team ) {}
		public function milestone_event( $action, $milestone, $changes, $changes, $changes, $changes ) {}
		public function org_event( $action, $invitation, $membership, $organization ) {}
		public function org_block_event( $action, $blocked_user, $organization, $sender ) {}
		public function page_build_event( $build ) {}
		public function project_card_event( $action, $changes, $changes, $after_id, $project_card ) {}
		public function project_column_event( $action, $changes, $changes, $after_id, $project_column ) {}
		public function project_event( $action, $changes, $changes, $changes, $project ) {}
		public function public_event(){}
		public function pull_request_event( $action, $number, $changes, $changes, $changes, $pull_request ) {}
		public function pull_request_review_event( $action, $pull_request, $review, $changes ) {}
		public function pull_request_review_comment_event( $action, $changes, $changes, $pull_request, $comment ) {}
		public function push_event( $ref, $head, $before, $size, $distinct_size, $commits, $commits, $commits, $commits, $commits, $commits, $commits, $commits ) {}
		public function release_event( $action, $release ) {}
		public function repo_event( $action, $repository ) {}
		public function status_event( $sha, $state, $description, $target_url, $branches ) {}
		public function team_event( $action, $team, $changes, $changes, $changes, $changes, $changes, $changes, $changes, $repository ) {}
		public function team_add_event( $team, $repository ) {}
		public function watch_event( $action ) {}

		// Feeds
		public function get_feeds_list(){}

		// Notifications
		public function get_notifications_list(){}
		public function get_repo_notifications_list( $owner, $repo ) {}
		public function set_read(){}
		public function set_repo_notifications_read( $owner, $repo ) {}
		public function get_single_thread( $id ) {}
		public function set_thread_read( $id ) {}
		public function get_thread_subscription( $id ) {}
		public function set_thread_subscription( $id ) {}
		public function delete_thread_subscription( $id ) {}

		// Starring
		public function get_stargazers_list( $owner, $repo ) {}
		public function get_starred_rep_list( $username ) {}
		public function get_star_repo_authentication( $owner, $repo ) {}
		public function set_repo_star( $owner, $repo ) {}
		public function set_repo_unstar( $owner, $repo ) {}

		// Watching
		public function get_watchers_list( $owner, $repo ) {}
		public function get_repo_subscription( $owner, $repo ) {}
		public function set_repo_subscription( $owner, $repo ) {}
		public function delete_repo_subscription( $owner, $repo ) {}
		public function get_legacy_repo_watch_authenticated( $owner, $repo ) {}
		public function set_repo_legacy_authenticated( $owner, $repo ) {}
		public function delete_repo_legacy( $owner, $repo ) {}

		// GISTS
		public function get_user_gist_list( $username ) {}
		public function get_all_public_gist_list(){}
		public function get_starred_gist_list(){}
		public function get_single_gist( $id ) {}
		public function get_specific_revision_gist( $id, $sha ) {}
		public function create_gist(){}
		public function edit_gist( $id ) {}
		public function get_gist_commits_list( $id ) {}
		public function set_star_gist( $id ) {}
		public function delete_star_gist( $id ) {}
		public function get_star_gist( $id ) {}
		public function set_fork_gist( $id ) {}
		public function get_fork_gist_list( $id ) {}
		public function delete_gist( $id ) {}

		// Comments
		public function get_gist_comment_list( $gist_id ) {}
		public function get_single_comment( $gist_id, $id ) {}
		public function create_comment( $gist_id ) {}
		public function edit_comment( $gist_id, $id ) {}
		public function delete_comment( $gist_id, $id ) {}

		// Blobs
		public function get_blob( $owner, $repo, $sha ) {}
		public function create_blob( $owner, $repo ) {}
		public function get_blob_custom_media_types() {
			return array(
				'application/json',
				'application/vnd.github.VERSION.raw',
			);
		}

		// Commits
		public function get_commit( $owner, $repo, $sha ) {}
		public function create_commit( $owner, $repo ) {}
		public function commit_signature_verification( $owner, $repo, $sha ) {}

		// References
		public function get_reference( $owner, $repo, $ref = null ) {}
		public function get_all_references( $owner, $repo ) {}
		public function create_reference( $owner, $repo ) {}
		public function update_reference( $owner, $repo, $ref ) {}
		public function delete_reference( $owner, $repo, $ref ) {}

		// Tags
		public function get_tag( $owner, $repo, $sha ) {}
		public function create_tag_object( $owner, $repo ) {}
		public function tag_signature_verification( $owner, $repo, $sha ) {}

		// Trees
		public function get_tree( $owner, $repo, $sha ) {}
		public function get_tree_recursively( $owner, $repo, $sha ) {}
		public function create_tree( $owner, $repo ) {}

		// Github Apps
		public function get_installations(){}
		public function get_single_installation( $installation_id ) {}
		public function get_user_installations_list(){}
		public function create_installation_token( $installation_id ) {}

		// Installations
		public function get_repo_list(){}
		public function get_user_accessible_repo_installation_list( $installation_id ) {}
		public function add_installation_repo( $installation_id, $repository_id ) {}
		public function delete_installation_repo( $installation_id, $repository_id ) {}

		// Marketplace
		public function get_marketplace_all_plan_list(){}
		public function get_specific_plan_github_account_list( $id ) {}
		public function get_associated_marketplace_github_account( $id ) {}
		public function get_user_marketplace_purchases(){}

		// Github App Permissions
		public function get_repo_metadata_permission_collaborators( $repository_id ) {}
		public function update_access_token_install_metadata_permission( $installation_id ) {}
		public function get_repo_id_metadat_permission( $repository_id ) {}
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
		public function update_conten_permission_repo_branches( $repository_id ) {}
		public function update_content_permission_repo_pull_merge( $repository_id, $id ) {}
		public function set_content_permission_repo_merges( $repository_id ) {}
		public function get_content_permission_repo_readme( $repository_id ) {}
		public function get_content_permission_repo_contents( $repository_id ) {}
		public function update_content_permission_repo_contents( $repository_id ) {}
		public function delete_content_permission_repo_contents( $repository_id ) {}
		public function get_content_permission_repo_tarball( $repository_id ) {}
		public function get_content_permission_repo_zipball( $repository_id ) {}
		public function get_content_permission_repo_release( $repository_id ) {}
		public function get_content_permission_repo_release_latest( $repository_id ) {}
		public function get_content_permission_repo_release_tag( $repository_id ) {}
		public function get_content_permission_repo_release_id( $repository_id, $id ) {}
		public function get_content_permission_repo_release_assets( $repository_id, $id ) {}
		public function get_content_permission_repo_release_assets_id( $repository_id, $id ) {}
		public function delete_content_permission_repo_release_id( $repository_id, $id ) {}
		public function update_content_permission_repo_release_id( $repository_id, $id ) {}
		public function set_content_permission_repo_release_id( $repository_id, $id ) {}
		public function set_content_permisison_repo_release( $repository_id ) {}
		public function update_content_permission_repo_release_assets( $repository_id, $id ) {}
		public function set_content_permission_repo_release_assets( $repository_id, $id ) {}
		public function delete_content_permission_repo_release_assets( $repository_id, $id ) {}
		public function set_content_permission_repo_commits_comments( $repository_id ) {}
		public function update_content_permission_repo_comments( $repository_id, $id ) {}
		public function set_content_permission_repo_comments( $repository_id, $id ) {}
		public function get_single_file_permission_repo_content( $owner, $repo, $path ) {}
		public function update_single_file_permission_repo_content( $owner, $repo, $path ) {}
		public function set_single_file_permission_repo_content( $owner, $repo, $path ) {}
		public function get_admin_permission_repo_teams( $repository_id ) {}
		public function set_admin_permission_repo_collaborator( $repository_id, $collab ) {}
		public function delete_admin_permission_repo_collaborator( $repository_id, $collab ) {}
		public function update_admin_permission_repo( $repository_id ) {}
		public function delete_admin_permission_repo( $repository_id ) {}
		public function get_admin_permission_repo_branches_protection_required_status_checks( $repository_id, $branch ) {}
		public function get_admin_permission_repo_branches_protection_required_status_checks_contexts( $repository_id, $branch ) {}
		public function get_issue_permission_repo_issue_comment( $repository_id, $id ) {}
		public function set_issue_permission_repo_issue( $repository_id ) {}
		public function get_issue_permission_repo_milestone( $repository_id ) {}
		public function set_issue_permission_repo_issue( $repository_id, $id ) {}
		public function update_issue_permission_repo_issue( $repository_id, $id ) {}
		public function get_issue_permission_repo_issue( $repository_id ) {}
		public function get_issue_permission_repo_issues( $repository_id, $id ) {}
		public function get_issue_permission_search_issue(){}
		public function set_issue_permission_repo_issues( $repository_id, $id ) {}
		public function get_issue_permission_repo_issue_events( $repository_id, $id ) {}
		public function get_issue_permission_repo_issues_event( $repository_id ) {}
		public function get_issue_permission_repo_issues_events( $repository_id, $id ) {}
		public function get_issue_permission_repo_assignee( $repository_id ) {}
		public function get_issue_permission_repo_assignees( $repository_id, $assignee ) {}
		public function get_issue_permission_repo_label( $repository_id ) {}
		public function get_issue_permission_repo_labels( $repository_id ) {}
		public function get_issue_permission_repo_issue_labels( $repository_id, $id ) {}
		public function set_issue_permission_repo_label( $repository_id ) {}
		public function update_issue_permission_repo_labels( $repository_id ) {}
		public function set_issue_permission_repo_labels( $repository_id ) {}
		public function delete_issue_permission_repo_labels( $repository_id ) {}
		public function set_issue_permission_repo_issues_labels( $repository_id, $id ) {}
		public function delete_issue_permission_repo_issues_labels( $repository_id, $id ) {}
		public function update_issue_permission_repo_issue_labels( $repository_id, $id ) {}
		public function delete_issue_permission_repo_issue_labels( $repository_id, $id ) {}
		public function get_issue_permission_repo_milestones( $repository_id ) {}
		public function get_issue_permission_repo_milestones_id( $repository_id, $id ) {}
		public function get_issue_permission_repo_milestones_labels( $repository_id, $id ) {}
		public function set_issue_permission_repo_milestone( $repository_id ) {}
		public function update_issue_permission_repo_milestones( $repository_id, $id ) {}
		public function set_issue_permission_repo_milestones( $repository_id, $id ) {}
		public function delete_issue_permission_repo_milestones( $repository_id, $id ) {}
		public function get_issue_permission_issues_comments( $repository_id ) {}
		public function set_issue_permission_repo_issues_comments( $repository_id ) {}
		public function get_issue_permission_repo_issue_comments( $repository_id, $id ) {}
		public function update_issue_permision_repo_issue_comments( $repository_id, $id ) {}
		public function set_issue_permission_repo_issue_comments( $repository_id, $id ) {}
		public function delete_issue_permission_repo_issue_comments( $repository_id, $id ) {}
		public function get_issue_permission_repo_issues_reactions( $owner, $repo, $number ) {}
		public function get_issue_permission_repo_issues_comments_reactions( $owner, $repo, $id ) {}
		public function get_pull_request_permission_repo_pull( $repository_id ) {}
		public function get_pull_request_permission_repo_pulls( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_pulls_files( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_milestones( $repository_id ) {}
		public function set_pull_request_permission_repo_issues_comment( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_pull_merge( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_pull_commit( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_pull_comment( $repository_id ) {}
		public function set_pull_request_permission_repo_pull_comment( $repository_id ) {}
		public function get_pull_request_permission_repo_pull_comments( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_pulls_comments( $repository_id, $id ) {}
		public function set_pull_request_permission_repo_pull_comments( $repository_id, $id ) {}
		public function update_pull_request_permission_repo_pull_comments( $repository_id, $id ) {}
		public function set_pull_request_permission_repo_pull_comment( $repository_id, $id ) {}
		public function delete_pull_request_permission_repo_pull_comments( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_pull_reviews( $repository_id, $number ) {}
		public function set_pull_request_permission_repo_pull_reviews( $repository_id, $number ) {}
		public function get_pull_request_permission_repo_pull_review( $repository_id, $number, $id ) {}
		public function get_pull_request_permission_repo_pull_review_comments( $repository_id, $number, $id ) {}
		public function set_pull_request_permission_repo_pull( $repository_id ) {}
		public function update_pull_request_permission_repo_pull( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_issue_events( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_issues_event( $repository_id ) {}
		public function get_pull_request_permission_repo_issues_events( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_assignee( $repository_id ) {}
		public function get_pull_request_permission_repo_assignees( $repository_id, $assignee ) {}
		public function get_pull_request_permission_repo_label( $repository_id ) {}
		public function get_pull_request_permission_repo_labels( $repository_id ) {}
		public function get_pull_request_permission_repo_issues_labels( $repository_id, $id ) {}
		public function set_pull_request_permission_repo_label( $repository_id ) {}
		public function update_pull_request_permission_repo_labels( $repository_id ) {}
		public function set_pull_request_permission_repo_labels( $repository_id ) {}
		public function delete_pull_request_permission_repo_labels( $repository_id ) {}
		public function set_pull_request_permission_repo_issues_lable( $repository_id, $id ) {}
		public function delete_pull_request_permission_repo_issues_labels( $repository_id, $id ) {}
		public function update_pull_request_permission_repo_issues_label( $repository_id, $id ) {}
		public function delete_pull_request_permission_repo_issues_label( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_milestone( $repository_id ) {}
		public function get_pull_reuqest_permission_repo_milesstones( $repository_id, $id ) {}
		public function get_pull_reuqest_permission_repo_milesstones_labels( $repository_id, $id ) {}
		public function set_pull_reuqest_permission_repo_milesstones( $repository_id ) {}
		public function update_pull_reuqest_permission_repo_milesstones( $repository_id, $id ) {}
		public function set_pull_reuqest_permission_repo_milesstone( $repository_id, $id ) {}
		public function delete_pull_reuqest_permission_repo_milesstones( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_issue_comment( $repository_id ) {}
		public function get_pull_request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function update_pull_request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function set_pull_request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function delete_pull_request_permission_repo_issues_comments( $repository_id, $id ) {}
		public function get_pull_request_permission_repo_pull_comment_reactions( $owner, $repo, $id ) {}
		public function set_status_permission_repo_status( $repository_id, $sha ) {}
		public function get_status_permission_repo_statuses( $repository_id ) {}
		public function get_status_permission_repo_status( $repository_id ) {}
		public function get_deployment_permission_repo_deployment( $repository_id, $id ) {}
		public function set_deployment_permission_repo_deployments_statuses( $repository_id, $deployment_id ) {}
		public function set_deployment_permission_repo_deployments( $repository_id ) {}
		public function get_deployment_permission_repo_deployments_statusest( $repository_id, $deployment_id ) {}
		public function get_deployment_permission_repo_deployments( $repository_id ) {}
		public function get_pages_permission_repo_pages( $repository_id ) {}
		public function get_pages_permission_repo_pages_build( $repository_id ) {}
		public function get_pages_permission_repo_pages_builds_latest( $repository_id ) {}
		public function get_pages_permission_repo_pages_builds( $repository_id, $id ) {}
		public function set_pages_permission_repo_pages_builds( $repository_id ) {}
		public function get_org_members_permission_org_teams( $organization_id ) {}
		public function get_org_members_permission_teams( $id ) {}
		public function get_org_members_permission_teams_members( $id ) {}
		public function get_org_members_permission_teams_memberships( $id, $user ) {}
		public function get_org_members_permission_org_members( $organization_id ) {}
		public function update_org_members_permission_org_memberships( $organization_id, $user ) {}
		public function get_org_members_permission_org_memberships( $organization_id, $user ) {}
		public function get_repo_projects_permission_repo_projects( $owner, $repo ) {}
		public function get_repo_prjects_permission_projects( $id ) {}
		public function set_repo_projects_permission_repo_projects( $owner, $repo ) {}
		public function update_repo_projects_permission_projects( $id ) {}
		public function delete_repo_projects_permission_projects( $id ) {}
		public function get_org_projects_permission_orgs_projects( $org ) {}
		public function get_org_projects_permission_projects( $id ) {}
		public function set_org_projects_permission_orgs_projects( $org ) {}
		public function update_org_projects_permission_projects( $id ) {}
		public function delete_org_projects_permission_projects( $id ) {}
		public function get_org_members_permission_orgs_member( $org ) {}
		public function get_org_members_permission_orgs_members( $org, $username ) {}
		public function delete_org_members_permission_orgs_members( $org, $username ) {}
		public function update_org_members_permission_orgs_memberships( $org, $username ) {}
		public function get_org_members_permission_orgs_memberships( $org, $username ) {}
		public function delete_org_members_permission_orgs_memberships( $org, $username ) {}

		// Issues
		public function get_issues_list( $org = null ) {}
		public function get_repo_issues_list( $owner, $repo ) {}
		public function get_single_issue( $owner, $repo, $number ) {}
		public function create_issue( $owner, $repo ) {}
		public function edit_issue( $owner, $repo, $number ) {}
		public function set_issue_lock( $owner, $repo, $number ) {}
		public function delete_issue_lock( $owner, $repo, $number ) {}
		public function get_issues_custom_media_types() {
			return array(
				'application/vnd.github.VERSION.raw+json',
				'application/vnd.github.VERSION.text+json',
				'application/vnd.github.VERSION.html+json',
				'application/vnd.github.VERSION.full+json',
			)
		}

		// Assignees
		public function get_assignees_list( $owner, $repo ) {}
		public function get_assignee( $owner, $repo, $assignee ) {}
		public function add_issue_assignee( $owner, $repo, $number ) {}
		public function delete_issue_assignee( $owner, $repo, $number ) {}

		// Issue Comments
		public function get_issue_comment_list( $owner, $repo, $number ) {}
		public function get_repo_comment_list( $owner, $repo ) {}
		public function get_issue_single_comment( $owner, $repo, $id ) {}
		public function create_issue_comment( $owner, $repo, $number ) {}
		public function edit_issue_comment( $owner, $repo, $id ) {}
		public function delete_issue_comment( $owner, $repo, $id ) {}

		// Issue Events
		public function get_issue_event_list( $owner, $repo, $issue_number ) {}
		public function get_issue_repo_event_list( $owner, $repo ) {}
		public function get_issue_single_event( $owner, $repo, $id ) {}

		// Issue Labels
		public function get_all_issue_repo_labels( $owner, $repo ) {}
		public function get_single_issue_label( $owner, $repo, $name ) {}
		public function create_issue_label( $owner, $owner ) {}
		public function set_issue_label( $owner, $repo, $name ) {}
		public function delete_issue_label( $owner, $repo, $name ) {}
		public function get_issue_label_issue_list( $owner, $repo, $number ) {}
		public function add_issue_label_issue( $owner, $repo, $number ) {}
		public function delete_issue_label_issue( $owner, $repo, $number, $name ) {}
		public function delete_all_issue_labels_issue( $owner, $repo, $number ) {}
		public function get_all_issue_labels_milestone( $owner, $repo, $number ) {}

		// Milestones
		public function get_milestone_repo_list( $owner, $repo ) {}
		public function get_single_milestone( $owner, $repo, $number ) {}
		public function create_milestone( $owner, $repo ) {}
		public function set_mileston( $owner, $repo, $number ) {}
		public function delete_milestone( $owner, $repo, $number ) {}

		// Migrations
		public function start_migration( $orgn ) {}
		public function get_migrations_list( $org ) {}
		public function get_migration_status( $org, $id ) {}
		public function get_migration_archive( $org, $id ) {}
		public function delete_migration_archive( $org, $id ) {}
		public function delete_migration_repo( $org, $id, $repo_name ) {}

		// Source Imports
		public function start_import( $owner, $repo ) {}
		public function get_import_progress( $owner, $repo ) {}
		public function set_existing_import( $owner, $repo ) {}
		public function get_commit_authors( $owner, $repo ) {}
		public function map_commit_author( $owner, $repo, $author_id ) {}
		public function set_git_lfs_preference( $owner, $name ) {}
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
		public functionget_single_template(){}

		// Licenses
		public function get_licenses_list(){}
		public function get_individual_license( $license ) {}
		public function get_repo_license( $owner, $repo ) {}
		public function get_repo_contents_license( $owner, $repo ) {}

		// Markdown
		public function create_markdown_document(){}
		public function create_markdown_document_raw(){}

		// Meta
		public function get_meta(){}

		// Rate link
		public function get_current_rate_limit(){}

		// Organizations
		public function get_org_list(){}
		public function get_org_all(){}
		public function get_user_org_list( $username ) {}
		public function get_org( $org ) {}
		public function edit_org( $org ) {}

		// Organization Members
		public function get_org_members_list( $org ) {}
		public function get_org_membership( $org, $username ) {}
		public function add_org_member(){}
		public function delete_org_member( $org, $username ) {}
		public function get_public_org_member_list( $org ) {}
		public function get_public_membership( $org, $username ) {}
		public function add_org_user_membership( $org, $username ) {}
		public function delete_org_user_membership( $org, $username ) {}
		public function get_org_user_membership( $org, $username ) {}
		public function add_org_membership( $org, $username ) {}
		public function delete_org_membership( $org, $username ) {}
		public function get_org_invitations_pending_list( $org ) {}
		public function get_user_org_membership_list(){}
		public function get_user_org_membership( $org ) {}
		public function edit_user_org_membership( $org ) {}

		// Members
		public function get_members_list( $org ) {}
		public function get_membership( $org, $username ) {}
		public function add_member(){}
		public function delete_member( $org, $username ) {}
		public function get_public_members_list( $org ) {}
		public function get_user_public_membership( $org, $username ) {}
		public function add_user_membership_member( $org, $username ) {}
		public function delete_user_membership( $org, $username ) {}
		public function get_org_membership_member( $org, $username ) {}
		public function add_org_membership_member( $org, $username ) {}
		public function delete_org_membership_member( $org, $username ) {}
		public function get_pending_org_invitation_member( $org ) {}
		public function get_user_org_membership_member_list(){}
		public function get_user_org_membership_member( $org ) {}
		public function edit_user_org_membership_member( $org ) {}

		// Outside Collaborators
		public function get_outside_collaborator_list( $org ) {}
		public function delete_outside_collaborator( $org, $username ) {}
		public function convert_member_outside_collaborator( $org, $username ) {}

		// Teams
		public function get_team_list( $org ) {}
		public function get_team( $id ) {}
		public function create_team( $org ) {}
		public function edit_team( $id ) {}
		public function delete_team( $id ) {}
		public function get_list_team_member( $id ) {}
		public function get_team_member( $id, $username ) {}
		public function add_team_member( $id, $username ) {}
		public function delete_team_member( $id, $username ) {}
		public function get_team_membership( $id, $username ) {}
		public function add_team_membership( $id, $username ) {}
		public function delete_team_membership( $id, $username ) {}
		public function get_team_repo_list( $id ) {}
		public function get_pending_team_invitations_list( $id ) {}
		public function get_team_manages_repo( $id, $owner, $repo ) {}
		public function add_team_repo( $id, $org, $repo ) {}
		public function delete_team_repo( $id, $owner, $repo ) {}
		public function get_user_team_list(){}

		// Webhooks
		public function get_hook_list( $org ) {}
		public function get_single_hook( $org, $id ) {}
		public function create_hook( $org ) {}
		public function edit_hook( $org, $id ) {}
		public function create_ping_hook( $org, $id ) {}
		public function delete_hook( $org, $id ) {}

		// Blocking Users(Organizations)
		public function get_blocked_user_list( $org ) {}
		public function get_blocked_user_org( $org, $username ) {}
		public function add_block_user( $org, $username ) {}
		public function delete_block_user( $org, $username ) {}

		// Projects
		public function get_repo_project_list( $owner, $repo ) {}
		public function get_org_project_list( $org ) {}
		public function get_project( $id ) {}
		public function create_repo_project( $owner, $repo ) {}
		public function create_org_project( $org ) {}
		public function update_project( $id ) {}
		public function delete_project( $id ) {}

		// Project Create
		public function get_project_card_list( $column_id ) {}
		public function get_project_card( $id ) {}
		public function create_project_card( $column_id ) {}
		public function update_project_card( $id ) {}
		public function delete_project_card( $id ) {}
		public function move_project_card( $id ) {}

		// Project Column
		public function get_project_columns_list( $project_id ) {}
		public function get_project_column( $id ) {}
		public function create_project_column( $project_id ) {}
		public function update_project_column( $id ) {}
		public function delete_project_column( $id ) {}
		public function move_project_column( $id ) {}

		// Pull Requests
		public function get_pull_requests_list( $repo ) {}
		public function get_single_pull_request( $owner, $repo, $number ) {}
		public function update_pull_request( $owner, $repo, $number ) {}
		public function get_pull_request_list_commits( $owner, $repo, $number ) {}
		public function get_merge_pull_request( $owner, $repo, $number ) {}
		public function get_pull_request( $owner, $repo, $number ) {}

		// Reviews
		public function get_pull_request_review_list( $owner, $repo, $number ) {}
		public function get_single_review( $owner, $repo, $number, $id ) {}
		public function delete_pending_review( $owner, $repo, $number, $id ) {}
		public function get_single_review_comments( $owner, $repo, $number, $id ) {}
		public function create_pull_request_review( $owner, $repo, $number ) {}
		public function add_pull_request_review( $owner, $repo, $number, $id ) {}
		public function delete_pull_request_review( $owner, $repo, $number, $id ) {}

		// Review Comments
		public function get_pull_request_comments_list( $owner, $repo, $number ) {}
		public function get_repo_comments_list( $owner, $repo ) {}
		public function get_single_comment( $owner, $repo, $id ) {}
		public function create_comment( $owner, $repo, $number ) {}
		public function edit_comment( $owner, $repo, $id ) {}
		public function delete_comment( $owner, $repo, $id ) {}

		// Review Requests
		public function get_review_requests_list( $owner, $repo, $number ) {}
		public function create_review_request( $owner, $repo, $number ) {}
		public function delete_review_request( $owner, $repo, $number ) {}

		// Reactions
		public function get_commit_comment_reaction_list( $owner, $repo, $id ) {}
		public function create_commit_comment_reaction( $owner, $repo, $id ) {}
		public function get_issue_reaction_list( $owner, $repo, $number ) {}
		public function create_issue_reaction( $owner, $repo, $number ) {}
		public function get_issue_comment_reactions_list( $owner, $repo, $id ) {}
		public function create_issue_comment_reaction( $owner, $repo, $id ) {}
		public function get_pull_request_review_comment_reaction_list( $owner, $repo, $id ) {}
		public function create_pull_request_review_comment_reaction( $owner, $repo, $id ) {}
		public function delete_reaction( $id ) {}

		// Repositories
		public function get_user_repo_list(){}
		public function get_org_repo_list( $org ) {}
		public function get_all_public_repo_list(){}
		public function create_user_authenticated_repo(){}
		public function create_user_authenticated_org_repo( $org ) {}
		public function get_get_forked_repo( $owner, $repo ) {}
		public function edit_repo( $owner, $repo ) {}
		public function get_repo_contributors_list( $owner, $repo ) {}
		public function get_repo_language_list( $owner, $repo ) {}
		public function get_repo_team_list( $owner, $repo ) {}
		public function get_repo_tag_list( $owner, $repo ) {}
		public function delete_repo( $owner, $repo ) {}

		// Branches
		public function get_branch_list( $owner, $repo ) {}
		public function get_branch( $owner, $repo, $branch ) {}
		public function get_branch_protection( $owner, $repo, $branch ) {}
		public function update_branch_protection( $owner, $repo, $branch ) {}
		public function delete_branch_protection( $owner, $repo, $branch ) {}
		public function get_protected_branch_req_status( $owner, $repo, $branch ) {}
		public function update_protected_branch_req_status( $owner, $repo, $branch ) {}
		public function delete_protected_branch_req_status( $owner, $repo, $branch ) {}
		public function get_protected_branch_req_status_context_list( $owner, $repo, $branch ) {}
		public function set_protected_branch_req_status_context( $owner, $repo, $branch ) {}
		public function add_protected_branch_req_status_context( $owner, $repo, $branch ) {}
		public function delete_protected_branch_req_status_context( $owner, $repo, $branch ) {}
		public function get_protected_branch_pull_req_review_enforce( $owner, $repo, $branch ) {}
		public function update_protected_branch_pull_req_review_enforce( $owner, $repo, $branch ) {}
		public function delete_protected_branch_pull_req_review_enforce( $owner, $repo, $branch ) {}
		public function get_protected_branch_admin_enforce( $owner, $repo, $branch ) {}
		public function add_protected_branch_admin_enforce( $owner, $repo, $branch ) {}
		public function delete_protected_branch_admin_enforce( $owner, $repo, $branch ) {}
		public function get_protected_branch_restrictions( $owner, $repo, $branch ) {}
		public function delete_protected_branch_restrictions( $owner, $repo, $branch ) {}
		public function get_protected_branch_team_restrictions_list( $owner, $repo, $branch ) {}
		public function set_protected_branch_team_restrictions( $owner, $repo, $branch ) {}
		public function add_protected_branch_team_restrictions( $owner, $repo, $branch ) {}
		public function delete_protected_branch_team_restrictions( $owner, $repo, $branch ) {}
		public function get_protected_branch_user_restrictions_list( $owner, $repo, $branch ) {}
		public function set_protected_branch_user_restrictions( $owner, $repo, $branch ) {}
		public function add_protected_branch_user_restrictions( $owner, $repo, $branch ) {}
		public function delete_protected_branch_user_restrictions( $owner, $repo, $branch ) {}

		// Repo Collaborators
		public function get_repo_collaborator_list( $owner, $repo ) {}
		public function get_repo_collaborator_user( $owner, $repo, $username ) {}
		public function get_repo_collaborator_user_permission_level( $owner, $repo, $username ) {}
		public function add_repo_collaborator_user( $owner, $repo, $username ) {}
		public function delete_repo_collaborator_user( $owner, $repo, $username ) {}

		// Repo Comments
		public function get_repo_comment_commit_list( $owner, $repo ) {}
		public function get_repo_single_commit_comment_list( $owner, $repo, $ref ) {}
		public function create_repo_comment_commit( $owner, $repo, $sha ) {}
		public function get_repo_single_commit_comment( $owner, $repo, $id ) {}
		public function update_repo_comment_commit( $owner, $repo, $id ) {}
		public function delete_repo_comment_commit( $owner, $repo, $id ) {}

		// Repo commit
		public function get_repo_commit_list( $owner, $repo ) {}
		public function get_repo_single_commit( $owner, $repo, $sha ) {}
		public function get_repo_sha_1_commit_reference( $owner, $repo, $ref ) {}
		public function compare_commits( $owner, $repo, $base, $head ) {}
		public function get_repo_verification_signature_commit( $owner, $repo, $sha ) {}

		// Repo Community Profile
		public function get_repo_metrics_profile_commun( $owner, $name ) {}

		// Repo Contents
		public function get_repo_readme( $owner, $repo ) {}
		public function get_repo_contents( $owner, $repo, $path ) {}
		public function create_repo_file( $owner, $repo, $path ) {}
		public function update_repo_file( $owner, $repo, $path ) {}
		public function delete_repo_file( $owner, $repo, $path ) {}
		public function get_repo_archive_link( $owner, $repo, $archive_format, $ref ) {}

		// Repo Deploy Keys
		public function get_repo_deploy_key_list( $owner, $repo ) {}
		public function get_repo_deploy_key( $owner, $repo, $id ) {}
		public function add_repo_deploy_key( $owner, $repo ) {}
		public function edit_repo_deploy_key( $owner, $repo, $id ) {}
		public function delete_repo_deploy_key( $owner, $repo, $id ) {}

		// Repo Deployments
		public function get_repo_deploy_list( $owner, $repo ) {}
		public function get_single_repo_deploy( $owner, $repo, $deployment_id ) {}
		public function create_repo_deploy( $owner, $repo ) {}
		public function get_repo_deploy_status_list( $owner, $repo, $id ) {}
		public function get_repo_single_deploy_status( $owner, $repo, $id, $status_id ) {}
		public function create_repo_deploy_status( $owner, $repo, $id ) {}

		// Repo Downloads
		public function get_repo_download_list( $owner, $repo ) {}
		public function get_single_repo_download( $owner, $repo, $id ) {}
		public function delete_repo_download( $owner, $repo, $id ) {}

		// Repo Forks
		public function get_repo_fork_list( $owner, $repo ) {}
		public function create_repo_fork( $owner, $repo ) {}

		// Repo Invitations
		public function get_repo_invite_list( $owner, $repo ) {}
		public function delete_repo_invite( $owner, $repo, $invitation_id ) {}
		public function update_repo_invite( $owner, $repo, $invitation_id ) {}
		public function get_repo_user_invite_list(){}
		public function accept_repo_invite( $invitation_id ) {}
		public function decline_repo_invite( $invitation_id ) {}

		// Repo Merging
		public function perform_repo_merge( $owner, $repo ) {}

		// Repo Pages
		public function get_repo_page_site_info( $owner, $repo ) {}
		public function request_repo_page_build( $owner, $repo ) {}
		public function get_repo_page_build_list( $owner, $repo ) {}
		public function get_repo_latest_page_build_list( $owner, $repo ) {}
		public function get_repo_specific_page_build_list( $owner, $repo, $id ) {}

		// Repo releases
		public function get_repo_release_list( $owner, $repo ) {}
		public function get_repo_single_release( $owner, $repo, $id ) {}
		public function get_repo_latest_release( $owner, $repo ) {}
		public function get_repo_release_tag_name( $owner, $repo, $tag ) {}
		public function create_repo_release( $owner, $repo ) {}
		public function edit_repo_release( $owner, $repo, $id ) {}
		public function delete_repo_release( $owner, $repo, $id ) {}
		public function get_repo_release_asset_list( $owner, $repo, $id ) {}
		public function upload_repo_release_asset( $owner, $id ) {}
		public function get_repo_release_single_asset( $owern, $repo, $id ) {}
		public function edit_repo_release_asset( $owner, $repo, $id ) {}
		public function delete_repo_release_asset( $owner, $repo, $id ) {}

		// Repo Statistics
		public function get_repo_add_delete_commit_count_contributors( $owner, $repo ) {}
		public function get_repo_commit_activity_data_last_year( $owner, $repo ) {}
		public function get_number_add_delete_week( $owner, $repo ) {}
		public function get_repo_commit_count_weekly( $owner, $repo ) {}
		public function get_number_commit_hour_day( $owner, $repo ) {}

		// Repo Status
		public function create_repo_status( $owner, $repo, $sha ) {}
		public function get_repo_specific_ref_status_list( $owner, $repo, $ref ) {}
		public function get_repo_specific_ref_combined_status( $owner, $repo, $ref ) {}

		// Repo traffic
		public function get_repo_referrers_list( $owner, $repo ) {}
		public function get_repo_path_list( $owner, $repo ) {}
		public function get_repo_views( $owner, $repo ) {}
		public function get_repo_clone( $owner, $repo ) {}

		// Repo Webhooks
		public function get_repo_hook_list( $owner, $repo ) {}
		public function get_repo_single_hook( $owner, $repo, $id ) {}
		public function create_repo_hook( $owner, $repo ) {}
		public function edit_repo_hook( $owner, $repo, $id ) {}
		public function push_repo_hook( $owner, $repo, $id ) {}
		public function ping_repo_hook( $owner, $repo, $id ) {}
		public function delete_repo_hook( $owner, $repo, $id ) {}
		public function pub_sub_hub_bub( $owner, $repo, $event ) {}
		public function response_format( $owner, $repo ) {}

		// Search
		public function get_search_repo(){}
		public function get_search_commit(){}
		public function get_search_code(){}
		public function get_search_issues(){}
		public function get_search_users(){}

		// Legacy Search
		public function get_legacy_search_issues( $owner, $repo, $state, $keyword ) {}
		public function get_legacy_search_repo( $keyword ) {}
		public function get_legacy_search_user( $keyword ) {}
		public function get_legacy_search_email( $email ) {}

		// SCIM
		public function get_provisioned_identities_list( $organization ) {}
		public function get_single_user_provision_details( $organization, $id ) {}
		public function send_user_invite_provision( $organization ) {}
		public function update_memembership_org_provision( $organization, $id ) {}
		public function update_user_attribute( $organization, $id ) {}
		public function delete_org_user( $organization, $id ) {}

		// Users
		public function get_single_user( $username ) {}
		public function get_authenticated_user(){}
		public function update_authenticated_user(){}
		public function get_all_users(){}

		// User emails
		public function get_user_email_address_list(){}
		public function get_user_public_email_address_list(){}
		public function add_user_email_address(){}
		public function delete_user_email_address(){}
		public function toggle_user_primary_email_visibiltiy(){}

		// User Followers
		public function get_user_follower_list( $username ) {}
		public function get_user_follow_user_list( $username ) {}
		public function get_user_follow_personal_user( $username ) {}
		public function get_user_follows_user( $username, $target_user ) {}
		public function follow_user( $username ) {}
		public function unfollow_user( $username ) {}

		// User Git SSH Keys
		public function get_user_public_key_list( $username ) {}
		public function get_personal_public_key_list(){}
		public function get_user_single_public_key( $id ) {}
		public function create_user_public_key(){}
		public function update_user_public_key(){}
		public function delete_user_public_key( $id ) {}

		// GPG Keys
		public function get_user_gpg_key_list( $username ) {}
		public function get_personal_gpg_key_list(){}
		public function get_single_user_gpg_key( $id ) {}
		public function create_gpg_key(){}
		public function delete_gpg_key( $id ) {}

		// User Block Another User
		public function get_user_block_user_list(){}
		public function get_personal_user_block_user( $username ) {}
		public function block_user( $username ) {}
		public function unblock_user( $username ) {}

		// Admin Stats Enterprise
		public function get_enterprise_admin_stats( $type ) {}

		// LDAP Enterprise
		public function update_enterprise_ldap_user_mapping( $usernmae ) {}
		public function set_enterprise_ldap_user_mapping( $usernmae ) {}
		public function update_enterprise_ldap_team_mapping( $team_id ) {}
		public function set_enterprise_ldap_team_mapping( $team_id ) {}

		// Enterprise Lincense
		public function get_enterprise_license_infromation(){}

		// Enterprise Management Console
		public function set_enterprise_first_time_license(){}
		public function set_enterprise_license(){}
		public function get_enterprise_configuration_status(){}
		public function set_enterprise_config_process(){}
		public function get_enterprise_settings(){}
		public function update_enterprise_settings(){}
		public function get_enterprise_maintenance_status(){}
		public function set_enterprise_maintence_mode(){}
		public function get_enterprise_auth_ssh_keys(){}
		public function add_enterprise_new_auth_ssh_key(){}
		public function delete_enterprise_auth_ssh_key(){}

		// Enterprise Pre-recive Enviroment
		public function get_enterprise_single_pre_recieve_enviroment( $id ) {}
		public function get_enterprise_pre_recieve_enviroment_list(){}
		public function set_enterprise_pre_recieve_enviroment(){}
		public function edit_enterprise_pre_recieve_enviroment( $id ) {}
		public function delete_enterprise_pre_recieve_enviroment( $id ) {}
		public function get_enterprise_pre_recieve_enviroment_download_status( $id ) {}
		public function set_pre_recieve_enviroment_download( $id ) {}

		// Enterprise Pre-recieve Hooks
		public function get_enterprise_single_pre_recieve_hook( $id ) {}
		public function get_enterprise_pre_recieve_hook_list(){}
		public function set_enterprise_pre_recieve_hook(){}
		public function edit_enterprise_pre_recieve_hook( $id ) {}
		public function delete_enterprise_pre_recieve_hook( $id ) {}

		// Enterprise Search Indexing
		public function set_enterprise_indexing_job_queue(){}

		// Enterprise Organization Administration
		public function set_enterprise_organization(){}
		public function update_enterprise_organization_name(){}
	} // End Class.
} // End Class Exists Check.
