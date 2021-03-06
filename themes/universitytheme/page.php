<?php 

/**
 * 
 * @author Andre <andre@gmail.com>
 * The page.php in wordpress is used to as a theme for every other page aside the homepage and the selected single page
 * 
 * 
 */
get_header();
while (have_posts()){
     the_post(); 
     pageBanner();
?>

<!-- So the page.php file is for interior pages content that is pages that are not the home page -->


  <div class="container container--narrow page-section">
      
    <?php 

        $the_parent = wp_get_post_parent_id(get_the_ID());
        echo $the_parent;
        if ($the_parent) { 
          echo get_the_ID();
      ?>
           
      

        <div class="metabox metabox--position-up metabox--with-home-link">
          <p>
            <a class="metabox__blog-home-link" href="<?php echo get_the_permalink($the_parent); ?>"><i class="fa fa-home" aria-hidden="true"></i>Back to <?php echo get_the_title($the_parent); ?> </a> <span class="metabox__main">
              <?php the_title(); ?></span>
          </p>
        </div>

      <?php } ?>
      

    <?php 
       //returns true or value if page has child os is a child. Returns 0 if page has neither a child or is a child.
      $testArray = get_pages( array(
        'child_of' => get_the_ID()
      ));
      

      echo $the_parent;
      echo $testArray;
      //check if page is a child or a parent page or neither
      if ($the_parent or $testArray) { 
     ?>

      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php get_permalink($the_parent); ?>"><?php echo get_the_title($the_parent); ?></a></h2>
        <ul class="min-list">

          <?php 
          if ($the_parent) {
            $findChildOf = $the_parent;
          } else {
            $findChildOf = get_the_id();
          }

          wp_list_pages( array(
            'title_li' => NULL,
            'child_of' => $findChildOf,
            'sort_column' => 'menu_order' //allowing the menu_order box to show in settings
          )); ?>
          <!-- <li class="current_page_item"><a href="#">Our History</a></li>
          <li><a href="#">Our Goals</a></li> -->
        </ul>
      </div> 
    <?php  }  ?>


    <div class="generic-content">
        <?php the_content();  ?>
      </div>
    </div>


    
    <!-- <div class="page-section page-section--beige">
      <div class="container container--narrow generic-content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
      </div>
    </div> -->

  <!-- 
    <div class="page-section page-section--white">
      <div class="container container--narrow">
        <h2 class="headline headline--medium">Biology Professors:</h2>

        <ul class="professor-cards">
          <li class="professor-card__list-item">
            <a href="#" class="professor-card">
              <img class="professor-card__image" src="images/barksalot.jpg" />
              <span class="professor-card__name">Dr. Barksalot</span>
            </a>
          </li>
          <li class="professor-card__list-item">
            <a href="#" class="professor-card">
              <img class="professor-card__image" src="images/meowsalot.jpg" />
              <span class="professor-card__name">Dr. Meowsalot</span>
            </a>
          </li>
        </ul>
        <hr class="section-break" />

        <div class="row group generic-content">
          <div class="one-third">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
          </div>

          <div class="one-third">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
          </div>

          <div class="one-third">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
          </div>
        </div>
      </div>
    </div>   -->





 <?php
 }
 get_footer();
?>