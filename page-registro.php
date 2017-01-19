<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  $ajaxload = false;

if(isset($_GET['ajaxload']))
    $ajaxload = $_GET['ajaxload'];

if($ajaxload == false)
    get_header('clases');

  if (have_posts()) : while (have_posts()) : the_post();
  ?>

	<article class="postWrapper" id="post-<?php the_ID(); ?>">
            
            <?php if(is_user_logged_in()){ ?>
            
            <?php }else{ ?>
            <br>
            <br>
            <br>
            
            <div id="clasesRegister">
              <?php echo do_shortcode( '[nm-wp-registration]' ); ?>
            </div>
            <?php } ?>
		

    </article>

  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;

  if($ajaxload == false)get_footer(); 
?>