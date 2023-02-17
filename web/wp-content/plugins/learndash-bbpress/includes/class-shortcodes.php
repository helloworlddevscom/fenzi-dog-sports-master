<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

/**
 * Learndash_Shortcodes
 */
class Learndash_Shortcodes {

    /**
     * Init the class
     * @return void
     */
    public static function init() {
        add_action( 'init', [ self::class, 'register_shortcodes' ] );
    }

    /**
     * Register shortcode tags and its callback
     * @return void
     */
    public static function register_shortcodes() {
        add_shortcode( 'ld_bbpress_object_forums', [ self::class, 'ld_bbpress_object_forums' ] );
        add_shortcode( 'ld_bbpress_forum_objects', [ self::class, 'ld_bbpress_forum_objects'] );
    }

    /**
     * Output value for shortcode tag [ld_bbpress_object_forums]
     * @param  array  $atts Shortcode attributes
     * @return string       Output value
     */
    public static function ld_bbpress_object_forums( $atts ) {
        $atts = shortcode_atts( [
            'object_id' => null,
        ], $atts );

        return ld_bbpress_get_object_forums_html( $atts );
    }

    /**
     * Output value for shortcode tag [ld_bbpress_forum_objects]
     * @param  array  $atts Shortcode attributes
     * @return string       Output value
     */
    public static function ld_bbpress_forum_objects( $atts ) {
        $atts = shortcode_atts( [
            'forum_id' => null,
            'show' => 'all',
        ], $atts );

        return ld_bbpress_get_forum_objects_html( $atts );   
    }
}

Learndash_Shortcodes::init();