<?php
/**
 * _s functions and definitions
 *
 * @package unite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 730; /* pixels */
}

/**
 * Set the content width for full width pages with no sidebar.
 */
function unite_content_width() {
  if ( is_page_template( 'page-fullwidth.php' ) || is_page_template( 'front-page.php' ) ) {
    global $content_width;
    $content_width = 1110; /* pixels */
  }
}
add_action( 'template_redirect', 'unite_content_width' );


if ( ! function_exists( 'unite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function unite_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'unite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'unite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'unite-featured', 730, 410, true );
	add_image_size( 'tab-small', 60, 60 , true); // Small Thumbnail

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'unite' ),
		'footer-links' => __( 'Footer Links', 'unite' ) // secondary nav in footer
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'unite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add WooCommerce support
	add_theme_support( 'woocommerce' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

}
endif; // unite_setup
add_action( 'after_setup_theme', 'unite_setup' );



function create_post_type() {
  register_post_type( 'films',
    array(
      'labels' => array(
        'name' => __( 'Films' ),
        'singular_name' => __('Film'),
        'add_new' => 'Add Film',
        'add_new_item' => 'Add New Film',
        ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'custom-fields','thumbnail' )
    )
  );
}
add_action( 'init', 'create_post_type' );



//function genre_custom_taxonomy() {
//	// create a new taxonomy
//	register_taxonomy(
//		'genre',
//		'films',
//		array(
//			'label' => __( 'Genre' ),
//			'rewrite' => array( 'slug' => 'genre' ),
//                    'show_ui' => true,
//                    'show_admin_column' => true,
//                    'query_var' => true,
//                    'capabilities' => array(
//                    'assign_terms' => 'edit_guides',
//                                        'edit_terms' => 'publish_guides'
//                                )
//                        )
//	);
//}
//add_action( 'init', 'genre_custom_taxonomy' );


add_action( 'init', 'film_custom_taxonomies');

function film_custom_taxonomies() {
	$genre_labels = array(
		'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Genres', 'textdomain' ),
		'all_items'         => __( 'All Genres', 'textdomain' ),
		'parent_item'       => __( 'Parent Genre', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
		'edit_item'         => __( 'Edit Genre', 'textdomain' ),
		'update_item'       => __( 'Update Genre', 'textdomain' ),
		'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
		'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
		'menu_name'         => __( 'Genres', 'textdomain' ),
	);

	$genre_args = array(
		'hierarchical'      => true,
		'labels'            => $genre_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	);

	register_taxonomy( 'genre', array( 'films' ), $genre_args );
        
        $country_labels = array(
		'name'              => _x( 'Countries', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Country', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Country', 'textdomain' ),
		'all_items'         => __( 'All Country', 'textdomain' ),
		'parent_item'       => __( 'Parent Country', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Country:', 'textdomain' ),
		'edit_item'         => __( 'Edit Country', 'textdomain' ),
		'update_item'       => __( 'Update Country', 'textdomain' ),
		'add_new_item'      => __( 'Add New Country', 'textdomain' ),
		'new_item_name'     => __( 'New Country Name', 'textdomain' ),
		'menu_name'         => __( 'Countries', 'textdomain' ),
	);

	$country_args = array(
		'hierarchical'      => true,
		'labels'            => $country_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'country' ),
	);

	register_taxonomy( 'country', array( 'films' ), $country_args );
        
        
        $actor_labels = array(
		'name'              => _x( 'Actors', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Actor', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Actor', 'textdomain' ),
		'all_items'         => __( 'All Actor', 'textdomain' ),
		'parent_item'       => __( 'Parent Actor', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Actor:', 'textdomain' ),
		'edit_item'         => __( 'Edit Actor', 'textdomain' ),
		'update_item'       => __( 'Update Actor', 'textdomain' ),
		'add_new_item'      => __( 'Add New Actor', 'textdomain' ),
		'new_item_name'     => __( 'New Actor Name', 'textdomain' ),
		'menu_name'         => __( 'Actors', 'textdomain' ),
	);

	$actor_args = array(
		'hierarchical'      => true,
		'labels'            => $actor_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'country' ),
	);

	register_taxonomy( 'actor', array( 'films' ), $actor_args );
        
        
        $year_labels = array(
		'name'              => _x( 'Year', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Year', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Year', 'textdomain' ),
		'all_items'         => __( 'All Year', 'textdomain' ),
		'parent_item'       => __( 'Parent Year', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Year:', 'textdomain' ),
		'edit_item'         => __( 'Edit Year', 'textdomain' ),
		'update_item'       => __( 'Update Year', 'textdomain' ),
		'add_new_item'      => __( 'Add New Year', 'textdomain' ),
		'new_item_name'     => __( 'New Year Name', 'textdomain' ),
		'menu_name'         => __( 'Years', 'textdomain' ),
	);

	$year_args = array(
		'hierarchical'      => true,
		'labels'            => $year_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'country' ),
	);

	register_taxonomy( 'year', array( 'films' ), $year_args );

}




if ( ! function_exists( 'unite_widgets_init' ) ) :
/**
 * Register widgetized area and update sidebar with default widgets.
 */
function unite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'unite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'id'            => 'home1',
		'name'          => 'Homepage Widget 1',
		'description'   => 'Used only on the homepage page template.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
    ));

    register_sidebar(array(
		'id'            => 'home2',
		'name'          => 'Homepage Widget 2',
		'description'   => 'Used only on the homepage page template.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
    ));

    register_sidebar(array(
		'id'            => 'home3',
		'name'          => 'Homepage Widget 3',
		'description'   => 'Used only on the homepage page template.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
    ));

    register_widget( 'unite_popular_posts_widget' );
    register_widget( 'unite_social_widget' );
}
endif;
add_action( 'widgets_init', 'unite_widgets_init' );

