<?php

function fenzi_render_text_list_cta_section( $block_attributes, $content ) {


    // get templates
    $block_template = file_get_contents(__DIR__ .'/block_template.html');
    $item_template = file_get_contents(__DIR__ .'/item_template.html');

    // left
    $left_html = sprintf(
        $item_template,
        (isset($block_attributes['title1']) ? $block_attributes['title1'] : 'My Header'),
        (isset($block_attributes['description1']) ? $block_attributes['description1'] : 'My description'),
        esc_url(plugin_dir_url( __FILE__ ) . '../../../assets/img/why_icons/FDSA_icon_Why_ExcellentValue.svg')
    );
    $left_html .= sprintf(
        $item_template,
        (isset($block_attributes['title2']) ? $block_attributes['title2'] : 'My Header'),
        (isset($block_attributes['description2']) ? $block_attributes['description2'] : 'My description'),
        esc_url(plugin_dir_url( __FILE__ ) . '../../../assets/img/why_icons/FDSA_icon_Why_Learning.svg')
    );
    $left_html .= sprintf(
        $item_template,
        (isset($block_attributes['title3']) ? $block_attributes['title3'] : 'My Header'),
        (isset($block_attributes['description3']) ? $block_attributes['description3'] : 'My description'),
        esc_url(plugin_dir_url( __FILE__ ) . '../../../assets/img/why_icons/FDSA_icon_Why_Community.svg')
    );


    // right
    $right_html = sprintf(
        $item_template,
        (isset($block_attributes['title4']) ? $block_attributes['title4'] : 'My Header'),
        (isset($block_attributes['description4']) ? $block_attributes['description4'] : 'My description'),
        esc_url(plugin_dir_url( __FILE__ ) . '../../../assets/img/why_icons/FDSA_icon_Why_WorldClass.svg')
    );
    $right_html .= sprintf(
        $item_template,
        (isset($block_attributes['title5']) ? $block_attributes['title5'] : 'My Header'),
        (isset($block_attributes['description5']) ? $block_attributes['description5'] : 'My description'),
        esc_url(plugin_dir_url( __FILE__ ) . '../../../assets/img/why_icons/FDSA_icon_Why_EssentialSkills.svg')
    );
    $right_html .= sprintf(
        $item_template,
        (isset($block_attributes['title6']) ? $block_attributes['title6'] : 'My Header'),
        (isset($block_attributes['description6']) ? $block_attributes['description6'] : 'My description'),
        esc_url(plugin_dir_url( __FILE__ ) . '../../../assets/img/why_icons/FDSA_icon_Why_Convenient.svg')
    );



    return sprintf(
        $block_template,
        (isset($block_attributes['title']) ? $block_attributes['title'] : 'My Header'),
        $left_html,
        $right_html,
        (isset($block_attributes['ctaTitle']) ? $block_attributes['ctaTitle'] : 'Click here'),
        (isset($block_attributes['ctaLink']) ? $block_attributes['ctaLink'] : '/')
    );
}
