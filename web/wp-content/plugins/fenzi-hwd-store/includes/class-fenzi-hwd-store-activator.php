<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/HelloWorldDevs/fenzi-dog-sports
 * @since      1.0.0
 *
 * @package    Fenzi_Hwd_Store
 * @subpackage Fenzi_Hwd_Store/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Fenzi_Hwd_Store
 * @subpackage Fenzi_Hwd_Store/includes
 * @author     Hello World Devs <info@helloworlddevs.com>
 */
class Fenzi_Hwd_Store_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		self::loadDeps();
//		self::createUserSummaryTable();
//		self::createPageDefinitions();
	}

	private static function loadDeps() {
		require_once ABSPATH . '/wp-admin/includes/upgrade.php';
	}

//	/**
//	 * EXAMPLE:   Presently not in use
//	 * @return void
//	 */
//	private static function createUserSummaryTable() {
//		global $wpdb;
//		$summary_tbl = "wp_users";
//
//		if($wpdb->get_var( "show tables like '" . $summary_tbl . "'" ) != $summary_tbl )
//		{
//
//			$sql = "CREATE TABLE IF NOT EXISTS `". $summary_tbl  . "` ( ";
//			$sql .= " `id` INT AUTO_INCREMENT PRIMARY KEY, ";
//			$sql .= " `user_id` INT NOT NULL, ";
//			$sql .= " `summary_name` VARCHAR(255) NOT NULL, ";
//			$sql .= " `file_path` VARCHAR(255) NOT NULL, ";
//			$sql .= " `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
//
//			dbDelta($sql);
//		}
//	}
//
//	/**
// 	 * EXAMPLE:   Presently not in use
//	 * Creates all WordPress pages needed by the plugin.
//	 */
//	private static function createPageDefinitions() {
//
//		// Information needed for creating the plugin's pages
//		$page_definitions = array(
//			'customer-password-lost'  => array(
//				'title'   => __( 'Forgot Your Password?', 'fenzi-hwd-store' ),
//				'content' => '[customer-password-lost-form]'
//			),
//			'customer-password-reset' => array(
//				'title'   => __( 'Pick a New Password', 'fenzi-hwd-store' ),
//				'content' => '[customer-password-reset-form]'
//			)
//		);
//
//		foreach ( $page_definitions as $slug => $page ) {
//			// Check that the page doesn't exist already
//			$query = new WP_Query( 'pagename=' . $slug );
//			if ( ! $query->have_posts() ) {
//				// Add the page using the data from the array above
//				wp_insert_post(
//					array(
//						'post_content'   => $page['content'],
//						'post_name'      => $slug,
//						'post_title'     => $page['title'],
//						'post_status'    => 'publish',
//						'post_type'      => 'page',
//						'ping_status'    => 'closed',
//						'comment_status' => 'closed',
//						// Assign page template
//						'page_template'  => 'templates/template-store.php'
//					)
//				);
//			}
//		}
//	}
}