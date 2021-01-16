<?php


namespace Wpt\Includes;


class ThemeSettings
{
    public function __construct()
    {
        $this->registerMenus();
        $this->support();
        add_action('widgets_init', [$this, 'registerSidebar']);
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

    public function registerSidebar()
    {
        register_sidebar(array(
            'id' => 'main-sidebar',
            'name' => __('Main sidebar', 'puddinq_com'),
            'description' => __('The main sidebar', 'puddinq_com'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>'
        ));
    }
}