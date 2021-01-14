<?php


namespace Wpt\Includes;


class AssetsFrontend
{
    public function __construct()
    {
        /* @see AssetsFrontend::load() */
        add_action('wp_enqueue_scripts', [$this, 'load']);
    }

    public function load()
    {
        wp_enqueue_style('puddinq-style', WPT_THEME_URI . '/assets/dist/css/main.css', '', '', '');
        wp_enqueue_script('puddinq-script', WPT_THEME_URI . '/assets/dist/js/main.js', array('jquery'), '', false);
        wp_enqueue_script('puddinq-script-search', WPT_THEME_URI . '/assets/dist/js/search.js', array('jquery'), '', true);
    }
}
