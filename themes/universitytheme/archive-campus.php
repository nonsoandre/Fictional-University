<?php
get_header();
 ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg")?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Our Campuses</h1>
        <div class="page-banner__intro">
            <p>We have several convinience located campuses.</p>
        </div>
    </div>
  </div>

<div class="container container--narrow page-section">
<div class="acf-map">
    <?php
    while (have_posts()) {
        # code...
        the_post();
        //get map properties in acf
        $mapLocation = get_field('map_location');
    ?>
    <div data-lat="<?php echo $mapLocation['lat']; ?>" data-log="<?php echo $mapLocation['lng']; ?>">

    </div>
    <?php
    }
    echo get_the_posts_pagination();
    ?>
</div>

 <?php
 get_footer()
 ?>