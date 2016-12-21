<?php
/**
 * Recent story Customizer options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

// Add Recent story section
$wp_customize->add_section( 'create_magazine_recent_story_section', array(
	'title'       		=> __( 'Recent story','create-magazine'),
	'description' 		=> __( 'Recent story section options.', 'create-magazine' ),
	'priority'			=> '30',
	'panel'       		=> 'create_magazine_sections_panel'
) );

// Add Recent story enable setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[recent_story_enable]', array(
	'default'         	=> $options['recent_story_enable'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[recent_story_enable]', array(
	'label'             => __( 'Enable on', 'create-magazine' ),
	'section'           => 'create_magazine_recent_story_section',
	'priority'			=> '10',
	'type'              => 'select',
	'choices'           => create_magazine_enable_options()
) );

// Add Recent story content type setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[recent_story_content_type]', array(
	'default'           => $options['recent_story_content_type'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[recent_story_content_type]', array(
	'label'           	=> __( 'Content Type', 'create-magazine' ),
	'section'         	=> 'create_magazine_recent_story_section',
	'priority'		  	=> '20',
	'type'            	=> 'select',
	'active_callback' 	=> 'create_magazine_recent_story_active',
	'choices'         	=> create_magazine_recent_story_content_type_options(),
) );

// Add Recent story section and control for recent story title
$wp_customize->add_setting( 'create_magazine_theme_options[recent_story_title]', array(
	'default'           => $options['recent_story_title'],
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'create_magazine_theme_options[recent_story_title]', array(
	'label'           	=> __( 'Title', 'create-magazine' ),
	'description'	  	=> __( 'Enter title for recent story section', 'create-magazine' ),
	'section'         	=> 'create_magazine_recent_story_section',
	'priority'		  	=> '30',
	'active_callback' 	=> 'create_magazine_recent_story_active',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'create_magazine_theme_options[recent_story_title]', array(
		'selector'            => '#recent-story h2.color-black',
		'render_callback'     => 'create_magazine_customize_partial_recent_story_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}
