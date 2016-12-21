<?php
/**
 * Create Magazine customizer sanitization functions
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */


/**
 * Sanitize select.
 *
 * @since 1.0
 *
 * @param mixed                $input The value to sanitize.
 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
 * @return mixed Sanitized value.
 */
function create_magazine_sanitize_select( $input, $setting ) {
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


/**
 * Image sanitization callback example.
 *
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default.
 *
 * - Sanitization: image file extension
 * - Control: text, WP_Customize_Image_Control
 *
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
function create_magazine_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
   $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
   return ( $file['ext'] ? $image : $setting->default );
}


/**
 * Number Range sanitization callback example.
 *
 * - Sanitization: number_range
 * - Control: number, tel
 *
 * Sanitization callback for 'number' or 'tel' type text inputs. This callback sanitizes
 * `$number` as an absolute integer within a defined min-max range.
 *
 * @see absint() https://developer.wordpress.org/reference/functions/absint/
 *
 * @param int                  $number  Number to check within the numeric range defined by the setting.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise,
 *                    the setting default.
 */
function create_magazine_sanitize_number_range( $number, $setting ) {
	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}



/**
 * Sanitize checkbox.
 *
 * @since 1.0
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function create_magazine_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( isset( $checked ) && true == $checked ) ? true : false ;
}

/**
 * Reset all options
 *
 * @since 1.0
 *
 * @param bool $checked Whether the reset is checked.
 * @return bool Whether the reset is checked.
 */
function create_magazine_reset_options() {

	$options = create_magazine_get_theme_options(); // get theme options

	if ( $options['reset_options'] == 1 ) {
        // Set default values
        set_theme_mod( 'create_magazine_theme_options', create_magazine_get_default_theme_options() );

        // Remove background color and image
        remove_theme_mod( 'background_color' );
        remove_theme_mod( 'background_image' );
        remove_theme_mod( 'background_repeat' );
        remove_theme_mod( 'background_position_x' );
        remove_theme_mod( 'background_attachment' );

        // Remove header image
        remove_theme_mod( 'header_image' );
        remove_theme_mod( 'header_image_data' );

    }
    else {
        return false;
    }
}
add_action( 'customize_save_after', 'create_magazine_reset_options' );

