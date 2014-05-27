<?php
/*
Plugin Name: RNS Directory
Version: 1.1.0
Description: Custom post types, taxonomies, and metaboxes for the Directory
Author: David Herrera
Text Domain: rns-directory
Domain Path: /languages
*/

require_once( dirname(__FILE__) . '/taxonomies/rns_directory_type.php' );
require_once( dirname(__FILE__) . '/taxonomies/rns_directory_denomination.php' );

if ( is_admin() )
  require_once( dirname(__FILE__) . '/metaboxes.php' );

require_once( dirname(__FILE__) . '/class-rns-directory.php' );
new RNS_Directory;
