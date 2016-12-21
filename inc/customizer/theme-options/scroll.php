<?php
/**
 * scroll options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

// Add scroll section
$wp_customize->add_section( 'create_magazine_scroll_section', array(
	'title'             => __('Scrollup Options','create-magazine'),
	'description'       => __( 'Scrollup section options.', 'create-magazine' ),
	'panel'             => 'create_magazine_theme_options_panel'
) );

// scroll setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[disable_scroll]', array(
	'sanitize_callback' => 'create_magazine_sanitize_checkbox',
	'default'			=> $options['disable_scroll']
) );

$wp_customize->add_control( 'create_magazine_theme_options[disable_scroll]', array(
	'label'       		=> __( 'Check to disable scroll options.', 'create-magazine' ),
	'section'     		=> 'create_magazine_scroll_section',
	'type'        		=> 'checkbox',
) );