<?php
// my-plugin.php
 
function my_plugin_block_categories( $categories, $post ) {
    if ( $post->post_type !== 'post' ) {
        return $categories;
    }
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'my-category',
                'title' => __( 'My category', 'my-plugin' ),
                'icon'  => 'wordpress',
            ),
        )
    );
}
add_filter( 'block_categories', 'my_plugin_block_categories', 10, 2 );

