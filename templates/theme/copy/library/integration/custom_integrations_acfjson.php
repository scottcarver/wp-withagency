<?php

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {

    // custom_themedebug($path);
    
    // update path
    // previously this was get_stylesheet_directory() . '/acf-json'
    $path = get_template_directory() . '/library/fields';
    
    // return
    return $path;
    
}
 

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_template_directory() . '/library/fields';
    
    
    // return
    return $paths;
    
}