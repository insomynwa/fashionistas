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
	<!-- <link rel = "stylesheet" href = "<?php echo bloginfo('template_url'); ?>/css/bootstrap/css/bootstrap.min.css" type = "text/css" media = "screen" /> -->
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/wickedpicker.css">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
	<!-- <link rel="stylesheet" href="<?php //echo bloginfo('template_url'); ?>/css/bootstrap-datetimepicker.min.css" /> -->
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
	<?php if(!is_user_logged_in()): ?>
		<div style="float:right;">
			<a href="#" data-toggle="modal" data-target="#myModal"> Masuk | Daftar</a>

			<!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
				    <div class="row">
			            <div style="margin-left:50px; width:500px;">
	                        <div class="card">
	                            <ul class="nav nav-tabs" role="tablist">
	                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
	                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>
	                            </ul>

	                            <div class="tab-content">
	                                <div role="tabpanel" class="tab-pane active" id="home"> 
	                                	<form method="post" name="loginform" id="loginform" action="<?php echo home_url().'/otw-adm.php'; ?>">
				                          <div class="control-group">
				                            <!-- Username -->
				                            <label class="control-label"  for="user_login">Username</label>
				                            <div class="controls">
				                              <input type="text" id="user_login" name="log" placeholder="username" class="input-xlarge">
				                            </div>
				                          </div>
				     
				                          <div class="control-group">
				                            <!-- Password-->
				                            <label class="control-label" for="user_pass">Password</label>
				                            <div class="controls">
				                              <input type="password" id="user_pass" name="pwd" placeholder="" class="input-xlarge">
				                            </div>
				                          </div>
				     
				     
				                          <div class="control-group">
				                            <!-- Button -->
				                            <div class="controls">
				                             	<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Sign In" />
				                            </div>
				                          </div>
				                          <a class="forgot-password" href="<?php echo wp_lostpassword_url(); ?>" >
		<?php _e( 'Forgot your password?', 'onex-login' ); ?>
	</a>
				                    	</form>
	                                </div>
	                                <div role="tabpanel" class="tab-pane" id="profile">
	                                	<form id="signupform" action="<?php echo wp_registration_url(); ?>" method="post">
		                                	<label>Username <strong>*</strong></label>
					                        <input type="text" name="username" id="username" value="" class="input-xlarge">
					                        <label>Email <strong>*</strong></label>
					                        <input type="email" value="" name="email" id="email" class="input-xlarge">
		                                	<label>First name</label>
					                        <input type="text" name="first_name" id="first-name" value="" class="input-xlarge">
		                                	<label>Last name</label>
					                        <input type="text" name="last_name" id="last-name" value="" class="input-xlarge"><br/>
					                        <!-- <label>No. telp</label>
					                        <input type="text" value="" class="input-xlarge">
					                        <label>Alamat detail</label>
					                        <textarea value="Smith" rows="3" class="input-xlarge">
					                        </textarea> -->
					     					<?php _e( 'Note: Password akan dikirimkan email yang anda masukkan.', 'onex-login' ); ?>
					                        <div>
					                          <input type="submit" name="submit" class="register-button" value="<?php _e( 'Register', 'onex-login' ); ?>"/>
					                        </div>
										</form>
	                                </div>
	                            </div>
							</div>
	                    </div>
					</div>
			    </div>
			  </div>
		</div>
	<?php endif; ?>
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
			     <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo get_home_url().'/profil/'; ?>">My Profile</a></li>
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

	<!-- #main-navigation -->
	</nav>

	<div id="main" class="site-main">
		<div class="clearfix container">
			