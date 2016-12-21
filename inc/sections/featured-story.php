<?php
/**
 * Feature story section
 *
 * This is the template for the content of Featured Story section.
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */
if ( ! function_exists( 'create_magazine_add_featured_story_section' ) ) :
    /**
     * Add Feature story section
     *
     * @since 1.0
     */
    function create_magazine_add_featured_story_section() {

        // Check if Feature story is enabled on
        $featured_story_enable = apply_filters( 'create_magazine_section_status', true, 'featured_story_enable' );
        if ( true !== $featured_story_enable ) {
            return false;
        }
        // Get Feature story section details
        $section_details = array();
        $section_details = apply_filters( 'create_magazine_filter_featured_story_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return;
        }
       
        // Render Feature story section .
        create_magazine_render_featured_story_section( $section_details );
    }
endif;
add_action( 'create_magazine_primary_content', 'create_magazine_add_featured_story_section', 40 );


if ( ! function_exists( 'create_magazine_get_featured_story_section_details' ) ) :
    /**
     * Feature story section details.
     *
     * @since 1.0
     *
     * @param array $input Feature story section details.
     */
    function create_magazine_get_featured_story_section_details( $input ) {

        $options = create_magazine_get_theme_options();
        $content = array();
        $no_of_post = 4;

        switch ( $options['featured_story_type'] ) {
            
            case 'category':
                $category = !empty ( $options['featured_story_content_category'] ) ? absint( $options['featured_story_content_category'] ) : '';
                
                if ( ! empty( $category ) ) {
                
                    $args = array(
                        'cat'               => $category,
                        'posts_per_page'    => $no_of_post
                    );
                }
                if( ! empty ( $args ) ) :
                    $custom_posts = get_posts( $args );

                    $i = 0;
                    foreach ( $custom_posts as $key => $custom_post ) {
                        $img_array = null;

                        if ( has_post_thumbnail( $custom_post->ID ) ) {
                                $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $custom_post->ID ), 'create-magazine-featured-trending' );
                        } else {
                                $img_array = array ( get_template_directory_uri() . '/assets/images/no-featured-image-275x206.png' );
                        }

                        if ( isset( $img_array ) ) {
                            $content[$i]['img_array'] = $img_array;
                        }

                        $content[$i]['url']      = get_permalink( $custom_post->ID );
                        $content[$i]['title']    = get_the_title( $custom_post->ID );
                        $content[$i]['excerpt']  = create_magazine_trim_content( $custom_post, absint( $options['excerpt_length'] ) );
                        $content[$i]['date']     = get_the_date( '', $custom_post->ID );
                    $i++;
                    }
                endif;
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
// Feature story section content details.
add_filter( 'create_magazine_filter_featured_story_section_details', 'create_magazine_get_featured_story_section_details' );

if ( ! function_exists( 'create_magazine_render_featured_story_section' ) ) :
    /**
     * Start section  feature-story
     *
     * @return string Feature story content
     * @since Create Magazine 1.0
     *
     */
    function create_magazine_render_featured_story_section( $content_details = array() ) {
        $options = create_magazine_get_theme_options();
    
        if ( empty( $content_details ) ) {
            return;
        } ?>

        <section id="featured-story" class="page-section no-padding-bottom">
            <?php $section_title = $options['featured_story_title'];
                
            if(! empty( $section_title ) ) : ?>
            <div class="bg-green">
                <header class="container entry-header text-left">
                    <h2 class="entry-title padding-top-bottom color-white"><?php echo esc_html( $section_title ); ?></h2>
                </header>
            </div><!-- end .bg-green -->
            <?php endif; ?>

                <div class="entry-content"> 
                    <div class="container"> 
                        <div class="controls to-top">
                            <div class="cycle-prev-2"><a href="#"><i class="fa fa-caret-left"></i></a></div>
                            <div class="cycle-next-2"><a href="#"><i class="fa fa-caret-right"></i></a></div>
                        </div><!--end .controls-->
                        <?php
                            $carousel_visible_count = count($content_details);
                            if ( $carousel_visible_count >= 4 ) 
                                $carousel_visible_count = 4;
                            else 
                                $carousel_visible_count ;
                        ?>
                        <div class="cycle-slideshow" data-cycle-auto-height="calc" data-cycle-slides=">.featured-slider" data-cycle-fx="carousel" data-cycle-carousel-fluid="true" data-cycle-timeout="3000" data-cycle-speed="700" data-cycle-carousel-visible="<?php echo absint( $carousel_visible_count ); ?>" data-cycle-next=".cycle-next-2" data-cycle-prev=".cycle-prev-2">

                            <?php foreach( $content_details as $content ) : ?>
                            <div class="featured-slider">
                                <?php if( !empty ( $content['img_array'][0] ) ) : ?>
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['img_array'][0] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                <?php endif; ?>
                                <div class="featured-contents">
                                    
                                    <?php if( !empty ( $content['title'] ) ) : ?>
                                        <div class="title">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>"><h3><?php echo esc_html( $content['title'] ); ?></h3></a>
                                        </div><!-- end .title -->
                                    <?php endif;  

                                    if( !empty ( $content['date'] ) ) : ?>
                                        <span class="date">
                                            <?php echo esc_html( $content['date'] ); ?>
                                        </span><!-- end .date -->
                                    <?php endif;
                                    
                                    if( !empty ( $content['excerpt'] ) ) : ?>
                                        <span class="description">
                                            <?php echo esc_html( $content['excerpt'] ); ?> 
                                        </span>
                                    <?php endif; ?>
                                </div><!-- end featured-contents -->
                            </div><!-- end .featured-slider -->
                            <?php endforeach; ?>
                        </div><!--end cycle-slideshow-->
                    </div><!-- end .container -->
                </div><!-- end entry-content -->
        </section><!-- end .featured-story -->
<?php
    }
endif;
