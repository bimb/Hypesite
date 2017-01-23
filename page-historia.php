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
            
            <div id="tumbnail">
                <?php 
                    if ( has_post_thumbnail() ) 
                        the_post_thumbnail(); 
                ?>
            </div>
                
		<header>
                    <?php 
                    $textoTitulo = get_post_meta($post->ID, 'textoTitulo', true);
                    
                    if($textoTitulo){?>
                        <h3 class="textoTitulo"><?php echo $textoTitulo;?></h3>
                    <?php } ?>

		    <h1 class="postTitle"><?php the_title(); ?></h1>

		</header>
      
		<section class="post"><?php the_content(__('(more...)')); ?></section>
		

    </article>

  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;

  if($ajaxload == false)get_footer(); 
?>