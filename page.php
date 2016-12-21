<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

get_header();

	if( is_active_sidebar( 'sidebar-1' ) ) :  
	    $create_magazine_no_section_sidebar   = '';            
	else :
	    $create_magazine_no_section_sidebar   = 'no-section-sidebar';            
	endif; 
	
	if ( true === apply_filters( 'create_magazine_filter_frontpage_content_enable', true ) ) : ?>
		<div class="container page-section <?php echo $create_magazine_no_section_sidebar; ?>">
			<section>
	  			<header class="entry-header">
	   				<?php the_title( '<h2 class="blogpage-title">', '</h2>' ); ?>
	  			</header><!-- end .article-title -->
			</section>

			<div id="primary" class="content-area main-content">
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'components/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</main>
			</div>
			<?php get_sidebar(); ?>
		</div>
	<?php
	endif;
get_footer();