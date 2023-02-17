<?php

function fenzi_render_post_carousel( $block_attributes, $content ) {

    // get items
    $items = wp_get_recent_posts( array(
        'numberposts' => (isset($block_attributes['numberOfPosts']) ? (int)$block_attributes['numberOfPosts'] : 25),
        'post_type' => (isset($block_attributes['postType']) ? $block_attributes['postType'] : 'post'),
        'post_status' => 'publish',
    ) );

    // get templates
    $block_template = file_get_contents(__DIR__ .'/block_template.html');
    $item_template = file_get_contents(__DIR__ .'/item_template.html');


    // no posts
    if ( count( $items ) === 0 ) {
        $items_html = '<p>No posts to show.</p>';
    }

    // for each item
    foreach ($items AS $item){

        // post html
        $items_html .= sprintf(
            $item_template,
            $item['post_content'],
            esc_html( get_the_title( $item['ID'] ) ),
            wp_get_attachment_image_src( get_post_thumbnail_id( $item['ID'] ))[0]
        );
    }


    return sprintf(
        $block_template,
        (isset($block_attributes['mediaUrl']) ? $block_attributes['mediaUrl'] : ''),
        (isset($block_attributes['title']) ? $block_attributes['title'] : 'Here are some testimonials'),
        $items_html,
        (isset($block_attributes['ctaTitle']) ? $block_attributes['ctaTitle'] : 'View all testimonials'),
        (isset($block_attributes['ctaLink']) ? $block_attributes['ctaLink'] : '/testimonials'),
    );
}
