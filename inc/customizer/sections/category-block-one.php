<?php
/**
 * Category block one Customizer options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

// Add category block one section
$wp_customize->add_section( 'create_magazine_category_block_one_section', array(
	'title'       		=> __('Category Block one','create-magazine'),
	'description' 		=> __( 'Category block one section options.', 'create-magazine' ),
	'priority'			=> '50',
	'panel'       		=> 'create_magazine_sections_panel'
) );

// Add category block one  enable setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[category_block_one_enable]', array(
	'default'         	=> $options['category_block_one_enable'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[category_block_one_enable]', array(
	'label'             => __( 'Enable on', 'create-magazine' ),
	'section'           => 'create_magazine_category_block_one_section',
	'priority'			=> '10',
	'type'              => 'select',
	'choices'           => create_magazine_enable_options()
) );

// Add Category block one title setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[category_block_one_title]', array(
	'default'           => $options['category_block_one_title'],
	'transport'         => 'postMessage',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'create_magazine_theme_options[category_block_one_title]', array(
	'label'             => __( 'Title', 'create-magazine' ),
	'section'           => 'create_magazine_category_block_one_section',
	'type'              => 'text',
	'active_callback'	=> 'create_magazine_is_category_block_one_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'create_magazine_theme_options[category_block_one_title]', array(
		'selector'            => '#celebrities .celebrities-wrapper h2.entry-title',
		'render_callback'     => 'create_magazine_customize_partial_category_block_one_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add category block one content type setting and control.
$wp_customize->add_setting( 'create_magazine_theme_options[category_block_one_content_type]', array(
	'default'           => $options['category_block_one_content_type'],
	'sanitize_callback' => 'create_magazine_sanitize_select'
) );

$wp_customize->add_control( 'create_magazine_theme_options[category_block_one_content_type]', array(
	'label'           => __( 'Content Type', 'create-magazine' ),
	'section'         => 'create_magazine_category_block_one_section',
	'priority'		  => '20',
	'type'            => 'select',
	'choices'         => create_magazine_category_block_one_content_type_options(),
	'active_callback' => 'create_magazine_is_category_block_one_active',
	)
);

// Add category block one posts from category setting and control
$wp_customize->add_setting( 'create_magazine_theme_options[category_block_content_category]', array(
	'default'           => $options['category_block_content_category'],
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Create_Magazine_Dropdown_Category_Control( $wp_customize, 'create_magazine_theme_options[category_block_content_category]', array(
	'label'           => __( 'Category', 'create-magazine' ),
	'description'	  => __( 'Select category to display posts', 'create-magazine' ),
	'section'         => 'create_magazine_category_block_one_section',
	'priority'		  => '60',
	'active_callback' => 'create_magazine_is_category_block_one_active',
	'type'				=> 'dropdown-category',
	'input_attrs'		=> array(
		'style'        	=> 'width: 80px;'
	)
) ) );

