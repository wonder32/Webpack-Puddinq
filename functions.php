<?php

use Wpt\Includes\Wpt;

/************************************
 *      BLOCK DIRECT ACCESS
 ************************************/

if (!defined('WPINC')) {
    die;
}

/************************************
 *      AUTO LOADING
 ************************************/

require_once  __DIR__ . '/vendor/autoload.php';


/************************************
 *      CONSTANTS
 ************************************/

const NPL_FILE = __FILE__;
define ('NPL_DIR', plugin_dir_path(NPL_FILE));
define ('WPT_THEME_URI', get_template_directory_uri());
define('WPT_THEME_PATH', get_template_directory());

$wpt = new Wpt();
