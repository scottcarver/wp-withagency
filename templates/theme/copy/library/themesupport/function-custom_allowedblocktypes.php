<?php 
add_filter( 'allowed_block_types', 'custom_allowed_blocktypes' );
 
function custom_allowed_blocktypes( $allowed_blocks ) {
        
        custom_themedebug($allowed_blocks);

	return array(
        // Core
        'core/block',
        'core/group',
        'core/freeform',
        // Common (alphabetical)
        'acf/xx-carousel',
	);
}

// NEEDS RENAMING
// ol-carousel -> ol-carousel-cards
// ol-header -> ol-header-simple
// MAYBE RENAME
// ol-jackpot-quickview -> ol-gamedata-jackpots
// ol-jackpot-quickview-short -> ol-gamedata-jackpots-big4