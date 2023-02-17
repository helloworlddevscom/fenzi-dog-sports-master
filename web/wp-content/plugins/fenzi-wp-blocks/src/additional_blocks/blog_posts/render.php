<?php

function fenzi_render_blog_posts( $block_attributes, $content ) {

    // get posts
    $items = wp_get_recent_posts( array(
        'numberposts' => (isset($block_attributes['numberOfPosts']) ? (int)$block_attributes['numberOfPosts'] : 25),
        'post_status' => 'publish',
    ) );

    // get templates
    $block_template = file_get_contents(__DIR__ .'/block_template.html');
    $item_template = file_get_contents(__DIR__ .'/item_template.html');

    // no posts
    if ( count( $items ) === 0 ) {
        $post_html = '<p>No posts to show.</p>';
    }

    // for each item
    foreach ($items AS $item){

        // helpers
        $categories = get_the_category($item['ID']);
        $author = get_the_author($item['post_author']);
        $author_slug = '/author/'.urlencode(strtolower($author));

        // category html
        $category_html = '';
        foreach($categories AS $category){
            $category_html .= '<span class="wp-block-hwd-fenzi-blog-post-item-description-text"><a href="/'.$category->slug.'">'.$category->name.'</a></span>';
        }

        // post html
        $post_html .= sprintf(
            $item_template,
            get_avatar( get_the_author_meta( $item['post_author'] ) ),
            $item['post_title'],
            get_date_from_gmt( $item['post_modified_gmt'], 'm/d/Y H:i a' ),
            $author_slug,
            $author,
            $category_html,
            $item['post_excerpt'],
            esc_url( get_permalink( $item['ID'] ) ),
            $item['ID']
        );
    }


    return sprintf(
        $block_template,
        $post_html
    );
}
