<?php
function componentTemplateFunction($slug, $name, $activate, $blockify, $componentUpdatePaths){
    
    // Updated Files Array
    $updatedfiles = array();
    // Pathslug
    $pathslug = $blockify ? 'block' : 'component';

    // These Files Will Be Created
    $newfiles = array(
        array(
            'template'=>'component/xx-generic/xx-generic.scss.mustache',
            'output'=> $componentUpdatePaths->scssString.'.scss',
        ),
        array(
            'template'=>'component/xx-generic/xx-generic.php.mustache',
            'output'=> $componentUpdatePaths->componentString.'.php',
        )
    );

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

        // If it's a Block
        if($blockify){
            // File to add
            $newBlockDef = array(
                'template'=>'component/xx-generic/xx-generic-definition.php.mustache',
                'output'=> $componentUpdatePaths->componentString.'-definition.php',
            );
            $newBlockJS = array(
                'template'=>'component/xx-generic/xx-generic-blockscript.js.mustache',
                'output'=> $componentUpdatePaths->componentString.'.js'        
            );
            // Update PHP file to include the new component
            $newBlockUpdate = array(
                'target' => $componentUpdatePaths->phpWritePath,
                'additions' => "require_once(locate_template('/library/block/".THEME_PREFIX."-".$slug."/lmp-".$slug."-definition.php'));"
            );
            // Add another array entry for the block template
            array_push($newfiles, $newBlockDef, $newBlockJS);
            // Add another array entry for the block template
            array_push($updatedfiles, $newBlockUpdate);
        } else {
            // File to add
            $newComponentFile = array(
                'template'=>'component/xx-generic/xx-generic-componentscript.js.mustache',
                'output'=> $componentUpdatePaths->componentString.'.js'        
            );
            // Update PHP file to include the new component
            $newComponentUpdate = array(
                'target' => $componentUpdatePaths->phpWritePath,
                'additions' => "<?php include('library/".$pathslug."/".THEME_PREFIX."-".$slug."/lmp-".$slug.".php'); ?>", // Doublequotes allow special vals
            );
            // Add another array entry for the block template
            array_push($newfiles, $newComponentFile);
             // Add another array entry for the block template
             array_push($updatedfiles, $newComponentUpdate);
        }
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