<?php
/**
 * Archive page / first section
 *
 * This is the template for the content
 *
 * @package Theme Palace
 * @subpackage Create Magazine
 * @since Create Magazine 1.0
 */
?>
<section id="category">
    <div class="container page-section">
        <div class="entry-header text-center">
            <h1 class="entry-title color-black"><?php the_archive_title(); ?></h1>
        </div><!-- end .entry-header -->
        <div class="entry-content two-col">
            <div class="row">

            <?php
            if ( have_posts() ) : ?>
                <?php
                $i = 1;
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                if( $i <= 2 ) :
                ?>
                    <div class="column-wrapper">
                    <?php if( has_post_thumbnail() ) { ?>
                        <div class="blog-image">
                            <?php create_magazine_large_post_thumbnail();?>
                            <div class="overlay"></div><!-- end .overlay -->
                        </div><!-- end .blog-image -->
                    <?php } ?>
                        <div class="category-content">
                            <div class="tag"><a href="<?php the_permalink() ?>">
                                <span class="<?php echo ( $i == 1 ) ? 'bg-green' : 'bg-light-red'; ?>" data-hover="<?php echo esc_attr( get_the_date() ); ?>"><?php echo esc_html( get_the_date() ); ?></span></a>
                            </div><!-- end .tag -->
                            <a href="<?php the_permalink(); ?>"><?php the_title( '<h3>', '</h3>' ); ?></a>
                        </div><!-- end .catgory-content -->
                    </div><!-- end .two-col -->
                <?php endif; $i++; endwhile; 
            endif; ?>
            </div><!-- end .row -->
        </div><!-- end .entry-content -->
    </div><!-- end .container -->
</section>
   