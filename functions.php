<?php
function _themename_assets() {
  wp_enqueue_style( '_themename-stylesheet', get_template_directory_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( '_themename-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true );  
}
add_action('wp_enqueue_scripts', '_themename_assets');


function _themename_setup() {
  register_nav_menu( 'primary', 'primary-menu' );
	// Add featured image support
	add_theme_support( 'post-thumbnails' );
  add_image_size( 'zhk-thumbnail', 360, 224, true );
  add_image_size( 'page-bigimg', 860, 600, true );
}

add_action( 'after_setup_theme', '_themename_setup' );


?>

