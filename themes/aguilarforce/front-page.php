
<!-- Header -->
<?php get_header(); ?>

<!-- Incluir seccion de banner -->
<?php  
	$terms = ""; //el termino a pasar

	if( is_front_page() ){  
		$terms = 'home';
	} else { 
		$terms = strtolower( get_the_title() );
	}

	//template
	include(locate_template('content-banner.php'));
?>

<!-- Seccion Mostrar Servicios -->
<section class="section-wrapper">
	<div class="container">
		<?php  
			//the query
			$args = array(
				'post_type'     => 'servicio',
				'post_per_page' => 6,
				'orderby'       => 'menu_order',
				'order'         => 'ASC'
			);

			$the_query = new WP_Query($args);

			if( $the_query->have_posts() ) :
		?>
			<!-- Titulo de seccion -->
			<h2 class="section-wrapper__title text-uppercase"><strong><?php _e( 'Nuestros Servicios', 'aguilarforce-framework' ); ?></strong></h2>
			<br />
			<!-- Contenedor de sliders -->
			<section id="carouserl-services-home" class="section-wrapper__carousel">
				<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
					<article class="">
						<a href="<?php the_permalink(); ?>">
							<figure>
								<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
							</figure>
							<h2><?php the_title(); ?></h2>
						</a>
					</article>
				<?php endwhile; ?>
			</section><!-- /.section-wrapper__carousel -->		
		<?php endif; ?>
	</div><!-- /container -->	
</section><!-- /section-wrapper -->

<!-- Textura -->
<section class="section-gray-texture"></section><!-- /.section-gray-texture -->

<!-- Footer -->
<?php get_footer(); ?>