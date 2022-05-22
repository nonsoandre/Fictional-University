<!-- Page used to hold all Archive pages content - author/post archives -->

<?php
get_header();
 ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg")?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Past Events</h1>
        <div class="page-banner__intro">
            <p>Past events for the Year.</p>
        </div>
    </div>
  </div>

<div class="container container--narrow page-section">
<?php


$todaysDate = date('Ymd');
$pastEvents = new WP_Query(array( 
  'paged' => get_query_var( 'paged', 1 ),      //this makes pagination links work for custom post types. 
  'post_type' => 'event',
  'posts_per_page' => 1,
  'order' => 'ASC',
  //we can order things by the value of a metadata
  //Lets set the meta data to our event date
  'meta_key' => 'event_date',
  //let us now set the meta value as our orderby
  //the num however is to make it numeric
  'orderby' => 'meta_valu_num',
  //in order to make sure WP knows when to remove an already done event
  //we use what is known a a meta_query which basically compares given value
  // we are saying compare today's date with
  'meta_query' => array( 
    array(
      'key' => 'event_date',
      'compare' => '<',
      'value' => $todaysDate,
      'type' => 'numeric' //tells WP what data type we are dealing with
    )
  )

));

  while ($pastEvents->have_posts()) {
    # code...
    $pastEvents->the_post();
    get_template_part( '/template_parts/event-content');
  }

echo paginate_links(array( 
      'total' => $pastEvents->max_num_pages  //this tells WP to set Pgination URL based on our event post type and not the default WP post type.
  ));
?>

</div>
 <?php
 get_footer()
 ?>