<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="header">
		<div class="logo"><a href="<?php bloginfo( 'url' ); ?>"><h1><?php bloginfo('name') ?></h1></a></div>
		<ul class="social">
			<!-- theme option foreach loop -->
		</ul>
		<div class="search">
			<!-- if themeoption insert search bar -->
		</div>
		<?php wp_nav_menu( array( 'container' => '', 'menu_class' => 'menu', 'theme_location' => 'primary' ) ); ?>
</div>