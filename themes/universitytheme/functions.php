<?php 

function load_css (){
    wp_enqueue_script('js-file', get_theme_file_uri('/build/index.js'), NULL, '1.0', true);
    wp_enqueue_style('font-awesome', '');
    wp_enqueue_style('google_fonts', '');
    wp_enqueue_style('index.css file', '/wp-content/themes/universitytheme/css/index.css');
    wp_enqueue_style('just_a_nickname_for_stylesheet', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','load_css');

// add website title

function my_theme_features() {
    //add website page titles dynamically in bbrowsers tab info
    add_theme_support('title_tag');
}
add_action('after_setup_theme','my_theme_features');

?>