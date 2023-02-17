<?php

function fenzi_terms_to_html( $items ) {
    $items_html = '';

    // for each item
    foreach ($items AS $item){


        // post html
        $items_html .= sprintf(
            file_get_contents(__DIR__ .'/term_template.html'),
            $item['title'],
            $item['id']
        );
    }

    return $items_html;
}

function fenzi_example_courses( $category = null, $instructor = null ) {

    // get example data
    $example_items = json_decode(file_get_contents(__DIR__ .'/example_courses.json'), true);

    // fix example url
    $example_items[0]['image'] = plugin_dir_url( __FILE__ ) . '../../../assets/img/'.$example_items[0]['image'];

    // get items
    $items = [];
    for($i = 0; $i < 9; $i++){
        $item = $example_items[0];
        if(!empty($category)){
            $item['category'] =  ucwords($category);
            $item['course_number'] =  substr(strtoupper($category),0,2).rand(100,999);
        }
        if(!empty($instructor)){
            $item['instructor'] =  ucwords($instructor);
        }
        $items[] =  $item;
    }
    return $items;
}

function fenzi_render_courses( $block_attributes, $content ) {

    // TODO: get this minimized
    // enqueue JS
    wp_enqueue_script( 'fenzi_render_courses_js', plugin_dir_url( __FILE__ ) . 'render.js' );

    // args
    $categoryLimit = (isset($block_attributes['categoryLimit']) ? $block_attributes['categoryLimit'] : null);
    $title = (isset($block_attributes['title']) ? $block_attributes['title'] : 'Courses');

    // get items
    $items = fenzi_example_courses($categoryLimit);

    // get templates
    $block_template = file_get_contents(__DIR__ .'/block_template.html');
    $item_template = file_get_contents(__DIR__ .'/item_template.html');
    $title_template = file_get_contents(__DIR__ .'/title_template.html');
    $filter_template = file_get_contents(__DIR__ .'/filter_template.html');

    // no posts
    if ( count( $items ) === 0 ) {
        $items_html = '<p>No posts to show.</p>';
    }

    // for each item
    foreach ($items AS $item){


        // post html
        $items_html .= sprintf(
            $item_template,
            $item['image'],
            $item['course_number'],
            $item['title'],
            $item['author'],
            urlencode(strtolower($item['author'])),
            substr($item['excerpt'], 0, 100) .'...',
            $item['category'],
            urlencode(strtolower($item['category'])),
            esc_url(plugin_dir_url( __FILE__ ) . '../../../assets/img/FDSA_icon_Enroll_Silver.svg'),
            $item['slug'],
        );
    }

    if(isset($block_attributes['showFilters']) &&  $block_attributes['showFilters']){

        $terms = json_decode(file_get_contents(__DIR__ .'/example_terms.json'), true);
        $selectedTerm = $terms[0];

        if(empty($categoryLimit) ){
            $categoryHtml = file_get_contents(__DIR__ .'/filter_category_template.html');
        }else{
            $categoryHtml = '';
        }

        $top_html = sprintf(
            $filter_template,
            fenzi_terms_to_html($terms),
            empty($categoryLimit) ? $title : (ucwords($categoryLimit) . " Course Schedule"),
            $selectedTerm['class_start_date'] . ' - ' . $selectedTerm['class_end_date'],
            $selectedTerm['enrollment_start_date'] . ' - ' . $selectedTerm['enrollment_end_date'],
            $selectedTerm['tuition'],
            $selectedTerm['class_length'],
            $selectedTerm['new_student_message'],
            $categoryHtml
        );
    }else{
        $top_html = sprintf(
            $title_template,
            $title
        );
    }

    return sprintf(
        $block_template,
        $top_html,
        $items_html
    );
}
