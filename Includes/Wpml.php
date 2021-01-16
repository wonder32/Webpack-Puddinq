<?php


namespace Wpt\Includes;

class Wpml
{
    public function __construct()
    {
        /* @see AssetsFrontend::languageSwitcherInMenu() */
        add_action('wp_nav_menu_thin_items', [$this, 'languageSwitcherInMenu'], 20, 2);
        add_action('wp_nav_menu_mobile-menu_items', [$this, 'languageSwitcherInMenu'], 20, 2);
    }

    public function languageSwitcherInMenu($items, $args)
    {
        $languages = icl_get_languages('skip_missing=0&orderby=code');
        $languageOptions = '';
        if (!empty($languages)) {
            foreach ($languages as $l) {
                $languageOptions .= '<li>';
                if (!$l['active']) $languageOptions .= '<a class="wpml-ls-item" href="' . $l['url'] . '">';
                $languageOptions .=  '<img src="' . $l['country_flag_url'] . '" height="14" alt="' . $l['language_code'] . '" width="21" />';
                if (!$l['active']) $languageOptions .=  '</a>';
                $languageOptions .= '</li>';
            }
        }

        $items = $items . $languageOptions;
        return $items;
    }
}
