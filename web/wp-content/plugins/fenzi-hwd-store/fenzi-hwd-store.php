<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/HelloWorldDevs/fenzi-dog-sports
 * @since             1.0.0
 * @package           Fenzi_Hwd_Store
 *
 * @wordpress-plugin
 * Plugin Name:       fenzi hwd store
 * Plugin URI:        https://github.com/HelloWorldDevs/fenzi-dog-sports
 * Description:       WordPress Plugin for HWD custom code.
 * Version:           1.0.2
 * Author:            Hello World Devs
 * Author URI:        https://github.com/HelloWorldDevs/fenzi-dog-sports
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fenzi-hwd-store
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FENZI_HWD_STORE_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fenzi-hwd-store-activator.php
 */
function activate_fenzi_hwd_store() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fenzi-hwd-store-activator.php';
	Fenzi_Hwd_Store_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fenzi-hwd-store-deactivator.php
 */
function deactivate_fenzi_hwd_store() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fenzi-hwd-store-deactivator.php';
	Fenzi_Hwd_Store_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_fenzi_hwd_store' );
register_deactivation_hook( __FILE__, 'deactivate_fenzi_hwd_store' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fenzi-hwd-store.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fenzi_hwd_store() {
	return Fenzi_Hwd_Store::instance();
}
run_fenzi_hwd_store();
