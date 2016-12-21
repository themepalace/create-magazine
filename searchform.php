<?php
/**
 * The template for displaying search form
 *
 * @package Theme Palace
 * @subpackage Create Magazine 
 * @since Create Magazine 1.0
 */

$options = create_magazine_get_theme_options();
?>

<form action="<?php echo esc_url( home_url('/') ); ?>">
	<input type="text" name="s" placeholder="<?php echo esc_attr($options['search_text']);?>" value="<?php echo esc_attr( get_search_query() ); ?>" >
	<button type="submit"><i class="fa fa-search"></i></button>
	
</form>