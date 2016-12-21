<?php
/**
 * Template part for displaying singl posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="archive-post-wrap os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.3s" data-os-animation-duration="2s">
		<div class="entry-container">
		  	<figure class="featured-image">
	     		<?php create_magazine_post_thumbnail();?>
	            <header class="entry-header">
		            <?php	
		            	if ( 'post' === get_post_type() ) :
		            			get_template_part( 'components/post/content', 'meta' ); 
						endif; 
						// Use jetpack social sharing function
		          		if ( function_exists( 'sharing_display' ) ) {
		          			echo '<div class="social-icons">';
		          				sharing_display( '', true );
		    				echo '</div>';
						}
					?>
	            	<div class="clear"></div>
	            </header>
	        </figure>

			<div class="entry-summary">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'create-magazine' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				?>
			</div><!-- .entry-summary -->
		</div>
	</div>
</article><!-- #post-## -->
