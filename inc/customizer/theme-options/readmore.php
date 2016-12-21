<?php
/**
 * Read More text options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

// Add Read More text section
$wp_customize->add_section( 'create_magazine_readmore_section', array(
	'title'             => __('Read More Options','create-magazine'),
	'description'       => __( 'Read More Section Options.', 'create-magazine' ),
	'panel'             => 'create_magazine_theme_options_panel'
) );

// Read More text setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[readmore_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['readmore_text']
) );

$wp_customize->add_control( 'create_magazine_theme_options[readmore_text]', array(
	'label'       		=> __( 'Read More Text.', 'create-magazine' ),
	'section'     		=> 'create_magazine_readmore_section',
	'type'        		=> 'text',
) );