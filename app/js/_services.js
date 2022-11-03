jQuery(function ($) {

  //играемся с якорями при открытии страницы
  var url = location.hash;
  var pageItem1 = '#analyzes';
  var pageItem2 = '#diagnostics';
  var pageItem3 = '#reproductive-health';
  var pageItem4 = '#adults';
  var pageItem5 = '#kids';
  var pageItemS = '#search';

  console.log(url);

  if (url.indexOf(pageItem1) > -1) {
    $('.page-services__link').removeClass('page-services__link--active');
    $('.page-services__link-1').addClass('page-services__link--active');
    $('.page-services__item').removeClass('page-services__item--active');
    $('#page-services__item--1').addClass('page-services__item--active');

  }
  else {
    if (url.indexOf(pageItem2) > -1) {
      $('.page-services__link').removeClass('page-services__link--active');
      $('.page-services__link-2').addClass('page-services__link--active');
      $('.page-services__item').removeClass('page-services__item--active');
      $('#page-services__item--2').addClass('page-services__item--active');
    }
    else {
      if (url.indexOf(pageItem3) > -1) {
        $('.page-services__link').removeClass('page-services__link--active');
        $('.page-services__link-3').addClass('page-services__link--active');
        $('.page-services__item').removeClass('page-services__item--active');
        $('#page-services__item--3').addClass('page-services__item--active');
      }
      else {
        if (url.indexOf(pageItem4) > -1) {
          $('.page-services__link').removeClass('page-services__link--active');
          $('.page-services__link-4').addClass('page-services__link--active');
          $('.page-services__item').removeClass('page-services__item--active');
          $('#page-services__item--4').addClass('page-services__item--active');
        }
        else {
          if (url.indexOf(pageItem5) > -1) {
            $('.page-services__link').removeClass('page-services__link--active');
            $('.page-services__link-5').addClass('page-services__link--active');
            $('.page-services__item').removeClass('page-services__item--active');
            $('#page-services__item--5').addClass('page-services__item--active');
          }
          else {
            if (url.indexOf(pageItemS) > -1) {
              $('.page-services__link').removeClass('page-services__link--active');
              $('.page-services__item').removeClass('page-services__item--active');
              $('#page-services__item--s').addClass('page-services__item--active');
            }
            else {
              $('.page-services__link').removeClass('page-services__link--active');
              $('.page-services__link-1').addClass('page-services__link--active');
              window.location.hash = '#analyzes';
              $('.page-services__item').removeClass('page-services__item--active');
              $('#page-services__item--1').addClass('page-services__item--active');
            }
          }
        }
      }
    }
  }

  //играемся с якорями при клике
  $(".page-services__link").click(function () {
    $('.page-services__link').removeClass('page-services__link--active');
    // $('.category__description').removeClass('category__description--active');
    $(this).addClass('page-services__link--active');
  });

  $(".page-services__link-1").click(function () {
    $('.page-services__item').removeClass('page-services__item--active');
    $('#page-services__item--1').addClass('page-services__item--active');
  });
  $(".page-services__link-2").click(function () {
    $('.page-services__item').removeClass('page-services__item--active');
    $('#page-services__item--2').addClass('page-services__item--active');
  });
  $(".page-services__link-3").click(function () {
    $('.page-services__item').removeClass('page-services__item--active');
    $('#page-services__item--3').addClass('page-services__item--active');
  });
  $(".page-services__link-4").click(function () {
    $('.page-services__item').removeClass('page-services__item--active');
    $('#page-services__item--4').addClass('page-services__item--active');
  });
  $(".page-services__link-5").click(function () {
    $('.page-services__item').removeClass('page-services__item--active');
    $('#page-services__item--5').addClass('page-services__item--active');
  });
  $("#services_search").click(function () {
    $('.page-services__link').removeClass('page-services__link--active');
    $('.page-services__item').removeClass('page-services__item--active');
    $('#page-services__item--s').addClass('page-services__item--active');
    window.location.hash = '#search';
  });

  //сортировка по двум колонкам
  $(document).ready(function () {
    $(".page-services__item").each(function () {
      $(this).children(".page-services__item-box").children(".page-services__category:nth-child(odd)").addClass('page-services__category-l');
      $(this).children(".page-services__item-box").children(".page-services__category:nth-child(even)").addClass('page-services__category-r');
      $(this).children(".page-services__item-box").children(".page-services__category-l").wrapAll("<div class='page-services__item-box-left' />");
      $(this).children(".page-services__item-box").children(".page-services__category-r").wrapAll("<div class='page-services__item-box-right' />");
    });
  });

  //аккордеон в услугах
  // $(".category__description").click(function () {
  //   if ($(this).hasClass('category__description--active')) {
  //     $(this).removeClass('category__description--active');

  //   }
  //   else {
  //     $('.category__description').not($(this)).removeClass('category__description--active');
  //     $('.category__description-child').removeClass('category__description--active');
  //     $(this).addClass('category__description--active');
  //   }
  // });

  // $(".category__description-child").click(function () {
  //   if ($(this).hasClass('category__description--active')) {
  //     $(this).removeClass('category__description--active');
  //   }
  //   else {
  //     $('.category__description-child').not($(this)).removeClass('category__description--active');
  //     $(this).addClass('category__description--active');
  //   }
  // });

  //поиск по услугам
  $("#services_search").keyup(function () {
    var $value = $(this).val();

    if ($value != '') {
      $(".category__service-description-child").each(function (index) {
        $row = $(this);
        var services_title_child = $row.find(".category__service-title-child").html();
        var reg = new RegExp($value, "i");
        if (services_title_child.match(reg)) {
          $row.clone().appendTo("#page-services__item--s .page-services__category").mark($value);
        } else {
          $("#page-services__item--s .page-services__category").find($row).remove();
        }
      });
      $(".category__service-description").each(function (index) {
        $row = $(this);
        var services_title = $row.find(".category__service-title").html();
        var reg = new RegExp($value, "i");
        if (services_title.match(reg)) {
          $row.clone().appendTo("#page-services__item--s .page-services__category").mark($value);
        } else {
          $("#page-services__item--s .page-services__category").find($row).remove();
        }
      });
    }
    else {
      $("#page-services__item--s .page-services__category .category__service-description").remove();
      $("#page-services__item--s .page-services__category .category__service-description-child").remove();
    }

  });

});