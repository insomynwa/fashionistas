<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package aThemes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '-', true, 'right' ); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<link rel = "stylesheet" href = "http://getbootstrap.com/dist/css/bootstrap.min.css" type = "text/css" media = "screen" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php if ( get_theme_mod('apple_touch_144') ) : ?>
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('apple_touch_144')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_114') ) : ?>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('apple_touch_114')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_72') ) : ?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_theme_mod('apple_touch_72')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_57') ) : ?>
	<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('apple_touch_57')); ?>" />
<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<nav id="top-navigation" class="main-navigation" role="navigation">
		
	<!-- #top-navigation --></nav>

	<header id="masthead" class="clearfix container site-header" role="banner">
		<div class="site-branding">
			<?php if ( get_theme_mod('site_logo') ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
			<?php else : ?>			
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</<?php echo $heading_tag; ?>>
				<div class="site-description"><?php bloginfo( 'description' ); ?></div>
			<?php endif; ?>
		<!-- .site-branding --></div>

		<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
		<?php if(is_user_logged_in()): ?>
		<div class="account-id"> 
			<div class="dropdown">
			    <button class="btn dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Profile
			    <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
			     <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>
			      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo get_home_url().'/chart/'; ?>">Pesanan Saya</a></li>
			      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>  
			    </ul>
			</div>
			  <br>
		</div>
		<?php endif; ?>
		<?php endif; ?>
	<!-- #masthead --></header>

	<nav id="main-navigation" class="container main-navigation" role="navigation">
		<a href="#main-navigation" class="nav-open">Menu</a>
		<a href="#" class="nav-close">Close</a>
		<?php wp_nav_menu( array( 'container_class' => 'sf-menu', 'theme_location' => 'main' ) ); ?>
	<!-- #main-navigation --></nav>

	<div id="main" class="site-main">
		<div class="clearfix container">
			