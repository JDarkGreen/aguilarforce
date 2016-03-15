<?php  
	// The Query
	$args = array(
		'post_type' => 'banner',
		'tax_query' => array(
			array(
				'taxonomy'         => 'banner_category',
				'field'            => 'slug',
				'terms'            =>  $terms,
				)
			),
		'orderby'          => 'menu_order',
		'order'            => 'ASC'
		);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) :

?>

<!-- Seccion de Banners -->
<section id="carousel-banner-home" class="sectionBanner carousel slide" data-ride="carousel">
	<!-- Wrapper for slides -->
  	<div class="carousel-inner" role="listbox">
		<?php 
			//variable 
			$i = 0;

			while ( $the_query->have_posts() ) : $the_query->the_post();	
		?>	
		<?php if( has_post_thumbnail() ) : ?>
	    	<div class="item <?= $i == 0 ? 'active' : '' ?>">
	      		<?php echo the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
	      		<section class="container">	
	      			<div class="row">
	      				<div class="col-xs-12">
				      		<div class="carousel-caption">
				      			<h2><?php the_title() ?></h2>
				      			<?php 
				      				$content =  get_the_content();
				      				if ( !empty($content) ): 
				      			?>
				      				<p><?= $content; ?></p>
				      			<?php endif; ?>
				      		</div> <!-- /carousel-caption -->
	      				</div> <!-- /.col-xs12 -->
	      			</div> <!-- /.row -->
	      		</section> <!-- /.container -->
	    	</div> <!-- /.item -->
    	<?php endif; ?>
		<?php $i++; endwhile; wp_reset_postdata(); ?>
    </div> <!-- /.carousel-inner -->
	
	<!-- Flechas de direccion -->
    <section class="container">
    	<div class="row">
    		<div class="content-arrowBanner">
    			<!-- Controls -->
    			<a class="btn-arrowBanner btn-arrowBanner--left" href="#carousel-banner-home" role="button" data-slide="prev">
    				<span class="sr-only">Previo</span>
    			</a>
    			<a class="btn-arrowBanner btn-arrowBanner--right" href="#carousel-banner-home" role="button" data-slide="next">
    				<span class="sr-only">Siguiente</span>
    			</a>
    		</div> <!-- /content-arrowBanner -->
    	</div> <!-- /.row -->
    </section> <!-- /.container -->

    
</section> <!-- /sectionBanner#carousel-banner-home -->

<?php endif; ?>