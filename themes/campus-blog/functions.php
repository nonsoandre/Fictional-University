<!-- connect website files -->
<?php

function web_files (){
    wp_add_inline_script('jquery', 'var $ = jQuery.noConflict();');

    wp_enqueue_style( 'bootstrap', get_theme_file_uri('/src/css/bootstrap.min.css'));
    wp_enqueue_style( 'fontawesome', get_theme_file_uri('/src/css/font-awesome.css'));
    wp_enqueue_style( 'normalize', get_theme_file_uri('/src/css/index.css'));
    wp_enqueue_style( 'main-styles', get_theme_file_uri('/src/css/main.css'));

    wp_enqueue_script('main-js', get_theme_file_uri('/src/js/app.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap-js', get_theme_file_uri('/src/js/bootstrap.js'), array('jquery'), '1.0', true);
}

add_action( 'wp_enqueue_scripts', 'web_files');

// function admin_bar(){
//     if(is_user_logged_in()){
//         add_filter( 'show_admin_bar', '__retrn_true', 1000 );
//     }
// }
// add_action( 'init', 'admin_bar');

function theme_features() {
    //add website page titles dynamically in bbrowsers tab info
    add_theme_support('title_tag');
    add_theme_support( 'post-thumbnails'); //enables only for default post type
    
    // add_image_size( 'professor-landscape', 450, 350, true );
    // add_image_size( 'professor-portrait', 400, 650, true );
    // add_image_size( 'page-banner', 1400, 450, true );

    // register_nav_menu( 'HeaderNav', 'Header Navigation Menu');
    // register_nav_menu( 'footer_loc_1', 'Footer location 1 ');
    // register_nav_menu( 'footer_loc_2"', 'Footer location 2');
}

//hook theme features
add_action('after_setup_theme', 'theme_features');