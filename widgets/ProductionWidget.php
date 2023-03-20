<?php

declare(strict_types=1);

namespace widgets;

use WP_Widget;

final class ProductionWidget extends WP_Widget
{
    function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'scripts']);

        parent::__construct(
            'ProductionWidget',
            __('Mehanik-store Production Widget', 'mehanik-store'),
            ['description' => __('Widget for production block', 'mehanik-store')]
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before widget'];

        $image = !empty($instance['image']) ? $instance['image'] : '';
        $name = $instance['name'] ?? '';
        $link = $instance['link'] ?? '#';
        ?>

        <div
                class="production__block wow animate__fadeInRightBig"
                data-wow-delay="0.25s"
            <?php
            if ($image) {
                ?>
                style="background: url(<?php
                echo esc_url($image); ?>) center center no-repeat;"
                <?php
            } ?>
        >
            <div class="production__block-header">
                <?php
                _e($name, 'mehanik-store') ?>
            </div>
            <a class="production__block-link" href="<?= $link; ?>">
                <?php
                _e('Details', 'mehanik-store') ?>
            </a>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $link = $instance['link'] ?? '';
        $name = $instance['name'] ?? '';
        $image = $instance['image'] ?? '';
        ?>
        <p>
            <label for="<?php
            echo $this->get_field_id('link'); ?>"><?php
                _e('Link:'); ?></label>
            <input class="widefat" id="<?php
            echo $this->get_field_id('link'); ?>" name="<?php
            echo $this->get_field_name('link'); ?>" type="text" value="<?php
            echo esc_attr($link); ?>"/>
            <label for="<?php
            echo $this->get_field_id('name'); ?>"><?php
                _e('Name:'); ?></label>
            <input class="widefat" id="<?php
            echo $this->get_field_id('name'); ?>" name="<?php
            echo $this->get_field_name('name'); ?>" type="text" value="<?php
            echo esc_attr($name); ?>"/>
        </p>
        <p>
            <label for="<?php
            echo $this->get_field_id('image'); ?>"><?php
                _e('Image:'); ?></label>
            <input
                    class="widefat"
                    id="<?php
                    echo $this->get_field_id('image'); ?>"
                    name="<?php
                    echo $this->get_field_name('image'); ?>"
                    type="text"
                    value="<?php
                    echo esc_url($image); ?>"
            />
            <button class="upload_image_button button button-primary" style="margin-top: 10px;">Upload Image</button>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['name'] = (!empty($new_instance['name'])) ? strip_tags($new_instance['name']) : '';
        $instance['link'] = (!empty($new_instance['link'])) ? strip_tags($new_instance['link']) : '';
        $instance['image'] = (!empty($new_instance['image'])) ? $new_instance['image'] : '';

        return $instance;
    }

    public function scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_media();
        wp_enqueue_script(
            'mehanik-store-admin',
            get_stylesheet_directory_uri() .
            '/assets/js/admin.js',
            ['jquery'],
            '6.1.2'
        );
    }
}
