    <?php
/*
 Template Name: Home
 */
$ajaxload = false;

if(isset($_GET['ajaxload']))
    $ajaxload = $_GET['ajaxload'];

if($ajaxload == false)
    get_header();
?>

<section class="section-home" id="home-inicio"></section>
<section class="section-home" id="home-acerca-de"></section>
<section class="section-home" id="home-horarios"></section>
<section class="section-home" id="home-reservar"></section>
<section class="section-home" id="home-contacto"></section>
<section class="section-home" id="home-footer">
	<ul>
		<li>
			
		</li>
		<li>
			
		</li>
		<li>
			<span class="copyright">All rights reserved <?php echo date('Y'); ?></span>
		</li>
	</ul>
</section>



<?php     if($ajaxload == false)get_footer(); ?>