<!-- Page used to hold all Archive pages content - author/post archives -->

<?php
get_header();
 ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg")?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Events</h1>
        <div class="page-banner__intro">
            <p>Never miss an event with us.</p>
        </div>
    </div>
  </div>

<div class="container container--narrow page-section">
<?php
  while (have_posts()) {
    # code...
    the_post();
    get_template_part( '/template_parts/event-content');
  }

  echo get_the_posts_pagination();
?>
<br><br>
<div>
  Click here to see all <a href="<?php echo site_url("/past-events"); ?>"> <u>past events</u> </a>
</div>
</div>
 <?php
 get_footer()
 ?>