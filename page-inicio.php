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

	<article class="postWrapper" id="post-inicio">
            
            <div class="thumbnail">
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
            <div class="leftImage"></div>
            <ul>
              <li>chihuahua 78<br>roma norte</li>
              <li>hypetraining.mx<br>@hypetrainingmx</li>
              <li>yoga, running, pilates,<br>funcitonal,trx</li>
            </ul>
            
                
    </article>

  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;

  if($ajaxload == false)get_footer(); 
?>