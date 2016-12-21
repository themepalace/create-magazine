<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 */

/**
* create_magazine_doctype hook
*
* @hooked create_magazine_doctype -  10
*
*/
do_action( 'create_magazine_doctype' );?>

<head>
<?php
	/**
	 * create_magazine_before_wp_head hook
	 *
	 * @hooked create_magazine_head -  10
	 *
	 */
	do_action( 'create_magazine_before_wp_head' );

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * create_magazine_page_start hook
 *
 * @hooked create_magazine_page_start -  10
 *
 */
do_action( 'create_magazine_page_start' );

/**
 * create_magazine_before_header hook
 *
 * @hooked create_magazine_loader -  10
 *
 */
do_action( 'create_magazine_before_header' );

/**
* create_magazine_header hook
*
* @hooked create_magazine_header_start -  10
* @hooked create_magazine_site_branding -  20
* @hooked create_magazine_site_nav -  30
* @hooked create_magazine_header_end -  100
*
*/
do_action( 'create_magazine_header' );

/**
* create_magazine_content_start hook
*
* @hooked create_magazine_content_start -  10
*
*/
do_action( 'create_magazine_content_start' );

/**
* create_magazine_primary_content hook
*
* @hooked create_magazine_add_headline_section -  10
* @hooked create_magazine_add_featured_category_section -  20
* @hooked create_magazine_add_recent_story_section -  30
* @hooked create_magazine_add_featured_story_section -  40
* @hooked create_magazine_add_category_block_one_section -  50
* @hooked create_magazine_add_trending_now_section -  60
*/
do_action( 'create_magazine_primary_content' );
