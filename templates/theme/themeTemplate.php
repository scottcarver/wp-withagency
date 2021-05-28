<?php
function themeTemplate(){
    return array(
        // Theme Files
        array(
            'template'=>'theme/config/index.php.mustache',
            'output'=> '/index.php',
        ),
        array(
            'template'=>'theme/config/style.css.mustache',
            'output'=> '/style.css',
        ),
        array(
            'template'=>'theme/config/header.php.mustache',
            'output'=> '/header.php',
        ),
        array(
            'template'=>'theme/config/footer.php.mustache',
            'output'=> '/footer.php',
        ),
        array(
            'template'=>'theme/config/custom_constants.php.mustache',
            'output'=> '/library/function/custom/custom_constants.php',
        ),
        array(
            'template'=>'theme/config/README.md.mustache',
            'output'=> '/README.md',
        ),
        // Templates/Pages
        array(
            'template'=>'theme/config/page-home.php.mustache',
            'output'=> '/templates/page-home.php',
        ),
        // SCSS Config
        // array(
        //     'template'=>'theme/config/custom_style.scss.mustache',
        //     'output'=> '/library/style/custom/_custom_style.scss',
        // ),
        array(
            'template'=>'theme/config/custom_themedefinition.scss.mustache',
            'output'=> '/library/style/custom/_custom_themedefinition.scss',
        ),
        // Developer Tools
            array(
            'template'=>'theme/config/package.json.mustache',
            'output'=> '/package.json',
        ),
        array(
            'template'=>'theme/config/gulpfile.js.mustache',
            'output'=> '/gulpfile.js/index.js',
        ),
        /* 
        array(
            'template'=>'theme/config/wp-cli.yml.mustache',
            'output'=> '/wp-cli.yml',
        ) */
    );
}