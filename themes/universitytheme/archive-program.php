<!-- Page used to hold all Archive pages content - author/post archives -->

<?php
get_header();
 ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg")?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Programs</h1>
        <div class="page-banner__intro">
            <p>There is something for every one, have a look around.</p>
        </div>
    </div>
  </div>

<div class="container container--narrow page-section">
<ul class="link-list min-list">
<?php
  while (have_posts()) {
    # code...
    the_post();
?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
  }
  echo get_the_posts_pagination();
?>
</ul>

 <?php
 get_footer()
 ?>