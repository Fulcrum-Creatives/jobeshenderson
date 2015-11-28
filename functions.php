<?php
/* Constants
================================================================================*/
$wp_theme = wp_get_theme();
// Theme Version
if ( ! defined( 'FCWPF_VERSION' ) ) {
  define( 'FCWPF_VERSION', $wp_theme->get( 'Version' ) );
}
// Theme Taxdomain
if ( !defined( 'FCWPF_TAXDOMAIN' ) ) {
  define( 'FCWPF_TAXDOMAIN', strtolower( preg_replace('~\b(\w)|.~', '$1', $wp_theme->get( 'Name' ) ) ) );
}
// Theme Prefix
if ( ! defined( 'FCWPF_PREFIX' ) ) {
  define( 'FCWPF_PREFIX', strtolower( preg_replace('~\b(\w)|.~', '$1', $wp_theme->get( 'Name' ) ) ) );
}
// Theme Name
if ( !defined( 'FCWPF_NAME' ) ) {
  define( 'FCWPF_NAME', $wp_theme->get( 'Name' ) );
}
// Theme URI
if ( !defined( 'FCWPF_URI' ) ) {
  define( 'FCWPF_URI', esc_url( get_template_directory_uri() ) );
}
// Theme Stylesheet URI
if ( !defined( 'FCWPF_STYLESHEETURI' ) ) {
  define( 'FCWPF_STYLESHEETURI', esc_url( get_stylesheet_uri() ) );
}
// Theme Directory
if ( !defined( 'FCWPF_DIR' ) ) {
  define( 'FCWPF_DIR', get_template_directory() );
}

/* Theme Support
===============================================================================*/
if( !function_exists( 'fcwpf_theme_support' ) ) :
  function fcwpf_theme_support() {
    // Load taxdomain
    load_theme_textdomain( FCWPF_TAXDOMAIN, get_template_directory() . '/languages' );
      // Title Tage Support
      add_theme_support( 'title-tag' );
      // Post Thumbnails
      add_theme_support( 'post-thumbnails' );

      add_image_size( 'logo', 135, 46 );
      add_image_size( 'logo@2', 270, 92 );

      add_image_size( 'widgetimage', 353, 172, true );
      add_image_size( 'widgetimage@2', 706, 344, true );

      add_image_size( 'projectimage', 1200 );
      add_image_size( 'projectimage@2', 2400 );

      register_nav_menus( array(
          'primary' => __( 'Primary', FCWPF_TAXDOMAIN ),
      ) );
  }
  add_action( 'after_setup_theme', 'fcwpf_theme_support' );
endif;

/* Load Stylesheets
================================================================================*/
if( !function_exists( 'fcwpf_load_stylesheets' ) ) :
  function fcwpf_load_stylesheets() {
    // Load the main stylesheet.
    wp_enqueue_style( 'fc-wp-style', FCWPF_STYLESHEETURI, array(), '1.0.0' );
    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style( 'fc-wp-ie8-style', FCWPF_URI . '/css/ie8.style.css', array( 'fc-wp-style' ), '1.0.0' );
    wp_style_add_data( 'fc-wp-ie8-style', 'conditional', 'IE 8' );
    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style( 'fc-wp-ie9-style', FCWPF_URI . '/css/ie9.style.css', array( 'fc-wp-style' ), '1.0.0' );
    wp_style_add_data( 'fc-wp-ie9-style', 'conditional', 'IE 9' );
    // Load the custom font stylesheet.
    wp_enqueue_style( 'custom-fonts', 'http://fast.fonts.net/cssapi/e81ab87f-70c5-4c7c-ad1c-df461aa88424.css' );
     // Load Quickfix stylesheet. TK added May 19th, 1:45pm
    if( filesize( get_template_directory() . '/css/quickfix.css' ) != 0 ) {
	        wp_enqueue_style( 'fcwp-qf', get_template_directory_uri() . '/css/quickfix.css', array(), '1.0.0', 'all' );
	    }
  }
  add_action( 'wp_enqueue_scripts', 'fcwpf_load_stylesheets' );
endif;

/* Load JavaScript
================================================================================*/
if( !function_exists( 'fcwpf_load_javascript' ) ) :
  function fcwpf_load_javascript() {
      // jQuery
      wp_enqueue_script('jquery');
      // scripts.min.js
      wp_register_script( 'scripts.min.js', FCWPF_URI . '/js/scripts.min.js', false, '1.0.0', true );
      wp_enqueue_script( 'scripts.min.js' );
      // scripts.min.js
      wp_register_script( 'picturefill.js', FCWPF_URI . '/js/vendor/picturefill.js', false, '1.0.0', false );
      wp_enqueue_script( 'picturefill.js' );
      // Load the custom font JS.
      wp_enqueue_script( 'custom-fonts.js', 'http://fast.fonts.net/jsapi/e81ab87f-70c5-4c7c-ad1c-df461aa88424.js', false, '1.0.0', false );
  }
  add_action( 'wp_enqueue_scripts', 'fcwpf_load_javascript' );
endif;

/*---------------------------------------------------------
 * IE Conditional JavaScript
---------------------------------------------------------*/
if( !function_exists( 'fcwp_load_ie' ) ) :
  function fcwp_load_ie() {
    ob_start();?>
  <!--[if (lt IE 9) & (!IEMobile)]><script src="<?php echo get_template_directory_uri(); ?>/js/vendor/html5.js"></script><![endif]-->
  <!--[if (lt IE 9) & (!IEMobile)]><script src="<?php echo get_template_directory_uri(); ?>/js/vendor/respond.js"></script><![endif]-->
    <?php
    echo ob_get_clean();
  }
  add_action( 'wp_head', 'fcwp_load_ie',10 );
endif;
/* Custom Excerpt Length
================================================================================*/
if( !function_exists( 'custom_excerpt_length' ) ) :
    function custom_excerpt_length( $length ) {
        $jobesh_excerpt_length = ( get_field( 'jobesh_excerpt_length', 'option' ) ? get_field( 'jobesh_excerpt_length', 'option' ) : '100' );
        return $jobesh_excerpt_length;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
endif;

/* Custom Ellipise
================================================================================*/
if( !function_exists( 'custom_ellipise' ) ) :
  function custom_ellipise( $more ) {
      $jobesh_ellipise = ( get_field( 'jobesh_ellipise', 'option' ) ? get_field( 'jobesh_ellipise', 'option' ) : '...' );
      return ' ' . $jobesh_ellipise;
  }
  add_filter( 'excerpt_more', 'custom_ellipise' );
endif;

/* Sidebar Widget Area
===============================================================================*/
function register_custom_sidebars() {
        register_sidebar( array(
            'name'          => __( 'Main Sidebar', FCWPF_TAXDOMAIN ),
            'id'            => 'main-sidebar',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>'
        ));
        register_sidebar( array(
            'name'          => __( 'Service Sidebar', FCWPF_TAXDOMAIN ),
            'id'            => 'service-sidebar',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>'
        ));
         register_sidebar( array(
            'name'          => __( 'News Sidebar', FCWPF_TAXDOMAIN ),
            'id'            => 'news-sidebar',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>'
        ));

    }
add_action( 'widgets_init', 'register_custom_sidebars' );