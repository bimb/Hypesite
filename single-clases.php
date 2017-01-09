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

  if(is_user_logged_in()){
  ?>

	<article class="postWrapper" id="post-clases">
            
            <div id="tumbnail">
                <?php 
                    if ( has_post_thumbnail() ) 
                        the_post_thumbnail(); 
                ?>
            </div>
      
		<section class="post"><?php the_content(__('(more...)')); ?></section>
		

    </article>

  <?php

  }else{ 

  echo "<br><br><br><br><br>";
echo do_shortcode( '[nm-wp-login]' );
echo do_shortcode( '[nm-wp-registration]' );

  }  

  endwhile;  
  endif;

  if($ajaxload == false)get_footer(); 
?>