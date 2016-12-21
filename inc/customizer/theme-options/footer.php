<?php
/**
* Copyright options
*
* @package Theme Palace
* @subpackage Create_Magazine
* @since Create Magazine 1.0
*/

/// Add copyright section
$wp_customize->add_section( 'create_magazine_footer', array(
	'title'               => __('Footer','create-magazine'),
	'description'         => __( 'Footer section options.', 'create-magazine' ),
	'panel'               => 'create_magazine_theme_options_panel'
) );

// Copyright text setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[copyright_text]', array(
	'sanitize_callback'   => 'esc_textarea',
	'default'             => $options['copyright_text']
) );

$wp_customize->add_control( 'create_magazine_theme_options[copyright_text]', array(
	'label'               => __( 'Copyright', 'create-magazine' ),
	'section'             => 'create_magazine_footer',
	'type'                => 'textarea',
) );
