<?php
/**
 * The template for displaying the header
 *
 * @package Mehanik Store
 * @since   1.0.0
 */

?>
    <!DOCTYPE html>
    <?php

    /**
     * Filters the header classes.
     *
     * @param string $header_classes Header classes.
     *
     * @since 2.3.7
     */
    $header_classes = apply_filters('nv_header_classes', 'header');

    /**
     * Fires before the page is rendered.
     */
    do_action('neve_html_start_before');

    ?>
<html <?php
language_attributes(); ?>>

    <head>
        <?php
        /**
         * Executes actions after the head tag is opened.
         *
         * @since 2.11
         */
        do_action('neve_head_start_after');
        ?>

        <meta charset="<?php
        bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php
        if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php
            bloginfo('pingback_url'); ?>">
        <?php
        endif; ?>
        <?php
        wp_head(); ?>

        <?php
        /**
         * Executes actions before the head tag is closed.
         *
         * @since 2.11
         */
        do_action('neve_head_end_before');
        ?>
    </head>

<body id="mehanik-store"<?php
body_class(); ?> <?php
neve_body_attrs(); ?> >
<?php
/**
 * Executes actions after the body tag is opened.
 *
 * @since 2.11
 */
do_action('neve_body_start_after');
?>
<?php
wp_body_open(); ?>
<div class="wrapper">
    <div class="overlay">
        <img class="overlay__preloader" src="<?php
        echo trailingslashit(get_stylesheet_directory_uri()) ?>assets/img/preloader.svg" alt="preloader">
    </div>
<?php
/**
 * Executes actions before the header tag is opened.
 *
 * @since 2.7.2
 */
do_action('neve_before_header_wrapper_hook');
?>
    <div class="burger-menu">
        <div class="burger-menu__body">
            <nav class="header__nav burger-menu__nav">
                <?php
                wp_nav_menu([
                    'theme_location' => 'mobile',
                    'container' => false,
                    'menu_class' => 'header__item burger-menu__item',
                    'fallback_cb' => '',
                    'items_wrap' => '<ul id="%1$s" class="header__list burger-menu__list">%3$s</ul>',
                    'add_li_class' => 'header__item burger-menu__item',
                    'depth' => 1,
                ]); ?>
            </nav>
            <div class="header__wrapper burger-menu__wrapper">
                <?php
                    if (is_active_sidebar('phone-widget')) {
                        dynamic_sidebar('phone-widget');
                    }
                ?>
                <div class="header__social burger-menu__social">
                    <?php
                        if (is_active_sidebar('social-widget')) {
                            dynamic_sidebar('social-widget');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <header class="header">
        <div class="ms-container header__container">
            <a class="header__logo" href="/">
                <img src="<?php
                echo trailingslashit(get_stylesheet_directory_uri()) ?>assets/img/logo.svg" alt="logo">
            </a>
            <nav class="header__nav">
                <?php
                wp_nav_menu([
                    'theme_location' => 'desktop',
                    'container' => false,
                    'menu_class' => 'header__item',
                    'fallback_cb' => '',
                    'items_wrap' => '<ul id="%1$s" class="header__list">%3$s</ul>',
                    'add_li_class' => 'header__item',
                    'depth' => 1,
                ]); ?>
            </nav>
            <div class="header__wrapper">
                <?php
                if (is_active_sidebar('phone-widget')) {
                    dynamic_sidebar('phone-widget');
                }
                if (is_active_sidebar('social-widget')) {
                    dynamic_sidebar('social-widget');
                }
                ?>
            </div>
            <a class="header__cart header__cart" href="/cart" style="position: relative;">
                <img src="<?= trailingslashit(get_stylesheet_directory_uri()) ?>assets/img/header/cart.svg" alt="cart">
                <span class='cart-num'
                      style="position: absolute;width: 15px;height: 15px;display: flex;border-radius: 10px;align-items: center;background: red;justify-content: center;right: -7px;top: -7px;color: #FFF;font-size: 14px;"><?= class_exists(
                        'WooCommerce'
                    ) ? WC()->cart->get_cart_contents_count() : 0 ?></span>
            </a>
            <div class="header__burger">
                <div class="header__burger-line"></div>
                <div class="header__burger-line"></div>
            </div>
        </div>
    </header>

<?php
/**
 * Executes actions after the header tag is closed.
 *
 * @since 2.7.2
 */
do_action('neve_after_header_wrapper_hook');
?>


<?php
/**
 * Executes actions before main tag is opened.
 *
 * @since 1.0.4
 */
do_action('neve_before_primary');
?>

    <main id="content" class="neve-main">

<?php
/**
 * Executes actions after main tag is opened.
 *
 * @since 1.0.4
 */
do_action('neve_after_primary_start');

