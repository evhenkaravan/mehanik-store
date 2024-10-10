jQuery(function ($) {
    wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animate__animated',
    });
    wow.init();

    if ($(window).width() > 1500) {
        $('.car-sales__slider').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow:"<button class=\"glide__arrow glide__arrow--left\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>",
            nextArrow:"<button class=\"glide__arrow glide__arrow--right\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>"
        });
    } else if ($(window).width() > 1050) {
        $('.car-sales__slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow:"<button class=\"glide__arrow glide__arrow--left\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>",
            nextArrow:"<button class=\"glide__arrow glide__arrow--right\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>"
        });
    } else if ($(window).width() > 800) {
        $('.car-sales__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow:"<button class=\"glide__arrow glide__arrow--left\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>",
            nextArrow:"<button class=\"glide__arrow glide__arrow--right\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>"
        });
    } else if ($(window).width() > 415) {
        $('.car-sales__slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow:"<button class=\"glide__arrow glide__arrow--left\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>",
            nextArrow:"<button class=\"glide__arrow glide__arrow--right\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>"
        });
    } else {
        $('.car-sales__slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow:"<button class=\"glide__arrow glide__arrow--left\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>",
            nextArrow:"<button class=\"glide__arrow glide__arrow--right\">" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 100 100\" role=\"img\" aria-hidden=\"true\">" +
                "<path d=\"M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z\">" +
                "</path>" +
                "</svg>" +
                "</button>"
        });
    }

    $('.overlay-loader').fadeOut(1000);

    $('.header__burger').click(function () {
        $(this).toggleClass('header__burger_active');
        $('.wrapper').toggleClass('wrapper--fixed');
        if ($(this).hasClass('header__burger_active')) {
            $('.burger-menu').fadeIn(500);
            $('.overlay-menu').fadeIn(500);
        } else {
            $('.burger-menu').fadeOut(500);
            $('.overlay-menu').fadeOut(500);
        }
    });
});
