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

	<article class="postWrapper" id="post-acerca-de">
            
            <div class="thumbnail">
                <?php 
                    if ( has_post_thumbnail() ) 
                        the_post_thumbnail(); 
                ?>
                <div class="bottomImage"></div>
            </div>
            <section class="post">
              <h2 class="postTitle"><?php the_title(); ?></h2>
              <?php the_content(__('(more...)')); ?>
            </section>
            <section class="postText">
              <?php 
              $copyText = get_post_meta( get_the_ID(), 'copy_text', true );
              if ( ! empty( $copyText ) ) echo $copyText;
              ?>
            </section>
            
                
    </article>

  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;

  if($ajaxload == false)get_footer(); 
?>