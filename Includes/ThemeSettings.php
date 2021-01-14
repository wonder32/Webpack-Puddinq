<?php


namespace Wpt\Includes;


class ThemeSettings
{
    public function __construct()
    {
        $this->registerMenus();
        $this->support();
    }

    private function registerMenus()
    {

        register_nav_menus(array(
            'top-thin' => __('The Top Thin Menu', 'puddinq-com'),
            'top-main' => __('The Top Main Menu', 'puddinq-com'),
            'search-links' => __('Footer Links', 'puddinq-com'),
            'mobile-menu' => __('Mobile menu', 'puddinq-com')
        ));
    }

    private function support()
    {
        add_theme_support('html5', array('search-form'));
    }
}