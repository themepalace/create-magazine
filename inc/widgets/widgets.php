<?php
/**
 * Create magazine widgets inclusion
 *
 * This is the template that includes all custom widgets of Create Magazine
 *
 * @package Theme Palace
 * @subpackage Create_Magazine
 * @since Create Magazine 1.0
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function create_magazine_footer_register_sidebars() {

	
	for ($i=1; $i <= 2 ; $i++) {
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer %s', 'create-magazine' ), $i ),
			'id'            => 'footer-'.$i,
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget-wrap %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
	
	register_sidebar( array(
		'name'          	=>  esc_html__( 'Header Right', 'create-magazine' ), 
		'id'            	=> 'header-right',
		'description'   	=> __( 'This is the header right widget area. It typically appears on the right of the site title or logo. This widget area is not equipped to display any widget, and works best with a search form, social icons widget, Advertisement Widget or possibly a text widget.Better if selected only one widget.', 'create-magazine' ),
		'before_widget' 	=> '<div id="%1$s" class="widget-wrap %2$s">',
		'after_widget'  	=> '</div>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>',
	) );

	register_sidebar( array(
		'name'          	=>  esc_html__( 'Category Block 1 bottom', 'create-magazine' ), 
		'id'            	=> 'category-block-one-bottom-widget',
		'description'   	=> __( 'This is a category block one bottom widget area.', 'create-magazine' ),
		'before_widget' 	=> '<div id="%1$s" class="widget-wrap %2$s">',
		'after_widget'  	=> '</div>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Category block sidebar - 1', 'create-magazine' ),
		'id'            => 'category-block-sidebar-1',
		'description'   => esc_html__( 'This is category block  - 1 sidebar. Widgets placed here will only be displayed on Category block - 1 section', 'create-magazine' ),
		'before_widget' => '<div id="%1$s" class="widget-wrap %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title os-animation" data-os-animation="fadeInDown" data-os-animation-delay="0.3s" data-os-animation-duration="1s"><h2>',
		'after_title'   => '</h2></div>',
	) );

	// Instagram Widget
	register_sidebar( array(
        'name'          =>  esc_html__( 'Instagram widget', 'create-magazine' ), 
        'id'            => 'instagram-widget',
        'description'   => __( 'This is a footer Instagram widget area. It typically appears on the bottom of site before footer starts. It can be best used to display instagram feeds or advertisement Image.', 'create-magazine' ),
        'before_widget' => '<div id="%1$s" class="widget-wrap %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<header class="entry-header text-center"><h2 class="entry-title color-white os-animation" data-os-animation="fadeInDown" data-os-animation-delay="0.3s" data-os-animation-duration="1s">',
        'after_title'   => '</h2></header>',
    ) );
}
add_action( 'widgets_init', 'create_magazine_footer_register_sidebars' );

/**
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link.php';
/**
 * Add Ad image widget
 */
require get_template_directory() . '/inc/widgets/ad-image.php';
/**
 * Add instagram widget
 */
require get_template_directory() . '/inc/widgets/instagram.php';