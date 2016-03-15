<?php 
/*
	Template Name: Galería Page
*/
?>

<!-- Header -->
<?php get_header(); ?>

<!-- Conseguir contenido de la pagina -->
<?php 
	$the_post = get_post( get_the_ID() ); 
?> 

<!-- Contenido Principal -->
<main class="section-wrapper">
	<div class="container">

		<!-- Titulo -->
		<h2 class="section-wrapper__title text-uppercase"><?php _e( 'Galería' , 'aguilarforce-framework' ); ?></h2>
		<br/>

		<!-- Seccion para mostrar contenido -->
		<section class="section-wrapper__container">
			<?php if( !empty($the_post->post_content) ) : ?>
				<?= $the_post->post_content; ?>
			<?php endif; ?>

			<!-- THE QUERY -->
			<?php  
				//query
				$args = array(
					'post_type' => 'galeria-video',
				);

				$the_query = new WP_Query($args);

				if( $the_query->have_posts() ) : 
			?>
			
			<!-- SECCION DE VIDEOS  -->
			<section class="section-wrapper__multimedia">
				<h2 class="section-wrapper__title text-uppercase"><?php _e( 'Video:' , 'aguilarforce-framework' ); ?></h2>
				<br/>
				<!-- contenedor flex -->
				<div class="section-wrapper__multimedia__content flex-wrapper">
					<?php  
						while( $the_query->have_posts() ) : $the_query->the_post();
					?>
					<article class="section-wrapper__multimedia__article">
						<!-- video -->
						<?php  
							$video = get_post_meta( get_the_id() , 'mb_aguilarforce_url_video_text' , true ); 
							if ( !empty($video) ) :
								$video = str_replace("watch?v=", "embed/", $video );
						?>
							<iframe width="100%" height="200" src="<?= $video; ?>" allowfullscreen></iframe>
						<?php endif; ?>
						<!-- titulo -->
						<h3 class="text-capitalize"> <?php the_title(); ?> </h3>
					</article> <!-- /.section-wrapper__multimedia__article -->
					<?php endwhile; ?>
				</div><!-- /section-wrapper__multimedia__content flex-wrapper -->
			</section> <!-- section-wrapper__multimedia -->
	
			<!-- SECCION DE IMAGENES -->
			<section class="section-wrapper__multimedia">
				<h2 class="section-wrapper__title text-uppercase"><?php _e( 'Imagenes:' , 'aguilarforce-framework' ); ?></h2>
				<br/>
				<!-- contenedor flex -->
				<div class="section-wrapper__multimedia__content flex-wrapper">
					<?php  while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php 
							if( has_post_thumbnail() ) :
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
							$url   = $thumb['0']; 
						?>
						<a class="section-wrapper__multimedia__article grouped_elements" rel="group1" href="<?= $url ?>">
							<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
						</a>
					<?php endif; endwhile; ?>
				</div><!-- /section-wrapper__multimedia__content flex-wrapper -->
			</section> <!-- /.section-wrapper__multimedia -->


			<?php wp_reset_postdata(); endif; ?>
			<!-- End Quert -->


		</section> <!-- /.section-wrapper__container -->
		

	</div> <!-- /.container -->
</main> <!-- /.section-wrapper -->


<!-- Footer -->
<?php get_footer(); ?>