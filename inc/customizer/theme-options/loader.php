<?php

/**
* Loader options
*
* @package Theme Palace
* @subpackage Create_Magazine
* @since Create Magazine 1.0
*/

// Add Loader section
$wp_customize->add_section( 'create_magazine_loader', array(
	'title'               => __('Loader','create-magazine'),
	'description'         => __( 'Loader section options.', 'create-magazine' ),
	'panel'               => 'create_magazine_theme_options_panel'
) );

// Loader enable setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[loader_enable]', array(
	'sanitize_callback'   => 'create_magazine_sanitize_checkbox',
	'default'             => $options['loader_enable']
) );

$wp_customize->add_control( 'create_magazine_theme_options[loader_enable]', array(
	'label'               => __( 'Enable loader', 'create-magazine' ),
	'section'             => 'create_magazine_loader',
	'type'                => 'checkbox',
) );
