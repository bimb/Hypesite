<!DOCTYPE HTML>
	<html <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = yes" />
        
	<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>

	<style type="text/css" media="screen">
        @import url( <?php bloginfo('template_url'); ?>/fullcalendar.print.min.css );
		@import url( <?php bloginfo('stylesheet_url'); ?> );
        @import url( <?php bloginfo('template_url'); ?>/scripts/lightbox/css/lightbox.css );
        @import url( <?php bloginfo('template_url'); ?>/carousel.css );
        @import url( <?php bloginfo('template_url'); ?>/fullcalendar.min.css );
	</style>

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <script src="<?php bloginfo('template_url'); ?>/scripts/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/headerHome.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/jquery.cycle2.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/jquery.cycle2.carousel.min.js"></script>
    <script src='<?php bloginfo('template_url'); ?>/scripts/moment.min.js'></script>
    <script src='<?php bloginfo('template_url'); ?>/scripts/fullcalendar.min.js'></script>
    <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/scripts/gcal.js'></script>
    <script src='<?php bloginfo('template_url'); ?>/scripts/locale/es.js'></script>
    <script>

    $(document).bind('ready ajaxComplete', function(){
	    $('#calendar').fullCalendar({
	        header: {
	                left: 'title',
	                center: '',
	                right: 'prev,next'
	            },
	        titleFormat: 'MMMM',
	        defaultView: 'basicWeek',
	        googleCalendarApiKey: 'AIzaSyDF0GjrSF2FkVsIgSxU7aPrdrvNM9bvF44',
	        events: {
	                googleCalendarId: 'hcuhmtv6vr4it8g3vsghi5ag1s@group.calendar.google.com'
	            },
	        timeFormat: 'h:mm A',
	        dayOfMonthFormat: 'dddd DD',
	        eventRender: function(event, element) { 
	            element.find('.fc-title').append("<br/><p>" + event.description +"</p>");
	            //element.attr("href", "http://hypetraining.mx/"+ event.location);
                <?php if(is_user_logged_in()){ ?>
                element.attr("href", "<?php echo get_bloginfo('url'); ?>/"+ event.location);
                element.click(function(){
                    $.ajaxSetup({cache:false});
                    var post_url = $(this).attr("href")+"?ajaxload=false";
                    $("#single-post-container").hide().load(post_url, function(){$(this).fadeIn();});
                    return false;
                });
                <?php }else{ ?>
                element.attr("href", "<?php echo get_bloginfo('url'); ?>/mis-reservas/");
                element.attr("target", "_self");
                <?php } ?>
	            //element.attr("href", "");
	            
	        },
        });
    });
    </script>
        
    
	<?php
    wp_get_archives('type=monthly&format=link');
    wp_head();
  ?>
  <meta name="google-site-verification" content="oqKzuz9ISykqj3Vn9GbFedaXE9_IFSf27f3xeaR5uog" />
</head>

<body class="pushmenu-push">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91053007-1', 'auto');
  ga('send', 'pageview');

</script>
  <div id="canvas">
<header id="navegacion">
    <div id="logo">
        <img class="logoNegro" src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Hype Logo" />
        <img class="logoBlanco" src="<?php bloginfo('template_url'); ?>/images/logob.png" alt="Hype Logo" />
    </div>
    <!-- Main Logo Here -->
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    <?php if(is_user_logged_in()){ ?>
    <a id="logout" href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>">CERRAR SESIÓN</a>
    <a id="logoutReservas" href="<?php echo get_bloginfo('url'); ?>/mis-reservas"  target="_blank"> / MIS RESERVAS</a>   
    <?php }else{ ?>
    <a id="logout" href="<?php bloginfo('url'); ?>/mis-reservas/">INICIA SESIÓN / REGISTRO</a>
    <?php } ?>
    <nav class="pushmenu pushmenu-left">
    <a id="cerrarMenu" class="equis" href=""></a>
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    </nav>
    <section class="buttonset">
            <div id="nav_list">Menu</div>
  </section>
    
</header>

    <div id="primaryContent">