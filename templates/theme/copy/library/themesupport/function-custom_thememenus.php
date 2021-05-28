<?php
/* --------------------------------------------------------------	
			MENU SYSTEM - enable WordPress menus, register some
	---------------------------------------------------------------- */

// enable menus
if ( function_exists( 'add_theme_support' ) ) { add_theme_support( 'menus' ); } 

// register menus
if ( function_exists( 'register_nav_menus' ) ){ 

    register_nav_menus(array( 
        'nav-primary' => __( 'Primary Menu'),
        // 'nav-about' => __( 'About Menu'),
        'nav-footer' => __( 'Footer Menu'),
    ));
    
}	
?>