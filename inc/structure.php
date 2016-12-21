<?php
/**
 * Create Magazine basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */


if ( ! function_exists( 'create_magazine_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0
	 */
	function create_magazine_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'create_magazine_doctype', 'create_magazine_doctype', 10 );


if ( ! function_exists( 'create_magazine_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php
	}
endif;
add_action( 'create_magazine_before_wp_head', 'create_magazine_head', 10 );


if ( ! function_exists( 'create_magazine_page_start' ) ) :
	/**
	 * Start div id #page and screen reader link
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_page_start() {
		?>
		<div id="page" class="hfeed site">
			<div class="site-inner">
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'create-magazine' ); ?></a>
		<?php
	}
endif;
add_action( 'create_magazine_page_start', 'create_magazine_page_start', 10 );


if ( ! function_exists( 'create_magazine_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_loader() {
		
		$options = create_magazine_get_theme_options();
		
		if ( $options['loader_enable'] ) : ?>
				<div id="loader">
		         	<div class="loader-container">
		            	<i class="fa fa-circle-o-notch fa-spin"></i>
		         	</div>
		     	</div><!-- end loader -->
		<?php    
		endif;
	}
endif;
add_action( 'create_magazine_before_header', 'create_magazine_loader', 10 );

if ( ! function_exists( 'create_magazine_header_start' ) ) :
	/**
	 * Start div id #masthead
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_header_start() {
		?>
		<header id="masthead" class="site-header" role="banner">
		<?php
	}
endif;
add_action( 'create_magazine_header', 'create_magazine_header_start', 10 );


if ( ! function_exists( 'create_magazine_site_branding' ) ) :
	/**
	 * Start .site-branding
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_site_branding() {
		get_template_part( 'components/header/site', 'branding' );
	}
endif;
add_action( 'create_magazine_header', 'create_magazine_site_branding', 20 );


if ( ! function_exists( 'create_magazine_site_nav' ) ) :
	/**
	 * Site navigation
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_site_nav() {
		get_template_part( 'components/navigation/navigation', 'top' );
	}
endif;
add_action( 'create_magazine_header', 'create_magazine_site_nav', 30 );


if ( ! function_exists( 'create_magazine_header_end' ) ) :
	/**
	 * Header ends
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_header_end() { ?>
		</header>
	<?php
	}
endif;
add_action( 'create_magazine_header', 'create_magazine_header_end', 100 );


if ( ! function_exists( 'create_magazine_content_start' ) ) :
	/**
	 * Start div id #content
	 *
	 * Site content starts
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_content_start() { ?>
		<div id="content" class="site-content">
	<?php
	}
endif;
add_action( 'create_magazine_content_start', 'create_magazine_content_start', 10 );

if ( ! function_exists( 'create_magazine_content_end' ) ) :
	/**
	 * End div id #content
	 *
	 * Site content ends
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_content_end() { ?>
		</div><!-- end #content-->
	<?php
	}
endif;
add_action( 'create_magazine_content_end', 'create_magazine_content_end', 100 );


if ( ! function_exists( 'create_magazine_scroll_top' ) ) :
	/**
	 * Start div class .backtotop
	 *
	 * Scroll to top
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_scroll_top() { 

		$options = create_magazine_get_theme_options();
		
		if( ! $options['disable_scroll'] ):?>
			<div class="backtotop"><i class="fa fa-angle-up"></i></div><!--end .backtotop-->
		<?php
		endif;
	}
endif;
add_action( 'create_magazine_scroll_top', 'create_magazine_scroll_top', 10 );


if ( ! function_exists( 'create_magazine_footer_start' ) ) :
	/**
	 * Start footer id .colophon
	 *
	 * Footer start
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_footer_start() {
		?>
		<footer id="colophon" class="site-footer">
		
		<?php
	}
endif;
add_action( 'create_magazine_footer', 'create_magazine_footer_start', 10 );


if ( ! function_exists( 'create_magazine_footer' ) ) :
	/**
	 * Footer
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_footer() { 

	  	$footer_sidebar_data = create_magazine_footer_sidebar_class();
		$active_id           = $footer_sidebar_data['active_id'];
		$class               = $footer_sidebar_data['class'];

		if ( empty( $active_id ) ) {
			return;
		}?>
    	
    	<div class="container <?php echo esc_attr( $class );?>-col">
    		<div class="row">
		        <?php 
		        for ( $i=0; $i < count( $active_id ); $i++ ) {
		           	if ( is_active_sidebar( 'footer-'.absint( $active_id[ $i ] ).'' ) ) : ?>
				        <div class="column-wrapper">
				            <div class="widget-wrap os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s" data-os-animation-duration="1s">
				                <?php dynamic_sidebar( 'footer-'.absint( $active_id[ $i ] ).'' ); ?>
				            </div><!-- end .widget-wrap -->
				        </div><!--- end .column-wrapper -->
				    <?php endif; 
				} ?>
				<div class="clear"></div>
			</div><!-- end .row -->
	    </div><!-- end .container -->
	<?php
	}
endif;
add_action( 'create_magazine_footer', 'create_magazine_footer', 30 );


if ( ! function_exists( 'create_magazine_copyright' ) ) :
	/**
	 * Start div class .site-info
	 *
	 * Footer site info
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_copyright() {
		get_template_part( 'components/footer/site', 'info' );
	}
endif;
add_action( 'create_magazine_footer', 'create_magazine_copyright', 90 );


if ( ! function_exists( 'create_magazine_footer_end' ) ) :
	/**
	 * End div .site-info
	 *
	 * Footer end
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_footer_end() {
		?>
		   
		</footer>
		<?php
	}
endif;
add_action( 'create_magazine_footer', 'create_magazine_footer_end', 100 );


if ( ! function_exists( 'create_magazine_page_end' ) ) :
	/**
	 * End div id #content
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_page_end() {
		?>
				</div><!--end site-inner -->
		</div><!-- end site-->
		<?php
	}
endif;
add_action( 'create_magazine_page_end', 'create_magazine_page_end', 100 );

if ( ! function_exists( 'create_magazine_archive_section' ) ) :
	/**
	 * Archive Page Sections
	 *
	 * @since Create Magazine 1.0
	 *
	 */
	function create_magazine_archive_section() {
		get_template_part( 'components/archive/section-one' );
		get_template_part( 'components/archive/section-two' );
	}
endif;
add_action( 'create_magazine_archive_section_action', 'create_magazine_archive_section' );