<?php
/**
 * Headliine Customizer options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */


// Add headline enable section
$wp_customize->add_section( 'create_magazine_headline_section', array(
	'title'             => __('Headline','create-magazine'),
	'description'       => __( 'Headline section options.', 'create-magazine' ),
	'priority'			=> '10',
	'panel'             => 'create_magazine_sections_panel'
) );

// Add headline enable setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[headline_enable]', array(
	'default'           => $options['headline_enable'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[headline_enable]', array(
	'label'             => __( 'Enable on', 'create-magazine' ),
	'section'           => 'create_magazine_headline_section',
	'type'              => 'select',
	'choices'           => create_magazine_enable_on_entire_site_options()
) );

// Add headline content type setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[headline_type]', array(
	'default'           => $options['headline_type'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[headline_type]', array(
	'label'           	=> __( 'Content Type', 'create-magazine' ),
	'section'         	=> 'create_magazine_headline_section',
	'type'            	=> 'select',
	'active_callback' 	=> 'create_magazine_is_headline_active',
	'choices'         	=> create_magazine_headline_content_type_options(),
) );

// Add headline title setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[headline_title]', array(
	'default'           => $options['headline_title'],
	'transport'         => 'postMessage',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'create_magazine_theme_options[headline_title]', array(
	'label'             => __( 'Headline Title', 'create-magazine' ),
	'section'           => 'create_magazine_headline_section',
	'active_callback' 	=> 'create_magazine_is_headline_active',
	'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'create_magazine_theme_options[headline_title]', array(
		'selector'            => '.breaking-news .news-wrapper h2',
		'render_callback'     => 'create_magazine_customize_partial_headline_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add headline category drop-down setting and control
$wp_customize->add_setting( 'create_magazine_theme_options[headline_category_type]', array(
	'default'			=> $options['headline_category_type'],			
	'sanitize_callback'	=> 'absint',
) );

$wp_customize->add_control( new Create_Magazine_Dropdown_Category_Control( $wp_customize, 'create_magazine_theme_options[headline_category_type]', array(
	'active_callback' 	=> 'create_magazine_is_headline_active',
	'label'           	=> __('Select Category', 'create-magazine' ),
	'section'         	=> 'create_magazine_headline_section',
	'type'            	=> 'dropdown-category',
 ) ) );

