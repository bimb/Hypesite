<!DOCTYPE HTML>
	<html <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = yes" />
        
	<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
        @import url( <?php bloginfo('template_url'); ?>/scripts/lightbox/css/lightbox.css );
        @import url( <?php bloginfo('template_url'); ?>/carousel.css );
	</style>

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
    <script src="<?php bloginfo('template_url'); ?>/scripts/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/headerHome.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/jquery.cycle2.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/jquery.cycle2.carousel.min.js"></script>
        
	<?php
    wp_get_archives('type=monthly&format=link');
    wp_head();
  ?>
</head>

<body>
  <div id="canvas">
<header id="navegacion">
    <div id="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Hype Logo" /></div>
    <div id="mobileMenu">
        <!-- Mobile Logo Here -->
    </div>
    <!-- Main Logo Here -->
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</header>

    <div id="primaryContent">