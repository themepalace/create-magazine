<?php
/**
 * Feature story Customizer options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

// Add featured story enable section
$wp_customize->add_section( 'create_magazine_featured_story_section', array(
	'title'             => __('Featured Story','create-magazine'),
	'description'       => __( 'Featured Story section options.', 'create-magazine' ),
	'priority'			=> '40',
	'panel'             => 'create_magazine_sections_panel'
) );

// Add featured story enable setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[featured_story_enable]', array(
	'default'           => $options['featured_story_enable'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[featured_story_enable]', array(
	'label'             => __( 'Enable on', 'create-magazine' ),
	'section'           => 'create_magazine_featured_story_section',
	'type'              => 'select',
	'choices'           => create_magazine_enable_options()
) );

// Add featured story title setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[featured_story_title]', array(
	'default'           => $options['featured_story_title'],
	'transport'         => 'postMessage',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'create_magazine_theme_options[featured_story_title]', array(
	'label'             => __( 'Title', 'create-magazine' ),
	'section'           => 'create_magazine_featured_story_section',
	'type'              => 'text',
	'active_callback'	=> 'create_magazine_featured_story_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'create_magazine_theme_options[featured_story_title]', array(
		'selector'            => '#featured-story .bg-green h2.entry-title',
		'render_callback'     => 'create_magazine_customize_partial_featured_story_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add featured story types setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[featured_story_type]', array(
	'default'           => $options['featured_story_type'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[featured_story_type]', array(
	'label'             => __( 'Get Featured Story From', 'create-magazine' ),
	'section'           => 'create_magazine_featured_story_section',
	'type'              => 'select',
	'choices'			=> create_magazine_featured_story_options(),
	'active_callback'	=> 'create_magazine_featured_story_active'
) );

// Add featured story category setting and control.
$wp_customize->add_setting(  'create_magazine_theme_options[featured_story_content_category]', array(
	'default'           => $options['featured_story_content_category'],
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Create_Magazine_Dropdown_Category_Control ( $wp_customize,'create_magazine_theme_options[featured_story_content_category]', array(
	'label'             => __( 'Dropdown Category Control', 'create-magazine' ),
	'section'           => 'create_magazine_featured_story_section',
	'type'              => 'dropdown-category',
	'active_callback'	=> 'create_magazine_featured_story_active'
) ) );

