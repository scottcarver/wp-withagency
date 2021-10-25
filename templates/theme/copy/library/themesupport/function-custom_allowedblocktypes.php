<?php 
// Define the Allowed Block Types 
function custom_allowedblocktypes( $allowed_blocks ) {
	return array(
                // Core
                'core/paragraph',
                'core/heading',
                // 'core/freeform',
                // Common (alphabetical)
                'acf/xx-carousel',
	);
}
add_filter( 'allowed_block_types_all', 'custom_allowedblocktypes' );