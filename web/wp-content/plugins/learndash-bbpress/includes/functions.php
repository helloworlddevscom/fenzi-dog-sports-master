<?php

// Restrict participation in forum (replies & topic creation)
add_filter('bbp_current_user_can_publish_topics', 'ld_restrict_forum_participation');
add_filter('bbp_current_user_can_publish_replies', 'ld_restrict_forum_participation');
function ld_restrict_forum_participation( $can_post ){
	
	// Always allow keymasters
	if ( bbp_is_user_keymaster() ){
		return true;
	}

	$forum_id = bbp_get_forum_id();
	$user_id = get_current_user_ID();
	
	$associated_courses = get_post_meta( $forum_id, '_ld_associated_courses', true );
	$associated_groups  = get_post_meta( $forum_id, '_ld_associated_groups', true );
	$allow_post = get_post_meta( $forum_id, '_ld_post_limit_access', true );
	$allow_forum_view = get_post_meta( $forum_id, '_ld_allow_forum_view', true );
	
	if ( current_user_can( 'publish_topics' ) ) {
		$has_access_course = true;
		$has_access_group  = true;

		if ( is_array( $associated_courses ) ) {
			foreach ( $associated_courses as $associated_course ) {	
				// Default expected value of $allow_post == 'all'
				if ( $allow_post == 'all' ) {
					if ( ! sfwd_lms_has_access( $associated_course, $user_id ) || ! is_user_logged_in() ) {
						return false;
					}
				} else {
					if ( sfwd_lms_has_access( $associated_course, $user_id ) && is_user_logged_in() ) {
						$access_found = true;
						break;
					} else {
						$has_access_course = false;
					}
				}
			}

			if ( isset( $access_found ) && $access_found ) {
				$has_access_course = true;
			}
		}

		if ( is_array( $associated_groups ) ) {
			foreach ( $associated_groups as $associated_group ) {	
				// Default expected value of $allow_post == 'all'
				if ( $allow_post == 'all' ) {
					if ( ! learndash_is_user_in_group( $user_id, $associated_group ) || ! is_user_logged_in() ) {
						return false;
					}
				} else {
					if ( learndash_is_user_in_group( $user_id, $associated_group ) && is_user_logged_in() ) {
						$access_found = true;
						break;
					} else {
						$has_access_group = false;
					}
				}
			}

			if ( isset( $access_found ) && $access_found ) {
				$has_access_group = true;
			}
		}

		if ( $allow_post === 'all' ) {
			if ( ! $has_access_course || ! $has_access_group ) {
				return false;
			}
		} else {
			if ( ! $has_access_course && ! $has_access_group ) {
				return false;
			}
		}
	} else {
		return false;
	}

	return $can_post;
}

//disable topic subscription & favorite link for users except course students.
add_filter( 'bbp_get_user_subscribe_link', 'ld_disable_topic_subscription', 10, 4);
add_filter( 'bbp_get_user_favorites_link', 'ld_disable_topic_subscription', 10, 4);
function ld_disable_topic_subscription( $html, $r, $user_id, $topic_id ) {
	// Always allow keymasters
	if ( bbp_is_user_keymaster() ){
		return $html;
	}

	$forum_id = bbp_get_forum_id();
	$user_id = get_current_user_ID();
	
	$associated_courses = get_post_meta( $forum_id, '_ld_associated_courses', true );
	$associated_groups  = get_post_meta( $forum_id, '_ld_associated_groups', true );
	$allow_post = get_post_meta( $forum_id, '_ld_post_limit_access', true );
	$allow_forum_view = get_post_meta( $forum_id, '_ld_allow_forum_view', true );
	
	$has_access_course = true;
	$has_access_group  = true;

	if ( is_array( $associated_courses ) ) {
		foreach( $associated_courses as $associated_course ) {	
			// Default expected value of $allow_post == 'all'
			if ( $allow_post == 'all' ) {
				if ( ! sfwd_lms_has_access( $associated_course, $user_id ) || ! is_user_logged_in() ) {
					return '';
				}
			} else {
				if ( sfwd_lms_has_access( $associated_course, $user_id ) && is_user_logged_in() ) {
					$access_found = true;
					break;
				} else {
					$has_access_course = false;
				}
			}
		}

		if ( isset( $access_found ) && $access_found ) {
			$has_access_course = true;
		}
	}

	if ( is_array( $associated_groups ) ) {
		foreach ( $associated_groups as $associated_group ) {	
			// Default expected value of $allow_post == 'all'
			if ( $allow_post == 'all' ) {
				if ( ! learndash_is_user_in_group( $user_id, $associated_group ) || ! is_user_logged_in() ) {
					return false;
				}
			} else {
				if ( learndash_is_user_in_group( $user_id, $associated_group ) && is_user_logged_in() ) {
					$access_found = true;
					break;
				} else {
					$has_access_group = false;
				}
			}
		}

		if ( isset( $access_found ) && $access_found ) {
			$has_access_group = true;
		}
	}

	if ( $allow_post === 'all' ) {
		if ( ! $has_access_course || ! $has_access_group ) {
			return '';
		}
	} else {
		if ( ! $has_access_course && ! $has_access_group ) {
			return '';
		}
	}

	return $html;
}

