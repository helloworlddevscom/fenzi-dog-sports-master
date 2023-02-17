<?php

function fenzi_render_simple_cta_section( $block_attributes, $content ) {


    // get templates
    $block_template = file_get_contents(__DIR__ .'/block_template.html');


    return sprintf(
        $block_template,
        (isset($block_attributes['title']) ? $block_attributes['title'] : 'My Header'),
        (isset($block_attributes['description']) ? $block_attributes['description'] : 'My description for this cta.'),
        (isset($block_attributes['ctaTitle']) ? $block_attributes['ctaTitle'] : 'Click here'),
        (isset($block_attributes['ctaLink']) ? $block_attributes['ctaLink'] : '/'),
        (isset($block_attributes['mediaUrl']) ? $block_attributes['mediaUrl'] : '')
    );
}
