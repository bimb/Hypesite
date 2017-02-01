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

	<article class="postWrapper" id="post-paquetes">
   <section class="post"><?php the_content(__('(more...)')); ?></section>
   <section class="postPaquetePrecios"> 
      FOCUS_________________$220<br><br>

      Aero yoga_______________$250<br><br>

      TRAIN__________________$220
   </section>
   <section class="postPaquetePagar"> 
    <?php   if(is_user_logged_in()){ ?>
      <ul>
        <li>
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="2H3W5NPWB9PFG">
          <input type="image" class="paqueteOn" src="<?php bloginfo('template_url'); ?>/images/10_1.png" border="0" name="submit" >
          <input type="image" class="paqueteOff" src="<?php bloginfo('template_url'); ?>/images/10.png" border="0" name="submit" >
          <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
          </form>
        </li>
        <li>
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="FDYBP3DNN6GZW">
          <input type="image" class="paqueteOn" src="<?php bloginfo('template_url'); ?>/images/20_1.png" border="0" name="submit" >
          <input type="image" class="paqueteOff" src="<?php bloginfo('template_url'); ?>/images/20.png" border="0" name="submit" >
          <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
          </form>
        </li>
        <li>
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="KEVANL446C6SJ">
          <input type="image" class="paqueteOn" src="<?php bloginfo('template_url'); ?>/images/30_1.png" border="0" name="submit" >
          <input type="image" class="paqueteOff" src="<?php bloginfo('template_url'); ?>/images/30.png" border="0" name="submit" >
          <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
          </form>
        </li>
      </ul>
    <?php }else{ ?>
      <ul>
        <li>
          <a href="<?php bloginfo('url'); ?>/mis-reservas">
          <img class="paqueteOn" src="<?php bloginfo('template_url'); ?>/images/10_1.png" />
          <img class="paqueteOff" src="<?php bloginfo('template_url'); ?>/images/10.png" />
          </a>
        </li>
        <li>
          <a href="<?php bloginfo('url'); ?>/mis-reservas">
          <img class="paqueteOn" src="<?php bloginfo('template_url'); ?>/images/20_1.png" />
          <img class="paqueteOff" src="<?php bloginfo('template_url'); ?>/images/20.png" />
          </a>
        </li>
        <li>
          <a href="<?php bloginfo('url'); ?>/mis-reservas">
          <img class="paqueteOn" src="<?php bloginfo('template_url'); ?>/images/30_1.png" />
          <img class="paqueteOff" src="<?php bloginfo('template_url'); ?>/images/30.png" />
          </a>
        </li>
      </ul>
    <?php } ?>
      <p>*Solo válido para la misma persona</p>
   </section>
   <div class="leftImage"></div>
   <div class="rightImage"></div>
  </article>

  <?php

  endwhile;
  endif;

  if($ajaxload == false)get_footer(); 
?>