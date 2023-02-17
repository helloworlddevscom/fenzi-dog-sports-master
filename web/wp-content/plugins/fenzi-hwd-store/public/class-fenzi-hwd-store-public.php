<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/HelloWorldDevs/fenzi-dog-sports
 * @since      1.0.0
 *
 * @package    Fenzi_Hwd_Store
 * @subpackage Fenzi_Hwd_Store/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Fenzi_Hwd_Store
 * @subpackage Fenzi_Hwd_Store/public
 * @author     Hello World Devs <info@helloworlddevs.com>
 */
class Fenzi_Hwd_Store_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fenzi_Hwd_Store_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fenzi_Hwd_Store_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fenzi-hwd-store-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function a single file that is called from the Loader class.
		 *
		 * An instance of this class is passed to the run() function
		 * defined in bef_store_calculator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The bef_store_calculator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// Generate Nonce to verify request is coming from the site.
		$params = array(
			'ajaxurl'    =>  admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce('fenzi-hwd-storew'),
			// Handy method to add userId to ajax para.
			'userId' => $this->get_current_user_id()
		);

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/fenzi-hwd-store-public.js', array('jquery'), $this->version, false);
		wp_localize_script( $this->plugin_name, 'jsParameters', $params );
	}

	/**
	 * @return int
	 */
	private function get_current_user_id(): int {
		if ( ! function_exists( 'wp_get_current_user' ) ) {
			return 0;
		}
		$user = wp_get_current_user();
		return ( isset( $user->ID ) ? (int) $user->ID : 0 );
	}

}
