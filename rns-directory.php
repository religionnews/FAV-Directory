<?php
/*
Plugin Name: FAV Directory
Version: 1.1.1
Description: Custom post types, taxonomies, and metaboxes for the Directory
Author: David Herrera
Text Domain: rns-directory
Domain Path: /languages
*/

require_once( dirname(__FILE__) . '/taxonomies/rns_directory_type.php' );
require_once( dirname(__FILE__) . '/taxonomies/rns_directory_denomination.php' );

if ( is_admin() )
  require_once( dirname(__FILE__) . '/metaboxes.php' );
if( !is_admin() )
    require_once( dirname(__FILE__) . '/class-display.php' );

require_once( dirname(__FILE__) . '/class-rns-directory.php' );
new RNS_Directory;
