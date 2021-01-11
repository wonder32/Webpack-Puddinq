<?php


namespace Wpt\Includes;


class ThemeSettings
{
    public function __construct()
    {
        $this->registerMenus();
    }

    private function registerMenus()
    {

        register_nav_menus(array(
            'top-thin' => __('The Top Thin Menu', 'puddinq-com'),
            'top-main' => __('The Top Main Menu', 'puddinq-com'),
            'footer-links' => __('Footer Links', 'puddinq-com')
        ));
    }
}