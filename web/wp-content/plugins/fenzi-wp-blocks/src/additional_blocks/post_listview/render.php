<?php

function fenzi_render_post_listview( $block_attributes, $content ) {

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
        $items_html = '<p>No items to show.</p>';
    }

    // for each item
    foreach ($items AS $item){

        // post html
        $items_html .= sprintf(
            $item_template,
            wp_get_attachment_image_src( get_post_thumbnail_id( $item['ID'] ))[0],
            esc_html( get_the_title( $item['ID'] ) ),
            $item['post_excerpt'],
            $item['slug'],

        );
    }


    return sprintf(
        $block_template,
        (isset($block_attributes['title']) ? $block_attributes['title'] : 'Here are some items'),
        $items_html
    );
}
