<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

get_header(); 

/**
 * create_magazine_archive_section_action hook
 *
 * @hooked create_magazine_archive_section
 *
 */
do_action( 'create_magazine_archive_section_action' );

get_footer();