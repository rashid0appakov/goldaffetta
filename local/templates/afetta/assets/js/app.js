'use strict';

$(function () {
    $(".js-btn-tx").on('click', function (event) {
        $(this).toggleClass('open');
        $(".text__tx-in p").stop().slideToggle();
        return false;
    });

    $('.footer__lnk-top').on('click', function (event) {
        $('html, body').animate({ scrollTop: 0 }, 500);
        return false;
    });

    $('.footer__menu-title').on('click', function (event) {
        $(this).parent().toggleClass('open');
    });

    $(".filter__group-check").mCustomScrollbar();
    $(".address__list").mCustomScrollbar();

    $('.filter__all').on('click', function (event) {
        $(this).toggleClass('open').prevAll().toggleClass('open');
    });
    $('.filter__top').on('click', function (event) {
        $('.catalog-page__left').addClass('op');
        $('body').addClass('overfl');
    });
    $('.js-filter-close').on('click', function (event) {
        $('.catalog-page__left').removeClass('op');
        $('body').removeClass('overfl');
    });
    $('.filter__title').on('click', function (event) {
        $(this).toggleClass('open').parent('.filter__item').toggleClass('open');
    });

    $('.brand-arrow').on('click', function (event) {
        $(this).toggleClass('open');
        $('.brand__tx').toggleClass('open');
    });

    $('.js-list-btn').on('click', function (event) {
        $(this).parent().toggleClass('open');
    });

    $('.header__search-lnk').on('click', function (event) {
        $(this).parent().toggleClass('open');
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest(".header__search").length) {
            $('.header__search').removeClass('open');
        }
        e.stopPropagation();
    });

    $('.js-toggler').on('click', function (event) {
        $('.header').addClass('op');
        $('body').addClass('overfl');
    });
    $('.js-close-menu').on('click', function (event) {
        $('.header').removeClass('op');
        $('body').removeClass('overfl');
    });

    $('.header__menu .arr').on('click', function (event) {
        $(this).parent().toggleClass('op');
    });
    $('.drop-bl__item-title').on('click', function (event) {
        $(this).parent().toggleClass('opn');
    });

    $(".polzunok-5").slider({
        min: 0,
        max: 1200,
        values: [300, 11870],
        range: true,
        animate: true,
        slide: function slide(event, ui) {
            $(".polzunok-input-5-left").val(ui.values[0]);
            $(".polzunok-input-5-right").val(ui.values[1]);
        }
    });
    $(".polzunok-input-5-left").val($(".polzunok-5").slider("values", 0));
    $(".polzunok-input-5-right").val($(".polzunok-5").slider("values", 1));
    $(document).focusout(function () {
        var input_left = $(".polzunok-input-5-left").val(),
            opt_left = $(".polzunok-5").slider("option", "min"),
            where_right = $(".polzunok-5").slider("values", 1),
            input_right = $(".polzunok-input-5-right").val(),
            opt_right = $(".polzunok-5").slider("option", "max"),
            where_left = $(".polzunok-5").slider("values", 0);
        if (input_left > where_right) {
            input_left = where_right;
        }
        if (input_left < opt_left) {
            input_left = opt_left;
        }
        if (input_left == "") {
            input_left = 0;
        }
        if (input_right < where_left) {
            input_right = where_left;
        }
        if (input_right > opt_right) {
            input_right = opt_right;
        }
        if (input_right == "") {
            input_right = 0;
        }
        $(".polzunok-input-5-left").val(input_left);
        $(".polzunok-input-5-right").val(input_right);
        $(".polzunok-5").slider("values", [input_left, input_right]);
    });
    $('.polzunok-5').draggable();

    /*$('.js-awards__slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });*/

    $('.js-banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        fade: true,
        cssEase: 'linear'
    });

    $('.js-catalog-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        responsive: [{
            breakpoint: 1100,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 992,
            settings: {
                variableWidth: true,
                arrows: false
            }
        }]
    });

    $('.js-banner-dp-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        fade: true,
        cssEase: 'linear'
    });
    $('.js-banner-dp-slider-tw').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        fade: true,
        cssEase: 'linear',
        responsive: [{
            breakpoint: 991,
            settings: {
                arrows: false
            }
        }]
    });

    $('.js-article-main').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        responsive: [{
            breakpoint: 992,
            settings: {
                variableWidth: true,
                arrows: false
            }
        }]
    });

    $('.cart-product__slider-for.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true,
        asNavFor: '.slider-nav',
        responsive: [{
            breakpoint: 768,
            settings: {
                dots: false
            }
        }]
    });
    $('.cart-product__slider-nav.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        arrows: false,
        vertical: true,
        verticalSwiping: true,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true
            }
        }]
    });
});
//# sourceMappingURL=app.js.map