/**
 * Include widgets for Unite theme
 */
include(get_template_directory() . "/inc/widgets/popular-posts-widget.php");
include(get_template_directory() . "/inc/widgets/widget-social.php");

/**
 * Include Metabox for Unite theme
 */
include(get_template_directory() . "/inc/metaboxes.php");



if ( ! function_exists( 'unite_scripts' ) ) :
/**
 * Enqueue scripts and styles.
 */
function unite_scripts() {

	wp_enqueue_style( 'unite-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );

	wp_enqueue_style( 'unite-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

	wp_enqueue_style( 'unite-style', get_stylesheet_uri() );

	wp_enqueue_script('unite-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );

	wp_enqueue_script( 'unite-functions', get_template_directory_uri() . '/inc/js/main.min.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'unite_scripts' );


if ( ! function_exists( 'unite_ie_support_header' ) ) :
/**
 * Add HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries
 */
function unite_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/html5shiv.min.js' ) . '"></script>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/respond.min.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
endif;
add_action( 'wp_head', 'unite_ie_support_header', 1 );

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
 * Load custom nav walker
 */

require get_template_directory() . '/inc/navwalker.php';

/**
 * Load social nav
 */
require get_template_directory() . '/inc/socialnav.php';

/* All Globals variables */
global $text_domain;
$text_domain = 'unite';

global $site_layout;
$site_layout = array('side-pull-left' => esc_html__('Right Sidebar', 'dazzling'),'side-pull-right' => esc_html__('Left Sidebar', 'dazzling'),'no-sidebar' => esc_html__('No Sidebar', 'dazzling'),'full-width' => esc_html__('Full Width', 'dazzling'));

// Option to switch between the_excerpt and the_content
global $blog_layout;
$blog_layout = array('1' => __('Display full content for each post', 'unite'),'2' => __('Display excerpt for each post', 'unite'));

// Typography Options
global $typography_options;
$typography_options = array(
        'sizes' => array( '6px' => '6px','10px' => '10px','12px' => '12px','14px' => '14px','15px' => '15px','16px' => '16px','18'=> '18px','20px' => '20px','24px' => '24px','28px' => '28px','32px' => '32px','36px' => '36px','42px' => '42px','48px' => '48px' ),
        'faces' => array(
                'arial'          => 'Arial',
                'verdana'        => 'Verdana, Geneva',
                'trebuchet'      => 'Trebuchet',
                'georgia'        => 'Georgia',
                'times'          => 'Times New Roman',
                'tahoma'         => 'Tahoma, Geneva',
                'Open Sans'      => 'Open Sans',
                'palatino'       => 'Palatino',
                'helvetica'      => 'Helvetica',
                'helvetica-neue' => 'Helvetica Neue,Helvetica,Arial,sans-serif'
        ),
        'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
        'color'  => true
);

/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if ( ! function_exists( 'of_get_option' ) ) :
function of_get_option( $name, $default = false ) {

  $option_name = '';
  // Get option settings from database
  $options = get_option( 'unite' );

  // Return specific option
  if ( isset( $options[$name] ) ) {
    return $options[$name];
  }

  return $default;
}
endif;