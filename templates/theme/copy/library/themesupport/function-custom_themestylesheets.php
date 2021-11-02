<?php


// Add frontend styles for Gutenberg.
function custom_themestylesheets_frontend() {
	// Modal CSS
	add_modal_style();
	// everything is compiled with grunt
	// add_primary_style();
	// Frontend styles
	add_secondary_style();
	// Add Fonts
	add_fonts();
} add_action('wp_enqueue_scripts', 'custom_themestylesheets_frontend');



// Add backend styles for Gutenberg.
function custom_themestylesheets_admin() {
	// Load Admin styles to override ACF
	wp_enqueue_style( 'acf-overrides', get_template_directory_uri().'/dist/global/editor.min.css', false );
	// Include the primary style
	// add_primary_style();
	// Secondary Style
	add_secondary_style();
	// Add Fonts
	add_fonts();
} 
add_action( 'admin_enqueue_scripts', 'custom_themestylesheets_admin' );


// Fonts need to be loaded on the Frontend and Backend
function add_primary_style(){
	// Primary Style
	$cssver = filemtime( get_template_directory().'/style.css' );
	wp_enqueue_style('primarystyle', get_template_directory_uri().'/style.css', false ,$cssver, 'all' );
}


// Fonts need to be loaded on the Frontend and Backend
function add_fonts(){
	// Calibri Font
	wp_enqueue_style('calibrifont', 'https://use.typekit.net/xzh8rvc.css', false ,'1.0', 'all' );
	// Nexa Font (example)
	// wp_enqueue_style('nexafont', get_template_directory_uri() . '/library/fonts/nexa/MyFontsWebfontsKit.css', false ,'1.0', 'all' );
}

// Fonts need to be loaded on the Frontend and Backend
function add_secondary_style(){
	// Filepath
	$filename = '/dist/global/main.min.css';
	$filepath = get_template_directory().$filename;
	$fileexists = file_exists($filepath);
	// Add style if it exists
	if($fileexists){ // && is_admin()
		// Secondary Style
		$timestamp = filemtime( $filepath );
		// Enqueue
		wp_enqueue_style('globalstyle', get_template_directory_uri().$filename, false ,$timestamp, 'all' );
	}
}

// Add CSS for Modals
function add_modal_style(){
	if(is_page('my-agency')){
		// Fancybox CSS
		wp_enqueue_style('fancybox', get_template_directory_uri().'/library/styles/vendor/fancybox/jquery.fancybox.css', false ,'0.0.1', 'all' );
	}
}

// Custom Tiny MCE Style (used mainly for Text Area Block)
/* https://support.advancedcustomfields.com/forums/topic/wysiwyg-styling/#post-7993 */

function override_tinymce_styles( $mce_init ) {
	// My Custom CSS
	$content_css = get_stylesheet_directory_uri() . '/editor-tinymce.css';
	// Swap out their for mine
	if ( isset( $mce_init[ 'content_css' ] ) ){
		$content_css .= ',' . $mce_init[ 'content_css' ];
		$mce_init[ 'content_css' ] = $content_css;
	}
	// Return the settings, regardless of whether they changed
	return $mce_init;
}
add_filter( 'tiny_mce_before_init', 'override_tinymce_styles' );

