<?php
function componentTemplateFunction($slug, $activate){
    // Files are structured like: xx-slug/xx-slug
    $componentString = THEME_PREFIX.'-'.$slug .'/'. THEME_PREFIX.'-'.$slug;
    $scssString = THEME_PREFIX.'-'.$slug .'/_'. THEME_PREFIX.'-'.$slug;
    $jsComment = $activate ? '' : '// ';
    $cssComment = $activate ? '' : '// ';
    $cssPathPrefix = '../../component/';
    // These Files Will Be Created
    $newfiles = array(
        array(
            'template'=>'component/xx-generic/xx-generic.js.mustache',
            'output'=> $componentString.'.js'        ),
        array(
            'template'=>'component/xx-generic/xx-generic.scss.mustache',
            'output'=> $scssString.'.scss',
        ),
        array(
            'template'=>'component/xx-generic/xx-generic.php.mustache',
            'output'=> $componentString.'.php',
        )
    );

    // These Files will be Updated
    $updatedfiles = array(
        array(
            'target' => '/gulpfile.js/javascript_combined.json', 
            'additions' => "library/component/".$jsComment.$componentString .".js", // Commented out initially
        ),
        array(
            'target' => '/library/style/custom/_custom_components.scss',
            'additions' => $cssComment."@import \"" .$cssPathPrefix.$componentString.".scss\";", // Doublequotes allow special vals
        )
    );

    // Package up The New/Updated changes
    $componentfiles =  new stdClass();
    $componentfiles->newfiles = $newfiles;
    $componentfiles->updatedfiles = $updatedfiles;
    // Return everything
    return $componentfiles;
}

