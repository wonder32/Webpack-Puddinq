<!doctype html>
<html <?php language_attributes(); ?>>
<head>

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
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo" height="40" width="40"/>
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

<div class="search-container">
    <?= get_search_form(); ?>
</div>

