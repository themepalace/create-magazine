<?php
/**
 * Featured category Customizer options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

// Add Featured category section
$wp_customize->add_section( 'create_magazine_featured_category_section', array(
	'title'       		=> __('Featured category','create-magazine'),
	'description' 		=> __( 'Featured category section options. Recommended image thumbnail size 390x506 px.', 'create-magazine' ),
	'priority'			=> '20',
	'panel'       		=> 'create_magazine_sections_panel'
) );

// Add Featured category enable setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[featured_category_enable]', array(
	'default'         	=> $options['featured_category_enable'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[featured_category_enable]', array(
	'label'             => __( 'Enable on', 'create-magazine' ),
	'section'           => 'create_magazine_featured_category_section',
	'priority'			=> '10',
	'type'              => 'select',
	'choices'           => create_magazine_enable_on_entire_site_options()
) );

// Add Featured category content type setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[featured_category_content_type]', array(
	'default'           => $options['featured_category_content_type'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[featured_category_content_type]', array(
	'label'           => __( 'Content Type', 'create-magazine' ),
	'section'         => 'create_magazine_featured_category_section',
	'priority'		  => '20',
	'type'            => 'select',
	'active_callback' => 'create_magazine_is_featured_category_active',
	'choices'         => create_magazine_featured_category_content_type_options()
) );

for( $i = 1; $i<= 3; $i++ ){
	// Add Featured category post setting and control
	$wp_customize->add_setting( 'create_magazine_theme_options[featured_category_content_post_'. $i .']', array(
		'sanitize_callback' => 'create_magazine_sanitize_number_range'
	) );

	$wp_customize->add_control( 'create_magazine_theme_options[featured_category_content_post_'. $i .']', array(
		'label'           	=> __( 'Post #', 'create-magazine' ). $i,
		'description'	  	=> __( 'Enter post ID', 'create-magazine' ),
		'section'         	=> 'create_magazine_featured_category_section',
		'priority'		  	=> '5'. $i,
		'active_callback' 	=> 'create_magazine_is_featured_category_active',
		'type'				=> 'number',
		'input_attrs'		=> array(
			'min'			=> 1,
			'style'			=> 'width:80px',
		)
	) );
}

