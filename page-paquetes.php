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
          <input type="image" src="http://hypetraining.mx/wp-content/themes/Hypesite/images/paquete01-a.png" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
          <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
          </form>
        </li>
        <li>
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="FDYBP3DNN6GZW">
          <input type="image" src="http://hypetraining.mx/wp-content/themes/Hypesite/images/paquete02-a.png" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
          <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
          </form>
        </li>
        <li>
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="KEVANL446C6SJ">
          <input type="image" src="http://hypetraining.mx/wp-content/themes/Hypesite/images/paquete03-a.png" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
          <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
          </form>
        </li>
      </ul>
    <?php }else{ ?>
      <ul>
        <li>
          <a href="<?php bloginfo('url'); ?>/mis-reservas">
          <img class="paqueteOn" src="<?php bloginfo('template_url'); ?>/images/paquete01-a.png" />
          </a>
        </li>
        <li>
          <a href="<?php bloginfo('url'); ?>/mis-reservas">
          <img class="paqueteOn" src="<?php bloginfo('template_url'); ?>/images/paquete02-a.png" />
          </a>
        </li>
        <li>
          <a href="<?php bloginfo('url'); ?>/mis-reservas">
          <img class="paqueteOn" src="<?php bloginfo('template_url'); ?>/images/paquete03-a.png" />
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