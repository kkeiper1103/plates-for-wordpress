<?php
/**
 * Plugin Name: Plates for WordPress
 * Plugin URI: https://github.com/kkeiper1103/plates-for-wordpress
 * Description: Allows Theme Authors to use PlatesPHP or Twig in their templates to provide template inheritance rather than progressive composition.
 * Author: Kyle Keiper
 * Version: 1.0.0
 * Author URI: http://gnarlyweb.com/
 * License: MIT
 */

require_once __DIR__ . "/vendor/autoload.php";

$plugin = new \kkeiper1103\PlatesForWordPress\Plugin();

$plugin->run();