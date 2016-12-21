<?php
/**
 * Create Magazine core file.
 *
 * This is the template that includes all the other files for core featured of Create magazine
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

/**
 * Include options function.
 */
require get_template_directory() . '/inc/options.php';

if ( ! function_exists( 'create_magazine_alter_comment_form_fields' ) ) {
  /**
   * Alter the comment form fields
   * @param  array Array of fields to be customized
   * @return array Array of customized fields
   */
  function create_magazine_alter_comment_form_fields( $fields ){
      $fields['url'] = '';  //removes website field
      $fields['author'] = '<input id="author" class="form-control" type="text" placeholder="'.__( 'NAME', 'create-magazine' ). '" name="author">';
      $fields['email'] = '<input id="email" class="form-control" type="text" placeholder="'.__( 'EMAIL ADDRESS', 'create-magazine' ).'" name="email">';

      return $fields;
  }
  add_filter('comment_form_default_fields','create_magazine_alter_comment_form_fields');
}

/**
 * Add helper functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Add structural hooks.
 */
require get_template_directory() . '/inc/structure.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/sections/sections.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Custom widget additions.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';