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
  
  <div id="entrenamientoBloques">

  <?php $query = new WP_Query( 'cat=4' ); ?>
   <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div id="bloque">
          <div class="thumbnail"><?php the_post_thumbnail(); ?></div>
          <div id="cajaTexto">
            <h1><?php the_title(); ?></h1>
          </div>
        </div>
  <?php endwhile; else : ?>
    <p><?php _e( 'Los sentimos aun no hay entradas en esta categoria' ); ?></p>
  <?php endif; ?>
  </div>          
  </article>

  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;

  if($ajaxload == false)get_footer(); 
?>