// Restrict access to forum & topics completely & show take course message in place
add_filter( 'bbp_user_can_view_forum', 'ld_restrict_forum_access', 15, 3 );
function ld_restrict_forum_access( $retval, $forum_id, $user_id ){
	// Always allow keymasters
	if ( bbp_is_user_keymaster() ){
		return true;
	}
	
	$associated_courses = get_post_meta( $forum_id, '_ld_associated_courses', true );
	$associated_groups  = get_post_meta( $forum_id, '_ld_associated_groups', true );

	$allow_post = get_post_meta( $forum_id, '_ld_post_limit_access', true );
	$allow_forum_view = get_post_meta( $forum_id, '_ld_allow_forum_view', true );
	$message_without_access = get_post_meta( get_the_ID(), '_ld_message_without_access', true );
	$message_without_access = ! empty( $message_without_access ) ? $message_without_access : __( 'This forum is restricted to members of the associated course(s) and group(s).', 'learndash-bbpress' );

	$has_access_course = true;
	$has_access_group  = true;

	if ( is_array( $associated_courses ) && ! empty( $associated_courses ) ) {
		$has_access_course = true;

		foreach ( $associated_courses as $associated_course ) {	
			// Default expected value of $allow_post == 'all'
			if ( $allow_post == 'all' ) {
				if ( ! sfwd_lms_has_access( $associated_course, $user_id ) || ! is_user_logged_in() ) {
					$has_access_course = false;
					break;
				}
			} else {
				if ( sfwd_lms_has_access( $associated_course, $user_id ) && is_user_logged_in() ) {
					$has_access_course = true;
					break;
				} else {
					$has_access_course = false;
				}
			}
		}
	}

	if ( is_array( $associated_groups ) && ! empty( $associated_groups ) ) {
		$has_access_group = true;

		foreach ( $associated_groups as $associated_group ) {	
			// Default expected value of $allow_post == 'all'
			if ( $allow_post == 'all' ) {
				if ( ! learndash_is_user_in_group( $user_id, $associated_group ) || ! is_user_logged_in() ) {
					$has_access_group = false;
					break;
				}
			} else {
				if ( learndash_is_user_in_group( $user_id, $associated_group ) && is_user_logged_in() ) {
					$has_access_group = true;
					break;
				} else {
					$has_access_group = false;
				}
			}
		}
	}
	
	$go_back_url = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : home_url();

	$content = "<div id='bbpress-forums' class='ld-bbpress-forums'>
					<p class='pre-message'>" . $message_without_access . "</p>
				</div>";

	if ( $allow_forum_view == '1' ) {
		return true;
	}

	if ( $allow_post === 'all' ) {
		if ( ! $has_access_course || ! $has_access_group ) {
			$retval = false;
			echo apply_filters( 'ld_forum_access_restricted_message', $content, $forum_id, $associated_courses, $associated_groups );
		}
	} else {
		if ( ! $has_access_course && ! $has_access_group ) {
			$retval = false;
			echo apply_filters( 'ld_forum_access_restricted_message', $content, $forum_id, $associated_courses, $associated_groups );
		}
	}

	return $retval;
}

//show associated course below the forum title in forum archive
add_action( 'bbp_theme_after_forum_description', 'ld_associated_course_link' );
function ld_associated_course_link() {
	$content = '<span class="ld-bbpress-desc-link"><small><strong>' . __( 'Associated Courses and Groups', 'learndash-bbpress' ) . ':</strong>';
	$courses = get_post_meta( get_the_ID(), '_ld_associated_courses', true );
	$groups  = get_post_meta( get_the_ID(), '_ld_associated_groups', true );

	if ( is_array( $courses ) ) {
		foreach ( $courses as $course_id ) {
			if ( $course_id != null && $course_id > 0 )
			$content .= '<br /><a href="' . get_permalink( $course_id ) . '">' . get_the_title( $course_id ) . '</a>';
		}
	}

	if ( is_array( $groups ) ) {
		foreach ( $groups as $group_id ) {
			if ( $group_id != null && $group_id > 0 )
			$content .= '<br /><a href="' . get_permalink( $group_id ) . '">' . get_the_title( $group_id ) . '</a>';
		}
	}
	
	$content .= '</small></span>';
	if ( ! empty( $courses ) ) {
		echo $content;
	}
}

//remove repetation of private twice in private forum titles
add_filter( 'bbp_get_forum_title', 'ld_bbp_forum_title', 10, 2 );
function ld_bbp_forum_title( $title, $forum_id ) {
	return str_replace( 'Private:', '', $title );
}

