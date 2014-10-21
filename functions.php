<?php
/**
 * hope functions and definitions
 *
 * @package hope
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'hope_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hope_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hope, use a find and replace
	 * to change 'hope' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'hope', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hope' ),
                'social'=> __('Social', 'hope'),
                'footer'=> __('Footer', 'hope'),
                'aboutus'=> __('Aboutus', 'hope'),
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

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hope_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // hope_setup
add_action( 'after_setup_theme', 'hope_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function hope_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'hope' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'hope_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hope_scripts() {
	wp_enqueue_style( 'hope-style', get_stylesheet_uri() );
        
        wp_enqueue_style( 'content-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css' );
        
        wp_enqueue_style('google-fonts-lato','http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,900italic');
        
        wp_enqueue_style('font-awesome','http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

        wp_enqueue_script( 'hope-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );        
       
        wp_enqueue_script( 'hope-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), null, true );
        
        wp_enqueue_script( 'hope-tradewords', get_template_directory_uri() . '/js/tradeworks.js', array('jquery'), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hope_scripts' );

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


function register_custom_post_types_init() {
	$labels = array(
		'name'               => _x( 'Reports', 'post type general name' ),
		'singular_name'      => _x( 'Reports', 'post type singular name'),
		'menu_name'          => _x( 'Reports', 'admin menu' ),
		'name_admin_bar'     => _x( 'Reports', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'report' ),
		'add_new_item'       => __( 'Add New Report' ),
		'new_item'           => __( 'New Report' ),
		'edit_item'          => __( 'Edit Report' ),
		'view_item'          => __( 'View Report' ),
		'all_items'          => __( 'All Reports' ),
		'search_items'       => __( 'Search Reports' ),
		'parent_item_colon'  => __( 'Parent Reports:' ),
		'not_found'          => __( 'No reports found.' ),
		'not_found_in_trash' => __( 'No reports found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'reports' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'reports', $args );        
        
	$labels = array(
		'name'               => _x( 'Press', 'post type general name' ),
		'singular_name'      => _x( 'Press', 'post type singular name'),
		'menu_name'          => _x( 'Press', 'admin menu' ),
		'name_admin_bar'     => _x( 'Press', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'press' ),
		'add_new_item'       => __( 'Add New Press' ),
		'new_item'           => __( 'New Press' ),
		'edit_item'          => __( 'Edit Press' ),
		'view_item'          => __( 'View Press' ),
		'all_items'          => __( 'All Press' ),
		'search_items'       => __( 'Search Press' ),
		'parent_item_colon'  => __( 'Parent Press:' ),
		'not_found'          => __( 'No press found.' ),
		'not_found_in_trash' => __( 'No press found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'press' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'press', $args );        
        
	$labels = array(
		'name'               => _x( 'Large products', 'post type general name' ),
		'singular_name'      => _x( 'Large products', 'post type singular name'),
		'menu_name'          => _x( 'Large products', 'admin menu' ),
		'name_admin_bar'     => _x( 'Large products', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Big Product' ),
		'add_new_item'       => __( 'Add New Large product' ),
		'new_item'           => __( 'New Large product' ),
		'edit_item'          => __( 'Edit Large product' ),
		'view_item'          => __( 'View Large product' ),
		'all_items'          => __( 'All Large products' ),
		'search_items'       => __( 'Search Large products' ),
		'parent_item_colon'  => __( 'Parent Large products:' ),
		'not_found'          => __( 'No large products found.' ),
		'not_found_in_trash' => __( 'No large products found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'largeproducts' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'largeproducts', $args );  
        
	$labels = array(
		'name'               => _x( 'Staff', 'post type general name' ),
		'singular_name'      => _x( 'Staff', 'post type singular name'),
		'menu_name'          => _x( 'Staff', 'admin menu' ),
		'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Staff' ),
		'add_new_item'       => __( 'Add New Staff' ),
		'new_item'           => __( 'New staff' ),
		'edit_item'          => __( 'Edit staff' ),
		'view_item'          => __( 'View staff' ),
		'all_items'          => __( 'All staff' ),
		'search_items'       => __( 'Search staff' ),
		'parent_item_colon'  => __( 'Parent staff:' ),
		'not_found'          => __( 'No staff found.' ),
		'not_found_in_trash' => __( 'No staff found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'staff' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'staff', $args );      
        
	$labels = array(
		'name'               => _x( 'Board Members', 'post type general name' ),
		'singular_name'      => _x( 'Board Members', 'post type singular name'),
		'menu_name'          => _x( 'Board Members', 'admin menu' ),
		'name_admin_bar'     => _x( 'Board Members', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Board Member' ),
		'add_new_item'       => __( 'Add New Board Member' ),
		'new_item'           => __( 'New Board Member' ),
		'edit_item'          => __( 'Edit Board Member' ),
		'view_item'          => __( 'View Board Member' ),
		'all_items'          => __( 'All Board Members' ),
		'search_items'       => __( 'Search Board Members' ),
		'parent_item_colon'  => __( 'Parent Board Members:' ),
		'not_found'          => __( 'No board members found.' ),
		'not_found_in_trash' => __( 'No board members found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'boardmembers' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'boardmembers', $args );   
        
	$labels = array(
		'name'               => _x( 'Donors', 'post type general name' ),
		'singular_name'      => _x( 'Donors', 'post type singular name'),
		'menu_name'          => _x( 'Donors', 'admin menu' ),
		'name_admin_bar'     => _x( 'Donors', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'donor' ),
		'add_new_item'       => __( 'Add New Donor' ),
		'new_item'           => __( 'New Donor' ),
		'edit_item'          => __( 'Edit Donor' ),
		'view_item'          => __( 'View Donor' ),
		'all_items'          => __( 'All Donors' ),
		'search_items'       => __( 'Search Donors' ),
		'parent_item_colon'  => __( 'Parent Donors:' ),
		'not_found'          => __( 'No donors found.' ),
		'not_found_in_trash' => __( 'No donors found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'donors' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'donors', $args );         
        
	$labels = array(
		'name'               => _x( 'Images', 'post type general name' ),
		'singular_name'      => _x( 'Images', 'post type singular name'),
		'menu_name'          => _x( 'Home page slider', 'admin menu' ),
		'name_admin_bar'     => _x( 'Home page slider', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Image' ),
		'add_new_item'       => __( 'Add New Image' ),
		'new_item'           => __( 'New Image' ),
		'edit_item'          => __( 'Edit Image' ),
		'view_item'          => __( 'View Image' ),
		'all_items'          => __( 'All Images' ),
		'search_items'       => __( 'Search Images' ),
		'parent_item_colon'  => __( 'Parent:' ),
		'not_found'          => __( 'No images found.' ),
		'not_found_in_trash' => __( 'No images found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'hpslider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'hpslider', $args );              
}
add_action( 'init', 'register_custom_post_types_init' );

