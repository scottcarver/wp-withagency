<?php

// Enable Menu Support
if(function_exists('add_theme_support')){ 
    add_theme_support( 'menus' ); 
} 

// Register Nav Menus
if(function_exists('register_nav_menus')){ 
    register_nav_menus(array( 
        'nav-primary' => __( 'Primary Menu'),
        'nav-footer' => __( 'Footer Menu'),
    ));
}	