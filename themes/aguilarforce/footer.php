	
	<!-- Section Main Prefooter Aside -->
	<aside class="sidebarPreFooter">
		<div class="sidebarPreFooter__content container flex-wrapper">
			<!-- Sidebar prefooter  -->
			<?php get_sidebar('pre-footer'); ?>
		</div> <!-- /.flex-wrapper -->
	</aside> <!-- /.sidebarPreFooter -->

	<section class="section-gray-texture"></section><!-- /.section-gray-texture -->
	<section class="section-gray-texture"></section><!-- /.section-gray-texture -->
	

	<?php $options = get_option('aguilarforce_custom_settings'); ?>
	
	<footer class="mainFooter">
		
		<div class="container">
			<div class="row">
				<div class="mainFooter__content flex-wrapper">
					<div class="flex-wrapper__item-middle">
						<!-- correo de administrador -->
						<?php if( !empty($options['contact_email'])) :  ?>
							<p class="text-yellow"><?= $options['contact_email']; ?></p>
						<?php endif; ?>
					</div> <!-- /.flex-wrapper__item-middle -->
					<div class="flex-wrapper__item-middle text-right">
						<!-- telefono de administrador -->
						<?php if( !empty($options['contact_tel'])) :  ?>
							<p class="inline-text">Tel.:<?= " " . $options['contact_tel']; ?></p>
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
					</div> <!-- /.flex-wrapper__item-middle -->
				</div> <!-- /.flex-wrapper -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
		 
	</footer> <!-- /.mainFooter -->
	
	<?php wp_footer(); ?>

</body>
</html>