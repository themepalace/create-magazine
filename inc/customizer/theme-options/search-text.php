<?php
/**
 * Search text options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

// Add Search text section
$wp_customize->add_section( 'create_magazine_search_section', array(
	'title'             => __('Search Options','create-magazine'),
	'description'       => __( 'Search section options.', 'create-magazine' ),
	'panel'             => 'create_magazine_theme_options_panel'
) );

// Search text setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[search_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['search_text']
) );

$wp_customize->add_control( 'create_magazine_theme_options[search_text]', array(
	'label'       		=> __( 'Search Text.', 'create-magazine' ),
	'section'     		=> 'create_magazine_search_section',
	'type'        		=> 'text',
) );