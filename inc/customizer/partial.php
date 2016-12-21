<?php
/**
 * Customizer Partial Functions
 *
 * @package Theme Palace
 * @subpackage Create Magazine
 * @since Create Magazine 1.0
 */

if ( ! function_exists( 'create_magazine_customize_partial_featured_story_title' ) ) :
	/**
	 * Render the feature story title for the selective refresh partial.
	 *
	 * @since Create Magazine 1.0
	 *
	 * @return string
	 */
	function create_magazine_customize_partial_featured_story_title() {;
		$options = create_magazine_get_theme_options();
		return $options['featured_story_title'];
	}
endif;

if ( ! function_exists( 'create_magazine_customize_partial_headline_title' ) ) :
	/**
	 * Render the headline title for the selective refresh partial.
	 *
	 * @since Create Magazine 1.0
	 *
	 * @return string
	 */
	function create_magazine_customize_partial_headline_title() {;
		$options = create_magazine_get_theme_options();
		return $options['headline_title'];
	}
endif;

if ( ! function_exists( 'create_magazine_customize_partial_trending_now_title' ) ) :
	/**
	 * Render the trending_now title for the selective refresh partial.
	 *
	 * @since Create Magazine 1.0
	 *
	 * @return string
	 */
	function create_magazine_customize_partial_trending_now_title() {;
		$options = create_magazine_get_theme_options();
		return $options['trending_now_title'];
	}
endif;

if ( ! function_exists( 'create_magazine_customize_partial_category_block_one_title' ) ) :
	/**
	 * Render the category block one title for the selective refresh partial.
	 *
	 * @since Create Magazine 1.0
	 *
	 * @return string
	 */
	function create_magazine_customize_partial_category_block_one_title() {
		$options = create_magazine_get_theme_options();
		return $options['category_block_one_title'];
	}
endif;

if ( ! function_exists( 'create_magazine_customize_partial_recent_story_title' ) ) :
	/**
	 * Render the recent story title for the selective refresh partial.
	 *
	 * @since Create Magazine 1.0
	 *
	 * @return string
	 */
	function create_magazine_customize_partial_recent_story_title() {
		$options = create_magazine_get_theme_options();
		return $options['recent_story_title'];
	}
endif;
