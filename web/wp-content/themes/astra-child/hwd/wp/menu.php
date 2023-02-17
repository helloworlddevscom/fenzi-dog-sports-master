<?php

function hwd_wp_nav_menu_objects( $items, $args ) {

	if ( isset( $args->theme_location ) && ( $args->theme_location === 'mobile_menu' ) ) {

		// clear items to return because we will use sub navbar to build desired mobile ui
		$items = [];
	}


    if ( isset( $args->theme_location ) && ( $args->theme_location === 'primary' ) ) {

        $class_to_hide = is_user_logged_in() ? "hwd-no-user-show" : "hwd-user-show";
        foreach($items AS &$item){
            if(in_array($class_to_hide, $item->classes)){
                $item->classes[] = 'hwd-display-none';
            }
        }

    }

	return $items;
}
add_filter( 'wp_nav_menu_objects', 'hwd_wp_nav_menu_objects', 10, 3 );

function hwdAddMobileMenuType() {
    register_nav_menus(
        array(
            'mobile_menu' => __( 'Mobile Menu' )
        )
    );
}
add_action( 'init', 'hwdAddMobileMenuType' );
