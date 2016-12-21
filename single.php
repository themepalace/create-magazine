<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme Palace
 */

get_header(); 

if( is_active_sidebar( 'sidebar-1' ) ) :  
    $create_magazine_no_section_sidebar   = '';            
else :
    $create_magazine_no_section_sidebar   = 'no-section-sidebar';
endif; ?>     
		<div class="container page-section <?php echo $create_magazine_no_section_sidebar; ?>">
			<section>
			  	<header class="entry-header">
			   	<?php the_title( '<h2 class="blogpage-title">', '</h2' ); ?>
			  	</header><!-- end .article-title -->
			</section>

			<div id="primary" class="content-area main-content">
				<main id="main" class="site-main" role="main">
				<?php
				while ( have_posts() ) : the_post();
					
					get_template_part( 'components/post/content', 'single' );

					create_magazine_single_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

				</main>
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- end .container -->
<?php get_footer();
