<?php 

// Admin Cleanup
require_once(get_template_directory().'/library/themesupport/function-custom_admincleanup.php');
// Frontend Cleanup: Remove Linked/Inline Scripts, JS, Feeds
require_once(get_template_directory().'/library/themesupport/function-custom_frontendcleanup.php');
// Remove Emoji
require_once(get_template_directory().'/library/themesupport/function-custom_removeemoji.php');
// Theme Debug Feature
require_once(get_template_directory().'/library/themesupport/function-custom_themedebug.php');
// Add Editable Menus to theme
require_once(get_template_directory().'/library/themesupport/function-custom_thememenus.php');
// Add Reusable Blocks Posttype link in Sidebar
require_once(get_template_directory().'/library/themesupport/function-custom_showreusableblocktype.php');
// Modify logo on login page
require_once(get_template_directory().'/library/themesupport/function-custom_loginlogo.php');
// Add Theme JS
require_once(get_template_directory().'/library/themesupport/function-custom_themejavascript.php');
// Add Theme CSS
require_once(get_template_directory().'/library/themesupport/function-custom_themestylesheets.php');
// Add Body Classes
require_once(get_template_directory().'/library/themesupport/function-custom_bodyclass.php');
// Limit Block Types
require_once(get_template_directory().'/library/themesupport/function-custom_allowedblocktypes.php');
// Add Block Categories
require_once(get_template_directory().'/library/themesupport/function-custom_blockcategories.php');