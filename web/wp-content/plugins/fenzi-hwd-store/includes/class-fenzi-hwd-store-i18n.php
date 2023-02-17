<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/HelloWorldDevs/fenzi-dog-sports
 * @since      1.0.0
 *
 * @package    Fenzi_Hwd_Store
 * @subpackage Fenzi_Hwd_Store/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Fenzi_Hwd_Store
 * @subpackage Fenzi_Hwd_Store/includes
 * @author     Hello World Devs <info@helloworlddevs.com>
 */
class Fenzi_Hwd_Store_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'fenzi-hwd-store',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
