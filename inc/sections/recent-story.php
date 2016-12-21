<?php
/**
 * Recent story section
 *
 * This is the template for the content of recent story section
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */


if ( ! function_exists( 'create_magazine_add_recent_story_section' ) ) :
    /**
     * Add recent story section
     *
     * @since 1.0
     */
    function create_magazine_add_recent_story_section() {
        // Check if recent story is enabled on frontpage
        $recent_story_enable = apply_filters( 'create_magazine_section_status', true, 'recent_story_enable' );

        if ( true !== $recent_story_enable ) {
            return false;
        }

        // Get recent story section details
        $section_details = array();
        $section_details = apply_filters( 'create_magazine_filter_recent_story_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render recent story now.
       create_magazine_render_recent_story_section_details( $section_details );
    }
endif;
add_action( 'create_magazine_primary_content', 'create_magazine_add_recent_story_section', 30 );

if ( ! function_exists( 'create_magazine_get_recent_story_section_details' ) ) :
    /**
     * About category block one details.
     *
     * @since 1.0
     *
     * @param array $input category block one section details.
     */
    function create_magazine_get_recent_story_section_details( $input ) {
        $options = create_magazine_get_theme_options();

        // Category block one type
        $content_type = $options['recent_story_content_type'];
        $content      = array();

        switch ( $content_type ) {

            case 'all-category':
                $no_of_posts = 3;

                    $qargs = array(
                        'posts_per_page' => $no_of_posts,
                        'orderby'        => 'date'
                    );

                if( !empty( $qargs ) ){
                // Fetch posts.
                $custom_posts = get_posts( $qargs );
                $index = 0;

                foreach ( $custom_posts as $key => $custom_post ) {

                    if ( has_post_thumbnail( $custom_post->ID ) ) {
                        $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $custom_post->ID ), 'create-magazine-recent-story' );
                        $content[$index]['img_array'] = $img_array;
                    }

                    $content[$index]['url']   = get_permalink( $custom_post->ID );
                    $content[$index]['title'] = $custom_post->post_title;
                    $content[$index]['terms'] = get_the_category( $custom_post->ID );
                    $content[$index]['date']  = get_the_date( '', $custom_post->ID );

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
add_filter( 'create_magazine_filter_recent_story_section_details', 'create_magazine_get_recent_story_section_details' );

if ( ! function_exists( 'create_magazine_render_recent_story_section_details' ) ) :
    /**
     * Start section id #recent-story
     *
     * @return string about content
     * @since Create Magazine 1.0
     *
     */
    function create_magazine_render_recent_story_section_details( $section_details = array() ) {
        $options = create_magazine_get_theme_options();

        if ( empty( $section_details ) ) {
            return;
        } 
        ?>
        <article id="recent-story">
            <div class="container page-section no-padding-bottom">
                <?php  
                    $recent_story_title =  $options['recent_story_title'];

                    if( !empty( $recent_story_title ) ):
                ?>
                <div class="entry-header text-center">
                    <h2 class="entry-title color-black"><?php echo esc_html( $recent_story_title ); ?> </h2>
                </div><!-- end .entry-header -->
                <?php endif; ?>
                <div class="entry-content three-col">
                    <div class="row">

                    <?php foreach( $section_details as $section_detail ) :
                            $recent_story_post_thumbnail =  isset( $section_detail['img_array'] ) ? $section_detail['img_array'] : '';
                            $recent_story_post_terms     = $section_detail['terms'];
                            $class = isset( $section_detail['img_array'] ) ? '' : ' no-post-thumbnail';
                    ?>
                        <div class="column-wrapper <?php echo esc_attr( $class ); ?>">

                        <?php if( !empty( $recent_story_post_thumbnail ) ) : ?>
                            <div class="blog-image">
                                <?php echo '<a href="'. esc_url( $section_detail['url'] ) .'"><img src="'. esc_url( $recent_story_post_thumbnail[0] ) .'" alt="'. esc_html( $section_detail['title'] ) .'"></a>'; ?>
                            </div><!-- end .blog-image -->
                        <?php endif; ?>
                        
                            <div class="recent-story-wrapper">
                            <?php 
                                $bg_color = create_magazine_background_color(); // get background color array
                                $i = 0;
                                foreach( $recent_story_post_terms as $post_category ){
                                    echo '<div class="tag"><a href="'. esc_url( get_category_link( $post_category->term_id ) ) .'"><span class="'. esc_attr( $bg_color[$i] ) .'" data-hover="'. esc_attr( $post_category->name ).'">'. esc_html( $post_category->name ).'</span></a></div><!-- end .tag -->';

                                    if( $i == 2){ break; } // show only three category
                                    $i++;
                                }                                    
                            ?> 
                                <a href="<?php echo esc_url( $section_detail['url'] ); ?>"><h3><?php echo esc_html( $section_detail['title'] ); ?></h3></a>
                                <span class="date"><?php echo esc_html( $section_detail['date'] ); ?></span>
                            </div><!-- end .recent-story-wrapper -->
                        </div><!--end .column-wrapper -->
                    <?php endforeach; ?>
                     </div><!-- end row-->
                    <div class="clear"></div>
                </div><!-- end .entry-content -->
            </div><!-- end .container -->
        </article><!-- end .recent-story -->
    <?php
    }
endif;