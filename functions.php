<?php

require(get_template_directory().'/inc/vc-element.php');
require(get_template_directory().'/inc/vc-element-output.php');
require_once get_template_directory() . '/inc/tgm.php';
// load the theme's framework
if ( !class_exists( 'redux-framework' ) && file_exists( dirname(__FILE__) . '/redux-framework/ReduxCore/framework.php' ) ) {
	require_once( dirname(__FILE__) . '/redux-framework/ReduxCore/framework.php' );
	}
	
	// load the theme's options 
	if ( !isset( $redux_owd ) && file_exists( dirname(__FILE__) . '/redux-framework/sample/function-config.php' ) ) {
	require_once( dirname(__FILE__) . '/redux-framework/sample/function-config.php' );
	}
if ( ! function_exists( 'ion_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ion_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ion, use a find and replace
		 * to change 'ion' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ion');
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support("post-formats",array("image","audio","video", "aside"));
		// This theme uses wp_nav_menu() in one location.

			register_nav_menus(
    array(
        'main-nav'   => 'Main Navigation',
        'footer-nav' => 'Footer Navigation'
    )
);

	

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
		));

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ion_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ion_setup' );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ion_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ion' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ion' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ion_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ion_scripts() {
	wp_enqueue_style( 'ion-style', get_stylesheet_uri());
	wp_enqueue_style( 'ion-style-main',get_template_directory_uri().'/css/style.css', array(), '0.0.1');
	wp_enqueue_style( 'ion-style-google-font','//fonts.googleapis.com/css?family=Roboto:500,300');
	wp_enqueue_style( 'ion-style-skel',get_template_directory_uri().'/css/skel.css', array(), '0.0.1');
	wp_enqueue_style( 'ion-style-skel',get_template_directory_uri().'/css/style-xlarge.css', array(), '0.0.1');
			
	wp_enqueue_script('ion-skel.min',get_template_directory_uri().'/js/skel.min.js',array('jquery'),'1.0');
	wp_enqueue_script('ion-skel-layers',get_template_directory_uri().'/js/skel-layers.min.js',array('jquery'),'1.0');
	wp_enqueue_script('ion-init',get_template_directory_uri().'/js/init.js',array('jquery'),'1.0');

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ion_scripts' );
/*Wp Nan Register*/




/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//if ( defined( 'JETPACK__VERSION' ) ) {
	//require get_template_directory() . '/inc/jetpack.php';
//}

// **********************************************//
// ! Get menus dropdown
// *********************************************//

if( ! function_exists( 'ion_get_menus_array') ) {
	function ion_get_menus_array() {
		$menus = get_registered_nav_menus();

		$ion_menu_dropdown = array();

		foreach ( $menus as $location => $description ) {

			$ion_menu_dropdown[$location] = $description;

		}

		return $ion_menu_dropdown;
	}
}
/*Add Custom Css in Menu  And add This function*/
function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
    $classes     = implode(' ', $item->classes);
    $item_output = preg_replace('/<a /', '<a class="'.$classes.'"', $item_output, 1);
    return $item_output;
 }
add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);


add_action( 'vc_before_init', 'ir_posts_category_vc' );
function ir_posts_category_vc() {
    $categories_array = array();
    $categories = get_categories(array('taxonomy' => 'category',));
    foreach( $categories as $category ) {
        $categories_array[$category->name] = $category->term_id;
    }
	return $categories_array;
}
function ion_widgets(){
	register_sidebar(array(
        'name' => __('Right footer section','ion'),
        'id'   => 'footer_right',
        'description' => __('this is footer section','ion'),
    ));
    register_sidebar(array(
        'name' => __('Copy Right footer section','ion'),
        'id'   => 'footer',
        'description' => __('this is footer section','ion'),
    ));    

}
add_action('widgets_init','ion_widgets');