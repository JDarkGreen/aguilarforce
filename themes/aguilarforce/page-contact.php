<?php  
/*
	Template Name: Página de Contacto
*/
?>

<!-- Header -->
<?php get_header(); ?>

<?php $options = get_option('aguilarforce_custom_settings'); ?>

<!-- Contenido Principal -->
<main class="section-wrapper section-wrapper--contact">

	<!-- SECCION DE MAPA -->
	<section class="section-wrapper--contact__map">
		<?php if( !empty($options['contact_mapa']) ) : ?>
			<div id="canvas-map" class="canvas-map">
		<?php endif; ?>
		</div><!-- /. -->
	</section><!-- /.section-wrapper--contact__map -->

	<div class="container">
		<section class="section-wrapper--contact__content flex-wrapper">
			<!-- Titulo e imagen destacada -->
			<section class="section-wrapper--contact__article section__presentation">
				<h2 class="section-wrapper__title text-uppercase"><?php the_title(); ?></h2>
				<p><?php _e('¡Llene el formulario y solicite más información!','inox-framework'); ?></p>  
				<?php if( has_post_thumbnail() ) : ?>
					<figure><?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?></figure>
				<?php endif; ?>
			</section>
			<!-- Datos de la Empresa -->
			<section class="section-wrapper--contact__article section__information">
				<!-- telefono de administrador -->
				<?php if( !empty($options['contact_tel'])) :  ?>
					<p class="">Tel.:<?= $options['contact_tel']; ?></p>
				<?php endif; ?>
				<!-- celular de administrador -->
				<?php if( !empty($options['contact_cel'])) :  ?>
					<?php  
					echo "/ Cel: ";
					$phones = explode(',', $options['contact_cel'] );
						foreach( $phones as $phone ) : ?>
						<p class="inline-text"><?= $phone  ?></p>
					<?php endforeach; ?>
				<?php endif; ?>
				<!-- direccion administrador -->
				<?php if( !empty($options['contact_address'])) :  ?>
					<p><?= $options['contact_address']; ?></p>
				<?php endif; ?>	
			</section>
			<!-- FORMULARIO -->
			<form id="form-contact" class="section-wrapper--contact__article" method="post" action="<?= THEMEROOT ?>/php/enviar.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="input-name"><?php _e('Nombre:','aguilarforce-framework' ); ?></label>
				    <input type="text" class="form-control" id="input-name" name="input-name" placeholder="Escriba su Nombre" data-rules-required="true" data-rules-minlength="4" />
				</div><!-- /.form-group -->
				<div class="form-group">
					<label for="input-email"><?php _e('Email:','aguilarforce-framework' ); ?></label>
				    <input type="email" class="form-control" id="input-email" name="input-email" placeholder="Escriba su Email"data-rules-required="true" data-rules-email="true" />
				</div><!-- /.form-group -->
				<div class="form-group">
					<label for="textarea-message"><?php _e('Mensaje:','aguilarforce-framework' ); ?></label>
					<textarea name="textarea-message" id="textarea-message" name="textarea-message" placeholder="Escriba su Mensaje" data-rules-required="true" data-rules-minlength="20"></textarea>
				</div><!-- /.form-group -->
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div><!-- /.form-group -->
			</form><!-- /end form -->
		</section><!-- /.flex-wrapper -->
	</div><!-- /.container -->

</main><!-- /.section-wrapper -->

<script type="text/javascript">

	<?php  
		$mapa = explode(',', $options['contact_mapa'] );
		$lat = $mapa[0];
		$lng = $mapa[1];
	?>

    var map;
    var lat = <?php echo $lat ?>;
    var lng = <?php echo $lng ?>;

    function initialize() {
      //crear mapa
      map = new google.maps.Map(document.getElementById('canvas-map'), {
        center: {lat: lat, lng: lng},
        zoom  : 17
      });

      //infowindow
      var infowindow    = new google.maps.InfoWindow({
        content: <?= "'" . $options['contact_address'] . "'" ?>
      });

      //crear marcador
      marker = new google.maps.Marker({
        map      : map,
        draggable: false,
        animation: google.maps.Animation.DROP,
        position : {lat: lat, lng: lng},
        title    : "<?php _e(bloginfo('name'),'aguilarforce-framework') ?>"
      });
      //marker.addListener('click', toggleBounce);
      marker.addListener('click', function() {
        infowindow.open( map, marker);
      });
    }

    google.maps.event.addDomListener(window, "load", initialize);
  </script>

<!-- Footer -->
<?php get_footer(); ?>