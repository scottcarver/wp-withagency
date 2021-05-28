<?php
/* From https://www.billerickson.net/custom-logo-on-the-wordpress-login/ */

/* Make URL point to homepage, not Wordpress.org */
function custom_header_url( $url ) {
    return esc_url( home_url() );
}
add_filter( 'login_headerurl', 'custom_header_url' );
add_filter( 'login_headertext', '__return_empty_string' );


/* Modify Login Logo to reflect client */
function custom_login_logo() {

	$logo_path = '/library/img/logo/logo-lottery-color.svg';
    
    if( ! file_exists( get_stylesheet_directory() . $logo_path ) )
		return;

	$logo = get_stylesheet_directory_uri() . $logo_path;
    ?>
    <style type="text/css">
    .login h1 a {
        background-image: url(<?php echo $logo;?>);
        background-size: contain;
        background-repeat: no-repeat;
		background-position: center center;
        display: block;
        overflow: hidden;
        text-indent: -9999em;
        width: 220px;
        height: 70px;
    }
    </style>
    <?php
}
add_action( 'login_head', 'custom_login_logo' );