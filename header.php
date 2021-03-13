<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <?php if (WP_ENVIRONMENT_TYPE === 'production') : ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TC363WHH0M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TC363WHH0M');
    </script>
    <?php endif; ?>

    <?php
    if (is_front_page()) :
        $title = __('Puddinq.com - sharing knowledge', 'puddinq-com');
    elseif (is_home()) :
        $title = __('Puddinq.com - blog', 'puddinq-com');
    elseif (is_tax('plugin-cat')) :
        $term = get_term_by( 'slug', get_query_var('plugin'), 'plugin-cat' );
        $title = $term->name;
    else :
        $title = get_the_title();
    endif;
    ?>
    <title><?= $title; ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- top thin menu -->
<?php wp_nav_menu(array(
    'menu' => 'top-thin',
    'container' => 'nav',
    'container_aria_label' => 'Languages navigation',
    'theme_location' => 'top-thin',
)); ?>

<header>

    <!-- logo -->
    <?php if (!is_front_page()) : ?>
    <a class="site-logo" href="<?php echo home_url(); ?>" rel="nofollow" title="Back home">
    <?php endif; ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo" height="40" width="40" title="Puddinq - logo" loading="lazy"/>
    <?php if (!is_front_page()) : ?>
    </a>
    <?php endif; ?>

    <!-- title -->
    <?php if (!is_front_page()) : ?>
    <a href="<?php echo home_url(); ?>" rel="nofollow" title="Back home">
    <?php endif; ?>
        <span class="b-title"><?= get_bloginfo('name'); ?></span>
    <?php if (!is_front_page()) : ?>
    </a>
    <?php endif; ?>
    <span class="b-description"><?= get_bloginfo('description'); ?></span>

    <!-- top main menu desktop-->
    <?php wp_nav_menu(array(
        'menu' => 'top-main',
        'container' => 'nav',
        'container_aria_label' => 'Main pages navigation',
        'theme_location' => 'top-main',
    )); ?>


    <!-- mobile button menu -->
    <button class="btn js-menu-toggle menu-btn">Menu</button>
    <!-- menu mobile-->
    <?php wp_nav_menu(array(
        'menu' => 'mobile-menu',
        'container' => 'nav',
        'container_aria_label' => 'Main pages mobile navigation',
        'theme_location' => 'mobile-menu',
    )); ?>
</header>
<?php
//global $wp_query;
//echo '<pre>';
//print_r($wp_query);
//echo '</pre>';
?>
<div class="search-container">
    <?= get_search_form(); ?>
    <?php
        printf('<h1>%s</h1>', $title);
    ?>
</div>

