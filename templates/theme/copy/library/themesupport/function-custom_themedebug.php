<?php 
/* when WP_DEBUG and WP_DEBUG_LOG are enabled, we can write custom log messages by passing stuff to custom_themedebug($stuff); */
if (!function_exists('custom_themedebug')) {

    function custom_themedebug($log) {
        if (true === WP_DEBUG && true === WP_DEBUG_LOG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}

if (!function_exists('prevardump')) {

    // Dump variables wrapped in a pre tag
    function prevardump($anything){
        echo('<pre>');
        var_dump($anything);
        echo('</pre>');
    }

}



function stripSpacesLinesReturns($markup = ''){
    return preg_replace( "/\s+\s|\r|\n/", "",$markup);
  }