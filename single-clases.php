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

  }else{ ?>

  <article class="postWrapper" id="post-clases">
    <h2>Login / Registrar</h2>
    <p>Por favor regístrate o inicia sesión para continuar</p>
    <ul id="clasesLogReg">
      <li class="clasesSelected">Login</li>
      <li>Registro</li>
    </ul>
    <div id="clasesLogin"><?php echo do_shortcode( '[nm-wp-login]' ); ?></div>
    <div id="clasesRegister" style="display: none;"><?php echo do_shortcode( '[nm-wp-registration]' ); ?></div>
  </article>
  <script type="text/javascript">
    $('ul#clasesLogReg li:first-child,#loginReg').click(function(){
      $('ul#clasesLogReg li').removeClass();
      $(this).addClass('clasesSelected');
      $('#clasesRegister').fadeOut(function() {
        $('#clasesLogin').fadeIn();
      });
    });
    $('ul#clasesLogReg li:last-child').click(function(){
      $('ul#clasesLogReg li').removeClass();
      $(this).addClass('clasesSelected');
      $('#clasesLogin').fadeOut(function() {
        $('#clasesRegister').fadeIn();
      });
    });
  </script>
  <?php
  }  

   endwhile;  
  endif;

  if($ajaxload == false)get_footer(); 
?>