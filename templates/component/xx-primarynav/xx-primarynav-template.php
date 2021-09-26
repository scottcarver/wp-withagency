<?php
function componentTemplateFunction($slug, $activate){
    // Files are structured like: xx-slug/xx-slug
    $componentString = THEME_PREFIX.'-'.$slug .'/'. THEME_PREFIX.'-'.$slug;
    $cssPathPrefix = '../../component/';
    // These Files Will Be Created
    $newfiles = array(
        array(
            'template'=>'component/xx-primarynav/xx-primarynav.js.mustache',
            'output'=> $componentString.'.js'        ),
        array(
            'template'=>'component/xx-primarynav/xx-primarynav.scss.mustache',
            'output'=> $componentString.'.scss',
        ),
        array(
            'template'=>'component/xx-primarynav/xx-primarynav.php.mustache',
            'output'=> $componentString.'.php',
        )
    );

    // These Files will be Updated
    $updatedfiles = array(
        array(
            'target' => '/gulpfile.js/javascript_combined.json', 
            'additions' => "library/component/".$componentString .".js", // Commented out initially
        ),
        array(
            'target' => '/library/style/custom/_custom_style.scss',
            'additions' => "/* Component Name */\r\n@import \"" .$cssPathPrefix.$componentString.".scss\";", // Doublequotes allow special vals
        )
    );

    // Package up The New/Updated changes
    $componentfiles =  new stdClass();
    $componentfiles->newfiles = $newfiles;
    $componentfiles->updatedfiles = $updatedfiles;
    // Return everything
    return $componentfiles;
}

