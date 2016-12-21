<?php
/**
 * Archive page / Second section
 *
 * This is the template for the content
 * @package Theme Palace
 * @subpackage Create Magazine
 * @since Create Magazine 1.0
 */
if( is_active_sidebar( 'sidebar-1' ) ) :
    $create_magazine_no_section_sidebar   = '';
else :
    $create_magazine_no_section_sidebar   = 'no-section-sidebar';
  
endif;
?>
<section id="celebrities-news">
    <div class="container">
        <div class="entry-content container">
            <div class="celebrities-wrapper <?php echo $create_magazine_no_section_sidebar; ?>">
                <div class="main-content widget-category">
                <?php if ( have_posts() ) : 
                    $options = create_magazine_get_theme_options();
                    ?>
                    <header class="entry-header text-left">
                        <h2 class="entry-title color-black"><?php esc_html( single_cat_title() ) ?></h2>
                    </header><!-- end .widget-title -->
                    <?php
                    $i = 1;
                     while ( have_posts() ) : the_post();
                    if ( $i >= 3 ) :
                    ?>
                    <?php $class =  has_post_thumbnail() ? '' : 'no-post-thumbnail'; ?>
                        <div class="blog-post <?php echo esc_attr( $class );?>">
                        
                        <?php if( has_post_thumbnail() ) { ?>
                            <div class="category-image">
                                <?php create_magazine_post_thumbnail();?>
                                <div class="overlay-blue"></div>
                            </div>
                        <?php } ?>

                            <div class="category-desc">
                                <span class="date"><?php echo esc_html( get_the_date() ); ?></span>
                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                <p><?php echo esc_html( create_magazine_trim_content( $post, absint( $options['excerpt_length'] ) ) ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more><i class="fa fa-caret-right"></i><?php echo esc_html( $options['readmore_text'] ); ?></a>
                            </div><!-- end .category-desc -->
                            <div class="clear"></div>
                        </div><!-- end .blog-post-->
                        <?php 
                        if ($i == 5) :
                            if( is_active_sidebar( 'category-block-one-bottom-widget' ) ){  ?>
                                <div class="widget-google-ad">
                                    <?php dynamic_sidebar( 'category-block-one-bottom-widget' ); ?>
                                </div><!-- end .widget-google-ad -->
                                <div class="margin-bottom-60"></div>
                        <?php } 
                        endif;
                    endif; $i++; endwhile; 

                    echo create_magazine_archive_post_navigation();

                    else :
                        get_template_part( 'components/post/content', 'none' );
            
                    endif; ?>
                    <?php if( is_active_sidebar( 'category-block-one-bottom-widget' ) ){  ?>
                        <div class="clear"></div>
                        <div class="widget-google-ad">
                            <?php dynamic_sidebar( 'category-block-one-bottom-widget' ); ?>
                        </div><!-- end .widget-google-ad -->
                    <?php } ?>
                    
                </div><!-- end .category -->
                <?php get_sidebar(); ?>

            </div><!-- end .celebrities-wrapper -->
        </div><!-- end entry-content -->
    </div><!-- end .container -->
    <div class="margin-bottom-30"></div>
</section><!-- end #celebrities-news -->