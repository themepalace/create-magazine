<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

// Add excerpt section
$wp_customize->add_section( 'create_magazine_excerpt_section', array(
	'title'             => __('Excerpt','create-magazine'),
	'description'       => __( 'Excerpt section options.', 'create-magazine' ),
	'panel'             => 'create_magazine_theme_options_panel'
) );

// Excerpt length setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[excerpt_length]', array(
	'sanitize_callback' => 'create_magazine_sanitize_number_range',
	'default'			  => $options['excerpt_length']
) );

$wp_customize->add_control( 'create_magazine_theme_options[excerpt_length]', array(
	'label'       => __( 'Length', 'create-magazine' ),
	'description' => __( 'Total words to be displayed.', 'create-magazine' ),
	'section'     => 'create_magazine_excerpt_section',
	'type'        => 'number',
	'input_attrs' => array(
		'style'       => 'width: 80px;',
		'max'         => 150,
		'min'         => 5,
	),
) );