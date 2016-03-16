<?php 
/***********************************************************************************************/
/* Widget that displays an embeddable video */
/***********************************************************************************************/

class AguilarForce_Facebook_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'aguilarforce_facebook_w',
			'Widget: facebook',
			array('description' => __('Muestra el fan page facebook de la web', 'aguilarforce-framework'))
			); 
	}

	public function form($instance) {
		$defaults = array(
			'title' => __('Redes Sociales', 'aguilarforce-framework'),
			'link_facebook' => 'https://www.facebook.com/theloremipsumstore/',
			);

		$instance = wp_parse_args((array) $instance, $defaults);

		?>

		<!-- Link Embed -->
		<p>
			<label for="<?php echo $this->get_field_id('link_facebook') ?>"><?php _e('Link del Facebook:', 'aguilarforce-framework'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('link_facebook'); ?>" name="<?php echo $this->get_field_name('link_facebook'); ?>"><?php echo $instance['link_facebook']; ?></textarea>
		</p>

		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

			// The Ad
		$instance['link_facebook'] = $new_instance['link_facebook'];

		return $instance;
	}

	public function widget($args, $instance) {
		extract($args);

			// Get the title and prepare it for display
		//$title = apply_filters('widget_title', $instance['title']);

			// Get the ad
		$link_facebook = $instance['link_facebook'];

		echo $before_widget;

		?>

		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script> <!-- /end script -->

		<!-- Mostrar contenedor y actividad de red social -->
		<div class="fb-page" data-href="<?= !empty($link_facebook) ? $link_facebook : '' ?>" data-tabs="timeline" data-width="100%" data-height="337" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>

		<?php

		echo $after_widget; 
	}
}

register_widget('AguilarForce_Facebook_Widget');

?>