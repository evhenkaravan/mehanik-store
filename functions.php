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
require_once get_stylesheet_directory() . '/widgets/MainPhoneWidget.php';
require_once get_stylesheet_directory() . '/widgets/SocialButtonWidget.php';
require_once get_stylesheet_directory() . '/widgets/ProductionWidget.php';

function mehanik_store_register_widget()
{
    register_widget('widgets\MainPhoneWidget');
    register_widget('widgets\PhoneWidget');
    register_widget('widgets\SocialButtonWidget');
    register_widget('widgets\ProductionWidget');
}

add_action('widgets_init', 'mehanik_store_register_widget');

remove_filter('widget_types_to_hide_from_legacy_widget_block', ['BlockTypesController', 'hide_legacy_widgets_with_block_equivalent']);

function mehanik_store_enqueue_styles()
{
    wp_enqueue_style('custom-bootstrap', get_stylesheet_directory_uri() . '/assets/css/libs/bootstrap-reboot.min.css');
    wp_enqueue_style('custom-fonts', get_stylesheet_directory_uri() . '/assets/css/libs/fonts.css');
    wp_enqueue_style('custom-animations', get_stylesheet_directory_uri() . '/assets/css/libs/animate.min.css');
    wp_enqueue_style('custom-slick', get_stylesheet_directory_uri() . '/assets/css/libs/slick.css');
    wp_enqueue_style('custom-slick-theme', get_stylesheet_directory_uri() . '/assets/css/libs/slick-theme.css');
    wp_enqueue_style('custom-style-main', get_stylesheet_directory_uri() . '/assets/css/style.min.css', [], 2.3);

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
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/assets/js/script.js', false, 1.3);
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

function car_status_taxonomy()
{
    register_taxonomy(
        'car_status',
        'cars',
        array(
            'label' => 'Status',
            'hierarchical' => false,
            'public' => true,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'car-status'),
        )
    );
}

add_action('init', 'car_status_taxonomy');

function limit_car_status_to_one($term_ids, $taxonomy, $append, $post_id)
{
    if ($taxonomy === 'car_status' && is_array($term_ids)) {
        // Keep only the first selected term
        $term_ids = array_slice($term_ids, 0, 1);
    }
    return $term_ids;
}

add_filter('wp_set_object_terms', 'limit_car_status_to_one', 10, 4);

function car_status_single_select_js($hook) {
    if (!in_array($hook, ['post.php', 'post-new.php'])) {
        return;
    }

    global $post_type;

    if ($post_type !== 'cars') {
        return;
    }

    ?>
    <script>
        jQuery(document).on('change', '#car_statuschecklist input[type="checkbox"]', function() {
            $('#car_statuschecklist input[type="checkbox"]').not(this).prop('checked', false);
        });
    </script>
    <?php
}
add_action('admin_footer', 'car_status_single_select_js');

function mehanik_store_widgets_init()
{
    register_sidebar([
            'name' => 'Main Phone Widget Area',
            'id' => 'main-phone-widget',
            'before_widget' => '',
            'after_widget' => '',
        ]
    );

    register_sidebar([
            'name' => 'Phone Widget Area',
            'id' => 'phone-widget',
            'before_widget' => '',
            'after_widget' => '',
        ]
    );

    register_sidebar([
            'name' => 'Social Widget Area',
            'id' => 'social-widget',
            'before_widget' => '',
            'after_widget' => '',
        ]
    );

    register_sidebar([
            'name' => 'Painting Widget Area',
            'id' => 'painting-widget',
            'before_widget' => '<div class="slider__widget wow animate__fadeInUp">',
            'after_widget' => '</div>',
        ]
    );

    register_sidebar([
            'name' => 'Production Cards Widget Area',
            'id' => 'production-widget',
            'before_sidebar' => '<div class="production__blocks">',
            'after_sidebar' => '</div>',
        ]
    );
}

add_action('widgets_init', 'mehanik_store_widgets_init');

function disable_shipping_calc_on_cart($show_shipping)
{
    if (is_cart()) {
        return false;
    }
    return $show_shipping;
}

add_filter('woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99);

function add_suggested_price_checkbox()
{
    woocommerce_wp_checkbox(array(
        'id' => '_enable_suggested_price',
        'label' => 'Enable "Your Price"',
        'description' => 'Allow customer to set his own price on this product',
        'desc_tip' => true,
    ));
}

add_action('woocommerce_product_options_general_product_data', 'add_suggested_price_checkbox');

function save_suggested_price_checkbox($post_id)
{
    $is_enabled = isset($_POST['_enable_suggested_price']) ? 'yes' : 'no';
    update_post_meta($post_id, '_enable_suggested_price', $is_enabled);
}

add_action('woocommerce_process_product_meta', 'save_suggested_price_checkbox');

add_action('woocommerce_after_add_to_cart_button', 'add_suggest_price_button');
function add_suggest_price_button()
{
    global $product;
    $enabled = $product->get_meta('_enable_suggested_price');
    if ($enabled === 'yes') {
        echo '<button id="suggest-price-btn" type="button" class="button suggest-price-btn">Suggest Your Price</button>';
    }
}

add_action('wp_footer', 'suggest_price_popup');
function suggest_price_popup()
{
    ?>
    <div id="suggest-price-overlay"></div>
    <div id="suggest-price-popup">
        <div class="popup-content">
            <span class="popup-close">&times;</span>
            <h2>Suggest Your Price</h2>
            <!-- Message area -->
            <div id="suggest-price-message" style="display:none;"></div>

            <form id="suggest-price-form">
                <label>Your Email or Phone:</label>
                <input type="text" name="contact" required>

                <label>Your Suggested Price:</label>
                <input type="number" name="suggested_price" min="1" step="any" required>

                <input type="hidden" name="product_id" value="">
                <button type="submit">Send Suggestion</button>
            </form>
        </div>
    </div>
    <?php
}

add_action('wp_ajax_send_suggest_price', 'send_suggest_price');
add_action('wp_ajax_nopriv_send_suggest_price', 'send_suggest_price');

function send_suggest_price()
{
    if (!isset($_POST['product_id'], $_POST['contact'], $_POST['suggested_price'])) {
        wp_send_json_error('Missing data');
    }

    $product_id = intval($_POST['product_id']);
    $contact = sanitize_text_field($_POST['contact']);
    $suggested_price = floatval($_POST['suggested_price']);

    $product = wc_get_product($product_id);
    $original_price = $product->get_price();
    $product_title = $product->get_name();
    $product_url = get_permalink($product_id);

    // Email content
    $to = get_option('admin_email');
    $subject = "New Price Suggestion for {$product_title}";
    $message = "
        Product: {$product_title}\n
        Link: {$product_url}\n
        Original Price: {$original_price}\n
        Suggested Price: {$suggested_price}\n
        Customer Contact: {$contact}
    ";

    wp_mail($to, $subject, $message);

    wp_send_json_success('Thank you! Your suggestion was sent.');
}

function wrap_quantity_and_button_start()
{
    echo '<div class="customer-buy-block">';
}

add_action('woocommerce_before_add_to_cart_quantity', 'wrap_quantity_and_button_start', 5);

function wrap_quantity_and_button_end()
{
    echo '</div>';
}

add_action('woocommerce_after_add_to_cart_button', 'wrap_quantity_and_button_end', 20);