<?php
/* Template Name: Home page */

get_header();
?>
    <section class="hero" id="hero">
        <div class="ms-container hero__container">
            <h2 class="hero__header wow animate__fadeInUpBig">
                <?php
                _e('Mehanik', 'mehanik-store') ?>
            </h2>
            <div class="hero__subheader wow animate__fadeInUpBig">
                <?php
                _e(
                    'We offer a wide range of services for the repair, maintenance and improvement your car.',
                    'mehanik-store'
                ) ?>
            </div>
        </div>
        <div class="hero__arrow wow animate__fadeInUpBig">
            <img src="<?= trailingslashit(get_stylesheet_directory_uri()) ?>assets/img/hero/arrow-down.svg"
                 alt="arrow-down">
        </div>
    </section>
    <section class="about-work" id="about-work">
        <div class="ms-container about-work__container wow animate__fadeInRightBig">
            <h2 class="container__header">
                <?php
                _e('Service', 'mehanik-store') ?>
            </h2>
            <div class="container__description about-work__subheader">
                <?php
                _e('Services of high-quality and qualified repair, maintenance of BMW.', 'mehanik-store') ?>
            </div>
            <div class="about-work__blocks">
                <div class="about-work__block">
                    <?php
                    _e('Maintenance', 'mehanik-store') ?>
                </div>
                <div class="about-work__block">
                    <?php
                    _e('Diagnostics', 'mehanik-store') ?>
                </div>
                <div class="about-work__block">
                    <?php
                    _e('Engine repair', 'mehanik-store') ?>
                </div>
                <div class="about-work__block">
                    <?php
                    _e('Lights regulation', 'mehanik-store') ?>
                </div>
                <div class="about-work__block">
                    <?php
                    _e('Air conditioner service', 'mehanik-store') ?>
                </div>
            </div>
        </div>
    </section>
    <section class="service" id="service">
        <div class="ms-container service__container">
            <h2 class="container__header wow animate__fadeInUp">
                <?php
                _e('Painting', 'mehanik-store') ?>
            </h2>
            <div class="container__description wow animate__fadeInUp">
                <?php
                _e(
                    'Body painting. Wheels painting. Exterior parts painting. Carbon parts clear coating.',
                    'mehanik-store'
                ) ?>
            </div>
            <?php
            if (is_active_sidebar('painting-widget')) {
                dynamic_sidebar('painting-widget');
            }
            ?>
        </div>
    </section>
    <section class="detailing" id="detailing">
        <div class="ms-container detailing__container">
            <h2 class="container__header wow animate__fadeInUp">
                <?php
                _e('Detailing', 'mehanik-store') ?>
            </h2>
            <div class="detailing__wrapper">
                <div class="detailing__block wow animate__fadeInRightBig" data-wow-delay="0.25s">
                    <?php
                    _e('Removal bitumen, acids and iron from the body', 'mehanik-store') ?>
                </div>
                <div class="detailing__block wow animate__fadeInRightBig" data-wow-delay="0.5s">
                    <?php
                    _e('3 Step Polishing', 'mehanik-store') ?>
                </div>
                <div class="detailing__block wow animate__fadeInRightBig" data-wow-delay="0.75s">
                    <?php
                    _e('Leather Repair and Maintenance + Ceramic Coating', 'mehanik-store') ?>
                </div>
                <div class="detailing__block wow animate__fadeInRightBig" data-wow-delay="1s">
                    <?php
                    _e('Interior parts Refurbishing', 'mehanik-store') ?>
                </div>
                <div class="detailing__block wow animate__fadeInRightBig" data-wow-delay="1.25s">
                    <?php
                    _e('Wheels Refurbishing + Ceramic Coating for Wheels and Calipers', 'mehanik-store') ?>
                </div>
                <div class="detailing__block wow animate__fadeInRightBig" data-wow-delay="1.5s">
                    <?php _e('PPF installation for body and Interior Parts', 'mehanik-store'); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="manufacturer" id="manufacturer">
        <div class="ms-container manufacturer__container">
            <?php
            $manufacturers = get_posts([
                'post_type' => 'brands',
                'post_status' => 'publish',
                'numberposts' => -1,
                'order' => 'ASC'
            ]);
            $delayCount = 1;
            foreach ($manufacturers as $manufacturer) {
                $manufacturerImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($manufacturer->ID), 'large');
                ?>
                <div class="manufacturer__item wow animate__fadeInRightBig"
                     data-wow-delay="<?= $delayCount * 0.25; ?>s">
                    <img class="manufacturer__item-img_1"
                         src="<?= !empty($manufacturerImageUrl[0]) ? esc_url($manufacturerImageUrl[0]) : ''; ?>"
                         alt="1">
                    <div class="manufacturer__name">
                        <?= $manufacturer->post_title; ?>
                    </div>
                </div>
                <?php
                $delayCount++;
            }
            ?>
        </div>
    </section>
    <section class="production" id="production">
        <div class="ms-container production__container">
            <h2 class="container__header wow animate__fadeInUp">
                <?php
                _e('Carbon parts production for BMW M Models including Interior Parts', 'mehanik-store') ?>
            </h2>
            <?php
            if (is_active_sidebar('production-widget')) {
                dynamic_sidebar('production-widget');
            }
            ?>
        </div>
    </section>
    <section class="car-sales" id="car-sales">
        <div class="ms-container car-sales__container">
            <h2 class="container__header wow animate__fadeInUp">
                <?php
                _e('Car sales', 'mehanik-store') ?>
            </h2>
            <div class="container__description wow animate__fadeInUp">
                <?php
                _e('Ordering and Delivery cars from Germany', 'mehanik-store') ?>
            </div>
            <div class="car-sales__slider wow animate__fadeInUp">
                <?php
                $cars = get_posts([
                    'post_type' => 'cars',
                    'post_status' => 'publish',
                    'numberposts' => -1,
                    'order' => 'ASC'
                ]);
                foreach ($cars as $car) {
                    $carImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($car->ID), 'large');
                    ?>
                    <div class="car-sales__block">
                        <div class="car-sales__block-body">
                            <img class="car-sales__block-img"
                                 src="<?= !empty($carImageUrl[0]) ? esc_url($carImageUrl[0]) : ''; ?>"
                                 alt="1">
                            <div class="car-sales__block-wrapper">
                                <div class="car-sales__block-header">
                                    <?= $car->post_title; ?>
                                </div>
                                <div class="car-sales__block-subheader"><?= $car->post_content; ?></div>
                                <div class="car-sales__block-price">
                                    <?= get_post_meta($car->ID, 'car_price', true); ?> €
                                </div>
                                <a class="car-sales__block-btn"
                                   href="<?= get_post_meta($car->ID, 'car_link', true); ?>">
                                    <?php
                                    _e('Details', 'mehanik-store') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <section class="contacts" id="contacts">
        <div class="ms-container contacts__container">
            <div class="contacts__start wow animate__fadeInLeftBig">
                <h2 class="container__header">
                    <?php
                    _e('Contacts & Location', 'mehanik-store') ?>
                </h2>
                <div class="contacts__description">
                    <?php
                    _e('Gulbju street 35a,', 'mehanik-store') ?>
                    <br/>
                    <?php
                    _e('Riga, LV-1076, Latvia', 'mehanik-store') ?>
                </div>
                <div class="contacts__social">
                    <?php
                    if (is_active_sidebar('social-widget')) {
                        dynamic_sidebar('social-widget');
                    }
                    ?>
                </div>
                <?php
                if (is_active_sidebar('phone-widget')) {
                    dynamic_sidebar('phone-widget');
                }
                ?>
            </div>
            <div class="contacts__end wow animate__fadeInRightBig">
                <iframe class="contacts__map"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5297.484718044528!2d35.0435772!3d48.4038907!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eed1093ff53b75%3A0x38b2a0ca72f3ed30!2sBoobo%20Toys%2C%20SIA!5e0!3m2!1sru!2sru!4v1645788531350!5m2!1sru!2sru"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
<?php
get_footer(); ?>