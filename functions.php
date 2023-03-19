<?php
/*
 Theme Name:   Mehanik Store
 description:  Mehanik Store Theme
 Author:       Yevhen Karavan
 Template:     neve
 Version:      1.0.0
*/

// Custom styles go here

declare(strict_types=1);

require_once get_stylesheet_directory() . '/widgets/PhoneWidget.php';
require_once get_stylesheet_directory() . '/widgets/SocialButtonWidget.php';

function mehanik_store_register_widget() {
    register_widget( 'widgets\PhoneWidget' );
    register_widget( 'widgets\SocialButtonWidget' );
}
add_action( 'widgets_init', 'mehanik_store_register_widget' );

function mehanik_store_enqueue_styles()
{
    wp_enqueue_style('custom-bootstrap', get_stylesheet_directory_uri() . '/assets/css/libs/bootstrap-reboot.min.css');
    wp_enqueue_style('custom-fonts', get_stylesheet_directory_uri() . '/assets/css/libs/fonts.css');
    wp_enqueue_style('custom-animations', get_stylesheet_directory_uri() . '/assets/css/libs/animate.min.css');
    wp_enqueue_style('custom-slick', get_stylesheet_directory_uri() . '/assets/css/libs/slick.css');
    wp_enqueue_style('custom-slick-theme', get_stylesheet_directory_uri() . '/assets/css/libs/slick-theme.css');
    wp_enqueue_style('custom-style-main', get_stylesheet_directory_uri() . '/assets/css/style.min.css', [], 1.1);

    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        ['parenthandle'],
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'mehanik_store_enqueue_styles');

function mehanik_store_javascript()
{
    wp_enqueue_script('custom-won', get_stylesheet_directory_uri() . '/assets/js/libs/wow.min.js', false, true);
    wp_enqueue_script('custom-slick', get_stylesheet_directory_uri() . '/assets/js/libs/slick.min.js', false, true);
    wp_enqueue_script('custom-myscript', get_stylesheet_directory_uri() . '/assets/js/script.js', false, true);
    wp_enqueue_script('custom-myscript', get_stylesheet_directory_uri() . '/assets/js/myscript.js', false, true);
}

add_action('wp_enqueue_scripts', 'mehanik_store_javascript');

function mehanik_store_menus()
{
    register_nav_menus(
        [
            'desktop' => 'Desktop menu',
            'mobile' => 'Mobile menu',
        ]
    );
}

add_action('init', 'mehanik_store_menus');

function add_specific_menu_location_atts($atts, $item, $args)
{
    if ($args->theme_location == 'desktop') {
        $atts['class'] = 'header__link';
    }

    if ($args->theme_location == 'mobile') {
        $atts['class'] = 'header__link burger-menu__link';
    }

    return $atts;
}

add_filter('nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3);

function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function custom_post_types()
{
    $brandsTypeArgs = [
        'label' => __('brands', 'mehanik-store'),
        'description' => __('Brand description', 'mehanik-store'),
        'labels' => [
            'name' => _x('Brands', 'Post Type General Name', 'mehanik-store'),
            'singular_name' => _x('Brand', 'Post Type Singular Name', 'mehanik-store'),
            'menu_name' => __('Brands', 'mehanik-store'),
            'parent_item_colon' => __('Parent Brand', 'mehanik-store'),
            'all_items' => __('All Brands', 'mehanik-store'),
            'view_item' => __('View Brand', 'mehanik-store'),
            'add_new_item' => __('Add New Brand', 'mehanik-store'),
            'add_new' => __('Add New', 'mehanik-store'),
            'edit_item' => __('Edit Brand', 'mehanik-store'),
            'update_item' => __('Update Brand', 'mehanik-store'),
            'search_items' => __('Search Brand', 'mehanik-store'),
            'not_found' => __('Not Found', 'mehanik-store'),
            'not_found_in_trash' => __('Not found in Trash', 'mehanik-store'),
        ],
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields'],
        'taxonomies' => ['genres'],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-networking',
        'can_export' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
    ];

    $carsTypeArgs = [
        'label' => __('cars', 'mehanik-store'),
        'description' => __('Car description', 'mehanik-store'),
        'labels' => [
            'name' => _x('Cars', 'Post Type General Name', 'mehanik-store'),
            'singular_name' => _x('Car', 'Post Type Singular Name', 'mehanik-store'),
            'menu_name' => __('Cars', 'mehanik-store'),
            'parent_item_colon' => __('Parent Car', 'mehanik-store'),
            'all_items' => __('All Cars', 'mehanik-store'),
            'view_item' => __('View Car', 'mehanik-store'),
            'add_new_item' => __('Add New Car', 'mehanik-store'),
            'add_new' => __('Add New', 'mehanik-store'),
            'edit_item' => __('Edit Car', 'mehanik-store'),
            'update_item' => __('Update Car', 'mehanik-store'),
            'search_items' => __('Search Car', 'mehanik-store'),
            'not_found' => __('Not Found', 'mehanik-store'),
            'not_found_in_trash' => __('Not found in Trash', 'mehanik-store'),
        ],
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields'],
        'taxonomies' => ['genres'],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-car',
        'can_export' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
    ];


    register_post_type('brands', $brandsTypeArgs);
    register_post_type('cars', $carsTypeArgs);
}

add_action('init', 'custom_post_types', 0);

function mehanik_store_widgets_init()
{
    register_sidebar([
            'name' => 'Phone Widget Area',
            'id' => 'phone-widget',
            'before_widget' => '',
            'after_widget' => ''
        ]
    );

    register_sidebar([
            'name' => 'Social Widget Area',
            'id' => 'social-widget',
            'before_widget' => '',
            'after_widget' => ''
        ]
    );

    register_sidebar([
            'name' => 'Painting Widget Area',
            'id' => 'painting-widget',
            'before_widget' => '<div class="slider__widget wow animate__fadeInUp">',
            'after_widget' => '</div>'
        ]
    );
}

add_action('widgets_init', 'mehanik_store_widgets_init');
