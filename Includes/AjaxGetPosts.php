<?php


namespace Wpt\Includes;


class AjaxGetPosts
{
    public function __construct()
    {
        add_action('wp_ajax_ajax_get_posts', [$this, 'load']); // for loggedin users
        add_action('wp_ajax_nopriv_ajax_get_posts', [$this, 'load']); // for guests
    }

    public function load()
    {

        check_ajax_referer('ajax_nonce', 'nonce');

        $return = array();
        //$return[] = $_POST['search']['term'];
        $posts = get_posts(array(
            's' => $_POST['search']['term'],
            'posts_per_page' => -1,
            'suppress_filters' => false
        ));

        foreach ($posts as $key => $post) {
            $link = get_the_permalink($post->ID);
            $category = get_the_category($post->ID);
            $cat = isset($category[0]) ? $category[0]->name : '';

            $return[] = array(
                'label' => $cat . ': ' . $post->post_title,
                'link' => $link
            );
        }

        wp_send_json($return);
    }

}