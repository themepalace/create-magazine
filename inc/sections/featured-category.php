<?php
/**
 * Featured category section
 *
 * This is the template for the Featured category of category section
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */
if ( ! function_exists( 'create_magazine_add_featured_category_section' ) ) :
    /**
     * Add Featured category section
     *
     * @since 1.0
     */
    function create_magazine_add_featured_category_section() {

      // Check if Featured category is enabled on frontpage
        $featured_category_enable = apply_filters( 'create_magazine_section_status', true, 'featured_category_enable' );

        if ( true !== $featured_category_enable ) {
            return false;
        }

        // Get Featured category section details
        $section_details = array();
        $section_details = apply_filters( 'create_magazine_filter_featured_category_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render Featured category now.
        create_magazine_render_featured_category_section_details( $section_details );
    }
endif;
add_action( 'create_magazine_primary_content', 'create_magazine_add_featured_category_section', 10 );

if ( ! function_exists( 'create_magazine_get_featured_category_section_details' ) ) :
    /**
     * About Featured category details.
     *
     * @since 1.0
     *
     * @param array $input Featured category section details.
     */
    function create_magazine_get_featured_category_section_details( $input ) {
        $options = create_magazine_get_theme_options();

        // Featured category type
        $content_type = $options['featured_category_content_type'];
        $no_of_posts  = 3;
        $content      = array();

        switch ( $content_type ) {

            case 'post':
                $post_ids = array();

                for( $i = 1; $i <= $no_of_posts; $i++ ){
                    if ( isset( $options[ 'featured_category_content_post_'. $i ] ) && $options[ 'featured_category_content_post_'. $i ] > 0 ) {
                      $post_ids[] = absint( $options[ 'featured_category_content_post_'. $i ] );
                    }
                }

                if ( !empty( $post_ids ) ) {
                    $qargs = array(
                        'posts_per_page' => $no_of_posts,
                        'post__in'       => $post_ids,
                        'orderby'        => 'post__in',
                    );
                }            
                if( !empty( $qargs ) ){
                    // Fetch posts.
                    $custom_posts = get_posts( $qargs );
                    $content   = array();

                    $index = 0;
                    foreach ( $custom_posts as $key => $custom_post ) {
                        if ( has_post_thumbnail( $custom_post->ID ) ) {
                            $img_array            = wp_get_attachment_image_src( get_post_thumbnail_id( $custom_post->ID ), 'create-magazine-featured-category' );
                            $content[$index]['img_array'] = $img_array;
                        }else{
                            $img_array = array ( get_template_directory_uri() . '/assets/images/no-featured-image-360x480.jpg' );
                             $content[$index]['img_array'] = $img_array;
                        }

                        $content[$index]['url']      = get_permalink( $custom_post->ID );
                        $content[$index]['title']    = get_the_title( $custom_post->ID );
                        $content[$index]['terms']    = get_the_category( $custom_post->ID );

                        $index ++;
                    }                    
                }
            break;

            default:
            break;
        }
    if ( ! empty( $content ) ) {
        $input =  $content;
    }
    return $input;
    }
endif;

// Category section one content details.
add_filter( 'create_magazine_filter_featured_category_section_details', 'create_magazine_get_featured_category_section_details' );

if ( ! function_exists( 'create_magazine_render_featured_category_section_details' ) ) :
    /**
     * Start section id .category
     *
     * @return string about content
     * @since Create Magazine 1.0
     *
     */
    function create_magazine_render_featured_category_section_details( $section_details = array() ) {
        if ( empty( $section_details ) ) {
            return;
        }    
        ?>
        <section id="category">
            <div class="container page-section no-padding-bottom">
                <div class="entry-content three-col">
            <?php

                $index = 0;
                foreach ( $section_details as $key => $section_detail ) {
                $post_categories = $section_detail['terms'];
            ?>
                        <div class="column-wrapper">
                            <div class="blog-image">
                                <a href="<?php echo esc_url(  $section_detail['url'] ); ?>"><img src="<?php echo esc_url( $section_detail['img_array'][0] ); ?>" alt="<?php __( 'category', 'create-magazine'); ?>">
                                    <div class="overlay"></div><!-- end .overlay --></a>
                            </div><!-- end .blog-image -->
                            <div class="category-content">
                            <?php if( !empty (  $post_categories ) ){ ?>
                                <div class="tag">
                                <?php $bg_color = create_magazine_background_color();                                   
                                    foreach ( $post_categories as $post_category ) {
                                        $category_id   = $post_category->term_id;
                                        $category_name = $post_category->name;
                                        $category_url  = get_category_link( $category_id );
                                        $i = 0; // initialize $i variable with 0

                                        echo ' <a href="'. esc_url( $category_url ).'"><span class="'. esc_attr( $bg_color[$index] ) .'" data-hover="'. esc_attr( $category_name ) .'">'. esc_html( $category_name ). '</span></a>';

                                        if( $i < 3 ) break; // show not more than 3 tags  
                                        $i ++;          
                                    } 
                                    $index ++; 
                                    ?>
                                </div><!-- end .tag -->
                            <?php } ?>
                                <a href="<?php echo esc_url( $section_detail['url'] ); ?>"><h3><?php echo esc_html( $section_detail['title'] ); ?></h3></a>
                            </div><!-- end .catgory-content -->
                        </div><!-- end .three-col -->
            <?php } ?>
                </div><!-- end .entry-content -->
            </div><!-- end .container -->
        </section><!-- end #category --> 
    <?php
    }
endif;