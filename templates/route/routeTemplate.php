<?php
function themeTemplate(){
    return array(
        // Theme Files
        array(
            'template'=>'route/config/route.php.mustache',
            'output'=> '/index.php',
        ),
        array(
            'template'=>'theme/config/style.css.mustache',
            'output'=> '/style.css',
        ),
        
    );
}