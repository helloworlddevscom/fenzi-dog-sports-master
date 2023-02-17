<?php


function hwdAddRoles() {
    /* Create Instructor User Role */
    add_role(
        'fenzi_instructor', //  System name of the role.
        __( 'Fenzi Instructor'  ), // Display name of the role.
        array(
            'read'  => true,
            'delete_posts'  => true,
            'delete_published_posts' => false, // This user will NOT be able to delete
            'edit_posts'   => true,
            'publish_posts' => true,
            'upload_files'  => true,
            'edit_pages'  => true,
            'edit_published_pages'  =>  true,
            'publish_pages'  => true,
            'delete_published_pages' => false, // This user will NOT be able to delete
        )
    );

}
add_action( 'init', 'hwdAddRoles' );
