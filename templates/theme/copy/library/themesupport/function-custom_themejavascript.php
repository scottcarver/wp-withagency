<?php

// Scripts that appear on both Frontend & Backend
function custom_themejavascript_shared(){
  // JS path
  $jspath = get_template_directory_uri().'/dist/global/';
   // Parsley
  wp_enqueue_script('parsley', $jspath.'parsley.2.9.2.min.js', array('jquery'),'', true );
  
  // Cookies on every page
  wp_enqueue_script( 'js-cookie', $jspath.'js.cookie.min.js', array('jquery'), '', true );

  // Main CSS (components combined)
  wp_enqueue_script('main', $jspath.'main.min.js', array('jquery'), '', true );

  	// Revamp jQuery on frontend
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri().'/dist/global/jquery-3.6.0.min.js', array(), null, true);


  // Localized Variables
   wp_localize_script(
    'applicationjs',
    THEME_PREFIX.'site',
    array( 
      'baseurl' => get_site_url(),
      'postID' => get_the_ID(),
      'autocompleteurl' => get_site_url().'/autocomplete/',
    )
  ); 
}


// Add Custom Frontend javascript
function custom_themejavascript_frontend() { 

  // Shared Javascripts
  custom_themejavascript_shared();
  // Dashicons for logged-in Admins, for use in admin bar
  if(current_user_can('administrator')){ wp_enqueue_style( 'dashicons' );  }

} add_action('wp_enqueue_scripts', 'custom_themejavascript_frontend');



// Add Custom Backend javascript
function custom_themejavascript_backend($hook) {
  
  // Shared Javascripts
  custom_themejavascript_shared();

} add_action('admin_enqueue_scripts', 'custom_themejavascript_backend');

