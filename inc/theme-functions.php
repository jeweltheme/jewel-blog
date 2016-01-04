<?php
// Loads External Styles and Scripts
function jeweltheme_blog_scripts(){
	wp_enqueue_style( 'google-font-raleway', '//fonts.googleapis.com/css?family=Raleway:400,300,700,900' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation-custom.js', array('jquery') );
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array('jquery') );
	wp_enqueue_script( 'REM-unit-polyfill', get_template_directory_uri() . '/js/rem.min.js', false, false, false );
}
add_action('wp_enqueue_scripts', 'jeweltheme_blog_scripts');

// Continue Button Link
function jeweltheme_add_excerpt_wrapper($link, $text){
	$content = '<div class="continue_btn">' . $link . '</div>';
	return $content;
}
add_action( 'the_content_more_link', 'jeweltheme_add_excerpt_wrapper', 10, 2 );

// Widget Shortcode Support
add_filter('widget_text', 'do_shortcode');