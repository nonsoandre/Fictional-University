<?php 
//These are how to add external files to Wordpress Create the function.  -->

function load_css (){
    wp_enqueue_script('js-file', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.0.7/css/all.css');
    wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    wp_enqueue_style('index.css file', '/wp-content/themes/universitytheme/css/index.css');
    wp_enqueue_style('just_a_nickname_for_stylesheet', get_stylesheet_uri());
}

//Hook the function to wordpress
add_action('wp_enqueue_scripts' , 'load_css');



// add website title This basically allows youu to add functions to your theme
function my_theme_features() {
    //add website page titles dynamically in bbrowsers tab info
    add_theme_support('title_tag');
    register_nav_menu( 'HeaderNav', 'Header Navigation Menu');
    register_nav_menu( 'footer_loc_1', 'Footer location 1 ');
    register_nav_menu( 'footer_loc_2"', 'Footer location 2');
}
//hook theme features
add_action('after_setup_theme', 'my_theme_features');


//registering custom post type
//It is disadvantaged to have your post type function live within the functions.php because when user changes theme it becomes not usable until the themes where it leaves is restored.
//Thus function has been moved to a dedicated folder named mu-plugins