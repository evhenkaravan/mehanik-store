<?php
/**
 * The template for displaying the footer
 *
 *
 * @package Mehanik Store
 * @since   1.0.0
 */

/**
 * Executes actions before main tag is closed.
 *
 * @since 1.0.4
 */
do_action('neve_before_primary_end');
?>

</main><!--/.neve-main-->

<?php

/**
 * Executes actions after main tag is closed.
 *
 * @since 1.0.4
 */
do_action('neve_after_primary');

/**
 * Filters the content parts.
 *
 * @param bool $status Whether the component should be displayed or not.
 * @param string $context The context name.
 * @since 1.0.9
 *
 */
if (apply_filters('neve_filter_toggle_content_parts', true, 'footer') === true) {
    /**
     * Executes actions before the footer was rendered.
     *
     * @since 1.0.0
     */
    do_action('neve_before_footer_hook');

    ?>
    <footer class="footer" id="footer">
        <div class="ms-container footer__container">
            <img src="<?= trailingslashit(get_stylesheet_directory_uri()) ?>assets/img/logo.svg" alt="logo">
            <div class="footer__text">
                Copyright © 2022 All rights reserved
            </div>
        </div>
    </footer>
    <?php

    /**
     * Executes actions after the footer was rendered.
     *
     * @since 1.0.0
     */
    do_action('neve_after_footer_hook');
}
?>

</div><!--/.wrapper-->
<?php

wp_footer();

/**
 * Executes actions before the body tag is closed.
 *
 * @since 2.11
 */
do_action('neve_body_end_before');

?>
</body>

</html>

