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

	<article class="postWrapper" id="entrenamiento">
  <img class="colorShapesEntrenamiento" src="<?php bloginfo('template_url'); ?>/images/colorShapesEntrenamiento.png" />
  <section class="post">
  <h1 class="postTitle"><?php the_title(); ?></h1>
  <?php the_content(); ?>
  </section>

                
    </article>

  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;

  if($ajaxload == false)get_footer(); 
?>