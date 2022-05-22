<?php
//registering custom post type
//It is disadvantaged to have your post type function live within the functions.php because when user changes theme it becomes not usable until the themes where it leaves is restored.

function university_post_type() {
    //Event Post Type
    register_post_type( 'event', array(
        'public' => true,
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add new Event',
            'edit_item' => 'Edit Event',
            'all_item' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar',
        'has_archive' => true,
        'rewrite' => array( 
            'slug' => 'events'
        ),
        'show_in_rest' => true, //to use gutenberg editor
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'excerpt' )
    ));


//Program Post Type
    register_post_type( 'program', array(
        'public' => true,
        'labels' => array(
            'name' => 'Programs',
            'add_new_item' => 'Add new Program',
            'edit_item' => 'Edit Program',
            'all_item' => 'All Programs',
            'singular_name' => 'Program'
        ),
        'menu_icon' => 'dashicons-awards',
        'has_archive' => true,
        'rewrite' => array( 
            'slug' => 'programs'
        ),
        'show_in_rest' => true, //to use gutenberg editor
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'excerpt' )
    ));

//Professor Post Type - no need for archive
    register_post_type( 'professor', array(
        'public' => true,
        'labels' => array(
            'name' => 'Professor',
            'add_new_item' => 'Add new Professor',
            'edit_item' => 'Edit Professor',
            'all_item' => 'All Professors',
            'singular_name' => 'Professor'
        ),
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_rest' => true, //to use gutenberg editor
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail' )
    ));
}

add_action( 'init', 'university_post_type' );


//please google register post type and play around with every parameter you find.

?>
