<?php

/**
 * @package wpwithagency
 * @version 0.0.1
 */
/*
Plugin Name: WP With Agency
Plugin URI: https://wp-withagency.netlify.app/
Description: This plugin enables an new function in WP CLI. When activated, run "wp withagency" and it's subcommands to scaffold feeds, posttypes and components. Also includes the /docs/ for WP methodologies With Agency.
Author: Agency Dev Team
Version: 0.0.1
Author URI: https://wp-withagency.netlify.app/
Text Domain: wpwithagency
*/

if (defined('WP_CLI') && WP_CLI)
{

  
    /**
     * A set of opinionated generators for building themes With Agency
     * 
    */
    class WithAgencyPluginWPCLI
    {
        

        /**
        * Generates starter code for a Block.
        *
        * A collection of files will be copied and configured when you create your block
        * 
        * ## OPTIONS
        *
        * [--slug=<slug>]
        * : This string of text will be used to create the directory in which your block is stored. It can only include lowercase text and dashes A good pattern for client Acme|Betamax is "acme|betamax"
        * 
        * [--name=<name>]
        * : This string of text is will display when managing your block. A good pattern for client Acme|Betamax is "Acme 20xx|Betmax Agency"
        * 
        * [--startwith=<slug>]
        * : select an existing starter template
        * 
        * [--activate]
        * : This string of text will be used to create the directory in which your block is stored. It can only include lowercase text and dashes A good pattern for client Acme|Betamax is "acme|betamax"
        * 
        */
        public function block($args, $assoc_args)
        {
            // Hardcode the --blockify flag
            $assoc_args['blockify'] = 1;
            // Call Component command
            WithAgencyPluginWPCLI::component($args, $assoc_args);
        }



        public function badorp($args, $assoc_args)
        {
            // Call Component command
            WithAgencyPluginWPCLI::nice_message('Badorp', 'green');
        }
        

        /**
         * Generates starter code for a Component.
         *
         * A collection of files will be copied and configured when you create your component
         * 
         * ## OPTIONS
         *
         * [--slug=<slug>]
         * : This string of text will be used to create the directory in which your component is stored. It can only include lowercase text and dashes A good pattern for client Acme|Betamax is "acme|betamax"
         * 
         * [--name=<name>]
         * : This string of text is will display when managing your component. A good pattern for client Acme|Betamax is "Acme 20xx|Betmax Agency"
         * 
         * [--startwith=<slug>]
         * : select an existing starter template
         * 
         * [--activate]
         * : This string of text will be used to create the directory in which your component is stored. It can only include lowercase text and dashes A good pattern for client Acme|Betamax is "acme|betamax"
         * 
         * [--blockify]
         * : Add's an ACF definition and places the code inside /block/ rather than /component/
         * 
         * ## EXAMPLES
         *     Prompt for inputs
         *     $ wp withagency component --prompt
         * 
         *     Create a component with known inputs
         *     $ wp withagency component --prefix=ax --domain=acme-site --name=Acme --slug=acme
         * 
         *     Create a component and Activate it
         *     $ wp withagency component --prefix=ax --domain=client-site --name=Acme --slug=acme --activate
        */
        public function component($args, $assoc_args){   
            
            // Slug
            $slug = WP_CLI\Utils\get_flag_value($assoc_args, 'slug');
            $name = WP_CLI\Utils\get_flag_value($assoc_args, 'name');
            $startwith = WP_CLI\Utils\get_flag_value($assoc_args, 'startwith');
            $activate = WP_CLI\Utils\get_flag_value($assoc_args, 'activate', false);
            $blockify = WP_CLI\Utils\get_flag_value($assoc_args, 'blockify', false);
            $pathslug = $blockify ? 'block' : 'component';
            $starters = $blockify ? array(
                'generic' => 'Generic',
                // 'layout' => 'Layout Area',
                // 'primarynav' => 'Primary Nav',
                // 'footernav' => 'Footer Nav',
                // 'csscarousel' => 'CSS Carousel',
                // 'jscarousel' => 'JS Carousel',
            ) : array(
                'generic' => 'Generic',
            );
            $allUserArgs = isset($slug) && isset($name);
            $isAllowed = false;
            $startwithInArray = array_key_exists($startwith, $starters);

            // Unknown starter template error
            if(isset($startwith) && !$startwithInArray){
                WP_CLI::warning('That starter template does not exist, you will be prompted to select a valid starter.');
            }
            
            // Assign $selected to a statrter template if it exists
            $selected = (isset($startwith) && $startwithInArray) ? $startwith : false;

            // Nice Error: Missing Inputs
            if(!$allUserArgs){ 
                self::nice_error_needinputs('component');
            } else {
                if(!$selected){
                    
                    WP_CLI::line("\r\n" . "Select a Starter ".ucfirst($pathslug).":" );
                    $size = sizeof($starters);
                    $phrase = 'Enter a number 1-'.$size.', to proceed';
                    $selected = cli\menu($starters, null, $phrase);
                    // WP_CLI::line("starter was" . $selected);
                    // Determine whether Inputs are Good
                }
                $isAllowed = WithAgencyPluginWPCLI::is_slugworthy($slug) && WithAgencyPluginWPCLI::is_nameworthy($name) && $selected;
            }

            // If Is Allowed
            if($isAllowed && WithAgencyPluginWPCLI::is_constantable()){  
                
                // Url Base $blockify ? DEST_BLOCK_FOLDER : 
                $dest = $blockify ? get_template_directory() . DEST_BLOCK_FOLDER : get_template_directory() . DEST_COMPONENT_FOLDER ;
                $component = THEME_PREFIX . '-' . $slug;
                $componentDir = $dest.'/'.$component;

                // 2) Generate Configured Files
                $renderVars = array(
                    'prefix' => THEME_PREFIX,
                    'domain' => THEME_DOMAIN,
                    'name' => $name,
                    'slug' => $slug,
                );

                // 3) Dynamically Get the function componentTemplateFunction()
                $componentPath = 'templates/'.$pathslug.'/xx-'.$selected.'/xx-'.$selected.'-template.php';
                require_once($componentPath);
                // This pattern is used A LOT, so just use the variable
                $componentString = THEME_PREFIX.'-'.$slug .'/'. THEME_PREFIX.'-'.$slug;
                // Used For Both Components and Blocks
                $componentTemplateEntries = componentTemplateFunction($componentString, $activate);

                // 4) Create directory - first check for the directory
                // Components Dest Folder
                if(!is_dir($dest)){mkdir($dest);}
                // Component Directory
                if (is_dir($componentDir)) { WP_CLI::error('folder was created previously, co'.$pathslug.'mponent creation process failed'); }
                // Make Directory if it doesn't exist
                mkdir($componentDir);
                //Report Success
                WP_CLI::line(WP_CLI::colorize('%k%2 🎉 Successfully Created your new "'.$pathslug.'" "'.$slug.'" using the "'.$selected.'" template%n'));

                // 5) Generate Files
                foreach($componentTemplateEntries->newfiles as $entry){
                    // Dynamically write the in/out points
                    $renderVars['template'] = $entry['template'];
                    $renderVars['output'] = $dest . $entry['output'];
                    // Capture HTML
                    $html_rendered = self::nice_renderhtml($renderVars);
                    // Save to File
                    self::nice_rendertofile($html_rendered, $renderVars['output']);
                    // Report Success
                    WP_CLI::line(WP_CLI::colorize('%g- a new file was created at ' .$renderVars['output'].' %n'));
                   //  WP_CLI::line(WP_CLI::colorize('%g- the existing file ' . DEST_ENDPOINT_FOLDER . 'customs_endpoints.php was updated to reference this %n'));
                }
                
                // 6) Update Files
                foreach($componentTemplateEntries->updatedfiles as $entry){
                    if(file_exists(get_template_directory().$entry['target'])){
                        WithAgencyPluginWPCLI::nice_tailfile($entry['target'], $entry['additions']);
                        WP_CLI::line(WP_CLI::colorize('%g- an existing file at ' . $entry['target'].' was updated %n'));
                    } else {
                        WP_CLI::line('❌ The file '.$entry['target'].' does not exist and was not updated');
                    }
                }
               
            } else {
                WP_CLI::line('❌ The needed CONSTANTS, typically defined in custom_constants.php do not exist and the operation halted. The "retrofit" command may help you get past this.');
                WP_CLI::line(self::nice_documentationurl().'retrofit');
            }
        }

        /**
         * Generates files to create a Endpoint within the active theme
         *
         * The following files are always generated:
         *
         * * `/endpoint/endpoint_<slug>.php` is the main PHP plugin file.
         * * `custom_endpoints.php` will be tailed with an include to this 
         * 
         * [--slug=<slug>]
         * : A string to be used in the url, and endpoint name
         * 
         * ## EXAMPLES
         *
         *     $ wp withagency endpoint --slug=badoop
         *     Success: Created route file endpoint_badoop.php
         *     Success: Updated custom_endpoints.php file
         */
        public function endpoint($args, $assoc_args){
            // Routename from Prompt
            $slug = WP_CLI\Utils\get_flag_value($assoc_args, 'slug');
            $allUserArgs = isset($slug);

            // Needs More Input
            if(!$allUserArgs){ self::nice_error_needinputs('endpoint'); }
            
            // All User Args were present and Constants are Able
            if ($allUserArgs && WithAgencyPluginWPCLI::is_constantable()){
                // Variables passed to the Render Function
                $renderVars = array(
                    // Route File
                    'endpointfile' => array(
                        'slug' => $slug,
                        'template'=>'endpoint/config/endpoint.php.mustache',
                        'output'=> get_template_directory() . DEST_ENDPOINT_FOLDER . 'endpoint_'.$slug.'.php',
                        'namespace'=>THEME_DOMAIN,
                        'prefix'=>THEME_PREFIX
                    )
                );
                // Render Markup for New files
                $endpointfile_rendered = self::nice_renderhtml($renderVars['endpointfile']);
                // 1) Save Route File 2) Save Template File
                file_put_contents($renderVars['endpointfile']['output'], $endpointfile_rendered);
                // Add changes to Existing file
                $fileadditions = "/* ".$slug." */\r\n"."require_once(get_template_directory().'/library/endpoint/endpoint_".$slug.".php');";
                WithAgencyPluginWPCLI::nice_tailfile(DEST_ENDPOINT_FILE, $fileadditions);
                // Report Success
                WP_CLI::line();
                WP_CLI::line(WP_CLI::colorize('%k%2 🎉 Successfully Created your new endpoint "'.$slug.'"%n'));
                WP_CLI::line(WP_CLI::colorize('%g- a new file was created at ' . DEST_ENDPOINT_FOLDER . 'endpoint_'.$slug.'.php %n'));
                WP_CLI::line(WP_CLI::colorize('%g- the existing file ' . DEST_ENDPOINT_FOLDER . 'customs_endpoints.php was updated to reference this %n'));
                // Show link to Docs
                WP_CLI::line(WP_CLI::colorize('%g- your endpoint is *lightly configured* and may require modifications should you choose to capture one, or multiple inputs. %n'));
                WP_CLI::line(self::nice_documentationurl().'endpoint');
                WP_CLI::line();
            }
        }


         /**
         * Generates the files for a new posttype
         *
         * The following files are always generated:
         * * `/library/posttype/posttype_{{slug}}.php` contains the posttype definition
         * * /library/functions/custom/custom_posttypes.php will be updated to include this posttype
         *
         * ## OPTIONS
         *
         * [--slug=<slug>]
         * : a lowercase string without special characters (example: "event")
         *
         * [--single=<single>]
         * : a titlecase string without special characters (example: "Event")
         * 
         * [--plural=<plural>]
         * : a plural titlecase string without special characters (example: "Events")
         * 
         * ## EXAMPLES
         *     Prompt for Inputs
         *     $ wp withagency posttype --prompt
         * 
         *     Create using Known Values
         *     $ wp withagency posttype --slug=event --single=Event --plural=Events
         */

        public function posttype($args, $assoc_args)
        {
            // Passed Args
            $defaultValue = 'not set';
            $userSlug = WP_CLI\Utils\get_flag_value($assoc_args, 'slug', $defaultValue);
            $userLabelSingle = WP_CLI\Utils\get_flag_value($assoc_args, 'single', $defaultValue);
            $userLabelPlural = WP_CLI\Utils\get_flag_value($assoc_args, 'plural', $defaultValue);
            $allUserArgs = $userSlug != $defaultValue && $userLabelSingle != $defaultValue && $userLabelPlural != $defaultValue;
            
            // Needs More Input
            if(!$allUserArgs){ self::nice_error_needinputs('posttype'); }
            
            // All User Args were present and Constants are Able
            if ($allUserArgs && WithAgencyPluginWPCLI::is_constantable()){
                // Variables passed to the Render Function
                $renderVars = array(
                    'posttypeSlug' => $userSlug,
                    'posttypeLabelSingle' => $userLabelSingle,
                    'posttypeLabelPlural' => $userLabelPlural,
                    'template'=>'posttype/config/posttype_template.php.mustache',
                    'output'=> get_template_directory() . DEST_POSTTYPE_FOLDER . 'posttype_'.$userSlug.'.php',
                    'namespace'=>THEME_DOMAIN
                );
                // Render PHP to existing file
                $html_rendered = self::nice_renderhtml($renderVars);
                $fileadditions = "/* ".$userLabelSingle." */\r\n require_once(get_template_directory().'/library/posttype/posttype_".$userSlug.".php');";
                // Save File
                file_put_contents($renderVars['output'], $html_rendered);
                WithAgencyPluginWPCLI::nice_tailfile(DEST_POSTTYPE_FILE, $fileadditions);
                // Report Success
                WP_CLI::line(WP_CLI::colorize('%k%2 🎉 Successfully Created your new posttype "'.$userSlug.'"%n'));
                WP_CLI::line(WP_CLI::colorize('%g- a new file was created at ' . DEST_POSTTYPE_FOLDER . 'posttype_'.$userSlug.'.php%n'));
                WP_CLI::line(WP_CLI::colorize('%g- the existing file ' . DEST_POSTTYPE_FILE . ' was updated to reference posttype_'.$userSlug.'.php%n'));
                WP_CLI::line(WP_CLI::colorize('%g- the file is lightly configured. Please update the icon and labels if needed %n'));
            }
        }


     

          



        /**
         * Generates files to create a Route within the active theme
         *
         * The following files are always generated:
         *
         * * `/routes/routename.php` is the main PHP plugin file.
         * * `routes.php` will be tailed with an include to this 
         * 
         * [--slug=<slug>]
         * : What to put in the 'Plugin Name:' header.
         * 
         * [--format=<slug>]
         * : Choose a language from the options "xml|json|html"
         * 
         * ## EXAMPLES
         *
         *     $ wp withagency route --routename=badoop
         *     Success: Created route file route_badoop.php
         *     Success: Updated custom_routes.php file
         *     New URL: /badoop/aram1/param2/
         */
        public function route($args, $assoc_args){
            // Routename from Prompt
            $routename = WP_CLI\Utils\get_flag_value($assoc_args, 'slug');
            $format = WP_CLI\Utils\get_flag_value($assoc_args, 'format');
            // Slug and Format Are required
            $allUserArgs = isset($routename); //  && WithAgencyPluginWPCLI::is_slugworthy($format)
            // Valid inputs are required
            if(!$allUserArgs){ self::nice_error_needinputs('route'); }

            // Validate Format Type
            $formatList = array(
                'xml' => 'XML',
                'json' => 'JSON',
                'php' => 'PHP',
            );

            $formatInArray = isset($format) && array_key_exists($format, $formatList);
          //   $format = cli\menu($formatList, null, $format);

            /*
        
         * 
         * */

         /*
         if(!isset($format)){
            $phrase = 'Enter a number 1-'.$size.', to proceed';
            $selected = cli\menu($starters, null, $phrase);
         }
         */


            // // In Array
            // if(isset($format)){
            //     $formatInArray = array_key_exists($format, $formatList);
            // }
            

            // If not in array template error
            if(!$formatInArray){
                // WP_CLI::error('That starter template does not exist, you will be prompted to select a valid starter.');
                $format = cli\menu($formatList, null, $format);
            }

            // All User Args were present and Constants are Able
            if ($allUserArgs && WithAgencyPluginWPCLI::is_constantable()){
                // Variables passed to the Render Function
                $renderVars = array(
                    // Route File
                    'routefile' => array(
                        'routename' => $routename,
                        'template'=>'route/config/route.'.$format.'.mustache',
                        'output'=> get_template_directory() . DEST_ROUTE_FOLDER . 'route_'.$routename.'.php',
                        'namespace'=>THEME_DOMAIN
                    ),
                    // Route File Template
                    'templatefile' => array(
                        'routename' => $routename,
                        'template'=>'route/config/route_template.'.$format.'.mustache',
                        'output'=> get_template_directory() . DEST_ROUTE_FOLDER . 'route_'.$routename.'_template.php',
                        'namespace'=>THEME_DOMAIN
                    ),
                );
                // Render Markup for New files
                $routefilehtml_rendered = self::nice_renderhtml($renderVars['routefile']);
                $templatefilehtml_rendered = self::nice_renderhtml($renderVars['templatefile']);
                // 1) Save Route File 2) Save Template File
                file_put_contents($renderVars['routefile']['output'], $routefilehtml_rendered);
                file_put_contents($renderVars['templatefile']['output'], $templatefilehtml_rendered);
                // Add changes to Existing file
                $fileadditions = "/* ".$routename." */\r\n" . "require_once(get_template_directory().'/library/route/route_".$routename.".php');";
                WithAgencyPluginWPCLI::nice_tailfile(DEST_ROUTE_FILE, $fileadditions);
                // Report Success
                WP_CLI::line(WP_CLI::colorize('%k%2 🎉 Successfully Created your new route "'.$routename.'"%n'));
                WP_CLI::line(WP_CLI::colorize('%g- a new file was created at ' . DEST_ROUTE_FOLDER . 'route_'.$routename.'.php %n'));
                WP_CLI::line(WP_CLI::colorize('%g- it loads a template, which was also created: ' . DEST_ROUTE_FOLDER . 'route_'.$routename.'_template.php %n'));
                // Show link to Docs
                WP_CLI::line(WP_CLI::colorize('%g- your route is lightly configured and may require modifications %n'));
                WP_CLI::line(self::nice_documentationurl().'route');
            }
        }


        // Generates a file containing Constants

        /**
         * Generates starter code for a Theme.
         *
         * A collection of files will be copied and configured when you create your theme
         * 
         * ## OPTIONS
         *
         * [--slug=<slug>]
         * : This string of text will be used to create the directory in which your theme is stored. It can only include lowercase text and dashes A good pattern for client Acme|Betamax is "acme|betabax"
         * 
         * [--name=<name>]
         * : This string of text is will display when managing your theme. A good pattern for client Acme|Betamax is "Acme 20xx|Betamax Agency"
         * 
         * [--prefix=<prefix>]
         * : This short lowercase text string should be between 2 and 5 characters for use in BEM Components.  Two Examples: 1) Acme->"acme"  1) Betamax->"px"
         *
         * [--domain=<domain>]
         * : This string of text will be used for translation/internationalization. It can only include lowercase text and dashes. By convention includes two words and one dash. A good pattern for client Acme|Betamax is "acme-site|betamax-agency"
         * 
         * ## EXAMPLES
         *     Prompt for inputs
         *     $ wp withagency retrofit --prompt
         * 
         *     Create a theme with known inputs
         *     $ wp withagency retrofit --prefix=ax --domain=acme-site --name=Acme --slug=acme
         * 
         *     Create a theme and Activate it
         *     $ wp withagency retrofit --prefix=ax --domain=acme-site --name=Acme --slug=acme --activate
         */

        public function retrofit($args, $assoc_args){
            $prefix = WP_CLI\Utils\get_flag_value($assoc_args, 'prefix');
            $slug = WP_CLI\Utils\get_flag_value($assoc_args, 'slug');
            $name = WP_CLI\Utils\get_flag_value($assoc_args, 'name');
            $domain = WP_CLI\Utils\get_flag_value($assoc_args, 'domain');
            // $filename = WP_CLI\Utils\get_flag_value($assoc_args, 'filename');
            $allUserArgs = isset($prefix) && isset($domain) && isset($name) && isset($slug); //  && isset($filename)
            $constantsPath = get_template_directory().'/custom_constants.php';
            // Needs More Input
            if(!$allUserArgs){ self::nice_error_needinputs('theme'); }
            // The file exists already
            if(file_exists($constantsPath)){
                WP_CLI::warning('The file custom_constants.php already exists, the command was halted');
                return false;
            }
            // If Is Allowed
            // WithAgencyPluginWPCLI::is_allowed($prefix, $domain, $name, $slug)
            if($allUserArgs){  
                // 2) Generate Configured Files
                $renderVars = array(
                    'prefix' => $prefix,
                    'domain' => $domain,
                    'name' => $name,
                    'slug' => $slug,
                );
                // 3) Get Template List
                require_once('templates/theme/retrofitTemplate.php');
                $retrofitTemplateEntries = retrofitTemplate();
                $dest = get_template_directory();

                // 4) Process each of them
                foreach($retrofitTemplateEntries as $entry){
                    // Dynamically write the in/out points
                    $renderVars['template'] = $entry['template'];
                    $renderVars['output'] = $dest . $entry['output'];
                    // Capture HTML
                    $html = self::nice_renderhtml($renderVars);
                     // Save to File
                    // file_put_contents($renderVars['output'], $html);

                    self::nice_rendertofile($html, $renderVars['output']);
                 
                }

                // Text to be added to functions.php
                $fileadditions = "/* added by cli */\r\n require_once(get_template_directory().'/custom_constants.php');";
                // Tail the functions File
                WithAgencyPluginWPCLI::nice_tailfile('/functions.php', $fileadditions);

                // Report Success
                WP_CLI::line(WP_CLI::colorize('%k%2 🎉 Successfully Created New Constants! %n'));
                WP_CLI::line(WP_CLI::colorize('%g- a new file was created /custom_constants.php %n'));
                WP_CLI::line(WP_CLI::colorize('%g- functions.php was updated to reference that file %n'));
                WP_CLI::line(WP_CLI::colorize('%g- Configuring custom_constants.php for your unique theme architecture may be useful %n'));
                // Show link to Docs
                WP_CLI::line(self::nice_documentationurl().'retrofit');
            }
        }

        
        
        
        /**
         * Generates the files for a new taxonomy
         *
         * The following files are always generated:
         * * `/library/posttype/posttype_{{slug}}.php` contains the posttype definition
         * * /library/functions/custom/custom_posttypes.php will be updated to include this posttype
         *
         * ## OPTIONS
         *
         * [--slug=<slug>]
         * : a lowercase string without special characters (example: "event")
         *
         * [--single=<single>]
         * : a titlecase string without special characters (example: "Event")
         * 
         * [--plural=<plural>]
         * : a plural titlecase string without special characters (example: "Events")
         * 
         * ## EXAMPLES
         *     Prompt for Inputs
         *     $ wp withagency posttype --prompt
         *     Create using Known Values
         *     $ wp withagency posttype --slug=event --single=Event --plural=Events
         */

        public function taxonomy($args, $assoc_args){
            // Passed Args
            $userSlug = WP_CLI\Utils\get_flag_value($assoc_args, 'slug');
            $userLabelSingle = WP_CLI\Utils\get_flag_value($assoc_args, 'single');
            $userLabelPlural = WP_CLI\Utils\get_flag_value($assoc_args, 'plural');
            $allUserArgs = isset($userSlug) && isset($userLabelSingle) && isset($userLabelPlural);
            
            // Needs More Input
            if(!$allUserArgs){ self::nice_error_needinputs('taxonomy'); }

            // All User Args were present and Constants are Able
            if ($allUserArgs && WithAgencyPluginWPCLI::is_constantable()){

                // Generate any validation errors
                $checkUserArgs = WithAgencyPluginWPCLI::is_slugworthy($userSlug) && WithAgencyPluginWPCLI::is_nameworthy($userLabelSingle, 'single') && WithAgencyPluginWPCLI::is_nameworthy($userLabelPlural, 'plural');
                
                // Variables passed to the Render Function
                $renderVars = array(
                    'taxonomySlug' => $userSlug,
                    'taxonomyLabelSingle' => $userLabelSingle, // renaming here is bad
                    'taxonomyLabelPlural' => $userLabelPlural,
                    'template'=>'taxonomy/config/taxonomy_template.php.mustache',
                    'output'=> get_template_directory() . DEST_TAXONOMY_FOLDER . 'taxonomy_'.$userSlug.'.php',
                    'domain'=>THEME_DOMAIN // called "Namespace" elsewhere?
                ); 

                // Render PHP to existing file
                $html_rendered = self::nice_renderhtml($renderVars);
                $fileadditions = "/* ".$userLabelSingle." */\r\n require_once(get_template_directory().'/library/taxonomy/taxonomy_".$userSlug.".php');";
                
                // Save File
                file_put_contents($renderVars['output'], $html_rendered);
                WithAgencyPluginWPCLI::nice_tailfile(DEST_TAXONOMY_FILE, $fileadditions);
                // Report Success
                WP_CLI::line(WP_CLI::colorize('%k%2 🎉 Successfully Created your new taxonomy "'.$userSlug.'"%n'));
                WP_CLI::line(WP_CLI::colorize('%g- a new file was created at ' . DEST_TAXONOMY_FOLDER . 'taxonomy_'.$userSlug.'.php.%n'));
                WP_CLI::line(WP_CLI::colorize('%g- the existing file ' . DEST_TAXONOMY_FILE . ' was updated to reference taxonomy_'.$userSlug.'.php%n'));
                WP_CLI::line(WP_CLI::colorize('%g- by default Post|Page are targeted. Change this file to match your Posttypes. %n'));
                WP_CLI::line(self::nice_documentationurl().'taxonomy');
                
            }
        }


        /**
         * Generates a Template for post|page|posttypes
         *
         * The following files are always generated:
         *
         * * `/templates/page-templatename.php` is the main PHP plugin file.
         * * WordPress loads templates automatically, and they'll be selectable by posttype
         * 
         * [--slug=<slug>]
         * : What to put in the 'page-slug.php' filename.
         * 
         * [--title=<title>]
         * : What to put in the 'Template Name: XXX' header.
         * 
         * ## EXAMPLES
         *
         *     $ wp withagency template --title="Quarterly Report" --slug=quarterly
         *     Success: created /templates/page-quarterly.php
         */
        public function template($args, $assoc_args){
            // Inputs from from Prompt
            $title = WP_CLI\Utils\get_flag_value($assoc_args, 'title');
            $slug = WP_CLI\Utils\get_flag_value($assoc_args, 'slug');
            $allUserArgs = isset($title) && isset($slug);
            
             // Needs More Input
             if(!$allUserArgs){ self::nice_error_needinputs('template'); }

            // All User Args were present and Constants are Able
            if($allUserArgs  && WithAgencyPluginWPCLI::is_constantable()){
                // Generate Validation Errors
                $checkUserArgs = WithAgencyPluginWPCLI::is_slugworthy($slug) && WithAgencyPluginWPCLI::is_nameworthy($title);
                // Variables passed to the Render Function
                $renderVars = array(
                    'template'=>'template/config/posttype-template.php.mustache',
                    'output'=> get_template_directory() . DEST_TEMPLATE_FOLDER . 'page-'.$slug.'.php',
                    'prefix'=>THEME_PREFIX,
                    'title'=>$title
                    );
                // Render Markup for New files
                $templatefile_rendered = self::nice_renderhtml($renderVars);
                // 1) Save Route File 2) Save Template File
                file_put_contents($renderVars['output'], $templatefile_rendered);
                // Add changes to Existing file

                // Report Success
                WP_CLI::line(WP_CLI::colorize('%k%2 🎉 Successfully created your new template "'.$slug.'"%n'));
                WP_CLI::line('- a new file was created in the Active Theme at ' . DEST_TEMPLATE_FOLDER . 'page-'.$slug.'.php and is now available to use');
            }

        }

   
        /**
         * Generates starter code for a Theme.
         *
         * A collection of files will be copied and configured when you create your theme
         * 
         * ## OPTIONS
         *
         * [--slug=<slug>]
         * : This string of text will be used to create the directory in which your theme is stored. It can only include lowercase text and dashes A good pattern for client Acme|Betamax is "acme|betabax"
         * 
         * [--name=<name>]
         * : This string of text is will display when managing your theme. A good pattern for client Acme|Betamax is "Acme 20xx|Betamax Agency"
         * 
         * [--prefix=<prefix>]
         * : This short lowercase text string should be between 2 and 5 characters for use in BEM Components.  Two Examples: 1) Acme->"acme"  1) Betamax->"px"
         *
         * [--domain=<domain>]
         * : This string of text will be used for translation/internationalization. It can only include lowercase text and dashes. By convention includes two words and one dash. A good pattern for client Acme|Betamax is "acme-site|betamax-agency"
         * 
         * 
         * [--activate]
         * : This string of text will be used to create the directory in which your theme is stored. It can only include lowercase text and dashes A good pattern for client Acme|Betamax is "acme|betamax"
         * 
         * ## EXAMPLES
         *     Prompt for inputs
         *     $ wp withagency theme --prompt
         * 
         *     Create a theme with known inputs
         *     $ wp withagency theme --prefix=ax --domain=acme-site --name=Acme --slug=acme
         * 
         *     Create a theme and Activate it
         *     $ wp withagency theme --prefix=ax --domain=acme-site --name=Acme --slug=acme --activate
         */
        public function theme($args, $assoc_args){   
            
            // Inputs from from Prompt
            $prefix = WP_CLI\Utils\get_flag_value($assoc_args, 'prefix');
            $slug = WP_CLI\Utils\get_flag_value($assoc_args, 'slug');
            $name = WP_CLI\Utils\get_flag_value($assoc_args, 'name');
            $domain = WP_CLI\Utils\get_flag_value($assoc_args, 'domain');
            $activate = WP_CLI\Utils\get_flag_value($assoc_args, 'activate', false);
            $allUserArgs = isset($prefix) && isset($domain) && isset($name) && isset($slug);

            // Needs More Input
            if(!$allUserArgs){ self::nice_error_needinputs('theme'); }
            
            // If Is Allowed
            if(WithAgencyPluginWPCLI::is_allowed($prefix, $domain, $name, $slug)){  
                // 1) Generate Theme Diectory
                $src = WP_PLUGIN_DIR . '/wp-withagency/templates/theme/copy/';
                $dest = WP_CONTENT_DIR . '/themes/' . $slug;
                self::nice_duplicatefolder($src, $dest); 
                // 2) Generate Configured Files
                $renderVars = array(
                    'prefix' => $prefix,
                    'domain' => $domain,
                    'name' => $name,
                    'slug' => $slug,
                );
                // 3) Get Template List
                require_once('templates/theme/themeTemplate.php');
                $themeTemplateEntries = themeTemplate();

                // 4) Process each of them
                foreach($themeTemplateEntries as $entry){
                    // Dynamically write the in/out points
                    $renderVars['template'] = $entry['template'];
                    $renderVars['output'] = $dest . $entry['output'];
                    // Capture HTML
                    $html = self::nice_renderhtml($renderVars);
                     // Save to File
                    // file_put_contents($renderVars['output'], $html);

                    self::nice_rendertofile($html, $renderVars['output']);
                 
                }

                // 5) Activate immediately after creating it
                if($activate){
                    WP_CLI::run_command( array( 'theme', 'activate', $slug ) );
                    WP_CLI::success($slug . ' theme Activated!');
                } else {
                    WP_CLI::warning('Theme is not activated, however');
                }
            }
        }
        

        /** Is Constant-Able?
         * 
         * The generator requires certain constants (commonly defined in custom_constants.php)
         */

        private function is_constantable($withFeedback = false){

            $requiredConstants = array(
                'THEME_PREFIX', 
                'THEME_DOMAIN', 
                'THEME_NAME', 
                'THEME_SLUG',
                # Block
                'DEST_BLOCK_FOLDER',
                'DEST_BLOCK_FILE',
                # Component
                'DEST_COMPONENT_FOLDER',
                'DEST_COMPONENT_FILE',
                # Endpoint
                'DEST_ENDPOINT_FOLDER',
                'DEST_ENDPOINT_FILE',
                # Posttype
                'DEST_POSTTYPE_FOLDER',
                'DEST_POSTTYPE_FILE',
                # Route
                'DEST_ROUTE_FOLDER',
                'DEST_ROUTE_FILE',
                # Taxonomy
                'DEST_TAXONOMY_FOLDER',
                'DEST_TAXONOMY_FILE',
                # Template
                'DEST_TEMPLATE_FOLDER',
                'DEST_TEMPLATE_FILE',
                # Theme
                'DEST_THEME_FOLDER',
                'DEST_THEME_FILE',
            );

            $tableEntries = array();
            $tableErrors = array();

            // Loop over required constants embarrassing
            foreach ($requiredConstants as $key => $constant) {
                // Add to Success Table
                if(defined($constant)){ 
                    array_push($tableEntries, array (
                        'Name' => $constant,
                        'Value' => constant($constant),
                    ));
                // Add to Error Table 
                } else {
                    array_push($tableErrors, array (
                        'Name' => $constant,
                        'Value' => '(Was not defined)',
                    ));
                }
            }
            
            // Display Success Table
            if (sizeof($tableErrors) == 0)
            {
                if($withFeedback){
                    WP_CLI::line('✅ All of the constants are present');
                    WP_CLI\Utils\format_items('table', $tableEntries, array('Name', 'Value'));
                }
                return true;
            }
            // Display Error Table
            else
            {
                if($withFeedback){
                    WP_CLI::line('❌ There were ' . sizeof($tableErrors) . ' Missing Constants');
                    WP_CLI\Utils\format_items('table', $tableErrors, array('Name', 'Value'));
                    WP_CLI::line(self::nice_documentationurl().'#constants');
                }
                return false;
            }
        }

        /** 
         * Is Allowed checks all the Human-Defined constants for validity
         * 
         * @param string $prefix
         * @param string $domain
         * @param string $name
         * @param string $slug
         * @param string $force - remove?
         * 
         */
        private function is_allowed($prefix, $domain, $name, $slug){
            // $force = false; // maybe remove this
            $prefixworthy = WithAgencyPluginWPCLI::is_prefixworthy($prefix); // , $force
            $domainworthy = WithAgencyPluginWPCLI::is_domainworthy($domain); // , $force
            $nameworthy = WithAgencyPluginWPCLI::is_nameworthy($name); // , $force
            $slugworthy = WithAgencyPluginWPCLI::is_slugworthy($slug); // , $force

            // Not only where they defined
            if($prefix && $domain && $name && $slug){
                // But they were also valid
                return  $prefixworthy && $domainworthy && $nameworthy && $slugworthy;
            } else {
                return false;
            }
            
        }

        // Prefixworthy?
        /**
         * Is this String prefixworthy?
         *
         * @param string $mixedText
         * @return boolean
         */
        private function is_prefixworthy($mixedText, $displayLabel='prefix')
        {   
            
            $onlyLowerCaseText = "/[^a-z]+/";
            $caseError = preg_match($onlyLowerCaseText, $mixedText) == true;
            
            // $helplink = self::nice_documentationurl(). '#prefix';
            $lessThanTwo = strlen($mixedText) < 2;
            $moreThanFive = strlen($mixedText) > 5;
            $inRange = $lessThanTwo || $moreThanFive;

            
            $errorArray = array();
            
            // Character Requirement
            if($caseError){
                array_push($errorArray, array(
                    'Error' => 'Lowercase Only',
                    'Note' => 'only lowercase letters are allowed in theme prefixes (no numbers, uppercase or special chars), yours was "' . $mixedText . '"',
                ));
            }

            // Length Requirement
            if(is_string($mixedText) && $inRange){
                array_push($errorArray, array(
                    'Error' => 'Length Restriction',
                    'Note' => 'The prefix must be between 2 and 5 characters, yours was ' . strlen($mixedText),
                ));
            } 

            // No Errors
            if(sizeof($errorArray) == 0){
                return true;
            // Display Errors
            } else {
                WP_CLI::line(WP_CLI::colorize('%y🦉 There were problems with your %n') . WP_CLI::colorize('%0%k%3 '.$displayLabel.' %n'));
                WP_CLI\Utils\format_items('table', $errorArray, array('Error', 'Note'));
                WP_CLI::line();
                return false;
            }
            
        }

        /**
         * Is this String slugworthy? 
         * 
         * This will become a directory name so it can only contain lowercase text
         *
         * @param string $mixedText
         * @return boolean
         */
        private function is_slugworthy($mixedText, $displayLabel='slug')
        {
            $lowerCaseTextOrDash = "/[^a-z-]+/";
            $matchAchieved = preg_match($lowerCaseTextOrDash, $mixedText);
            $atLeastThree = strlen($mixedText) <= 2;
            $errorArray = array();

            // Enforce Character Requirement
            if($matchAchieved){
                array_push($errorArray, array(
                    'Error' => 'Character restrictions',
                    'Note' => 'The '.$displayLabel.' can only include lowercase letters and single dash character, yet was: "' . $mixedText . '"',
                ));
            }

            // Enforce Length Requirement
            if($atLeastThree){
                array_push($errorArray, array(
                    'Error' => 'Too Short',
                    'Note' => 'The '.$displayLabel.' should be at least 3 characters long. It will be used to create a folder, yet was: "' . $mixedText . '"',
                ));
            }

            // No Errors
            if(sizeof($errorArray) == 0){
                return true;
            // Display Errors
            } else {
                WP_CLI::line(WP_CLI::colorize('%y🦉 There were problems with your %n') . WP_CLI::colorize('%0%k%3 '.$displayLabel.' %n'));
                WP_CLI\Utils\format_items('table', $errorArray, array('Error', 'Note'));
                WP_CLI::line();
                return false;
            }
       
        }


        /**
         * Is this string text-domain worthy?
         * 
         * The text-domain is used in WordPress internationalization and translation
         *
         * @param string $mixedText
         * @return boolean
         */
        private function is_domainworthy($mixedText, $displayLabel='domain')
        {
            $lowerCaseTextOrDash = "/[^a-z-]+/";
            $matchAchieved = preg_match($lowerCaseTextOrDash, $mixedText);
            $atLeastThree = strlen($mixedText) <= 2;
            $errorArray = array();

            // Enforce Character Requirement
            if($matchAchieved){
                array_push($errorArray, array(
                    'Error' => 'Bad characters',
                    'Note' => 'The domain (also referred to as text-domain) can only include lowercase letters and single dash character, yet was: ' . $mixedText,
                ));
            }

            // Enforce Length Requirement
            if($atLeastThree){
                array_push($errorArray, array(
                    'Error' => 'Too Short',
                    'Note' => 'The '.$displayLabel.' should be at least 3 characters long. It will be used to set a text-domain yet was: "' . $mixedText . '"',
                ));
            }
     
            // No Errors
            if(sizeof($errorArray) == 0){
                return true;
            // Display Errors
            } else {
                WP_CLI::line(WP_CLI::colorize('%y🦉 There were problems with your %n') . WP_CLI::colorize('%0%k%3 '.$displayLabel.' %n'));
                WP_CLI\Utils\format_items('table', $errorArray, array('Error', 'Note'));
                WP_CLI::line();
                return false;
            }
        }
        

        /**
         * Is this string Nameworthy?
         * 
         * The Name is used casually when talking about this theme. It is a String of Text, with few restrictions. Ideally it will be {Client Name + YYYY}
         *
         * @param string $mixedText
         * @return boolean
         */
        private function is_nameworthy($mixedText, $displayLabel='name'){
            $errorArray = array();

            // Return False if it's Not a String
            if(!is_string($mixedText)){ 
                array_push($errorArray, array(
                    'Error' => 'Bad characters',
                    'Note' => 'The name needs to be a string (not a number, etc), yet was: "' . $mixedText . '"',
                ));
            }

            // No Errors
            if(sizeof($errorArray) == 0){
                return true;
            // Display Errors
            } else {
                WP_CLI::line(WP_CLI::colorize('%y🦉 There were problems with your %n') . WP_CLI::colorize('%0%k%3 '.$displayLabel.' %n'));
                WP_CLI\Utils\format_items('table', $errorArray, array('Error', 'Note'));
                WP_CLI::line();
                return false;
            }
         
        }



        /** 
         * Test for Length
         * 
         * Examines a string of text against a minumum and maximum length
         * 
         * @param $mixedText {string}
         * @param $min {int}
         * @param $max {int}
         * @return boolean length was acceptable
         */


        private function testfor_lengthrange($mixedText, $min, $max){
            $moreThanMin = strlen($mixedText) >= $min;
            $lessThanMax = strlen($mixedText) <= $max;
            $inRange = $moreThanMin && $lessThanMax;

             // $matchAchieved = WithAgencyPluginWPCLI::testfor_specialchars($testString);
             if($inRange){
                 WP_CLI::line('passed!');
                return true;
            } else {
                WP_CLI::line('failed, out of range, stay within min:' . $min. ' and max:' . $max );
                return false;
            }
        }

        /** 
         * Test for Special Chars
         * 
         * Examines a string of text to determine if it has special characters which are not allowed
         * 
         * @param $mixedText {string}
         * @return boolean whether special chars were detected
         */
        private function testfor_specialchars($mixedText){
            $letters =  str_split($mixedText, 1);
            $errorcount = 0;
            // Examine Each Letter
            foreach($letters as $letter){
                $lowerCaseTextOrDash = "/[^a-z-]+/";
                $validLetter = preg_match($lowerCaseTextOrDash, $letter);
                if($validLetter){$errorcount++;}
            }
            // At Least One Error was detected
            $matchAchieved = $errorcount > 0;
            return $matchAchieved;
        }


        /** 
         * Test for Lowercase Text
         * 
         * Examines a string of text to ensure that it only contains lowercase
         * 
         * @param $mixedtext {string}
         * @return boolean whether special chars were detected
         */
        private function testfor_lowercaseonly($mixedText){
            $letters =  str_split($mixedText, 1);
            $errorcount = 0;
            // Examine Each Letter
            foreach($letters as $letter){
                $onlyLowerCaseText = "/[^a-z]+/";
                $invalidLetter = preg_match($onlyLowerCaseText, $letter);
                if($invalidLetter){$errorcount++;}
            }
            // At Least One Error was detected
            $matchAchieved = $errorcount == 0;
            return $matchAchieved;
        }

        /** 
         * Test for Number
         * 
         * Examines a string of text to ensure that it only contains lowercase
         * 
         * @param $mixedtext {string}
         * @return boolean whether special chars were detected
         */
        private function testfor_number($mixedText){
            $onlyLowerCaseText = "/[^0-9]+/";
            $matchAchieved = preg_match($onlyLowerCaseText, $mixedText);
            return $matchAchieved;
        }

         /** 
         * String contains polyfill
         * 
         * Examines a for a match. Note that str_contains is introduced PHP 8.
         * 
         * @param $haystack {string}
         * @param $needle {string}
         * @return boolean whether match detected
         */
        private function custom_str_contains($haystack, $needle){
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
        
       
        /* NOTE: Currently this tails the style file, but in reality it should be a case/switch to the subbranches noted in functions.php */

        /**
         *  Get the Documentation Note and URL
         * 
         * This is referred to throughout, but is contained here to consolidate repitition
         * 
         * @return string the url where the Documenation for this Plugin is at
         * 
         */
        private function nice_documentationurl(){
            $doctext = '📚 Read the docs: ' . 'https://wp-withagency.netlify.app/';
            return $doctext;
        }


        /**
         * More Needs Inputs Error
         * 
         * @param $feature {string} feature of mention (block|component)
         * 
         */
        private function nice_error_needinputs($feature){
            WP_CLI::line();
            WP_CLI::line('❌ Multiple Arguments are required, *'.$feature.'* was not generated');
            WP_CLI::line('💡 Try running `wp withagency '.$feature.' --prompt` or run `wp help withagency '.$feature.'` for detailed instructions');
            WP_CLI::line(self::nice_documentationurl().$feature);
            WP_CLI::line();
            return false;
        }


        /**
         * Duplicate Folder with No Transforms at all
         * 
         * helper function for duplicating entire directories
         * @param $src {string} path to directory to copy
         * @param $dest {string} where to copy it
         */
        private static function nice_duplicatefolder($src, $dest, $force=false)
        {

            // If there is a directory, bow out
            if(is_dir($dest)){
                WP_CLI::error('The slug/directory you specified (' . $dest . ') already exists.');
            // Otherwise copy our stuff
            } else {

            }
            // from here https://stackoverflow.com/questions/5772769/how-to-copy-a-file-from-one-directory-to-another-using-php
            shell_exec("cp -r $src $dest");
            WP_CLI::success('A new directory was created here: ' . $dest);
            
        }

        /**
        *  Create Formatted Message in the CLI
        */
        private static function nice_message($message, $color="none"){

            $mymessage =  '🎉 Successfully Created your new template';

            $colors = array(
                'green' => '%g',
                'greenbg' => '%k%2',
                'none' =>''
            );

            $safecolor = array_key_exists($color, $colors) ? $colors[$color] : '';

            $tagopen = $safecolor;
            $tagclose = '%n';
            $formattedMessage = $tagopen.$mymessage.$tagclose;
            // Put Contents
            WP_CLI::line(WP_CLI::colorize($formattedMessage));
        }

        /**
        *  Render the Template with Mustache
        */
        private static function nice_renderhtml($data = array()){
            return \WP_CLI\Utils\mustache_render( WP_PLUGIN_DIR . "/wp-withagency/templates/" . $data['template'], $data );
        }

        /**
        *  Create File with Name
        */
        private static function nice_rendertofile($data, $filepath){
            // Put Contents
            if(!file_exists($filepath)){
                file_put_contents($filepath, $data);
            } else {
                WP_CLI::error('The theme already contains a file at' . $filepath);
            }
           
            // self::nice_renderhtml($renderVars);
            // return \WP_CLI\Utils\mustache_render( WP_PLUGIN_DIR . "/wp-withagency/templates/" . $data['template'], $data );
        }

        /**
         * Nicely Tail File
         * 
         * Dynamically updates the end of a file. Takes 2 paramaters for the File to Update and the Content to add.
         * 
         * @param string $filepath the file to open, tail and save, or create if it doesn't exist
         * @param string $fileadditions a Slug of Text that will go in the directory/file names
         */

        private function nice_tailfile($filepath, $fileadditions){

            
            
                if(file_exists(get_template_directory().$filepath)){
                    // Open the file to get existing content
                    $contents = file_get_contents(get_template_directory().$filepath);
                    // Include Timestamp
                    $timestamp = false;
                    // Append a new Date to the file
                    if($timestamp){
                        $now = new DateTime('NOW');
                        $isotime =  $now->format('c');
                        $contents .= "\r\n\r\n/* New Feature Generated ".$isotime."*/\r\n";
                    }
                    // New
                    $contents .= "\r\n\r\n";
                    $contents .=  $fileadditions;
                   
                    // Write the contents back to the file
                    // Add to JSON
                    if(WithAgencyPluginWPCLI::custom_str_contains($filepath,'.json')){
                        // Open JSON
                        $contents = file_get_contents(get_template_directory().$filepath);
                        $data = json_decode($contents);
                        // Add new entry
                        array_push($data, $fileadditions);
                        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
                        // Save JSON
                        file_put_contents(get_template_directory().$filepath, stripslashes($newJsonString));
                        
                    // Add by Addition to the end of the file
                    } else {
                        file_put_contents(get_template_directory().$filepath, $contents);
                    }

                // File Doesn't Exist                      
                } else {
                    WP_CLI::error('That file (' . get_template_directory().$filepath . ') does not exists yet.');
                }
                
           
        }
     
    }

    WP_CLI::add_command('withagency', 'WithAgencyPluginWPCLI');
}
