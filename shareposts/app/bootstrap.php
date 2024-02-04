<?php
// Load Config
require_once 'config/config.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

/**
 * AutoLoad Libraries
 * Load all classes in library folder
 * Class name must be equal to file name
 */
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
