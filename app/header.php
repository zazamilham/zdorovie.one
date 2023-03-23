<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>

  <!-- Google Tag Manager -->
  <script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-5TWSFX5');
  </script>
  <!-- End Google Tag Manager -->

</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TWSFX5" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div id="wptime-plugin-preloader"></div>
  <div id="record__btn" class="record__btn medods-record-btn">Онлайн-запись</div>
  <!-- header menu -->
  <header class="header">
    <div class="header__top-adres-container">
      <div class="header__wrap">
        <a class="link header__top-adres" href="#footer">
          <?
          $all_options = get_option('true_options');
						$clink1 = $all_options['checkbox_1'];
						$clink2 = $all_options['checkbox_2'];
						$clink3 = $all_options['checkbox_3'];
						$clink4 = $all_options['checkbox_4'];
						$clink5 = $all_options['checkbox_5'];
          if ($clink1) {
            echo '<i class="fas fa-map-marker-alt"></i>' . $all_options['adres_1'];
          }?>
          <?if ($clink2) {
            echo '<i class="fas fa-map-marker-alt"></i>' . $all_options['adres_2'];
          }?>
          <?if ($clink3) {
            echo '<i class="fas fa-map-marker-alt"></i>' . $all_options['adres_3'];
          }?>
        </a>
      </div>
    </div>
    <div class="header__wrap">
      <div class="header__menu-container">
        <div class="header__logo">
          <a class="link header__logo-link header__logo-link--desktop" href="<?php echo home_url(); ?>"><img
              src="<?php bloginfo('template_url'); ?>/assets/theme/img/logo.png" alt="logo"></a>
          <a class="link header__logo-link header__logo-link--mobile" href="<?php echo home_url(); ?>"><img
              src="<?php bloginfo('template_url'); ?>/assets/theme/img/logo_m.png" alt="logo"></a>
        </div>
        <div class="header__menu-block">
          <div class="header__search">
            <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
            <div class="search__close-inner">
              <div class="search__close"></div>
            </div>
          </div>
          <div class="header__menu">
            <!-----МЕНЮ----->
            <button class="burger__call burger__icon-call medods-record-btn">Онлайн запись</button>
            <?php $all_options = get_option('true_options'); ?>
            <a class="link burger__call burger__icon-phone"
              href="tel:<?php echo $all_options['number_phone']; ?>"><?php echo $all_options['number_phone']; ?></a>

            <?php
            $args = array(
              'theme_location' => 'head_menu'
            );
            wp_nav_menu($args);

            ?>

          </div>
          <div class="header__buttons-block">
            <div class="header__btn header__btn-search"><i class="fas fa-search search-btn"></i></div>
            <button class="header__btn header__call header__icon-call medods-record-btn">Онлайн запись</button>
            <a class="link header__btn header__call header__icon-phone"
              href="tel:<?php echo $all_options['number_phone']; ?>"><?php echo $all_options['number_phone']; ?></a>
            <div class="header__btn burger">
              <div class="burger__btn"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="side-form call-to-home" id="form__call-to-me">
    <div class="side-form__inner">
      <div class="side-form__inner-top">
        <div class="side-form__title"><i class="fas fa-briefcase-medical"></i>Вызов врача на дом</div>
        <div class="side-form__close"></div>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="1615" title="Вызов на дом"]');  ?>
    </div>
    <div class="side-form__bg"></div>
  </div>
  <div class="side-form vacancy" id="form__vacancy">
    <div class="side-form__inner">
      <div class="side-form__inner-top">
        <div class="side-form__title"><i class="far fa-address-card"></i>Заполните анкету</div>
        <div class="side-form__close"></div>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="1616" title="Вакансии"]');  ?>
      <a class="link side-form__link" href="<?php echo home_url(); ?>/vacancy">Посмотреть все вакансии</a>
    </div>
    <div class="side-form__bg"></div>
  </div>
  <div class="bvi-btn">
    <!-- <?php echo do_shortcode('[bvi text="Версия для слабовидящих"]'); ?> -->
  </div>