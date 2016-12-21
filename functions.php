<?php
/**
 * components functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme Palace
 */


if ( ! function_exists( 'create_magazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the aftercomponentsetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function create_magazine_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'create-magazine' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'create-magazine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 300, true );

	// custom image size
	add_image_size( 'create-magazine-featured-category', 390, 506, true );

	add_image_size( 'create-magazine-recent-story', 450, 338, true );

	add_image_size( 'create-magazine-featured-trending', 275, 206, true );

	add_image_size( 'create-magazine-culture', 424, 318, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary', 'create-magazine' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'create_magazine_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.min.css' ) );

	add_theme_support( 'custom-logo', array(
		'height'      => 70,
		'width'       => 120,
		'flex-height' => false,
		'flex-width'  => false,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'create_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function create_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'create_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'create_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function create_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'create-magazine' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'create_magazine_widgets_init' );

if ( ! function_exists( 'create_magazine_fonts_url' ) ) :
/**
 * Register Google fonts for Create Magazine
 *
 * Create your own create_magazine_fonts_url() function to override in a child theme.
 *
 * @since Create Magazine 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function create_magazine_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	// translators: If there are characters in your language that are not supported by open sans, translate this to 'off'. Do not translate into your own language. 
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'create-magazine' ) ) {
		$fonts[] = 'Open Sans';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'create-magazine' ) ) {
		$fonts[] = 'Montserrat';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function create_magazine_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'create-magazine-fonts', create_magazine_fonts_url(), array(), null );

	// Add fontawesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/plugins/fontawesome/css/font-awesome.min.css', '', '4.6.3' );

	//Add sidr light style
	wp_enqueue_style( 'sidr-light', get_template_directory_uri() . '/assets/css/jquery-sidr-light.min.css', '', false );

	// Theme stylesheet.
	wp_enqueue_style( 'create-magazine-style', get_stylesheet_uri() );

	// Add default style
	wp_enqueue_style( 'create-magazine-default', get_template_directory_uri() . '/assets/css/default.min.css', '', false );

	// Add navigation script
	wp_enqueue_script( 'create-magazine-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), '20151215', true );

	// Add skip link focus script
	wp_enqueue_script( 'create-magazine-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Add cycle2 js
	wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/assets/plugins/cycle2/cycle2.min.js', array( 'jquery' ), '2.1.6', true );

	// Add cycle2 carousel
	wp_enqueue_script( 'cycle2-carousel', get_template_directory_uri() . '/assets/plugins/cycle2/jquery.cycle2.carousel.min.js', array( 'jquery', 'cycle2' ), '20141007', true );

	// Add cycle2 Flip vertical
	wp_enqueue_script( 'cycle2-flip', get_template_directory_uri() . '/assets/plugins/cycle2/jquery.cycle2.flip.min.js', array( 'jquery', 'cycle2' ), '20141007', true );

	// Add sidr js
	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/assets/js/jquery.sidr.min.js', array( 'jquery' ), '', true );

	// Add smoothscroll js
	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/js/jquery.smooth-scroll.min.js', array( 'jquery' ), '', true );
	
	// Add custom js
	wp_enqueue_script( 'create-magazine-custom', get_template_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'create_magazine_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Create Magazine core file
 */
require get_template_directory() . '/inc/core.php';