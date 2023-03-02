jQuery(function($) {
    $(document).ready(function () {
        $(".header__link").on("click", event => {
            if ($(event.target).attr("data-type") == "shop") {
                event.preventDefault();
                $([document.documentElement, document.body]).animate({ scrollTop: $("#production").offset().top - 200 }, 100);
            }
        })
    });
});