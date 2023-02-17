<?php

function fenzi_render_primary_hero( $block_attributes, $content ) {
    return sprintf(
        file_get_contents(__DIR__ .'/block_template.html'),
        isset($block_attributes['mediaUrl']) ? $block_attributes['mediaUrl'] : '',
        isset($block_attributes['title']) ? $block_attributes['title'] : '',
    );
}
