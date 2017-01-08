<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  $ajaxload = false;

if(isset($_GET['ajaxload']))
    $ajaxload = $_GET['ajaxload'];

if($ajaxload == false)
    get_header();

  if (have_posts()) : ?>

  <script type="text/javascript">$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
  <div class="instructorContainer">
    <div class="loadingInstructor"></div>
  </div>
  <h1 class="postTitle">Instructores</h1>
  <div class="slideshowContainer">
    <div class="slideshow" 
    	data-cycle-log="false"
        data-cycle-fx=carousel
        data-cycle-timeout=0
        data-cycle-next="#next3"
        data-cycle-prev="#prev3"
        data-cycle-slides="> div"
        >
        
<?php while (have_posts()) : the_post(); ?>

	<div>
		<a href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() )the_post_thumbnail('medium'); ?>
		<div class="name"><?php the_title(); ?></div>
		</a>
	</div>

  <?php

  endwhile; ?>

    </div>
    <div class=center>
        <a href=# id=prev3>&lt;&lt; Prev </a>
        <a href=# id=next3> Next &gt;&gt; </a>
    </div>
    </div>
<?php else: ?>

    <p></p>

<?php endif; ?>

<?php

  if($ajaxload == false)get_footer(); 
?>