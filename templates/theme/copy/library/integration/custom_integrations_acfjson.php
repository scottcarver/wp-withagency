<?php
// Learn about this technique
// https://www.advancedcustomfields.com/resources/local-json/


// Modify Save Path
function custom_integrations_acfjsonsavepath( $path ) {
    // update path
    $path = get_template_directory() . '/library/fields';
    // return
    return $path;
}

add_filter('acf/settings/save_json', 'custom_integrations_acfjsonsavepath');


// Modify Load Path
function custom_integrations_acfjsonloadpath( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_template_directory() . '/library/fields';
    // return
    return $paths;
}

add_filter('acf/settings/load_json', 'custom_integrations_acfjsonloadpath');