<?php
/**
 * Sample Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sample_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'sampletheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sampletheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Sample Theme, use a find and replace
		 * to change 'sampletheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sampletheme', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-primary' => esc_html__( 'Primary', 'sampletheme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add support for default block styles
		add_theme_support( 'wp-block-styles' );

		// Add support for wide allignment
		add_theme_support( 'align-wide' );

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_attr__( 'Magenta', 'sampletheme' ),
				'slug' => 'magenta',
				'color' => '#a156b4',
			),
			array(
				'name' => esc_attr__( 'Blue', 'sampletheme' ),
				'slug' => 'blue',
				'color' => '#768496',
			),
		) );

		// Add support for custom gradients
		add_theme_support(
			'editor-gradient-presets',
			array()
		);

	// Add support for font sizes
	add_theme_support( 'editor-font-sizes', array());

	// Disable theme supports
	add_theme_support( 'disable-custom-font-sizes' );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-gradients' );

	// Remove core block pattern
	remove_theme_support( 'core-block-patterns' );
}
endif;
add_action( 'after_setup_theme', 'sampletheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sampletheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sampletheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'sampletheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sampletheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sampletheme' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'sampletheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sampletheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function sampletheme_scripts() {
	wp_enqueue_style( 'sampletheme-style', get_stylesheet_uri(), array(), _S_VERSION );

	// Foundation
	wp_enqueue_style( 'foundation-style', get_stylesheet_uri(), '/assets/css/vendor/foundation.css' );
	wp_enqueue_style( 'foundation-script', get_stylesheet_uri(), '/assets/js/vendor/foundations.js', array(), false, true );

	// Bootstrap
	// wp_enqueue_style( 'bootstrap-style', get_stylesheet_uri(), '/assets/css/vendor/bootstrap.min.css' );
	// wp_enqueue_style( 'bootstrap-script', get_stylesheet_uri(), '/assets/js/vendor/bootstrap.min.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sampletheme_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// Enqueuinh block editor assets

function sampletheme_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'editor-script',
		get_template_directory_uri() . '/assets/js/editor.js',
		array('wp-blocks','wp-dom-ready','wp-edit-post')
	);
}
add_action( 'enqueue_block_editor_assets', 'sampletheme_enqueue_block_editor_assets' );

// Enqueing Block assets

function sampletheme_enqueue_block_assets() {
    wp_enqueue_style( 
		'blocks-style', 
		get_template_directory_uri() . '/assets/css/blocks.css' 
	);
}
add_action( 'enqueue_block_assets', 'sampletheme_enqueue_block_assets' );