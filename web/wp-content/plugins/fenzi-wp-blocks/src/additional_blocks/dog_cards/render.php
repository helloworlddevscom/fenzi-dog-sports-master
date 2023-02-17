<?php

function fenzi_render_dog_cards( $block_attributes, $content ) {

    // get items
    $items = [
        'a' => 'wp-block-hwd-fenzi-dog-cards-img-1',
        'b' => 'wp-block-hwd-fenzi-dog-cards-img-2',
        'c' => 'wp-block-hwd-fenzi-dog-cards-img-3',
        'd' => 'wp-block-hwd-fenzi-dog-cards-img-4'
    ];

    // get templates
    $block_template = file_get_contents(__DIR__ .'/block_template.html');
    $item_template = file_get_contents(__DIR__ .'/item_template.html');

    // for each item
    foreach ($items AS $key => $image_class){

        // post html
        $items_html .= sprintf(
            $item_template,
            $image_class,
            (isset($block_attributes['title_'.$key]) ? $block_attributes['title_'.$key] : 'Title'),
            (isset($block_attributes['link_'.$key]) ? $block_attributes['link_'.$key] : '/'),
        );
    }


    return sprintf(
        $block_template,
        $items_html
    );
}
