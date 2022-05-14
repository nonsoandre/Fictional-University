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
   
}

add_action( 'init', 'university_post_type' );


//please google register post type and play around with every parameter you find.

?>
