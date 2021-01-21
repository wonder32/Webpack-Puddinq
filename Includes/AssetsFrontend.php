<?php


namespace Wpt\Includes;


class AssetsFrontend
{
    public function __construct()
    {

        /* @see AssetsFrontend::allScriptsToFooter() */
        add_action('wp_enqueue_scripts', [$this, 'allScriptsToFooter']);

        /* @see AssetsFrontend::allScriptsAsync() */
        add_filter('wp_enqueue_scripts', [$this, 'allScriptsAsync']);

        /* @see AssetsFrontend::includeHead() */
        add_action('wp_enqueue_scripts', [$this, 'includeHead']);

        /* @see AssetsFrontend::load() */
        add_action('wp_enqueue_scripts', [$this, 'load']);

        /* @see AssetsFrontend::loadFooter() */
        add_action('get_footer', [$this, 'loadFooter']);

        /* @see AssetsFrontend::removeJqueryMigrate() */
        add_action('wp_default_scripts', [$this, 'removeJqueryMigrate']);
    }

    public function allScriptsToFooter()
    {
        remove_action('wp_head', 'wp_print_scripts');
        remove_action('wp_head', 'wp_print_head_scripts', 9);
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        //add_action('wp_footer', 'prnt_emoji_detection_script', 5);
        add_action('wp_footer', 'wp_print_scripts', 5);
        add_action('wp_footer', 'wp_print_head_scripts', 5);
    }

    public function allScriptsAsync($url)
    {
        if (false === strpos($url, '.js')) { // not our file
            return $url;
        }
        // Must be a ', not "!
        return "$url' defer='defer";
    }

    public function includeHead()
    {
        if (wp_get_environment_type() === 'production') {
            echo '<style>' . file_get_contents(WPT_THEME_PATH . '/assets/dist/css/main.css') . '</style>';
        }
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

        if (wp_get_environment_type() != 'production') {
            wp_enqueue_style('puddinq-style', WPT_THEME_URI . '/assets/dist/css/main.css', '', '', '');
        }
        wp_enqueue_style('puddinq-footer-style', WPT_THEME_URI . '/assets/dist/css/footer.css', '', '', '');

        wp_enqueue_script('puddinq-script', WPT_THEME_URI . '/assets/dist/js/main.js', array('jquery'), '', false);

        wp_enqueue_script('jquery-ui-autocomplete', '', array('jquery', 'jquery-ui-widget', 'jquery-ui-position'), '1.12.1');
        wp_enqueue_style('jquery-ui-styles');

        wp_enqueue_script('puddinq-script-footer', WPT_THEME_URI . '/assets/dist/js/footer.js', array('jquery'), '', true);
        wp_localize_script('puddinq-script-footer', 'ajaxData', $value);
    }

    public function loadFooter()
    {
        wp_enqueue_style('puddinq-style', WPT_THEME_URI . '/assets/dist/css/footer.css', '', '', '');
    }

    public function removeJqueryMigrate($scripts)
    {

        if (!is_admin() && isset($scripts->registered['jquery'])) {
            $script = $scripts->registered['jquery'];

            if ($script->deps) { // Check whether the script has any dependencies
                $script->deps = array_diff($script->deps, array(
                    'jquery-migrate'
                ));
            }
        }
    }
}
