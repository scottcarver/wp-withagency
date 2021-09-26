<?php
function componentTemplateFunction($slug, $activate, $componentUpdatePaths){
    
    // These Files Will Be Created
    $newfiles = array(
        array(
            'template'=>'component/xx-generic/xx-generic.js.mustache',
            'output'=> $componentUpdatePaths->componentString.'.js'        ),
        array(
            'template'=>'component/xx-generic/xx-generic.scss.mustache',
            'output'=> $componentUpdatePaths->scssString.'.scss',
        ),
        array(
            'template'=>'component/xx-generic/xx-generic.php.mustache',
            'output'=> $componentUpdatePaths->componentString.'.php',
        )
    );

    // Updated Files Array
    $updatedfiles = array();

    // If allowed, add these files
    if($activate){ 
        $updatedfiles = array(
            // Update Gulp file to include the new JS
            array(
                'target' => $componentUpdatePaths->gulpjsPath, 
                'additions' => $componentUpdatePaths->gulpjsAddition,
            ),
            // Update SCSS file to include the new component
            array(
                'target' => $componentUpdatePaths->scssWritePath,
                'additions' => "@import \"" .$componentUpdatePaths->cssPathPrefix.$componentUpdatePaths->componentString.".scss\";", // Doublequotes allow special vals
            )
        );
    }

    // Package up The New/Updated changes
    $componentfiles =  new stdClass();
    $componentfiles->newfiles = $newfiles;
    $componentfiles->updatedfiles = $updatedfiles;

    // Return everything
    return $componentfiles;
}



// 'componentString' =>  THEME_PREFIX.'-'.$slug .'/'. THEME_PREFIX.'-'.$slug,
// 'scssString' => THEME_PREFIX.'-'.$slug .'/_'. THEME_PREFIX.'-'.$slug,
// 'jsPath' => $activate ? 'javascript_combined.json' : 'javascript_inactive.json ',
// 'cssComment' => $activate ? '' : '// ';