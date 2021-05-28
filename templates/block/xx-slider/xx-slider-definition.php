<?php
add_action('acf/init', 'register_custom_carouselgrid');
function register_custom_carouselgrid() {

   if(function_exists('acf_register_block_type')) {
      acf_register_block_type(array(
         'name' => '{{prefix}}-carousel-grid',
         'title' => __('Grid Carousel'),
         'description' => __('Carousel with a Grid of Thumbnail Links'),
         'render_template' => 'library/blocks/{{prefix}}-carousel-grid/{{prefix}}-carousel-grid.php',
         // 'enqueue_style' => get_template_directory_uri() . '/library/blocks/story/' . 'story.css', // Instead, enque style.css to admin
         // 'enqueue_script' => get_template_directory_uri() . '/library/blocks/ol-carousel-grid/ol-carousel-grid.js',
         'enqueue_assets' => function(){
            // Carousel Scripts
            vendor_carouselscripts();
            // Carousel Implementation
            wp_enqueue_script('{{prefix}}-carousel-grid', get_template_directory_uri().'/library/blocks/{{prefix}}-carousel-grid/{{prefix}}-carousel-grid.js', array('jquery'),'0.1.0', true );  
         },  
         'category' => 'layout',
         'icon' => 'align-center',
         'keywords' => array('games', 'grid', 'slider', 'carousel'),
         'supports'	=> array(
            'align'		=> false,
         )
      ));
   }
}

