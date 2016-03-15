<!-- Header -->
<?php get_header(); ?>


<!-- Contenido Principal -->
<main class="section-wrapper">
	<div class="container">
		
		<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
		<article class="article-post">
			<!-- Dia -->
			<span class="article-post__date">
				<?php the_time(get_option('date_format')); ?>
			</span>

			<!-- Title -->
			<h2 class="article-post__title text-uppercase"><?= get_the_title(); ?></h2>
			<!-- Imagen destacada -->
			<?php if( has_post_thumbnail() ) : ?>
				<figure class="article-post__thumbnail"><?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?></figure>
			<?php endif; ?>
			<?php the_content(); ?>
		</article><!-- ./article-post  -->
		<?php endwhile; endif; ?>

	</div> <!-- /.container -->
</main><!-- /.section-wrapper -->



<!-- Footer -->
<?php get_footer(); ?>