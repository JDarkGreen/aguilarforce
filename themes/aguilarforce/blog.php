<?php  
/*
	Template Name: Blog Template
*/
?>

<!-- Header -->
<?php get_header(); ?>

<!-- Contenido Principal -->
<main class="section-wrapper">
	<div class="container">
		<!-- Titulo -->
		<h2 class="section-wrapper__title text-uppercase">
			<strong><?php echo get_the_title() . ": " ?></strong>
		</h2><!-- /.ection-wrapper__title text-uppercase" -->
		<br/>
		
		<?php  
			//query traer todos los post disponibles
			$args = array(
				'post_type' => 'post'
			); 

			$the_query = new WP_Query($args);

			if( $the_query->have_posts() ) :
		?>
			<!-- Seccion para mostrar contenido -->
			<section class="section-wrapper__blog__content flex-wrapper">
				<?php while( $the_query->have_posts()) : $the_query->the_post(); ?>
					<article class="section-wrapper__blog__article">
						<a class="" href="<?php the_permalink(); ?>">
							<!-- Image -->
							<?php if( has_post_thumbnail() ) : ?>
								<figure><?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?></figure>
							<?php endif ?>
							
							<!-- Contenedor de Informacion -->
							<div class="caption-article">
								<!-- Titulo -->
								<h3><?php the_title() ?></h3>
								<!-- Extracto -->
								<?php 
									$content = get_the_content();
									$content = substr($content, 0, 100); 

									if( !empty($content) ) :
								?>
								<p><?= $content . ". " . __('Ver Más...'); ?></p>
								<?php endif; ?>
							</div> <!-- /caption-article -->
						</a>  <!--  -->
					</article><!-- ./section-wrapper__blog__article -->
				<?php endwhile; ?>
			</section> <!-- /.section-wrapper__container -->

		<?php wp_reset_postdata(); endif; ?>

	</div><!-- /.container -->
</main> <!-- /.section-wrapper -->


<!-- Footer -->
<?php get_footer(); ?>