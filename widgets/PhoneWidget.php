<?php

declare(strict_types=1);

namespace widgets;

use WP_Widget;

final class PhoneWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'PhoneWidget',
            __('Mehanik-store Phone Widget', 'mehanik-store'),
            ['description' => __('Widget for contact phone numbers', 'mehanik-store')]
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before widget'];

        if (!empty ($title))
            echo $args['before_title'] . $title . $args['after_title'];

        ?>
        <ul class="wrapper-social__phone">
            <li>
                <a class="social__phone" href="tel:<?= preg_replace("/\s+/", "", $instance['phone'] ?? ''); ?>">
                    <img src="<?= trailingslashit(get_stylesheet_directory_uri()) ?>assets/img/phone.svg" alt="phone">
                    <span><?= $instance['phone'] ?? ''; ?> (<?= __('Main')?>)</span>
                </a>
            </li>
            <li>
                <a class="social__phone" href="tel:<?= preg_replace("/\s+/", "", $instance['car_sales_phone'] ?? ''); ?>">
                    <img src="<?= trailingslashit(get_stylesheet_directory_uri()) ?>assets/img/phone.svg" alt="car_sales_phone">
                    <span><?= $instance['car_sales_phone'] ?? ''; ?> (<?= __('Car sales')?>)</span>
                </a>
            </li>
            <li>
                <a class="social__phone" href="tel:<?= preg_replace("/\s+/", "", $instance['oem_carbon_phone'] ?? ''); ?>">
                    <img src="<?= trailingslashit(get_stylesheet_directory_uri()) ?>assets/img/phone.svg" alt="oem_carbon_phone">
                    <span><?= $instance['oem_carbon_phone']  ?? ''; ?> (<?= __('OEM & Carbon parts')?>)</span>
                </a>
            </li>
        </ul>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {

        $title = $instance['title'] ?? __('Default Title', 'mehanik-store');
        $phone = $instance['phone'] ?? __('Default Phone', 'mehanik-store');
        $carSalesPhone = $instance['car_sales_phone'] ?? __('Car Sales Phone', 'mehanik-store');
        $oemCarbonPhone = $instance['oem_carbon_phone'] ?? __('OEM & Carbon parts Phone', 'mehanik-store');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>

            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>"
                   name="<?php echo $this->get_field_name('phone'); ?>" type="text"
                   value="<?php echo esc_attr($phone); ?>"/>

            <label for="<?php echo $this->get_field_id('car_sales_phone'); ?>"><?php _e('Car Sales Phone:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('car_sales_phone'); ?>"
                   name="<?php echo $this->get_field_name('car_sales_phone'); ?>" type="text"
                   value="<?php echo esc_attr($carSalesPhone); ?>"/>

            <label for="<?php echo $this->get_field_id('oem_carbon_phone'); ?>"><?php _e('OEM & Carbon parts Phone:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('oem_carbon_phone'); ?>"
                   name="<?php echo $this->get_field_name('oem_carbon_phone'); ?>" type="text"
                   value="<?php echo esc_attr($oemCarbonPhone); ?>"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['phone'] = (!empty($new_instance['phone'])) ? strip_tags($new_instance['phone']) : '';
        $instance['car_sales_phone'] = (!empty($new_instance['car_sales_phone'])) ? strip_tags($new_instance['car_sales_phone']) : '';
        $instance['oem_carbon_phone'] = (!empty($new_instance['oem_carbon_phone'])) ? strip_tags($new_instance['oem_carbon_phone']) : '';

        return $instance;
    }
}
