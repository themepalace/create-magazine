<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Theme Palace
 */

get_header(); 
$options = create_magazine_get_theme_options();
?>

<section class="page-section">
    <div class="container">
        <div class="main-content widget-category">
        	<?php if ( have_posts() ) : ?>
    	        <div class="widget-title">
    	           	<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'create-magazine' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    	        </div><!-- end .widget-title -->

            <?php
    		/* Start the Loop */
    		while ( have_posts() ) : the_post(); ?>
                <?php $class = has_post_thumbnail() ? '' : 'no-post-thumbnail'; ?> 
                <div class="blog-post <?php echo esc_attr( $class ); ?>">

                <?php if( has_post_thumbnail() ) { ?>
                    <div class="category-image">
                        <?php create_magazine_post_thumbnail();?>
                        <div class="overlay-blue"></div>
                    </div>
                <?php } ?>
                    
                    <div class="category-desc">
                        <span class="date"><?php echo esc_html( get_the_date() ); ?></span>
                        <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><h2><?php echo esc_html( get_the_title( $post->ID ) ); ?></h2></a>
                        <p><?php echo esc_html( create_magazine_trim_content( $post, absint( $options['excerpt_length'] ) ) ); ?></p>
                        <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="read-more"><i class="fa fa-caret-right"></i><?php echo esc_html( $options['readmore_text'] ); ?></a>
                    </div><!-- end .blog-desc -->
                    <div class="clear"></div>
                </div><!-- end .blog-post-->
            <?php endwhile;

    			the_posts_navigation();

    		else :

    			get_template_part( 'components/post/content', 'none' );

    		endif; ?>

        </div><!-- end .main-content-->

        <?php get_sidebar();?>
    </div><!-- .container -->
    <div class="clear"></div>
</section>

<?php
get_footer();