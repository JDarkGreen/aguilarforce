<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php $options = get_option('aguilarforce_custom_settings'); ?>

	<!-- Header -->
	<header class="mainHeader">
		<section class="mainHeader__pre">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<!-- Sidebar preheader para Widget de redes sociales -->
						<?php get_sidebar('pre-header'); ?>
					</div>
					<div class="col-xs-6">
						<div class="mainHeader__info flex-wrapper flex-wrapper--align-end">
							<?php if( !empty($options['contact_cel'])) :  ?>
								<i><img src="<?= IMAGES ?>/icon-phones.png" alt="phones" class="img-responsive"></i>
								<?= "RPM: " ?>
								<ul class="list-inline">
									<?php  
										$phones = explode(',', $options['contact_cel'] );
										foreach( $phones as $phone ) :
									?>
									<li><?= "#" . $phone  ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div> <!-- /.flex-wrapper flex-wrapper--align-end -->
					</div> <!-- /.col-xs-6 text-right -->
				</div> <!-- /.row-->
			</div> <!-- /container -->
		</section><!--  -->
		<!-- Menu de navegacion principal -->
		<nav class="mainNavigation">
			<div class="container">
				<div class="row">
					<div class="col-xs-5">
						<?php wp_nav_menu(
							array(
								'menu_class'     => 'list-inline text-center',
								'theme_location' => 'left-main-menu'
							));
						?>
					</div> <!-- /-col-xs-5 -->
					<div class="col-xs-2">
						<?php $options['logo'] == '' ? $logo = IMAGES . '/logo.png' : $logo = $options['logo']; ?>
					
						<h1 class="logo">
							<a href="<?php echo home_url(); ?>">
								<img class="img-responsive" src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>" />
							</a>
						</h1> <!-- /logo -->
					</div> <!-- /col-xs-2 -->
					<div class="col-xs-5">
						<?php wp_nav_menu(
							array(
								'menu_class'     => 'list-inline text-center',
								'theme_location' => 'right-main-menu'
							));
						?>
					</div> <!-- /-col-xs-5 -->
				</div> <!-- /.row -->
				
			</div> <!-- /.container -->
		</nav> <!-- /.mainNavigation -->
	</header> <!-- /mainHeader -->