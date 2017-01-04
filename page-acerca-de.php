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
            
            <div class="tumbnail">
                <?php 
                    if ( has_post_thumbnail() ) 
                        the_post_thumbnail(); 
                ?>
            </div>

            <section class="post"><?php the_content(__('(more...)')); ?></section>
            <div class="centerImage"></div>
            <div class="rightImage"></div>
                
    </article>

  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;

  if($ajaxload == false)get_footer(); 
?>