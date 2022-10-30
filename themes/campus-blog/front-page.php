<?php 
define( 'WP_USE_THEMES', false );
get_header();
?>
    <!-- ==========================
       HEADLINE ARTICLES
    ===============================-->
    <section class="articles my-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <h2>Latest Updates</h2>
                    <!--====== news feed 1======= -->
                    <div class="news-feed my-5">
                        <div class="row">
                            <!-- ====main news feed==== -->
                    <?php 
                    $homePagePosts = new WP_Query(
                        array(
                            'post_type'  =>  'post',
                             'category_name'  =>  'headliners',
                             'posts_per_page'  => '1'
                        )
                    );


                        if ( $homePagePosts ->have_posts() ) {
                            while($homePagePosts ->have_posts()){
                                
                                $homePagePosts ->the_post();
                    ?>
                            <div class="col-sm-12 col-md-6 mb-4">
                                <video src="vid/Anointing-ft-Sarkodie.mp4" controls autoplay></video>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h5>
                                <small class="date">the_time('F j, Y'); <span class="block">|</span> By <?php the_author(); ?></small>
                            </div>
                    <?php
                        } 
                    }else{
                        echo "<p>You have no posts.</p>";
                    }
                    ?>
                            <!-- ====aside news feed==== -->
                            <div class="col-sm-12 col-md-6">
                                <div class="aside-content">
                                    <!-- aside content box -->
                                    <?php 
                                        $homePageArticles = new WP_Query(
                                        array(
                                            'post_type'  =>  'post',
                                                // 'category_name'  =>  'headliners',
                                                'posts_per_page'  => '3'
                                            )
                                        );
                
                                        if ( $homePageArticles ->have_posts() ) {
                                            while($homePageArticles ->have_posts()){
                                                
                                                $homePageArticles ->the_post();          
                                    
                                    
                                    ?>

                                    <div class="content-box">
                                        <div class="content-box-img">
                                            <img src="img/img2.jpg" alt="">
                                        </div>
                                        <!-- aside content title -->
                                        <div class="content-title ml-3">
                                            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                            <small><?php the_time('F j, Y'); ?></small>
                                            <div class="views">
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                            } 
                                        }else{
                                            echo "<p>You have no posts.</p>";
                                        }
                                    ?>
                                    <!-- <div class="content-box">
                                        <div class="content-box-img">
                                            <img src="img/img3.jpg" alt="">
                                        </div>
                                        <div class="content-title ml-3">
                                            <h6><a href="readme.html">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit.
                                                    Minima cumque provident ratione est.</a></h6>
                                            <small>May 19, 2018</small>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <div class="content-box-img">
                                            <img src="img/img4.jpg" alt="">
                                        </div>
                                        <div class="content-title ml-3">
                                            <h6><a href="readme.html">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit.
                                                    Minima cumque provident ratione est.</a></h6>
                                            <small>May 19, 2018</small>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
</section>
<?php
 get_footer();
?>