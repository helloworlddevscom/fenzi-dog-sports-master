<?php

function fenzi_render_simple_category_list( $block_attributes, $content ) {

    // get items
    $items = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC',
        'hide_empty'      => false,
        'numberposts' => (isset($block_attributes['numberOfPosts']) ? (int)$block_attributes['numberOfPosts'] : 25),
    ) );

    // begin widget hmtl
    $html = '<div class="wp-block-hwd-fenzi-simple-category-list">';

    // title
    $html .= '<h3 class="wp-block-hwd-fenzi-simple-category-list-title">'.(isset($block_attributes['title']) ? $block_attributes['title'] : 'Categories').'</h3>';

    // no posts
    if ( count( $items ) === 0 ) {
        $html .= '<p>No categories to show.</p>';
    }

    // for each item
    foreach ($items AS $item){

        // post html
        $html .= sprintf(
            '<div class="wp-block-hwd-fenzi-simple-category-list-item"><i class="fa fa-folder"></i><a href="/%1$s">%2$s</a></div>',
            $item->slug,
            esc_html( $item->name )
        );
    }

    // close widget hmtl
    $html .= '</div>';

    return $html;
}
