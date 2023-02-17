<?php

function fenzi_render_recent_blog_posts( $block_attributes, $content ) {

    // get posts
    $recent_posts = wp_get_recent_posts( array(
        'numberposts' => (isset($block_attributes['numberOfPosts']) ? (int)$block_attributes['numberOfPosts'] : 25),
        'post_status' => 'publish',
    ) );

    // begin widget hmtl
    $html = '<div class="wp-block-hwd-fenzi-recent-blog-posts">';

    // title
    $html .= '<h3 class="wp-block-hwd-fenzi-recent-blog-posts-title">'.(isset($block_attributes['title']) ? $block_attributes['title'] : 'Posts').'</h3>';

    // no posts
    if ( count( $recent_posts ) === 0 ) {
        $html .= '<p>No posts to show.</p>';
    }

    // for each post
    foreach ($recent_posts AS $recent_post){

        // helpere
        $post_id = $recent_post['ID'];

        // post html
        $html .= sprintf(
            '<div class="wp-block-hwd-fenzi-recent-blog-posts-item"><a href="%1$s">%2$s</a></div>',
            esc_url( get_permalink( $post_id ) ),
            esc_html( get_the_title( $post_id ) )
        );
    }

    // close widget hmtl
    $html .= '</div>';

    return $html;
}
