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

  <?php   if(is_user_logged_in()){ ?>
                
      
		<section class="post"><?php the_content(__('(more...)')); ?></section>
		
    <?php }else{ ?>

    <article class="postWrapper" id="post-clases">
      <h2>Login</h2>
      <p>Por favor inicia sesión para ver tus reservas</p>
      <ul id="clasesLogReg">
        <li class="clasesSelected">Login</li>
      </ul>
      <div id="clasesLogin"><?php echo do_shortcode( '[nm-wp-login]' ); ?></div>
    </article>

    
    <?php } ?>

    </article>

  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;

  if($ajaxload == false)get_footer(); 
?>