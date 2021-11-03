<?php
function componentTemplateFunction($componentString, $activate){
    
    // These Files Will Be Created
    $newfiles = array(
        array(
            'template'=>'block/xx-generic/xx-generic.scss.mustache',
            'output'=> $componentString.'.scss',
        ),
        array(
            'template'=>'block/xx-generic/xx-generic.php.mustache',
            'output'=> $componentString.'.php',
        ),
        array(
            'template'=>'block/xx-generic/xx-generic-componentscript.js.mustache',
            'output'=> $componentString.'.js'        
        )
    );

    $updatedfiles = array(
        // Update Gulp file to include the new JS
        array(
            'target' => '/gulpfile.js/javascript_combined.json',
            'additions' => 'library/component/'. $componentString .'.js',
        ),
        array(
            'target' => '/library/style/custom/_custom_components.scss',
            'additions' => "@import \"../../component/".$componentString.".scss\";", // Doublequotes allow special vals
        ),
        array(
            'target' => '/header.php',
            'additions' => "<?php include('library/component/".$componentString.".php'); ?>"
        )
    );

     // Package up The New/Updated changes
     return (object)[
        'newfiles' => $newfiles,
        'updatedfiles' => $activate ? $updatedfiles : array(),
    ];
    
}



// 'componentString' =>  THEME_PREFIX.'-'.$slug .'/'. THEME_PREFIX.'-'.$slug,
// 'scssString' => THEME_PREFIX.'-'.$slug .'/_'. THEME_PREFIX.'-'.$slug,
// 'jsPath' => $activate ? 'javascript_combined.json' : 'javascript_inactive.json ',
// 'cssComment' => $activate ? '' : '// ';