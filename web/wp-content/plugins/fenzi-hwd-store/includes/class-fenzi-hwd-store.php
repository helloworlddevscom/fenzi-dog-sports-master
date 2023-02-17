<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/HelloWorldDevs/fenzi-dog-sports
 * @since      1.0.0
 *
 * @package    Fenzi_Hwd_Store
 * @subpackage Fenzi_Hwd_Store/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Fenzi_Hwd_Store
 * @subpackage Fenzi_Hwd_Store/includes
 * @author     Hello World Devs <info@helloworlddevs.com>
 */
final class Fenzi_Hwd_Store {

	private static $instance;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Fenzi_Hwd_Store_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Fenzi_Hwd_Store ) ) {
			self::$instance = new Fenzi_Hwd_Store;

			if ( defined( 'FENZI_HWD_STORE_VERSION' ) ) {
				self::$instance->version = FENZI_HWD_STORE_VERSION;
			} else {
				self::$instance->version = '1.0.0';
			}

			self::$instance->plugin_name = 'fenzi-hwd-store';
			self::$instance->load_dependencies();
			self::$instance->set_locale();

			self::$instance->define_admin_hooks();
			self::$instance->define_public_hooks();

			// Integrate Plugin into design
			self::$instance->loader->run();
		}
	}

			/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Fenzi_Hwd_Store_Loader. Orchestrates the hooks of the plugin.
	 * - Fenzi_Hwd_Store_i18n. Defines internationalization functionality.
	 * - Fenzi_Hwd_Store_Admin. Defines all hooks for the admin area.
	 * - Fenzi_Hwd_Store_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fenzi-hwd-store-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fenzi-hwd-store-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fenzi-hwd-store-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-fenzi-hwd-store-public.php';

        /**
         * The class responsible for defining all AJAX actions on the public-facing
         * side of the site.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/ajax-fenzi-hwd-store-entry.php';

        /**
         * The file responsible for defining all custom user role types.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/fenzi-hwd-store-user-role.php';

		$this->loader = new Fenzi_Hwd_Store_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Fenzi_Hwd_Store_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Fenzi_Hwd_Store_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Fenzi_Hwd_Store_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Here we are adding the admin_menu page to the admin side bar.   When "admin_menu" hook is called
		// do_action('admin_menu'), this function will be called.  Fenzi_Hwd_Store_Admin resides in
		// *_Admin class.  /admin/class-fenzi-hwd-store-admin.php
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'fenzi_hwd_store_setup_menu' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Fenzi_Hwd_Store_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Fenzi_Hwd_Store_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
