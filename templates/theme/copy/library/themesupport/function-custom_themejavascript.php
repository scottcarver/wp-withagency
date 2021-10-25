<?php

// Scripts that appear on both Frontend & Backend
function custom_themejavascript_shared(){
  // JS path
  $jspath = get_template_directory().'/application.js';
   // Parsley
  wp_enqueue_script('parsley', get_template_directory_uri().'/library/script/vendor/parsley.js', array('jquery'),'', true );
  
  // Cookies on every page
  wp_enqueue_script( 'js-cookie', get_template_directory_uri() . '/library/script/vendor/js.cookie.min.js', array('jquery'), '', true );

  // Main CSS (components combined)
  wp_enqueue_script('main', get_template_directory_uri().$jspath, array('jquery'), '', true );

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

