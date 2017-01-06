<?php

  /**
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
  ?>

	<article class="postWrapper" id="post-<?php the_ID(); ?>">
    <div id="wrapperInstructor">
      <div class="thumbnail"><?php the_post_thumbnail(); ?></div>
      <header>
          <h1 class="postTitle"><?php the_title(); ?></h1>
      </header>
      <img class="colorShapesBottomDos" src="<?php bloginfo('template_url'); ?>/images/colorShapesBottomDos.png" />
      <div id="contentInstructor">
      <section class="post"><?php the_content(); ?></section>
      </div>
      <img class="colorShapesRight" src="<?php bloginfo('template_url'); ?>/images/colorShapesRight.png" />
    </div>
	</article>

	<?php


  endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php
  endif;

  get_footer();

?>