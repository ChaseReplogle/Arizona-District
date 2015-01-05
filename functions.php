<?php
/**
 * Arizona District functions and definitions
 *
 * @package Arizona District
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'arizona_district_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function arizona_district_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Arizona District, use a find and replace
	 * to change 'arizona-district' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'arizona-district', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'arizona-district' ),
		'support' => __( 'Support Menu', 'arizona-district' ),
		'footer' => __( 'Footer Menu', 'arizona-district' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'arizona_district_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // arizona_district_setup
add_action( 'after_setup_theme', 'arizona_district_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function arizona_district_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'arizona-district' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'arizona_district_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function arizona_district_scripts() {
	wp_enqueue_style( 'arizona-district-style', get_stylesheet_uri() );

	wp_enqueue_style( 'arizona-district-main-style', get_template_directory_uri() . '/css/main-style.css');

	wp_enqueue_script( 'arizona-district-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'arizona-district-instagram', get_template_directory_uri() . '/js/instagram.js', array(), '', true );

	wp_enqueue_script( 'arizona-district-utilities', get_template_directory_uri() . '/js/utilities.js', array(), '', true );

	wp_enqueue_script( 'arizona-district-count-up-waypoints', 'http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js', array(), '', true );

	wp_enqueue_script( 'arizona-district-count-up', get_template_directory_uri() . '/js/count-up.js', array(), '', true );

	wp_enqueue_script( 'arizona-district-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'arizona_district_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Redirects any page set as a Place Holder to the homepage.
 */
function my_page_template_redirect()
{
    if( is_page_template( 'page-placeholder.php' ) )
    {
        wp_redirect( home_url( '' ) );
        exit();
    }
}
add_action( 'template_redirect', 'my_page_template_redirect' );


/**
 * Handles routes for searching different post types.
 */
function SearchFilter($query) {
if ($query->is_search or $query->is_feed) {
// Churches
if($_GET['post_type'] == "churches") {
$query->set('post_type', array('churches'));
}
// Events
elseif($_GET['post_type'] == "events") {
$query->set('post_type', array('tribe_events'));
}
// Resources
elseif($_GET['post_type'] == "resources") {
$query->set('post_type', array('resources'));
}
// Staff
elseif($_GET['post_type'] == "staff") {
$query->set('post_type', array('staff'));
}
// All
elseif($_GET['post_type'] == "all") {
$query->set('post_type', array('staff', 'churches', 'tribe_events', 'page', 'post'));
}
}
return $query;
}
// This filter will jump into the loop and arrange our results before they're returned
add_filter('pre_get_posts','SearchFilter');