<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  $ajaxload = false;

if(isset($_GET['ajaxload']))
    $ajaxload = $_GET['ajaxload'];

if(isset($_GET['paq']))
    $paquete = $_GET['paq'];

if($ajaxload == false)
    get_header('clases');

  if (have_posts()) : while (have_posts()) : the_post();
  ?>

	<article class="postWrapper" id="post-mis-reservas">

  <?php   if(is_user_logged_in()){ ?>
                
      
		<section class="post"><?php the_content(__('(more...)')); ?></section>
    <section class="post">
      <?php

      if($paquete){

        switch ($paquete) {
          case 1:
            $paqueteNum = "10 clases 30 días";
            break;
          case 2:
            $paqueteNum = "20 clases 60 días";
            break;
          case 3:
            $paqueteNum = "30 clases 70 días";
            break;
        }
        /* MAILER */
        $current_user = wp_get_current_user();

        /*
         echo 'Username: ' . $current_user->user_login . '<br />';
         echo 'User email: ' . $current_user->user_email . '<br />';
         echo 'User first name: ' . $current_user->user_firstname . '<br />';
         echo 'User last name: ' . $current_user->user_lastname . '<br />';
        */
         $email = $current_user->user_email;
         $user_name = $current_user->user_firstname.' '.$current_user->user_lastname;


        echo "
            <div class='paqueteMsg'>
              <h3>Hype - Pago de Paquete ".$paqueteNum."</h3>
              <p>
                ".$user_name.",<br>
                <br>
                Muchas gracias por haber adquirido el paquete <b>".$paqueteNum."</b>.<br>
                <br>
                En breve recibirás un correo con un cupón de descuento<br>
                que podrás aplicar a tus próximas reservas la cantidad de<br>
                veces que contenga tu paquete.
              </p>
            </div>
          ";

        $recipents = "start@hypetraining.mx, ".$email;
        //$recipents = "karkaim@gmail.com, ".$email;
        $nombre = $user_name;
        $headers = 'From: Hype Training <start@hypetraining.mx>' . "\r\n";

        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $subject= 'Hype Training - Recibo de pago de paquete '.$paqueteNum.' TEST';
        $sub = '=?UTF-8?B?'.base64_encode($subject).'?=';

        $message = "
          <html>
            <body>
              <h1>Hype - Pago de Paquete ".$paqueteNum."</h1>
              <p>
                ".$user_name.",<br>
                <br>
                Muchas gracias por haber adquirido el paquete <b>".$paqueteNum."</b>.<br>
                <br>
                En breve recibirás un correo con un cupón de descuento<br>
                que podrás aplicar a tus próximas reservas por la cantidad<br>
                de veces que contenga tu paquete.
              </p>
            </body>
          </html>
          ";

        wp_mail( $recipents, $sub, $message, $headers );
      }
        
      ?>
    </section>
		
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

  $query2 = new WP_Query( array( 'pagename' => 'paquetes' ) );

  if ( $query2->have_posts() ) : while ( $query2->have_posts() ) : $query2->the_post(); ?>
   <?php   if(is_user_logged_in()){ ?>
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
   <?php } ?>
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