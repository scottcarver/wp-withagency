<?php
/* ---------------------------------------------------------------
Loading All CSS Stylesheets. Using the enqueue script is nicer than
loading scripts manually in a template file (header/footer) because 
you can manipulate/minify them (with a plugin.) Remove any unused.
---------------------------------------------------------------- */

// Add frontend styles for Gutenberg.
function custom_theme_css() {
	// everything is compiled with grunt
	add_primary_style();
	// Frontend styles
	add_secondary_style();
	// Add Fonts
	add_fonts();
} add_action('wp_enqueue_scripts', 'custom_theme_css');



// Add backend styles for Gutenberg.
function add_acfoverride_stylesheet() {
	// Load Admin styles to override ACF
	wp_enqueue_style( 'acf-overrides', get_template_directory_uri().'/editor.css', false );
	// Include the primary style
	add_primary_style();
	// Secondary Style
	add_secondary_style();
	// Add Fonts
	add_fonts();
} 
add_action( 'admin_enqueue_scripts', 'add_acfoverride_stylesheet' );


// Fonts need to be loaded on the Frontend and Backend
function add_primary_style(){
	// Filepath
	$filename = '/style.css';
	$filepath = get_template_directory().$filename;
	$fileexists = file_exists($filepath);
	
	// Add style if it exists
	if($fileexists){
		// // Primary Style
		$timestamp = filemtime( $filepath );
		// Enqueue
		wp_enqueue_style('primarystyle', get_template_directory_uri().$filename, false ,$timestamp, 'all' );
	}
}


// Fonts need to be loaded on the Frontend and Backend
function add_secondary_style(){
	// Filepath
	$filename = '/dist/global/main.min.css';
	$filepath = get_template_directory().$filename;
	$fileexists = file_exists($filepath);
	// Add style if it exists
	if($fileexists){
		// Secondary Style
		$timestamp = filemtime( $filepath );
		// Enqueue
		wp_enqueue_style('secondarystyle', get_template_directory_uri().$filename, false ,$timestamp, 'all' );
	}
}

// Fonts need to be loaded on the Frontend and Backend
function add_fonts(){
	// Calibri Font
	wp_enqueue_style('calibrifont', 'https://use.typekit.net/xzh8rvc.css', false ,'1.0', 'all' );
	// Nexa Font
	wp_enqueue_style('nexafont', get_template_directory_uri() . '/library/fonts/nexa/MyFontsWebfontsKit.css', false ,'1.0', 'all' );
}




// Custom Tiny MCE Style (used mainly for Text Area Block)
/* https://support.advancedcustomfields.com/forums/topic/wysiwyg-styling/#post-7993 */
add_filter( 'tiny_mce_before_init', 'override_tinymce_styles' );
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
