<?php
/**
 * Jewel Blog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Jewel_Blog
 */

if ( ! function_exists( 'jeweltheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jeweltheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Jewel Blog, use a find and replace
	 * to change 'jeweltheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jeweltheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	add_editor_style( 'css/editor-style.css' );

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

	// Set Post Thumbnail Size
	set_post_thumbnail_size( 810, 450, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'jeweltheme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jeweltheme_custom_background_args', array(
		'default-color' => 'ebe8e5',
		'default-image' => '',
	) ) );
}
endif; // jeweltheme_setup
add_action( 'after_setup_theme', 'jeweltheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jeweltheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jeweltheme_content_width', 800 );
}
add_action( 'after_setup_theme', 'jeweltheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jeweltheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jeweltheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Top Header', 'jeweltheme' ),
		'id'            => 'topheader',
		'description'   => 'Above Header and menu, right aligned, use for Social icons',
		'before_widget' => '<div class="aboveheader">',
		'after_widget'  => '</div>'
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Top Content', 'jeweltheme' ),
		'id'            => 'topcontent',
		'description'   => 'Front Page Only, use for Sliders',
		'before_widget' => '<div class="abovecontent">',
		'after_widget'  => '</div>'
	) );
}
add_action( 'widgets_init', 'jeweltheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jeweltheme_scripts() {
	wp_enqueue_style( 'jeweltheme-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'jeweltheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'jeweltheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jeweltheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom Theme Functions
 */
require get_template_directory() . '/inc/theme-functions.php';
