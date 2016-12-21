<?php
/**
 * Create Magazine customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

if ( ! function_exists( 'create_magazine_is_featured_category_active' ) ) :
	/**
	 * Check if featured category is active.
	 *
	 * @since 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function create_magazine_is_featured_category_active( $control ) {
		global $wp_query;
		
		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_on_front  = get_option('page_on_front') ;

		$featured_category_enable = $control->manager->get_setting( 'create_magazine_theme_options[featured_category_enable]' )->value();

		if ( $featured_category_enable == 'entire-site'  || ( ( $page_id == $page_on_front ) && $page_id > 0 ) && $featured_category_enable == 'static-frontpage' )
			return true;

		return false;
	}
endif;

if ( ! function_exists( 'create_magazine_recent_story_active' ) ) :
	/**
	 * Check if recent story is active.
	 *
	 * @since 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function create_magazine_recent_story_active( $control ) {
		global $wp_query;
		
		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_on_front  = get_option('page_on_front') ;

		$recent_story_enable = $control->manager->get_setting( 'create_magazine_theme_options[recent_story_enable]' )->value();

		if ( ( ( $page_id == $page_on_front ) && $page_id > 0 ) && $recent_story_enable == 'static-frontpage' )
			return true;

		return false;
	}
endif;

if ( ! function_exists( 'create_magazine_is_category_block_one_active' ) ) :
	/**
	 * Check if category block one is active.
	 *
	 * @since 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function create_magazine_is_category_block_one_active( $control ) {
		global $wp_query;
		
		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_on_front  = get_option('page_on_front') ;

		$category_block_one_enable = $control->manager->get_setting( 'create_magazine_theme_options[category_block_one_enable]' )->value();

		if ( ( ( $page_id == $page_on_front ) && $page_id > 0 ) && $category_block_one_enable == 'static-frontpage' )
			return true;

		return false;
	}
endif;

if ( ! function_exists( 'create_magazine_featured_story_active' ) ) :
	/**
	 * Check if featured story is active.
	 *
	 * @since 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function create_magazine_featured_story_active( $control ) {
		global $wp_query;
		
		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_on_front  = get_option('page_on_front') ;

		$featured_story_enable = $control->manager->get_setting( 'create_magazine_theme_options[featured_story_enable]' )->value();

		if ( ( ( $page_id == $page_on_front ) && $page_id > 0 ) && $featured_story_enable == 'static-frontpage' )
			return true;

		return false;
	}
endif;

if ( ! function_exists( 'create_magazine_is_headline_active' ) ) :
	/**
	 * Check if headline is active.
	 *
	 * @since 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function create_magazine_is_headline_active( $control ) {
		global $wp_query;
		
		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_on_front  = get_option('page_on_front') ;

		$headline_enable = $control->manager->get_setting( 'create_magazine_theme_options[headline_enable]' )->value();

		if ( $headline_enable == 'entire-site'  || ( ( $page_id == $page_on_front ) && $page_id > 0 ) && $headline_enable == 'static-frontpage' )
			return true;

		return false;
	}
endif;

if ( ! function_exists( 'create_magazine_photo_gallery_active' ) ) :
	/**
	 * Check if photo gallery is active.
	 *
	 * @since 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function create_magazine_photo_gallery_active( $control ) {
		global $wp_query;
		
		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_on_front  = get_option('page_on_front') ;

		$gallery_enable = $control->manager->get_setting( 'create_magazine_theme_options[gallery_enable]' )->value();

		if ( ( ( $page_id == $page_on_front ) && $page_id > 0 ) && $gallery_enable == 'static-frontpage' )
			return true;

		return false;
	}
endif;

if ( ! function_exists( 'create_magazine_trending_now_active' ) ) :
	/**
	 * Check if trending now is active.
	 *
	 * @since 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function create_magazine_trending_now_active( $control ) {
		global $wp_query;
		
		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_on_front  = get_option('page_on_front') ;

		$trending_now_enable = $control->manager->get_setting( 'create_magazine_theme_options[trending_now_enable]' )->value();

		if ( ( ( $page_id == $page_on_front ) && $page_id > 0 ) && $trending_now_enable == 'static-frontpage' )
			return true;

		return false;
	}
endif;


