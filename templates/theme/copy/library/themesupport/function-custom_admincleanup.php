<?php
// Edit Primary Nav Items
function custom_admincleanup_removenavitems( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'customize' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'updates' );
}
add_action( 'admin_bar_menu', 'custom_admincleanup_removenavitems', 999 );

// Edit Subnav Items
function custom_admincleanup_removesubnavitems() {
    global $submenu; 
    unset($submenu['edit-comments.php']); // Comments
    unset($submenu['themes.php'][6]); // Customize
    unset($submenu['themes.php'][11]); // Theme Editor
    unset($submenu['edit.php'][16]); // Post tags
}
add_action('admin_init', 'custom_admincleanup_removesubnavitems', 999);