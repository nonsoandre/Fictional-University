<!-- used in displaying single posts content -->
<?php get_header(); ?>
<?php 
 while(have_posts ()){
     the_post(); 
     page_banner();
     ?>
     
<div class="container container--narrow page-section">
    <!-- <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
        <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('events'); ?>"><i class="fa fa-home" aria-hidden="true"></i> &nbsp; Back to All Events </a> <span class="metabox__main">
        <?php the_title(); ?></span>
        </p>
    </div> -->
    <div class="generic-content">
        <div class="row group">
            <div class="one-third"><?php the_post_thumbnail('professor-portrait'); ?></div>
            <div class="two-third"><?php  the_content(); ?></div>
        </div>
        
    </div> 
    
    <?php
       //get the programs field 
       $relatedPrograms = get_field('related_programs');?>
<?php
if ($relatedPrograms){
       //console log of php
    //    print_r($relatedPrograms);
echo '<hr class="section-break">';
echo '<h2 class="headline headline--medium"> Subjects Taught <h2>';
echo '<ul class="link-list min-list">';
       foreach($relatedPrograms as $program) { ?>
        <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
    <?php
       }
       echo '</ul>';
    }
    ?>

</div>

<?php
 }
?>

<?php
 get_footer();
?>