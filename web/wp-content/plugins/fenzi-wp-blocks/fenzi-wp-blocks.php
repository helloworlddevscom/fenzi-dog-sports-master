<?php
/**
 * Plugin Name:       Fenzi WP Blocks
 * Description:       A library of Gutenberg blocks built by HelloWorldDevs for Fenzi sites.
 * Version:           1.0.0a
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Author:            HWD Developers
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       fenzi-wp-blocks
 *
 * @package           fenzi-wp-blocks
 */


/**
 * Add custom block category for easy searching
 */
add_filter( 'block_categories_all' , function( $categories ) {

    // Adding a new category.
    $categories[] = array(
        'slug'  => 'hwd-fenzi',
        'title' => 'HWD & Fenzi'
    );

    return $categories;
} );

/**
 * Registers the blocks
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function fenzi_register_blocks() {

    // add script for some api calls in the blocks
    wp_enqueue_script( 'wp-api-fetch' );
    wp_enqueue_script( 'jquery' );

    // get main block
    $main_block_directories = glob(__DIR__ . '/src/main_block/*' , GLOB_ONLYDIR);
    $main_block_directory_parts = explode('/', $main_block_directories[0]);
    $main_block_name = $main_block_directory_parts[count($main_block_directory_parts)-1];

    // require php file that contain render function
    require_once __DIR__ . "/src/main_block/".$main_block_name."/render.php";

    // register block
    register_block_type( __DIR__ . '/src/main_block/'.$main_block_name.'/'.str_replace('_','-',$main_block_name ).'-block.json',  array(
        'api_version' => 2,
        'render_callback' => 'fenzi_render_'.$main_block_name
    ) );

    // get all additional blocks
    $additional_blocks_directories = glob(__DIR__ . '/src/additional_blocks/*' , GLOB_ONLYDIR);

    // foreach additional block
    foreach ($additional_blocks_directories AS $additional_blocks_directory){

        $additional_blocks_directory_parts = explode('/', $additional_blocks_directory);
        $additional_blocks_name = $additional_blocks_directory_parts[count($additional_blocks_directory_parts)-1];

        // require php files that contain render functions
        require_once __DIR__ . "/src/additional_blocks/".$additional_blocks_name."/render.php";

        // register block
        register_block_type( __DIR__ . '/src/additional_blocks/'.$additional_blocks_name.'/'.str_replace('_','-',$additional_blocks_name ).'-block.json',  array(
            'api_version' => 2,
            'render_callback' => 'fenzi_render_'.$additional_blocks_name
        ) );
    }
}
add_action( 'init', 'fenzi_register_blocks' );

