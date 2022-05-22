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
    add_theme_support( 'featured-image');
    register_nav_menu( 'HeaderNav', 'Header Navigation Menu');
    register_nav_menu( 'footer_loc_1', 'Footer location 1 ');
    register_nav_menu( 'footer_loc_2"', 'Footer location 2');
}
//hook theme features
add_action('after_setup_theme', 'my_theme_features');




//ANOTHER WAY TO MANIPULATE QUERY
//This function below allows you to manipulate a WP query right before it sends it to the database to retrieve information
//Whatever query WP has received it sends to your function through the query parameter and then there, you can manipulate the values you need to

function university_adjust_queries($query) {
   //if statement to make sure code only applies to where it is told
   //if statement basically saying apply only if it not an admin area and the post_type_archive is event AND ALSO for insurance is the default query and not a custom query
   if(!is_admin() && is_post_type_archive( 'event' ) && is_main_query()){
     $todaysDate = date('Ymd');
     $query->set('meta_key', 'event_date');
     $query->set('orderby', 'meta_value_num');
     $query->set('order', 'ASC');
     $query->set('meta_query',array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $todaysDate,
            'type' => 'numeric'
        ));
    }


    if(!is_admin() && is_post_type_archive( 'program' ) && is_main_query()){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }
}
add_action('pre_get_posts', 'university_adjust_queries');