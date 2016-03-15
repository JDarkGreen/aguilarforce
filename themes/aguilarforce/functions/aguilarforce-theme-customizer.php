<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('AguilarForce Options', 'AguilarForce Options', 'edit_theme_options', 'customize.php');
}

/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
add_action('customize_register', 'aguilarforce_customize_register');
function aguilarforce_customize_register($wp_customize) {
	// Logo 
	$wp_customize->add_section('aguilarforce_logo', array(
		'title' => __('Logo', 'aguilarforce-framework'),
		'description' => __('Permite subir tu logo personalizado.', 'aguilarforce-framework'),
		'priority' => 35
	));
	
	$wp_customize->add_setting('aguilarforce_custom_settings[logo]', array(
		'default' => IMAGES . '/logo.png',
		'type' => 'option'
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Carga tu Logo', 'aguilarforce-framework'),
		'section' => 'aguilarforce_logo',
		'settings' => 'aguilarforce_custom_settings[logo]'
	)));
	
	// Top Ad
	$wp_customize->add_section('aguilarforce_ad', array(
		'title' => __('Top Ad', 'aguilarforce-framework'),
		'description' => __('Allows you to upload an ad banner to display on the top of the page.', 'aguilarforce-framework'),
		'priority' => 36
	));
	
	
	// Contact Email
	$wp_customize->add_section('aguilarforce_contact_email', array(
		'title' => __('Correo Contacto de Formulario', 'aguilarforce-framework'),
		'description' => __('Escribe el Correo Contacto de Formulario', 'aguilarforce-framework'),
		'priority' => 37
	));
	
	$wp_customize->add_setting('aguilarforce_custom_settings[contact_email]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('aguilarforce_custom_settings[contact_email]', array(
		'label'    => __('Dirección Contacto de Formulario', 'aguilarforce-framework'),
		'section'  => 'aguilarforce_contact_email',
		'settings' => 'aguilarforce_custom_settings[contact_email]',
		'type'     => 'text'
	));

	//Customizar celular
	$wp_customize->add_section('aguilarforce_contact_cel', array(
		'title' => __('Celular de Contacto', 'aguilarforce-framework'),
		'description' => __('Celular de Contacto', 'aguilarforce-framework'),
		'priority' => 39
	));
	
	$wp_customize->add_setting('aguilarforce_custom_settings[contact_cel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('aguilarforce_custom_settings[contact_cel]', array(
		'label'    => __('Escribe el o los números de celular del contacto separados por comas', 'aguilarforce-framework'),
		'section'  => 'aguilarforce_contact_cel',
		'settings' => 'aguilarforce_custom_settings[contact_cel]',
		'type'     => 'text'
	));

	//Customizar telefono
	$wp_customize->add_section('aguilarforce_contact_tel', array(
		'title' => __('Telefono de Contacto', 'aguilarforce-framework'),
		'description' => __('Telefono de Contacto', 'aguilarforce-framework'),
		'priority' => 39
	));
	
	$wp_customize->add_setting('aguilarforce_custom_settings[contact_tel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('aguilarforce_custom_settings[contact_tel]', array(
		'label'    => __('Escribe el numero de teléfono', 'aguilarforce-framework'),
		'section'  => 'aguilarforce_contact_tel',
		'settings' => 'aguilarforce_custom_settings[contact_tel]',
		'type'     => 'text'
	));

	//Customizar Direccion
	$wp_customize->add_section('aguilarforce_contact_address', array(
		'title' => __('Direccion de Contacto', 'aguilarforce-framework'),
		'description' => __('Direccion de Contacto', 'aguilarforce-framework'),
		'priority' => 40
	));
	
	$wp_customize->add_setting('aguilarforce_custom_settings[contact_address]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('aguilarforce_custom_settings[contact_address]', array(
		'label'    => __('Escribe la Direccion del contacto ', 'aguilarforce-framework'),
		'section'  => 'aguilarforce_contact_address',
		'settings' => 'aguilarforce_custom_settings[contact_address]',
		'type'     => 'text'
	));

	//Customizar MAPA
	$wp_customize->add_section('aguilarforce_contact_mapa', array(
		'title' => __('Mapa de Contacto', 'aguilarforce-framework'),
		'description' => __('Mapa de Contacto', 'aguilarforce-framework'),
		'priority' => 41
	));
	
	$wp_customize->add_setting('aguilarforce_custom_settings[contact_mapa]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('aguilarforce_custom_settings[contact_mapa]', array(
		'label'    => __('Escribe latitud y longitud de mapa sepador por coma', 'aguilarforce-framework'),
		'section'  => 'aguilarforce_contact_mapa',
		'settings' => 'aguilarforce_custom_settings[contact_mapa]',
		'type'     => 'text'
	));
	
}	
?>