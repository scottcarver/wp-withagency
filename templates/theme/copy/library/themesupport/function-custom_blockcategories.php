<?php
// Add Custom Block Categories
function custom_blockcategories( $categories, $post ) {
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
add_filter( 'block_categories', 'custom_blockcategories', 10, 2 );