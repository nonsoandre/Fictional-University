<!-- used in displaying single posts content -->
<?php get_header(); ?>

<!-- While Loop to get all loop for post type -->
<?php
 while(have_posts ()){
     the_post(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg")?>)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p><?php echo "CHANGE ME LATER" ?></p>
      </div>
    </div>
</div>
<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
        <a class="metabox__blog-home-link" href="<?php echo site_url('/programs'); ?>"><i class="fa fa-home" aria-hidden="true"></i> &nbsp; Back to Programs </a> 
        <span class="metabox__main"><?php echo get_the_title(); ?></span>
        </p>
    </div>
    <div class="generic-content">
        <?php the_content(); ?>
    </div>


<!-- Creating a Professors Query to get posts for professors-->
<?php
  $relatedProfessors = new WP_Query(array( 
    'post_type' => 'professor',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
    // this query is key in getting the exact professor post that has a relationship with programs
    'meta_query' => array( 
      array(
        'key' => 'related_programs',
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"'
      )
     )
  ));
?>
<!-- Running the Professors post loop with a condition that checks if the returned query actually has a post in it -->
<?php
if ($relatedProfessors->have_posts()) {
?>
<?php
 echo '<hr class="section-rule">';
 echo '<h2 class="headline headline--medium">' . get_the_title() . ' Professors</h2>'; 
 echo '<ul class="Professor-cards">';
  while( $relatedProfessors->have_posts()) {
    $relatedProfessors->the_post();

?>
<li class="professor-card__list-item">
    <a class="professor-card" href="<?php the_permalink() ?>">
        <img src="<?php the_post_thumbnail_url('professor-landscape'); ?>" alt="" class="professor-card__image">
        <span class="professor-card__name"><?php the_title(); ?></span>
        
    </a>
</li>
<?php
    wp_reset_postdata();
  } //end while statement 
  echo '</ul>';
?>
<?php
} //end of Professor if statement
?>
    <!-- Events Query for Programs -->
<?php
    $todaysDate = date('Ymd');
    $homePageEvents = new WP_Query(array( 
        'post_type' => 'event',
        'posts_per_page' => 2,
        'order' => 'ASC',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'meta_query' => array( 
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $todaysDate,
                'type' => 'numeric' //tells WP what data type we are dealing with
            ),
            // for some reason this code belo does not render the content based on parameters given
            array(
                'key' => 'related_programs',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
            )
        )

    ));
?>
<!-- Running the events query for the programs page -->
<?php
if ($homePageEvents->have_posts()) {
?>
<?php
    echo '<hr class="section-rule">';
    echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' Events</h2>'; 
    
    while( $homePageEvents->have_posts()) {
        $homePageEvents->the_post();

        get_template_part( '/template_parts/event-content' );

    } //end while statement 

} //end if loop for event summary
?>
</div>

<?php
 }
?>

<?php
 get_footer();
?>