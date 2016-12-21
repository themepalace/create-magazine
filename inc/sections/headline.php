<?php
/**
 * Headline section
 *
 * This is the template for the content of headline section.
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */
if ( ! function_exists( 'create_magazine_add_headline_section' ) ) :
    /**
     * Add headline section
     *
     * @since Create Magazine 1.0
     */
    function create_magazine_add_headline_section() {

        // Check if headline is enabled on frontpage
        $headline_enable = apply_filters( 'create_magazine_section_status', true, 'headline_enable' );
        if ( true !== $headline_enable ) {
            return false;
        }

        // Get headline section details
        $section_details = array();
        $section_details = apply_filters( 'create_magazine_filter_headline_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render headline section .
        create_magazine_render_headline_section( $section_details );
    }
endif;
add_action( 'create_magazine_primary_content', 'create_magazine_add_headline_section', 10 );


if ( ! function_exists( 'create_magazine_get_headline_section_details' ) ) :
    /**
     * headline section details.
     *
     * @since Create Magazine 1.0
     *
     * @param array $input headline section details.
     */
    function create_magazine_get_headline_section_details( $input ) {
        $options = create_magazine_get_theme_options(); 

        // headline type
        $headline_content_type    = $options['headline_type'];

        $content = array();

        switch ( $headline_content_type ) {

            case 'category':
            
                $no_of_posts = 2;               
                $category = !empty( $options['headline_category_type'] ) ? absint( $options['headline_category_type'] ) : '';

                if ( ! empty( $category ) ) {

                $args = array(
                    'cat'                 => $category,
                    'posts_per_page'      => $no_of_posts,
                );

                $custom_posts = get_posts( $args );

                    $i = 0;
                    foreach ( $custom_posts as $key => $custom_post ) {

                        $content[$i]['url']      = get_permalink( $custom_post->ID );
                        $content[$i]['title']    = get_the_title( $custom_post->ID );
                        $i++;
                    }
                }               
            break;

            default:
            break;
        }
        if ( ! empty( $content ) ) {
            $input = $content;
        }
    return $input; 
    }
endif;
// headline section content details.
add_filter( 'create_magazine_filter_headline_section_details', 'create_magazine_get_headline_section_details' );

if ( ! function_exists( 'create_magazine_render_headline_section' ) ) :
    /**
     * Start section breaking news
     *
     * @return string headline content
     * @since Create Magazine 1.0
     *      
     */
    function create_magazine_render_headline_section( $content_details = array() ) {

        $options = create_magazine_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <section class="bg-black breaking-news clear">
            <div class="container">
                <div class="news-wrapper clear">
                    <?php 
                        $section_title = $options['headline_title']; 
                    if( ! empty ( $section_title ) ):?>
                    <div class="headline">
                    <h2><?php echo esc_html( $section_title ); ?></h2>
                    </div>
                    <?php endif; ?> 
                    <div class="news-slider-wrapper">
                    <div class="cycle-slideshow" data-cycle-auto-height="container" data-cycle-loop="infinite" data-cycle-fx="flipVert" data-cycle-slides=">a" data-cycle-pause-on-hover="true"  data-cycle-speed="700" data-cycle-timeout="5000" data-cycle-next=".cycle-next" data-cycle-prev=".cycle-prev">
                    <?php foreach( $content_details as $content ) : 
                        if( !empty ($content['title'] ) ) : ?>
                            <a href="<?php echo esc_url( $content['url'] );?>"><?php echo esc_html( $content['title'] );?></a>
                        <?php 
                        endif;
                    endforeach;?>
                    </div><!--end .cycle-slideshow-->
                    </div>
                    <?php if( !empty ($content['title'] ) ) : ?>
                    <div class="controls">
                        <div class="cycle-prev"><a href="#"><i class="fa fa-caret-left"></i></a></div>
                        <div class="cycle-next"><a href="#"><i class="fa fa-caret-right"></i></a></div>
                    </div><!--end .controls-->

                    <?php endif; ?>
                </div><!-- end .news-wrapper -->
            </div><!-- end .container -->
        </section><!-- end .beaking-news -->
<?php
    }
endif;