<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Create_Magazine
* @since Create Magazine 1.0
*/

// Add homepage ( static ) section
$wp_customize->add_section( 'create_magazine_static_frontpage', array(
	'title'               => __('Homepage ( Static )','create-magazine'),
	'description'         => __( 'Homepage ( Static ) section options.', 'create-magazine' ),
	'panel'               => 'create_magazine_theme_options_panel'
) );

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'create_magazine_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content']
) );

$wp_customize->add_control( 'create_magazine_theme_options[enable_frontpage_content]', array(
	'label'       => __( 'Enable Content', 'create-magazine' ),
	'description' => __( 'Check to enable content on static front page only.', 'create-magazine' ),
	'section'     => 'create_magazine_static_frontpage',
	'type'        => 'checkbox'
) );