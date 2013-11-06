<?php

if (!is_admin()){
	add_action( 'wp_enqueue_scripts', 'papyrus_add_javascript' );
}

add_filter('body_class','papyrus_browser_body_class');
add_filter('the_excerpt', 'papyrus_get_the_excerpt');
add_filter('get_the_excerpt', 'papyrus_get_the_excerpt');
add_action( 'widgets_init', 'papyrus_the_widgets_init' );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'mainmenu' => __( 'Main Navigation', 'papyrus_wdl' )
) );

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'papyrus', 320, 220, true );
// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Allow Shortcodes in Sidebar Widgets
add_filter('widget_text', 'do_shortcode');

/**
 * Add default options and show Options Panel after activate
 */
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	
	//Do redirect
	header( 'Location: '.admin_url().'admin.php?page=am-main.php' ) ;
	
}

?>