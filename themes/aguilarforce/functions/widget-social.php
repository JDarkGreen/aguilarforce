<?php 
/***********************************************************************************************/
/* Widget muestra las redes sociales */
/***********************************************************************************************/

	class AguilarForce_Social_Widget extends WP_Widget {
	
		public function __construct() {
			parent::__construct(
				'aguilarforce_social_w',
				'Widget Personalizado: Redes Sociales',
				array('description' => __('Muestra las redes sociales dejar en blanco si no desea que se muestre', 'aguilarforce-framework'))
			); 
		}
		
		public function form($instance) {
			$defaults = array(
				'link_facebook' => '',
				'link_twitter' => '',
				'link_youtube' => '',
			);
			
			$instance = wp_parse_args((array) $instance, $defaults);
			
			?>
			<!-- Link Facebook -->
			<p>
				<label for="<?php echo $this->get_field_id('link_facebook') ?>"><?php _e('Link de Facebook:', 'aguilarforce-framework'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('link_facebook'); ?>" name="<?php echo $this->get_field_name('link_facebook'); ?>" value="<?php echo $instance['link_facebook']; ?>" />
			</p>

			<!-- Link Twitter -->
			<p>
				<label for="<?php echo $this->get_field_id('link_twitter') ?>"><?php _e('Link de Twitter:', 'aguilarforce-framework'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('link_twitter'); ?>" name="<?php echo $this->get_field_name('link_twitter'); ?>" value="<?php echo $instance['link_twitter']; ?>" />
			</p>

			<!-- Link Youtube -->
			<p>
				<label for="<?php echo $this->get_field_id('link_youtube') ?>"><?php _e('Link de Youtube:', 'aguilarforce-framework'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('link_youtube'); ?>" name="<?php echo $this->get_field_name('link_youtube'); ?>" value="<?php echo $instance['link_youtube']; ?>" />
			</p>

			<?php
		}
		
		public function update($new_instance, $old_instance) {
			$instance = $old_instance;
			
			// The Ad
			$instance['link_facebook'] = $new_instance['link_facebook'];
			$instance['link_twitter']  = $new_instance['link_twitter'];
			$instance['link_youtube']  = $new_instance['link_youtube'];

			return $instance;
		}
		
		public function widget($args, $instance) {
			extract($args);
			
			// Get the ad
			$link_facebook = $instance['link_facebook'];
			$link_twitter  = $instance['link_twitter'];
			$link_youtube  = $instance['link_youtube'];
			
			echo $before_widget;
			

		?>

		<ul class="menu-socialLinks list-inline">
			<!-- Facebook -->
			<?php if( !empty($link_facebook) ) : ?>
			<li>
				<a href="<?= $link_facebook; ?>" target="_blank">
					<img src="<?= IMAGES ?>/redes-sociales/facebook.png" alt="facebook" class="img-responsive" />
				</a>
			</li>
			<?php endif; ?>
			<!-- Twitter -->
			<?php if( !empty($link_twitter) ) : ?>
			<li>
				<a href="<?= $link_twitter; ?>" target="_blank">
					<img src="<?= IMAGES ?>/redes-sociales/twitter.png" alt="twitter" class="img-responsive" />
				</a>
			</li>
			<?php endif; ?>
			<!-- youtube -->
			<?php if( !empty($link_youtube) ) : ?>
			<li>
				<a href="<?= $link_youtube; ?>" target="_blank">
					<img src="<?= IMAGES ?>/redes-sociales/youtube.png" alt="youtube" class="img-responsive" />
				</a>
			</li>
			<?php endif; ?>
		</ul><!-- /.menu-socialLinks -->
			
		<?php
			
			echo $after_widget; 
		}
	}

	register_widget('AguilarForce_Social_Widget');

?>