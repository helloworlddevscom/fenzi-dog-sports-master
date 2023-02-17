<?php

function fenzi_render_blog_posts_search( $block_attributes, $content ) {

    return file_get_contents(__DIR__ .'/block_template.html');
}
