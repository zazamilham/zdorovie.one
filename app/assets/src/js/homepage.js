//слайдер докторов
jQuery(document).ready(function ($) {
    if ($(".slider__section")) {
        $(".slider__section").slick({
            infinite: true,
            autoplay: true,
            prevArrow:
                '<i class="slider__arrow slider__arrow--left fas fa-chevron-left fp-controlArrow fp-prev"></i>',
            nextArrow:
                '<i class="slider__arrow slider__arrow--right fas fa-chevron-right fp-controlArrow fp-next"></i>',
            autoplaySpeed: 5000,
            dots: false,
            accessibility: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: false,
            mobileFirst: true,
            centerMode: false,
            // centerPadding: '50px',
            pauseOnHover: false,
            pauseOnFocus: false,
            // lazyLoad: "ondemand",
        });
    }

    if ($(".doctors__items")) {
        $(".doctors__items").slick({
            infinite: false,
            autoplay: true,
            prevArrow:
                '<i class="fas fa-chevron-left slick-prev slick-arrows"></i>',
            nextArrow:
                '<i class="fas fa-chevron-right slick-next slick-arrows"></i>',
            autoplaySpeed: 7000,
            dots: false,
            accessibility: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: false,
            mobileFirst: true,
            centerMode: false,
            centerPadding: "50px",
            pauseOnHover: true,
            lazyLoad: "progressive",
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 3,
                    },
                },
                {
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 870,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    },
                },
            ],
        });
    }
});
