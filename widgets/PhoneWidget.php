<?php

declare(strict_types=1);

namespace widgets;

use WP_Widget;

final class PhoneWidget extends WP_Widget
{
    function __construct() {
        parent::__construct(
            'PhoneWidget',
            __('Mehanik-store Phone Widget', 'mehanik-store'),
            ['description' => __( 'Widget for contact phone number', 'mehanik-store' )]
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before widget'];

        If ( ! empty ( $title ) )
            Echo $args['before_title'] . $title . $args['after_title'];

        ?>
        <a class="social__phone" href="tel:<?= preg_replace("/\s+/", "", $instance['phone'] ?? ''); ?>">
            <img src="<?= trailingslashit(get_stylesheet_directory_uri()) ?>assets/img/phone.svg" alt="phone">
            <span><?= $instance['phone'] ?? ''; ?></span>
        </a>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {

        $title = $instance[ 'title' ] ??  __( 'Default Title', 'mehanik-store' );
        $phone = $instance[ 'phone' ] ??  __( 'Default Phone', 'mehanik-store' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';

        return $instance;
    }
}