// Assign participant forum role to new students
add_action( 'learndash_update_course_access', 'ld_bbp_assign_role', 10, 4 );
function ld_bbp_assign_role( $user_id, $course_id, $access_list, $remove ) {
	if ( true === $remove ) {
		return;
	}

	$role = bbp_get_user_role( $user_id );
	if ( empty( $role ) || false === $role || 'bbp_spectator' === $role ) {
		bbp_set_user_role( $user_id, 'bbp_participant' );
	}
}

/**
 * Get course forums in HTML output
 * 
 * @param  array  $args Arguments in key value pair
 * @return string       HTML of course forums list
 */
function ld_bbpress_get_object_forums_html( $args = [] ) {
    if ( empty( $args['object_id'] ) ) {
    	if ( is_singular( [ 'sfwd-courses', 'sfwd-lessons', 'sfwd-topic' ] ) ) {
    		$object_id = learndash_get_course_id( get_the_ID() );
    	} elseif ( is_singular( [ 'groups' ] ) ) {
    		$object_id = get_the_ID();
    	}
    } else {
    	$object_id = $args['object_id'];
    }

    if ( is_bbpress() ) {
    	$forum_id = bbp_get_forum_id();

    	$forum_associated_courses = (array) get_post_meta( $forum_id, '_ld_associated_courses', true );
    	$forum_associated_groups = (array) get_post_meta( $forum_id, '_ld_associated_groups', true );
    	$forum_associated_objects = array_merge( $forum_associated_courses, $forum_associated_groups );
    }

    $forums = new WP_Query( array(
    	'post_type'           => bbp_get_forum_post_type(),
    	'post_status'         => bbp_get_public_status_id(),
    	'posts_per_page'      => get_option( '_bbp_forums_per_page', 50 ),
    	'ignore_sticky_posts' => true,
    	'no_found_rows'       => true,
    	'orderby'             => 'menu_order title',
    	'order'               => 'ASC',
    ) );

    // Bail if no posts
    if ( ! $forums->have_posts() ) {
    	return;
    }

    $html = '<div class="ld-bbpress-course-forums">';
    $html .= '<ul>';
    
    $associated_courses = array();
    while ( $forums->have_posts() ) {
    	$forums->the_post();

    	$associated_courses = (array) get_post_meta( $forums->post->ID, '_ld_associated_courses', true );
    	$associated_groups = (array) get_post_meta( $forums->post->ID, '_ld_associated_groups', true );
    	$associated_objects = array_merge( $associated_courses, $associated_groups );

    	if ( ! is_bbpress() ) {
    		if ( empty( $associated_objects ) ) {
    			continue;
    		} elseif ( is_array( $associated_objects ) && ! in_array( $object_id, $associated_objects ) ) {
    			continue;
    		}
    	} else {
    		if ( empty( $forum_associated_objects ) || empty( $associated_objects ) ) {
    			continue;
    		} elseif ( is_array( $associated_objects ) && is_array( $forum_associated_objects ) ) {
    			$intersect = array_intersect( $associated_objects, $forum_associated_objects );

    			if ( empty( $intersect ) ) {
    				continue;
    			}
    		}
    	}

    	if ( in_array( bbp_get_forum_visibility( $forums->post->ID ), array( 'hidden' ) ) ) {
    		$html .= "<li><a  href='#' onClick='return false;'>". $forums->post->post_title ."</a></li>";
    	} else {
    		$html .= "<li><a  href='".get_permalink( $forums->post->ID )."'>". $forums->post->post_title ."</a></li>";
    	}
    }

    wp_reset_query();

    $html .= '</ul>';
    $html .= '</div>';

    return $html;
}

/**
 * Get forum courses in HTML output
 * @param  array  $args List of arguments
 * @return string       HTML output
 */
function ld_bbpress_get_forum_objects_html( $args = [] ) {
	if ( empty( $args['forum_id'] ) ) {
    	$forum_id = bbp_get_forum_id();
	} else {
		$forum_id = $args['forum_id'];
	}

	$forum_associated_courses = (array) get_post_meta( $forum_id, '_ld_associated_courses', true );
    $forum_associated_groups = (array) get_post_meta( $forum_id, '_ld_associated_groups', true );

	if ( $args['show'] == 'course' ) {
		$forum_associated_objects = $forum_associated_courses;
	} elseif ( $args['show'] == 'group' ) {
		$forum_associated_objects = $forum_associated_groups;
	} elseif( $args['show'] == 'all' ) {
		$forum_associated_objects = array_merge( $forum_associated_courses, $forum_associated_groups );
	}

    $html = '<div class="ld-bbpress-course-forums">';
    $html .= '<ul>';

    foreach ( $forum_associated_objects as $object_id ) {
        $title = get_the_title( $object_id );
        $permalink = get_the_permalink( $object_id );

        $html .= '<li><a href="' . $permalink . '">'. $title . '</a></li>';
    }

    $html .= '</ul>';
    $html .= "</div>";

    return $html;
}