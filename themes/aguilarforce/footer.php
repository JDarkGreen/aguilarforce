	
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
				<div class="mainFooter__content flex-wrapper text-center">
					<!-- ITEM -->
					<div class="mainFooter__content__item">
						<p>
							<span class="text-developer">
								<?php _e('Desarrollado por www.ingenioart.com' , 'aguilarforce-framework' ); ?>
							</span> <!-- /text-developper -->
						</p>
					</div> <!-- /.mainFooter__content__item -->
					<!-- ITEM -->
					<div class="mainFooter__content__item">
						<!-- correo de administrador -->
						<?php if( !empty($options['contact_email'])) :  ?>
							<p class="text-yellow"><?= $options['contact_email']; ?></p>
						<?php endif; ?>
						<!-- celular de administrador -->
						<?php if( !empty($options['contact_cel'])) :  ?>
							<?php  
								$phones = explode(',', $options['contact_cel'] );
								foreach( $phones as $phone ) : ?>
								<p class="inline-text"><?= "RPM #" . $phone  ?></p>
							<?php endforeach; ?>
						<?php endif; ?>
						<!-- direccion administrador -->
						<?php if( !empty($options['contact_address'])) :  ?>
							<p><?= $options['contact_address']; ?></p>
						<?php endif; ?>	
					</div> <!-- /.mainFooter__content__item -->
					<!-- ITEM -->
					<div class="mainFooter__content__item">
						<p class="text-yellow text-size-standar">
							<strong>
								<?php /*
									$palabra = "aguilarforce";
									$sitio = get_site_url(); 
									$sitio = str_replace( $palabra , "", $sitio );
									echo $sitio . "<span class='big-text'>$palabra</span>";*/
								?>
								www. <span class="big-text">aguilarforce</span> .com
							</strong>
						</p>
					</div> <!-- /.mainFooter__content__item -->
				</div> <!-- /.flex-wrapper -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
		 
	</footer> <!-- /.mainFooter -->
	
	<?php wp_footer(); ?>

</body>
</html>