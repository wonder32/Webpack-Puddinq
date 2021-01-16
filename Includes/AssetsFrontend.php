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
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-block-style');

        if (is_admin()) {
            return;
        }

        $value = array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ajax_nonce')
        );

        wp_enqueue_style('puddinq-style', WPT_THEME_URI . '/assets/dist/css/main.css', '', '', '');
        wp_enqueue_style('puddinq-style', WPT_THEME_URI . '/assets/dist/css/footer.css', '', '', '');

        wp_enqueue_script('puddinq-script', WPT_THEME_URI . '/assets/dist/js/main.js', array('jquery'), '', false);

        wp_enqueue_script('jquery-ui-autocomplete', '', array('jquery', 'jquery-ui-widget', 'jquery-ui-position'), '1.12.1');
        wp_enqueue_script('puddinq-script-footer', WPT_THEME_URI . '/assets/dist/js/search.js', array('jquery', 'jquery-ui-autocomplete'), '', true);
        wp_localize_script('puddinq-script-footer', 'ajaxData', $value);
    }
}
