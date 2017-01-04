<?php

  /**
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
  ?>

	<article class="postWrapper" id="post-<?php the_ID(); ?>">

	<header>
	    <h1 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	    <?php echo get_avatar( $comment, 32 ); ?>  
	    <small><?php the_date(); ?> by <?php the_author(); ?></small>
	</header>

      <section class="post"><?php the_content(__('(more...)')); ?></section>
      <footer class="postMeta">Category: <?php the_category(', ') . " " . the_tags(__('Tags: '), ', ', ' | ') . edit_post_link(__('Edit'), ''); ?></footer>

      <hr class="noCss" />

	</article>

	<?php

  comments_template();

  endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php
  endif;

  get_footer();

?>