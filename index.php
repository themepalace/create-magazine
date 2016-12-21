<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
endif; ?>
	<div class="container page-section <?php echo $create_magazine_no_section_sidebar; ?>">
		<div id="primary" class="content-area main-content">
			<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'components/post/content', get_post_format() );

				endwhile;

				create_magazine_archive_post_navigation();

			else :

				get_template_part( 'components/post/content', 'none' );

			endif; ?>

			</main>
		</div>
	<?php get_sidebar(); ?>
	</div><!-- .container -->
<?php
get_footer();
