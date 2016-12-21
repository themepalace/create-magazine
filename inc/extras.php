<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function create_magazine_body_classes( $classes ) {
	$options = create_magazine_get_theme_options();
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    
	return $classes;
}
add_filter( 'body_class', 'create_magazine_body_classes' );


if ( ! function_exists( 'create_magazine_mobile_nav_menu' ) ) :

    /**
     * Add mobile menuin responsive mode       
     */

    function create_magazine_mobile_nav_menu() { ?>
        <!-- Mobile Menu -->
        <nav id="sidr-left-top" class="mobile-menu sidr left">
            <?php 
                if ( has_custom_logo( ) ) : ?>
                <div class="site-branding">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?> ">
                        <?php echo get_custom_logo();?>
                    </a>
                </div><!-- end .site-branding -->
            <?php endif; 
                   
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array( 'theme_location' => 'primary','container' => false,
                    'depth' => 3, ) );
            }
            ?>
        </nav><!-- end left-menu -->

        <a id="sidr-left-top-button" class="menu-button right" href="#sidr-left-top"><i class="fa fa-bars"></i></a>
        <?php
    }
endif;
add_action( 'create_magazine_header', 'create_magazine_mobile_nav_menu', 110 );