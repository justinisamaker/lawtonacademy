<?php

// Enqueue fonts
function okie_fonts(){
  $query_args = array(
    'family' => 'Source+Sans+Pro:400,600,400italic,600italic|Playfair+Display:400'
  );

  wp_register_style('okie_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}

add_action('wp_enqueue_scripts', 'okie_fonts');

//Enqueue Stylesheets
function okie_styles() {
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'concat-css', get_template_directory_uri(). '/dist/css/main.css');

  if(is_front_page()){
    wp_enqueue_style( 'home-css', get_template_directory_uri(). '/dist/css/pages/home.css');
  } else if (is_page_template('internal_page.php')){
    wp_enqueue_style( 'internal-css', get_template_directory_uri(). '/dist/css/pages/internal.css');
  } else {
    wp_enqueue_style( 'internal-css', get_template_directory_uri(). '/dist/css/pages/internal.css');
  }
}
add_action( 'wp_enqueue_scripts', 'okie_styles' );

//Enqueue Scripts
function okie_js() {
  wp_enqueue_script( 'base_js', get_template_directory_uri() . '/dist/js/base.js', array('jquery'), false, false);
}
add_action( 'wp_enqueue_scripts', 'okie_js' );

// Navigation
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'main-nav' => __( 'Main Navigation' )
		)
	);
}

// featured images
add_theme_support( 'post-thumbnails' );

if( function_exists('acf_add_options_page') ) {

  acf_add_options_sub_page(array(
    'page_title'  => 'Theme Footer Settings',
    'menu_title'  => 'Footer'
  ));
}

?>