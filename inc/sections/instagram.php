<?php
/**
 * Instagram section
 *
 * This is the template for the content of instagram section
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */


if ( ! function_exists( 'create_magazine_add_instagram_section' ) ) :
    /**
     * Add instagram section
     *
     * @since Create Magazine 1.0
     */
    function create_magazine_add_instagram_section() { ?>
    <div class="clear"></div>

    <?php if( is_active_sidebar( 'instagram-widget' ) ) { ?>
            <section id="instagram" class="bg-light-blue">
                <div class="container">
                    <?php dynamic_sidebar( 'instagram-widget' );  ?>
                    <div class="clear"></div>
                </div><!-- end .container -->
            </section><!-- end #instagram -->
    <?php        
        }
    } 
endif;
add_action( 'create_magazine_instagram_section', 'create_magazine_add_instagram_section', 10 );
