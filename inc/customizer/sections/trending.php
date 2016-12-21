<?php
/**
 * Trending Customizer options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

// Add Trending Now enable section
$wp_customize->add_section( 'create_magazine_trending_now_section', array(
	'title'             => __('Trending Now','create-magazine'),
	'description'       => __( 'Trending Now section options.', 'create-magazine' ),
	'priority'			=> '60',
	'panel'             => 'create_magazine_sections_panel'
) );

// Add Trending Now enable setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[trending_now_enable]', array(
	'default'           => $options['trending_now_enable'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[trending_now_enable]', array(
	'label'             => __( 'Enable on', 'create-magazine' ),
	'section'           => 'create_magazine_trending_now_section',
	'type'              => 'select',
	'choices'           => create_magazine_enable_options()
) );

// Add Trending Now title setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[trending_now_title]', array(
	'default'           => $options['trending_now_title'],
	'transport'         => 'postMessage',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'create_magazine_theme_options[trending_now_title]', array(
	'label'             => __( 'Title', 'create-magazine' ),
	'section'           => 'create_magazine_trending_now_section',
	'type'              => 'text',
	'active_callback'	=> 'create_magazine_trending_now_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'create_magazine_theme_options[trending_now_title]', array(
		'selector'            => '#trending-now .bg-blue h2.entry-title',
		'render_callback'     => 'create_magazine_customize_partial_trending_now_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add Trending Now types setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[trending_now_type]', array(
	'default'           => $options['trending_now_type'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[trending_now_type]', array(
	'label'             => __( 'Get Trending Now From', 'create-magazine' ),
	'section'           => 'create_magazine_trending_now_section',
	'type'              => 'select',
	'choices'			=> create_magazine_trending_now_options(),
	'active_callback'	=> 'create_magazine_trending_now_active'
) );

// Add Trending Now category setting and control.
$wp_customize->add_setting(  'create_magazine_theme_options[trending_now_content_category]', array(
	'default'           => $options['trending_now_content_category'],
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Create_Magazine_Dropdown_Category_Control ( $wp_customize,'create_magazine_theme_options[trending_now_content_category]', array(
	'label'             => __( 'Dropdown Category Control', 'create-magazine' ),
	'section'           => 'create_magazine_trending_now_section',
	'type'              => 'dropdown-category',
	'active_callback'	=> 'create_magazine_trending_now_active'
) ) );



