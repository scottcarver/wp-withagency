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
            'template'=>'block/xx-generic/xx-generic-definition.php.mustache',
            'output'=> $componentString.'-definition.php',
        ),
        array(
            'template'=>'block/xx-generic/xx-generic-blockscript.js.mustache',
            'output'=> $componentString.'.js'        
        )
    );
    // These Files Will be Updated
    $updatedfiles = array(
        // array(
        //     'target' => '/gulpfile.js/javascript_copied.json', 
        //     'additions' => 'library/block/'. $componentString .'.js',
        // ),
        array(
            'target' => '/library/style/custom/_custom_blocks.scss',
            'additions' => "@import \"../../block/".$componentString.".scss\";", // Doublequotes allow special vals
        ),
        array(
            'target' => '/library/function/custom/custom_blocks.php',
            'additions' => "require_once(locate_template('/library/block/".$componentString."-definition.php'));"
        )
    );
    // Return New and Updated
    return (object)[
        'newfiles' => $newfiles,
        'updatedfiles' => $activate ? $updatedfiles : array(),
    ];
}