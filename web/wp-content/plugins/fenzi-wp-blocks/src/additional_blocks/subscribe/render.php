<?php

function fenzi_render_subscribe( $block_attributes, $content ) {

    return sprintf(
        file_get_contents(__DIR__ .'/block_template.html'),
        (isset($block_attributes['title']) ? $block_attributes['title'] : 'Sign up to get the latest'),
        (isset($block_attributes['cta']) ? $block_attributes['cta'] : 'Subscribe')
    );
    ;
}
