<?php
/**
 * Create Magazine options
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */


/**
 * Enable options for static frontpage only
 * @return array Enable options
 */
function create_magazine_enable_options() {
	$create_magazine_enable_options = array(
		'static-frontpage' => __( 'Static Frontpage', 'create-magazine' ),
		'disabled'         => __( 'Disabled', 'create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_enable_options', $create_magazine_enable_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}

/**
 * Enable options for entire site ,static frontpage
 * @return array Enable options
 */
function create_magazine_enable_on_entire_site_options() {
	$create_magazine_enable_on_entire_site_options = array(
		'static-frontpage' => __( 'Static Frontpage', 'create-magazine' ),
		'entire-site'	   => __( 'Entire-Site', 'create-magazine' ),
		'disabled'         => __( 'Disabled', 'create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_enable_on_entire_site_options', $create_magazine_enable_on_entire_site_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}

/**
 * List of pagination types
 * @return array Pagination types
 */
function create_magazine_pagination_type() {
	$create_magazine_pagination_type = array(
		'numeric'     		=> __( 'Numeric','create-magazine' ),
		'older-newer' 		=> __( 'Older/Newer','create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_pagination_type', $create_magazine_pagination_type );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}

/**
 * Background color
 * @return array background color
 */
function create_magazine_background_color(){

	$create_magazine_background_color = array( 'bg-green', 'bg-orange', 'bg-light-red','bg-blue','bg-black', 'bg-grey','bg-red', 'bg-yellow', 'bg-cyan', 'bg-light-green', 'bg-dark-green',  'bg-dark-grey', 'bg-light-grey', 'bg-dark-blue','bg-darkest-blue',  'bg-dark-red' );

 	$output = apply_filters( 'create_magazine_background_color', $create_magazine_background_color );

 	return $output;
}

/**
 * Featured Story Source
 * @return array Source options
 */
function create_magazine_featured_story_options() {
	$create_magazine_featured_story_options = array(
		'category'      	=> __( 'Category', 'create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_featured_story_options', $create_magazine_featured_story_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}


/**
 * Photo Gallery Source
 * @return array Source options
 */
function create_magazine_photo_gallery_options() {
	$create_magazine_photo_gallery_options = array(
		'custom' 		=> __( 'Custom', 'create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_photo_gallery_options', $create_magazine_photo_gallery_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}


/**
 * Trending Now Source
 * @return array Source options
 */
function create_magazine_trending_now_options() {
	$create_magazine_trending_now_options = array(
		'category'      	=> __( 'Category', 'create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_trending_now_options', $create_magazine_trending_now_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}



/**
 * Category Block One Source
 * @return array Source options
 */
function create_magazine_category_block_one_content_type_options() {
	$create_magazine_category_block_one_content_type_options = array(
		'category'      	=> __( 'Category', 'create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_category_block_one_content_type_options', $create_magazine_category_block_one_content_type_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}


/**
 * Featured Category Source
 * @return array Source options
 */
function create_magazine_featured_category_content_type_options() {
	$create_magazine_featured_category_content_type_options = array(
		'post'      	=> __( 'Post', 'create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_featured_category_content_type_options', $create_magazine_featured_category_content_type_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}

/**
 * Headline Source
 * @return array Source options
 */
function create_magazine_headline_content_type_options() {
	$create_magazine_headline_content_type_options = array(
		'category'      	=> __( 'Category', 'create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_headline_content_type_options', $create_magazine_headline_content_type_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}


/**
 * Recent story Source
 * @return array Source options
 */
function create_magazine_recent_story_content_type_options() {
	$create_magazine_recent_story_content_type_options = array(
		'all-category'      	=> __( 'All Category', 'create-magazine' ),
	);

	$output = apply_filters( 'create_magazine_recent_story_content_type_options', $create_magazine_recent_story_content_type_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}