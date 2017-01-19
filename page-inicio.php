<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  $ajaxload = false;

if(isset($_GET['ajaxload']))
    $ajaxload = $_GET['ajaxload'];

if($ajaxload == false)
    get_header();

  if (have_posts()) : while (have_posts()) : the_post();
  ?>

  <article class="postWrapper" id="post-inicio">
            
            <div class="slideshowContainerIndex">
              <div class="cycle-slideshow" 
                    data-cycle-fx="fade" 
                    data-cycle-timeout="5000" 
                    data-cycle-speed="1000" 
                    data-cycle-slides="> div">

                          <?php 
                            if ($images = aldenta_get_images()) { 
                            // IN PAGE
                                foreach ($images as $image) 
                                  echo '<div class="homeBgImg" style="background:url('.wp_get_attachment_url($image->ID).') no-repeat center center;">
                                        </div>';
                            }
                          ?>
              </div>
            </div>
            <section class="postText">
              <?php 
              $copyText = get_post_meta( get_the_ID(), 'copy_text', true );
              if ( ! empty( $copyText ) ) echo $copyText;
              ?>
            </section>
            <div class="leftImage"></div>
            <ul>
              <li>chihuahua 78<br>roma norte</li>
              <li>hypetraining.mx<br>@hypetrainingmx</li>
              <li>yoga, running, pilates,<br>funcitonal,trx</li>
            </ul>
            <div class="downArrow"></div>
            
                
    </article>

    <article class="postWrapper" id="post-inicio-mobile">
              
              <?php 
              $query = new WP_Query( array( 'pagename' => 'inicio-mobile' ) );
              if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="slideshowContainerIndex">
                <div class="cycle-slideshow-mobile" 
                      data-cycle-fx="fade" 
                      data-cycle-timeout="5000" 
                      data-cycle-speed="1000" 
                      data-cycle-slides="> div">
                  <?php 
                    if ($images = aldenta_get_images()) { 
                    // IN PAGE
                        foreach ($images as $image) 
                          echo '<div class="homeBgImg" style="background:url('.wp_get_attachment_url($image->ID).') no-repeat center center;">
                                </div>';
                    }
                  ?>
                </div>
              </div>
              <section class="postText">
                <?php 
                $copyText = get_post_meta( get_the_ID(), 'copy_text', true );
                if ( ! empty( $copyText ) ) echo $copyText;
                ?>
              </section>
              <div class="leftImage"></div>
              <div class="rightImage"></div>
              <div class="redesSociales">
                <a href="https://facebook.com/hypetrainingmx" target="_blank">
                <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2016/12/facebook.png" alt="" class="facebook">
                </a>
                <a href="https://instagram.com/hypetrainingmx" target="_blank">
                <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2016/12/instagram.png" alt="" class="instagram">
                </a>
                <a href="https://twitter.com/hypetrainingmx" target="_blank">
                <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2016/12/twitter.png" alt="" class="twitter">
                </a>
              </div>
              <?php
              endwhile; 
              endif;
              ?>
                  
      </article>

  <?php

  endwhile; 
  endif;

  if($ajaxload == false)get_footer(); 
?>