<?php
// Customize The Login Logo, and styles as needed
function custom_loginlogo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/library/image/logo/logo-login.png);
            height:140px;
            width:140px;
            background-size: 140px 140px;
            background-repeat: no-repeat;
        }
        html body{
            background:linear-gradient(#fff, #ccc);
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_loginlogo' );


/* Make URL point to homepage, not Wordpress.org */
function custom_loginurl( $url ) {
    return esc_url( home_url() );
}
add_filter( 'login_headerurl', 'custom_loginurl' );
add_filter( 'login_headertext', '__return_empty_string' );
