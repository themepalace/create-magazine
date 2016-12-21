<?php
/**
 * Create Magazine Theme Customizer
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */


// Load customizer defaults values
require get_template_directory() . '/inc/customizer/defaults.php';

// Load customizer defaults values
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';


/**
 * Merge values from default options array and values from customizer
 *
 * @return array Values returned from customizer
 * @since Create Magazine 1.0
 */
function create_magazine_get_theme_options() {
	$create_magazine_default_options = create_magazine_get_default_theme_options();

	return array_merge( $create_magazine_default_options , get_theme_mod( 'create_magazine_theme_options', $create_magazine_default_options ) ) ;
}
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function create_magazine_customize_register( $wp_customize ) {
	$options = create_magazine_get_theme_options();

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callbacks.php';

	// Load customize partial functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load custom controls.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_control( 'custom_logo' )->description = __( 'The recommended size for the logo is 120px by 70px.', 'create-magazine' );


	/**
	* Common Options
	*/
	// Add panel for common options
	$wp_customize->add_panel( 'create_magazine_theme_options_panel' , array(
	    'title'      => __('Theme Options','create-magazine'),
	    'description'=> __( 'Create Magazine Theme Options.', 'create-magazine' ),
	    'priority'   => 150,
	) );

	// Load excerpt options.
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// Load pagination options.
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// Load homepage-static page options.
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// Load footer options.
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// Load loader options.
	require get_template_directory() . '/inc/customizer/theme-options/loader.php';

	// Load scroll options.
	require get_template_directory() . '/inc/customizer/theme-options/scroll.php';

	// Load search-text options.
	require get_template_directory() . '/inc/customizer/theme-options/search-text.php';

	// Load readmore options.
	require get_template_directory() . '/inc/customizer/theme-options/readmore.php';
	/**
	* Theme Options for sections
	*/
	// Add panel for different sections
	$wp_customize->add_panel( 'create_magazine_sections_panel' , array(
	    'title'      => __('Sections','create-magazine'),
	    'description'=> __( 'Create Magazine available sections.', 'create-magazine' ),
	    'priority'   => 130,
	) );

	// Load featured-category section options.
	require get_template_directory() . '/inc/customizer/sections/featured-category.php';

	// Load category-block-one section options.
	require get_template_directory() . '/inc/customizer/sections/category-block-one.php';

	// Load featured story section options.
	require get_template_directory() . '/inc/customizer/sections/featured-story.php';

	// Load headline section options.
	require get_template_directory() . '/inc/customizer/sections/headline.php';

	// Load recent story options.	
	require get_template_directory() . '/inc/customizer/sections/recent-story.php';

	// Load trending options
	require get_template_directory() . '/inc/customizer/sections/trending.php';

	/**
	* Reset section
	*/
	// Add reset enable section
	$wp_customize->add_section( 'create_magazine_reset_section', array(
		'title'             => __('Reset all settings','create-magazine'),
		'description'       => __( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'create-magazine' ),
	) );

	// Add reset enable setting and control.
	$wp_customize->add_setting( 'create_magazine_theme_options[reset_options]', array(
		'default'           => $options['reset_options'],
		'sanitize_callback' => 'create_magazine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'create_magazine_theme_options[reset_options]', array(
		'label'             => __( 'Check to reset all settings', 'create-magazine' ),
		'section'           => 'create_magazine_reset_section',
		'type'              => 'checkbox',
	) );
}
add_action( 'customize_register', 'create_magazine_customize_register' );


// Load customizer sanitization functions.
require get_template_directory() . '/inc/customizer/sanitize.php';


/**
 * Enqueue styles on customizer preview.
 */
function create_magazine_customizer_styles() {
	if ( is_customize_preview() ) {
	   // Add fontawesome
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/plugins/fontawesome/css/font-awesome.min.css', '', '4.6.3' );

		// Add custom css for customizer
		wp_enqueue_style( 'create-magazine-customizer', get_template_directory_uri() . '/assets/css/customizer.min.css' );
	}
}
add_action( 'customize_controls_print_styles', 'create_magazine_customizer_styles' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function create_magazine_customize_preview_js() {
	wp_enqueue_script( 'create_magazine_customizer', get_template_directory_uri() . '/assets/js/customizer.min.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'create_magazine_customize_preview_js' );