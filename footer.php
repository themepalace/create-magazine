<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 */

/**
* create_magazine_instagram_section hook
*
* @hooked create_magazine_add_instagram_section -  10
*
*/
do_action( 'create_magazine_instagram_section' );

/**
* create_magazine_content_end hook
*
* @hooked create_magazine_content_end -  100
*
*/
do_action( 'create_magazine_content_end' );

/**
* create_magazine_scroll_top hook
*
* @hooked create_magazine_scroll_top -  10
*
*/
do_action( 'create_magazine_scroll_top' );

/**
* create_magazine_footer hook
*
* @hooked create_magazine_footer_start -  10
* @hooked create_magazine_footer -  30
* @hooked create_magazine_copyright -  90
* @hooked create_magazine_footer_end -  100
*
*/
do_action( 'create_magazine_footer' );


/**
* create_magazine_page_end hook
*
* @hooked create_magazine_page_end -  100
*
*/
do_action( 'create_magazine_page_end' );
?>

<?php wp_footer(); ?>

</body>
</html>
