<?php

use Wpt\Includes\Wpt;

/************************************
 *      BLOCK DIRECT ACCESS
 ************************************/

if (!defined('WPINC')) {
    die;
}

//define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

/************************************
 *      AUTO LOADING
 ************************************/

require_once 'vendor/autoload.php';

/************************************
 *      CONSTANTS
 ************************************/

define('WPT_DIR', plugin_dir_path(__FILE__));
define('WPT_FILE', __FILE__);
define('WPT_THEME_URI', get_template_directory_uri());
define('WPT_THEME_PATH', get_template_directory());

$wpt = new Wpt();
