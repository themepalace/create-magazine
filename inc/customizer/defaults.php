<?php
/**
 * Create Magazine customizer default options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */


/**
 * Returns the default options for create-magazine.
 *
 * @since Create Magazine 1.0
 * @return array An array of default values
 */
function create_magazine_get_default_theme_options() {


	$create_magazine_default_options = array(
		/**
		* Section Options
		*/
		//headline options
		'headline_enable'           			=> 'static-frontpage',
		'headline_title'       					=> __('Breaking News','create-magazine'),
		'headline_type'							=> 'category',
		'headline_category_type'				=> '',
		
		//feature story options
		'featured_story_enable'     			=> 'static-frontpage',
		'featured_story_title'      			=> __('Feature-story','create-magazine'),
		'featured_story_type'					=> 'category',
		'featured_story_content_category'		=> '',			
		
		//category block one options
		'featured_category_enable'       		=> 'static-frontpage',
		'featured_category_content_type' 		=> 'post',
		
		// recent story options
		'recent_story_enable'             		=> 'static-frontpage',
		'recent_story_content_type'       		=> 'all-category',
		'recent_story_title'              		=> __( 'Recent Story', 'create-magazine' ),
		
		//category block two options
		'category_block_one_enable'       		=> 'static-frontpage',
		'category_block_one_title'				=> __( 'Celebrity', 'create-magazine'),
		'category_block_one_content_type' 		=> 'category',
		'category_block_content_category' 		=> null,

		//trending now options
		'trending_now_enable'     				=> 'static-frontpage',
		'trending_now_title'      				=> __('Trending-Now','create-magazine'),
		'trending_now_type'						=> 'category',
		'trending_now_content_category'			=> '',	

		//theme options
		'excerpt_length'           				=> 15,
		'enable_pagination'        				=> true,
		'pagination_type'          				=> 'numeric',	
		'reset_options'      					=> false,
		'enable_frontpage_content' 				=> true,
		'logo'                                  => '',
		'logo_alt_text'                         => '',
		
		'copyright_text'           				=> sprintf( __( 'Copyright &copy; . All Rights Reserved','create-magazine' ) ),

		'disable_scroll'		   				=> '',
		'loader_enable'            				=> false,
		'search_text'			   				=> __('Search..','create-magazine'),
		'readmore_text'							=> __('Read More..','create-magazine'),
	);

	$output = apply_filters( 'create_magazine_default_theme_options', $create_magazine_default_options );
	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}