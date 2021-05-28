<?php
function custom_bodyclass(){

    // Custom Vars
    $classes = get_body_class();
    $markup = 'ol-page ';

    // Loop over classes, modifying them to have "ol-page--[slug]"
    foreach($classes as $class){
        $markup .= 'ol-page--' . $class . ' ';
    }
    
    // Chop the very last space, for compulsion
    $markup = substr($markup, 0, -1);;

    echo 'class="'.$markup.'"';
}


