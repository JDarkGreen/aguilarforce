<?php 
/*
	Template Name: Quienes Somos Page
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
		<h2 class="section-wrapper__title text-uppercase">
			<strong><?php _e( get_the_title() , 'aguilarforce-framework' ); ?></strong>
		</h2>
		<br/>

		<!-- Seccion para mostrar contenido -->
		<section class="section-wrapper__container">
			<?php if ( has_post_thumbnail() ): ?>
				<figure class="pull-left"><?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?></figure>
			<?php endif ?>
			<?php if( !empty($the_post->post_excerpt)) : ?>
				<div class="text-justify">
					<?= $the_post->post_excerpt; ?>
				</div>
			<?php endif; ?>
			
			<div class="clearfix"></div> <!-- /.clearfix -->
		</section><!-- /.section-wrapper__container -->

		<!-- Seccion para mostrar contenido -->
		<section class="section-wrapper__container">
			<?php if( !empty($the_post->post_content) ) : ?>
				<?= $the_post->post_content; ?>
			<?php endif; ?>
		</section> <!-- /.section-wrapper__container -->
		

	</div> <!-- /.container -->
</main> <!-- /.section-wrapper -->


<!-- Footer -->
<?php get_footer(); ?>