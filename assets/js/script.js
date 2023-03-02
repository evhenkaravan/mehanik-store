jQuery(function ($) {
    wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animate__animated',
    });
    wow.init();


    if ($(window).width() > 1500) {
        $('.service__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.slider__slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.car-sales__slider').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    } else if ($(window).width() > 1050) {
        $('.service__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.slider__slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.car-sales__slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    } else if ($(window).width() > 800) {
        $('.service__slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.slider__slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.car-sales__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    } else if ($(window).width() > 415) {
        $('.service__slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.slider__slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.car-sales__slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    } else {
        $('.service__slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.slider__slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        $('.car-sales__slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }

    let total = 0;

    let children = $('.cart__product-price span').map(function () {
        return $(this).text();
    }).get();

    for (let i = 0; i < children.length; i++) {
        total += parseInt(children[i]);
    }

    $('.cart__total span').text(total);

    $('.overlay').fadeOut(1000);

    $('.header__burger').click(function () {
        $(this).toggleClass('header__burger_active');
        $('.wrapper').toggleClass('wrapper--fixed');
        if ($(this).hasClass('header__burger_active')) {
            $('.burger-menu').fadeIn(500);
        } else {
            $('.burger-menu').fadeOut(500);
        }
    });

    $('.cart__product-num-img').click(function () {
        let child = $(this).parent('.cart__product-num').find('.cart__product-num-val');
        let price1 = $(this).parent('.cart__product-num').parent().find('.cart__product-price .cart__product-price-1');
        let price2 = $(this).parent('.cart__product-num').parent().find('.cart__product-price span');
        let productid = parseInt($(this).parent('.cart__product-num').parent().find('.cart__product-price .cart__product-id').text());

        console.log(productid);

        let min = parseInt(child.text()) - 1;
        let plus = parseInt(child.text()) + 1;
        if ($(this).data('num') == 'min') {
            $.ajax({//передаем ajax-запросом данные
                type: "POST", //метод передачи данных
                url: 'api/addtocart.php',//php-файл для обработки данных
                data: {"id": productid, "min": true},//передаем наши данные
                success: function (data) {//
                    $('.basker_kol').html(data);//меняем количество товаров на кнопке корзины
                }
            });

            if (min <= 0) {
                $(this).parent('.cart__product-num').parent().parent().parent('.cart__product').remove();
            } else {
                child.text(min);
                price2.text(parseInt(price1.text()) * parseInt(child.text()));
            }
        } else {
            $.ajax({//передаем ajax-запросом данные
                type: "POST", //метод передачи данных
                url: 'api/addtocart.php',//php-файл для обработки данных
                data: {"id": productid},//передаем наши данные
                success: function (data) {//
                    $('.basker_kol').html(data);//меняем количество товаров на кнопке корзины
                }
            });

            if (plus != 11) {
                child.text(plus);
                price2.text(parseInt(price1.text()) * parseInt(child.text()));
            }
        }

        let total = 0;

        let children = $('.cart__product-price span').map(function () {
            return $(this).text();
        }).get();

        for (let i = 0; i < children.length; i++) {
            total += parseInt(children[i]);
        }
        ;

        $('.cart__total span').text(total);
    });

    $('.auth__form-link').click(function () {
        $('.auth__sign-in').toggleClass('auth__sign-in_active');
        $('.auth__sign-up').toggleClass('auth__sign-up_active');
    });

    $(".checkout__copy").click(function (event) {
        let copyData = event.target.closest(".checkout__form-wrapper").querySelector(".checkout__form-input").value;
        navigator.clipboard.writeText(copyData);
    });

    $('.checkout__form-contact').click(function () {
        $('.checkout__form-contact').removeClass('checkout__form-contact_active');
        $(this).addClass('checkout__form-contact_active');
        document.querySelector(".contacttype").value = $(this).attr('id');
    });

    $('.open-block').click(function () {
        $('.account__link').removeClass('account__link_active');
        $('.account__link[data-open="' + $(this).data('open') + '"]').addClass('account__link_active');
        $('.account__end').css({
            display: 'none'
        });
        $('.account__' + $(this).data('open') + '').css({
            display: 'flex'
        });
    });

    $('.account__profile-params').click(function () {
        $('.account__profile-more').css({
            display: 'none'
        });

        $('.account__profile-params').css({
            background: "url('img/profile/pencil.svg') center center no-repeat"
        });

        if ($(this).attr('data-edit') == 'f') {
            $('.account__profile-params').attr('data-edit', 'f');
            $(this).attr('data-edit', 't');
            $(this).css({
                background: "url('img/profile/cross.svg') center center no-repeat"
            });

            $('.account__profile-' + $(this).data('param') + '-more').css({
                display: 'flex'
            });
        } else {
            $('.account__profile-params').attr('data-edit', 'f');
            $(this).attr('data-edit', 'f');
        }
    });

    $('.account__addresses-params').click(function () {
        $('.account__addresses-more').css({
            display: 'none'
        });

        $('.account__addresses-params').css({
            background: "url('img/profile/pencil.svg') center center no-repeat"
        });

        if ($(this).attr('data-edit') == 'f') {
            $('.account__addresses-params').attr('data-edit', 'f');
            $(this).attr('data-edit', 't');
            $(this).css({
                background: "url('img/profile/cross.svg') center center no-repeat"
            });

            $('.account__addresses-' + $(this).data('param') + '-more').css({
                display: 'flex'
            });
        } else {
            $('.account__addresses-params').attr('data-edit', 'f');
            $(this).attr('data-edit', 'f');
        }
    });
});
