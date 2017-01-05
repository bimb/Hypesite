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

	<article class="postWrapper" id="yoga">
  <div class="imageHero">
                <?php 
                    if ( has_post_thumbnail() ) 
                        the_post_thumbnail(); 
                ?>
  </div>
  <section class="postText">
  <?php 
    $copyText = get_post_meta( get_the_ID(), 'copy_text', true );
    if ( ! empty( $copyText ) ) echo $copyText;
              ?>
  </section>
 <img class="colorShapesBottomDos" src="<?php bloginfo('template_url'); ?>/images/colorShapesBottomDos.png" />
  <section class="post">
  <h1 class="postTitle"><?php the_title(); ?></h1>
  <?php the_content(); ?>
  </section>
  
  <div id="entrenamientoBloques">

  <?php $query = new WP_Query( 'cat=5' ); ?>
   <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div id="bloque">
          <div class="thumbnail"><?php the_post_thumbnail(); ?></div>
          <div id="cajaTexto">
          <div id="texto">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
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