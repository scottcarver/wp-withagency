<?php 

// Remove Frontend Assets
function custom_frontendcleanup_removeassets() {
	
	/******* Remove Tags ******/
	// Remove Generator Tag in head
	add_filter('the_generator', function(){return '';});
	// Remove DNS Prefetch in head
	remove_action( 'wp_head', 'wp_resource_hints', 2 );
	// Remove REST in head
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
	remove_action('template_redirect', 'rest_output_link_header', 11, 0);
	// Remove XML Feed in head
	remove_action ('wp_head', 'rsd_link');
	remove_action( 'wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'wp_shortlink_wp_head');

	/***** Remove Styles ******/
	// Remove Global Styles added by WordPress
	wp_dequeue_style('global-styles');
	wp_deregister_style('global-styles');
	// Remove Block Styles added by Wordpress
	wp_dequeue_style('wp-block-library');
	wp_deregister_style('wp-block-library');

	/******* Remove Scripts ******/
	// Remove Embed
	wp_deregister_script( 'wp-embed' );

}

add_action('wp_enqueue_scripts','custom_frontendcleanup_removeassets');




// Remove Query Strings from CSS/JS asset paths
function custom_frontendcleanup_removequerystrings($src){
	$parts = explode( '?', $src ); 
	return $parts[0]; 
}

add_filter( 'script_loader_src', 'custom_frontendcleanup_removequerystrings', 15, 1 ); 
add_filter( 'style_loader_src', 'custom_frontendcleanup_removequerystrings', 15, 1 );