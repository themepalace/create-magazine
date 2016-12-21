<?php
/**
 * Create Magazine custom helper funtions
 *
 * This is the template that includes all the other files for core featured of Create magazine
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

if( ! function_exists( 'create_magazine_check_enable_status' ) ):
	/**
	 * Check status of content.
	 *
	 * @since 1.0
	 */
  	function create_magazine_check_enable_status( $input, $content_enable ){
		 $options = create_magazine_get_theme_options();

		 // Content status.
		 $content_status = $options[$content_enable];

		 // Get Page ID outside Loop.
	    $query_obj = get_queried_object();
	    $page_id = null;
	    if ( is_object( $query_obj ) && 'WP_Post' == get_class( $query_obj ) ) {
	    	$page_id = get_queried_object_id();
	    }

		 // Front page displays in Reading Settings.
		 $page_on_front  = get_option( 'page_on_front' );

		 if ( ( 'static-frontpage' === $content_status ) && ( ! is_home() && is_front_page() ) ) {
			$input = true;
		 }
		 elseif( 'entire-site' === $content_status ){
		 	$input = true;
		 }
		 else {
			$input = false;
		 }
		 return $input;
  	}
endif;
add_filter( 'create_magazine_section_status', 'create_magazine_check_enable_status', 10, 2 );

if ( ! function_exists( 'create_magazine_is_jetpack_cpt_module_enable' ) ) :
    /**
     * Check if JetPack module is enabled
     *
     * @since 1.0
     *
     * @param string $jetpack_cpt_option 		Jetpack enable checkbox value
     */
    function create_magazine_is_jetpack_cpt_module_enable( $jetpack_cpt_option ) {
		if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'custom-content-types' ) &&  get_option( $jetpack_cpt_option ) ) :
			return true;
		endif;

		return false;
    }
endif;
add_action( 'plugins_loaded', 'create_magazine_is_jetpack_cpt_module_enable' );
add_filter( 'create_magazine_filter_is_jetpack_cpt_module_enable', 'create_magazine_is_jetpack_cpt_module_enable' );


if ( ! function_exists( 'create_magazine_footer_sidebar_class' ) ) :
	/**
	 * Count the number of footer sidebars to enable dynamic classes for the footer
	 *
	 * @since Create Magazine 1.0
	 */
	function create_magazine_footer_sidebar_class() {
		$data = array();
		$active_id = array();
	   	$count = 0;

	   	if ( is_active_sidebar( 'footer-1' ) ) {
	   		$active_id[] = '1';
	    	$count++;
	    }

	    if ( is_active_sidebar( 'footer-2' ) ){
	   	 	$active_id[] = '2';
	      	$count++;
		}

	    $class = '';

	    switch ( $count ) {
        	case '1':
            $class = 'one';
            break;
        	case '2':
            $class = 'two';
            break;
	   	}

		$data['active_id'] = $active_id;
		$data['class']     = $class;

	   return $data;
	}
endif;

if ( ! function_exists( 'create_magazine_is_frontpage_content_enable' ) ) :
	/**
	 * Check home page ( static ) content status.
	 *
	 * @since 1.0
	 *
	 * @param bool $status Home page content status.
	 * @return bool Modified home page content status.
	 */
	function create_magazine_is_frontpage_content_enable( $status ) {
		if ( is_front_page() ) {
			$options = create_magazine_get_theme_options();
			$front_page_content_status = $options['enable_frontpage_content'];
			if ( false === $front_page_content_status ) {
				$status = false;
			}
		}
		return $status;
	}

endif;

add_filter( 'create_magazine_filter_frontpage_content_enable', 'create_magazine_is_frontpage_content_enable' );