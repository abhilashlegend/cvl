<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/skin.css" type="text/css" media="all" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.jcarousel.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-fns.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/scripts.js" type="text/javascript" charset="utf-8"></script>

</head>
<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=468456383237185";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id="wrapper">
		<!-- Begin Shell -->
		<div id="shell">
			<!-- Begin Header -->
			<div id="header">
				<h1 id="logo"><a href="<?php echo get_option('home'); ?>" class="notext">Center For Vision Loss</a></h1>
				<div class="header-top">
					<p class="locations"><?php echo get_option('header_info'); ?></p>
                    <p><strong>Theme Style:</strong> <a href="#" class="switch">Light</a> | <a href="#" class="switch">Dark</a></p>
                    <p>
                        <div id="changeFont"><strong>Font-Size:</strong>
                            <a class="increaseFont" href="#">Increase</a> | 
                            <a class="decreaseFont" href="#">Decrease</a> | 
                            <a class="resetFont" href="#">Reset</a>
                        </div>					
                    </p>

				</div>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'container_id' => 'navigation' ) ); ?>
			</div>
			<!-- End Header -->