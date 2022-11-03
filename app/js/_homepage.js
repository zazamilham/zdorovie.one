//слайдер докторов
jQuery(document).ready(function ($) {
  $('.doctors__items').slick({
    infinite: true,
    autoplay: true,
    prevArrow: '<i class="fas fa-chevron-left slick-prev slick-arrows"></i>',
    nextArrow: '<i class="fas fa-chevron-right slick-next slick-arrows"></i>',
    autoplaySpeed: 7000,
    dots: false,
    accessibility: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    variableWidth: false,
    mobileFirst: true,
    centerMode: false,
    centerPadding: '50px',
    pauseOnHover: true,
    lazyLoad: 'ondemand',
    responsive: [
      {
        breakpoint: 1280,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2,
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
        }
      }
      ,
      {
        breakpoint: 400,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        }
      }
    ],


  });
});

