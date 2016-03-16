
<?php /* Template Name: Page Servicios */ ?>

<!-- Header -->
<?php get_header(); ?>


<!-- Contenido Principal -->
<main class="section-wrapper sectionServices">

	<div class="container">

		<section class="article-post">
			
			<!-- contenedor  -->
			<div class="container--center90">
				
				<!-- Titulo -->
				<h2 class="section-wrapper__title text-uppercase">
					<strong>
						<?php _e( 'Servicios', 'aguilarforce-framework'); ?>
					</strong>
				</h2>

				<?php  
					//the query
					$args = array(
						'post_type' => 'servicio',
						'orderby'   => 'menu_order',
						'order'     => 'ASC'
					);

					$the_query = new WP_Query($args);

					if( $the_query->have_posts() ) :

				?> 
					<!-- Descripcion:  -->
					<p><?php _e( 'Nuestros principales servicios:', 'aguilarforce-framework'); ?></p>

			</div> <!-- /.container--center90 -->

			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
				<!-- Artículos -->
				<article class="sectionServices__article">
					<!-- Imagen -->
					<?php if( has_post_thumbnail() ) : ?>
						<figure><?php the_post_thumbnail('full',array('class'=>'img-responsive center-block')); ?></figure>
					<?php endif; ?>

					<section class="sectionServices__article__text">
						<!-- excerpt como Título -->
						<h2 class="">
							<span class="title">
								<?php 
									/*$excerpt = get_the_excerpt(); 
									echo $excerpt;*/
									echo get_the_title();
								?>
							</span>
							<!-- Span franja amarilla -->
							<span class="yellow-line"></span>
						</h2>
						<!-- Contenido -->
						<?php 
							$content = get_the_content();

							if( !empty($content) ) : 
						?>
							<p class="text-justify"><?= $content ?></p>
						<?php endif; ?>
					</section> <!-- /.sectionServices__article -->
					
					<!-- cleafix -->
					<div style="clear: both;"></div>

				</article><!-- /.sectionServices__article -->

			<?php endwhile; endif; wp_reset_postdata(); ?>

		</section> <!-- /.article-post -->

	</div><!-- /.container -->

</main><!-- /.section-wrapper -->


<!-- Textura -->
<section class="section-gray-texture"></section><!-- /.section-gray-texture -->

<!-- Footer -->
<?php get_footer(); ?>