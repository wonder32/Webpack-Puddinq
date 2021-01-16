<?php


namespace Wpt\Includes;

class Wpt
{

    public function __construct()
    {
        /* @see Wpt::themeLanguage() */
        add_action('init', [$this, 'themeLanguage']);

        /* @see Wpt::loadModules */
        $this->loadModules();
    }

    public function themeLanguage()
    {
        load_theme_textdomain('puddinq-com', WPT_THEME_URI . '/languages');
    }

    private function loadModules()
    {
        /* @see Wpt::loadModulesGeneral() */
        add_action('after_setup_theme', [$this, 'loadModulesGeneral']);

        if (is_admin()) {
            /* @see Wpt::loadModulesBackend() */
            add_action('after_setup_theme', [$this, 'loadModulesBackend']);
        } else {
            /* @see Wpt::loadModulesFrontend() */
            add_action('after_setup_theme', [$this, 'loadModulesFrontend']);
        }
    }

    public function loadModulesGeneral()
    {
        new ThemeSettings();
    }

    public function loadModulesFrontend()
    {
        new AssetsFrontend();
        new Wpml();
    }

    public function loadModulesBackend()
    {

    }

}