<?php
/* Your custom functions go here */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
    
 }


function airplane_handler() {
    wp_enqueue_script( 'airplane-animation', get_stylesheet_directory_uri() . '/js/airplane.js', array( 'jquery' ), '1.0.0', false );
} 
add_shortcode( 'airplane', 'airplane_handler' );
?>