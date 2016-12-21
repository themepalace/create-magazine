<?php
/**
 * Category block one section
 *
 * This is the template for the content of category block one section
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */
 
if ( ! function_exists( 'create_magazine_add_category_block_one' ) ) :
    /**
     * Add category block one section
     *
     * @since 1.0
     */

    function create_magazine_add_category_block_one() { 

        // Check if category block one is enabled on frontpage
        $category_block_one_enable = apply_filters( 'create_magazine_section_status', true, 'category_block_one_enable' );

        if ( true !== $category_block_one_enable ) {
            return false;
        }

        // Get category block one section details
        $section_details = array();
        $section_details = apply_filters( 'create_magazine_filter_category_block_one_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render category block one now.
        create_magazine_render_category_block_one_section_details( $section_details );
    }
endif;
add_action( 'create_magazine_primary_content', 'create_magazine_add_category_block_one', 50 );

if ( ! function_exists( 'create_magazine_get_category_block_one_section_details' ) ) :
    /**
     * About category block one details.
     *
     * @since 1.0
     *
     * @param array $input category block one section details.
     */
    function create_magazine_get_category_block_one_section_details( $input ) {
        $options = create_magazine_get_theme_options();

        // Category block one type
        $content_type = $options['category_block_one_content_type'];
        $no_of_posts  = 3;
        $content      = array();

        switch ( $content_type ) {

            case 'category':
                $cat_id = '';

                if ( isset( $options['category_block_content_category'] ) && $options[ 'category_block_content_category' ] > 0 ) {
                    $cat_id = absint( $options[ 'category_block_content_category' ] );
                }

                if ( ! empty( $cat_id ) ) {
                    $qargs = array(
                        'posts_per_page' => $no_of_posts,
                        'cat'            => $cat_id,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                }

                if( !empty( $qargs ) ){
                    // Fetch posts.
                    $custom_posts = get_posts( $qargs );

                    $index = 0;
                    foreach ( $custom_posts as $key => $custom_post ) {
                        if ( has_post_thumbnail( $custom_post->ID ) ) {
                            $img_array            = wp_get_attachment_image_src( get_post_thumbnail_id( $custom_post->ID ), 'create-magazine-culture' );
                            $content[$index]['img_array'] = $img_array;
                        }

                        $content[$index]['url']      = get_permalink( $custom_post->ID );
                        $content[$index]['title']    = get_the_title( $custom_post->ID );
                        $content[$index]['content']  = create_magazine_trim_content( $custom_post, absint( $options['excerpt_length'] ) );
                        $content[$index]['date']     = get_the_date( '', $custom_post->ID );

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

// Category section two content details.
add_filter( 'create_magazine_filter_category_block_one_section_details', 'create_magazine_get_category_block_one_section_details' );

if ( ! function_exists( 'create_magazine_render_category_block_one_section_details' ) ) :
    /**
     * Start section id .category
     *
     * @return string about content
     * @since Create Magazine 1.0
     *
     */
    function create_magazine_render_category_block_one_section_details( $section_details = array() ) {
        if ( empty( $section_details ) ) {
            return;
        } 

        $options = create_magazine_get_theme_options();
        
        if( is_active_sidebar( 'category-block-sidebar-1' ) ) :
            $create_magazine_no_section_sidebar   = '';            
        else :
            $create_magazine_no_section_sidebar   = 'no-section-sidebar';            
        endif;

        ?>
        <section id="celebrities">
            <div class="container page-section no-padding-bottom <?php echo esc_attr( $create_magazine_no_section_sidebar ); ?>">
                <?php $section_title = $options['category_block_one_title']; 
                if(! empty( $section_title ) ) : ?>
                <div class="main-content">
                    <header class="entry-header">
                        <h2 class="entry-title color-black"><?php echo esc_html( $section_title ); ?></h2>
                    </header><!-- end .entry-header -->
                <?php endif; ?>

                <?php foreach ($section_details as $key => $section_detail ) { 
                        $class = isset( $section_detail['img_array'] ) ? '' : ' no-post-thumbnail';
                ?>
                    <div class="blog-post<?php echo esc_attr( $class ); ?>">
                        <?php if( isset( $section_detail['img_array'] ) ) {  ?>
                        <div class="category-image">
                        <?php echo '<a href="'. esc_url( $section_detail['url'] ). '"><img src="'. esc_url( $section_detail['img_array'][0] ). '" alt="'. esc_attr( $section_detail['title'] ). '"><div class="overlay-blue"></div></a>';
                         ?>
                        </div>
                        <?php  } ?>

                        <div class="category-desc">
                            <span class="date"><?php echo esc_html( $section_detail['date'] ); ?></span>
                            <a href="<?php echo esc_url( $section_detail['url'] ); ?>"><h2><?php echo esc_html( $section_detail['title'] ); ?></h2></a>
                            <p><?php echo esc_html( $section_detail['content'] ); ?></p>
                            <a href="<?php echo esc_url( $section_detail['url'] ); ?>" class="read-more"><i class="fa fa-caret-right"></i><?php echo esc_html( $options['readmore_text'] ); ?></a>
                        </div><!-- end .category-desc -->
                        <div class="clear"></div>
                    </div><!-- end .blog-post-->
                <?php   } ?>

                    <?php if( is_active_sidebar( 'category-block-one-bottom-widget' ) ){  ?>
                            <div class="widget-google-ad">
                                <?php dynamic_sidebar( 'category-block-one-bottom-widget' ); ?>
                            </div><!-- end .widget-google-ad -->
                    <?php } ?>
                </div><!-- end .category -->
            <?php              
                if( is_active_sidebar( 'category-block-sidebar-1' ) ){  ?>
                    <div class="sidebar bg-white margintop-80">
                        <?php dynamic_sidebar( 'category-block-sidebar-1' ); ?>
                    </div>
                <?php } ?>                
            </div><!-- end .celebrities-wrapper -->            
        </section><!-- #celebrities -->                    
        <?php
    }
endif;
 