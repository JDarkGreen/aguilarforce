<!-- Widget o contenido quienes somos   -->
<?php  
	//the query
	$args = array(
		'post_type' => 'page',
		'pagename'  => 'quienes-somos'
	); 

	$the_query = new WP_Query($args);

	if( $the_query->have_posts() ) :
	while( $the_query->have_posts() ) : $the_query->the_post();
?>
	<!-- ARTICULO -->
	<article class="sidebar-widget-prefooter">
		<h2 class="section-wrapper__title text-uppercase"><?php _e( 'Aguilar force sac' , 'aguilarforce-framework' ); ?></h2><br>
		<?php $texto = get_the_excerpt(); ?>
		<p class="text-justify"><?= $texto; ?></p>
	</article><!-- /.sidebar-widget-prefooter -->
<?php endwhile; wp_reset_postdata(); endif; ?>

<!-- WIDGET O CONTENIDO QUE REDIRIGE A LA GALERÍA DE VIDEOS -->
<?php  
	//the query
	$args = array(
		'post_type'     => 'galeria-video',
		'posts_per_page' => 1,
		'orderby'       => 'rand'
	); 

	$the_query = new WP_Query($args);

	if( $the_query->have_posts() ) :
	while( $the_query->have_posts() ) : $the_query->the_post();
?>
	<!-- ARTICULO -->
	<article class="sidebar-widget-prefooter sidebar-widget-prefooter--bg-gray">
		<!-- video -->
		<?php  
			$video = get_post_meta( get_the_id() , 'mb_aguilarforce_url_video_text' , true ); 
			if ( !empty($video) ) :
				$video = str_replace("watch?v=", "embed/", $video );
		?>
			<iframe width="100%" height="220" src="<?= $video; ?>" allowfullscreen></iframe>
		<?php endif; ?>
		<!-- Link to galeria  -->
		
		<?php  
			$titulo = get_page_by_title( 'Galeria Videos' )->ID;
		?>

		<a href="<?= get_page_link($titulo); ?>" class="btn-link-black text-capitalize">
			<?php _e( 'Ver Videos', 'aguilarforce-framework' ); ?>
		</a> <!-- /.btn-link-black  -->
	</article> <!-- /.sidebar-widget-prefooter -->
<?php endwhile; wp_reset_postdata(); endif; ?>



<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('pre-footer')) : ?>

	<p>No hay widgets para mostrar</p>
	
<?php endif; ?>

				