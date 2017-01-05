<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  $ajaxload = false;

if(isset($_GET['ajaxload']))
    $ajaxload = $_GET['ajaxload'];

if($ajaxload == false)
    get_header();

  if (have_posts()) : ?><script src="http://malsup.github.com/jquery.cycle2.js"></script>
<?php    while (have_posts()) : the_post();
  ?>

	<div class="slideshow" 
    data-cycle-fx=carousel
    data-cycle-timeout=0
    data-cycle-carousel-visible=5
    data-cycle-next="#next"
    data-cycle-prev="#prev"
    data-cycle-pager="#pager"
    >
    <img src="http://malsup.github.io/images/beach1.jpg">
    <img src="http://malsup.github.io/images/beach2.jpg">
    ...
    <img src="http://malsup.github.io/images/beach9.jpg">
</div>

<div class=center>
    <a href=# id=prev>&lt;&lt; Prev </a>
    <a href=# id=next> Next &gt;&gt; </a>
</div>

<div class="cycle-pager" id=pager></div>

  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>
    <div class="slideshow" 
    data-cycle-fx=carousel
    data-cycle-timeout=0
    data-cycle-carousel-visible=5
    data-cycle-next="#next"
    data-cycle-prev="#prev"
    data-cycle-pager="#pager"
    >
    <img src="http://malsup.github.io/images/beach1.jpg">
    <img src="http://malsup.github.io/images/beach2.jpg">
    ...
    <img src="http://malsup.github.io/images/beach9.jpg">
</div>

<div class=center>
    <a href=# id=prev>&lt;&lt; Prev </a>
    <a href=# id=next> Next &gt;&gt; </a>
</div>

<div class="cycle-pager" id=pager></div>

<?php
  endif;

  if($ajaxload == false)get_footer(); 
?>