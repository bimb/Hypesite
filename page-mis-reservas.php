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

	<article class="postWrapper" id="post-mis-reservas">

  <?php   if(is_user_logged_in()){ ?>
                
      
		<section class="post"><?php the_content(__('(more...)')); ?></section>
		
    <?php }else{ ?>

    <article class="postWrapper" id="post-clases">
      <h2>Login / Registro</h2>
      <p>Por favor inicia sesión para ver tus reservas o regístrate si no lo has hecho aún.</p>
      <ul id="clasesLogReg">
        <li class="clasesSelected">Login</li>
        <li><a href="<?php bloginfo('url'); ?>/registro/">Registro</a></li>
      </ul>
      <div id="clasesLogin"><?php echo do_shortcode( '[nm-wp-login]' ); ?></div>
    </article>

    
    <?php } ?>

    </article>

  <?php
  endwhile; 
  endif;

  $query = new WP_Query( array( 'pagename' => 'horarios' ) );

  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
   <?php   if(is_user_logged_in()){ ?>
    <div id="single-post-container"></div>
    <article class="postWrapper" id="post-horarios">
      <section class="post"><?php the_content(__('(more...)')); ?></section>
    </article>
   <?php } ?>
  <?php
  endwhile; 
  endif;

  if($ajaxload == false)get_footer(); 
?>