<?php

// MUST have WordPress
if (!defined('WPINC')) {
	exit('Do not access this file directly.');
}

// Example AJAX request
//add_action("wp_ajax_<HOOK>", "<REFERENCE>");
//add_action("wp_ajax_nopriv_<HOOK>", "<REFERENCE>");

add_action("wp_ajax_get_ajax_example", "get_ajax_example");
add_action("wp_ajax_nopriv_get_ajax_example", "get_ajax_example");

function get_ajax_example() {
	// Don't Allow Ajax with custom NOICE request in call
	if ( ! wp_verify_nonce( $_REQUEST['nonce'], "fenzi-hwd-store" ) ) {
		exit( "No access.  Missing information!" );
	}

	$input   = 0;
	$results = 0;
	// Check to make sure that proper AJAX request HTTP headers are present.
	if ( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
		// This is where you can only call function with correct header
		$results = json_encode( $input );
		//	.. run function here
	} else {
		header( "Location: " . $_SERVER["HTTP_REFERER"] );
	}

	echo $results;

	die();
}