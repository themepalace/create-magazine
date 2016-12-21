<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary">
	<div class="sidebar bg-white">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside>

