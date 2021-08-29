<?php
/* ---------------------------------------------------------------
Loading all Javascript files. Using the enqueue script is nicer than
loading scripts manually in a template file (header/footer) because 
you can manipulate/minify them (with a plugin.) Remove any unused.
---------------------------------------------------------------- */

################################################################################



// Scripts that appear on both Frontend & Backend
function shared_javascripts(){
  // JS path
  $jspath = get_template_directory().'/application.js';
   // Parsley
  wp_enqueue_script('parsley', get_template_directory_uri().'/library/script/vendor/parsley.js', array('jquery'),'', true );
  
  // Cookies on every page
  wp_enqueue_script( 'js-cookie', get_template_directory_uri() . '/library/script/vendor/js.cookie.min.js', array('jquery'), '', true );

  // GeoJSON
  // wp_enqueue_script('geojson', get_template_directory_uri().'/library/scripts/vendor/geojson.min.js', array('jquery'),'', true );

  // Changes Versions when the file is saved to clear cache
  if(file_exists($jspath)){
    $jsver = filemtime($jspath);
    wp_enqueue_script('applicationjs', $jspath, array('jquery'),$jsver, true );
	}

  if(is_singular('retailer')){
    $retailerID = get_field('dynamic_retailerapi');
  } else {
    $retailerID = null;
  }

  // If is My Agency
  if(is_page('my-agency')){
    vendor_fancyboxscripts();
  }
  


  $autocompleteUrl = get_site_url().'/autocomplete/';
  
  /*
  // Localized
   wp_localize_script(
    'applicationjs',
    'olsite',
    array( 
      'baseurl' => get_site_url(),
      'retailerID' => $retailerID,
      'autocompleteurl' => $autocompleteUrl,
    )
  ); 
  */
}



// Add Custom Frontend javascript
function custom_frontend_javascript() { 

  // Dashicons for logged-in Admins
  if(current_user_can('administrator')){  wp_enqueue_style( 'dashicons' ); }

  // Shared Javascripts
  shared_javascripts();

} add_action('wp_enqueue_scripts', 'custom_frontend_javascript');



// Add Custom Backend javascript
function custom_backend_javascript($hook) {
  
  // Shared Javascripts
  shared_javascripts();

} add_action('admin_enqueue_scripts', 'custom_backend_javascript');

