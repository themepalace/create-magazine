<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

global $post;
$options = create_magazine_get_theme_options();
?>

<div class="blog-post">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if( has_post_thumbnail() ) { ?>
			<div class="blog-image">
			<?php create_magazine_post_thumbnail();?>
			</div>
		<?php } ?>
		<div class="blog-desc">
		<?php  $published_date = get_the_date( '', $post->ID ); ?>
	      	<span class="date"><?php echo esc_html( $published_date ); ?></span>
	      	<a href="<?php the_permalink(); ?>">
	      	<?php the_title( '<h2>', '</h2>'); ?> 
	      	</a>
			<?php the_excerpt(); ?>
	    </div><!-- end .blog-desc -->
	</article><!-- #post-## -->
</div>