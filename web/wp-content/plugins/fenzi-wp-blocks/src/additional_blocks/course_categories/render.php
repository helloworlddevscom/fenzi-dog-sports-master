 <?php

function fenzi_render_course_categories( $block_attributes, $content ) {

    // get items
    $items = json_decode(file_get_contents(__DIR__ .'/example.json'), true);

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
            esc_url(plugin_dir_url( __FILE__ ) . '../../../assets/img/'. $item['image_url']),
            $item['title'],
            $item['excerpt'],
            $item['slug'],

        );
    }


    return sprintf(
        $block_template,
        (isset($block_attributes['title']) ? $block_attributes['title'] : 'Here are some items'),
        $items_html
    );
}
