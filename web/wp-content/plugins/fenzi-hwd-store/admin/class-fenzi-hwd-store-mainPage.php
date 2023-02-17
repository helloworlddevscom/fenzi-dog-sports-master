<?php

/**
 * Main admin page building module for fenzi HWD store module.
 *
 * @link       http://www.helloworlddevs.com
 * @since      1.0.2
 *
 * @package    fenzi_hwd_store
 * @subpackage fenzi_hwd_store/admin
 */

if (!defined('WPINC')) { // MUST have WordPress.
    exit('Do not access this file directly.');
}

/**
 * The core plugin class to build UI.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.2
 * @package    fenzi_hwd_store
 * @subpackage fenzi_hwd_store/admin
 * @author     Jeff Browning <jeff@helloworlddevs.com>
 */
class fenzi_hwd_store_mainPage {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      fenzi_hwd_store_Loader $loader Maintains and registers all hooks for the plugin.
     */
    public static function fenzi_hwd_store_display_page() {

        echo '<div class= "row">';
        echo '<h1 class="center" >FENZI Admin Dashboard</h1>';
        echo '</div>';
    }
}
