<?php
add_action( 'admin_bar_menu', 'remove_adminbar_items', 999 );

function remove_adminbar_items( $wp_admin_bar ) {
    // echo("<pre>");
    // var_dump($wp_admin_bar);
    // echo("</pre>");
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'customize' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'updates' );
}





add_action('admin_init', 'remove_theme_menus', 999);
function remove_theme_menus() {
    // echo("<pre>");
    // var_dump($submenu);
    // echo("</pre>");

    // Menus
    //remove_menu_page('edit-comments.php');

    // Submenus
    global $submenu; 
    
    unset($submenu['edit-comments.php']); // Comments
    unset($submenu['themes.php'][6]); // Customize
    unset($submenu['themes.php'][11]); // Theme Editor
    unset($submenu['edit.php'][16]); // Post tags


}
