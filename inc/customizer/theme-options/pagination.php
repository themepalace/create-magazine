<?php
/**
* Pagination options
*
* @package Theme Palace
* @subpackage Create_Magazine
* @since Create Magazine 1.0
*/

// Add copyright section
$wp_customize->add_section( 'create_magazine_pagination', array(
	'title'       => __('Pagination','create-magazine'),
	'description' => __( 'Pagination section options.', 'create-magazine' ),
	'panel'       => 'create_magazine_theme_options_panel'
) );

// Disable Pagination setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[enable_pagination]', array(
	'sanitize_callback' => 'create_magazine_sanitize_checkbox',
	'default'           => $options['enable_pagination']
) );

$wp_customize->add_control( 'create_magazine_theme_options[enable_pagination]', array(
	'label'   => __( 'Check to enable pagination', 'create-magazine' ),
	'section' => 'create_magazine_pagination',
	'type'    => 'checkbox'
) );

// Disable Pagination type setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[pagination_type]', array(
	'sanitize_callback' => 'create_magazine_sanitize_select',
	'default'           => $options['pagination_type']
) );

$wp_customize->add_control( 'create_magazine_theme_options[pagination_type]', array(
	'label'           => __( 'Pagination type', 'create-magazine' ),
	'section'         => 'create_magazine_pagination',
	'type'            => 'select',
	'choices'         => create_magazine_pagination_type(),
) );