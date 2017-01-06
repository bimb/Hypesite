<?php

  /**
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
  ?>

	<article class="postWrapper" id="post-<?php the_ID(); ?>">

	<header>
      <?php if ( has_post_thumbnail() )the_post_thumbnail(); ?>
	    <h1 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>

      <section class="post"><?php the_content(__('(more...)')); ?></section>

	</article>

	<?php


  endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php
  endif;

  get_footer();

?>