<?php get_header();  ?>
<!-- страница списка записей блога -->


<div data-menuanchor="p1" class="bg bg2"></div>
<!-- ИНДЕКС -->
<div class="fullpage">
  <div class="search__wrap">
    <div class="search__close-inner">
      <div class="search__close"></div>
    </div>
    <div class="search__inner">

      <i class="fas fa-search"></i>
      <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    </div>
  </div>
  <section class="section">
    <div class="wrap">

      <div class="section__container">

        <?php
        $today = date("d.m.Y");
        $url_users = 'https://mediczdrav.medods.ru/api/v1/users?has_appointment=true&count=50';    //тянем список врачей (фильтр: ведущие прием; ограничение списка 50 - чтобы грузилось одной страницей)
        $url_specs = 'https://mediczdrav.medods.ru/api/v1/users/specialties'; //тянем список специализаций
        $url_schedules1 = 'https://mediczdrav.medods.ru/api/v1/schedules?date=' . $today . '&days_count=7&clinic_id=1'; //тянем список записей на приём
        $url_schedules2 = 'https://mediczdrav.medods.ru/api/v1/schedules?date=' . $today . '&days_count=7&clinic_id=2'; //тянем список записей на приём
        $url_prices = 'https://mediczdrav.medods.ru/api/v1/prices/tree'; //тянем список услуг
        $url_prices_catalogs = 'https://mediczdrav.medods.ru/api/v1/prices/catalogs'; //тянем список услуг
        $api_key  = 'TeU5zUbFWRyB_SMWeuzm';    //ключ доступа в API (брать в настройках CMS MEDODS)
        $result_users = wp_remote_get($url_users, array(  //задаем параметры запроса к API для списка врачей
          'headers' => array(
            'Authorization' => $api_key
          )
        ));
        $result_specs = wp_remote_get($url_specs, array(  //задаем параметры запроса к API для списка специализаций
          'headers' => array(
            'Authorization' => $api_key
          )
        ));
        $result_schedules1 = wp_remote_get($url_schedules1, array(  //задаем параметры запроса к API для списка записей на прием
          'headers' => array(
            'Authorization' => $api_key,
            'date' => $today,
            'days_count' => '7',
            'clinic_id' => '1'
          )
        ));
        $result_schedules2 = wp_remote_get($url_schedules2, array(  //задаем параметры запроса к API для списка записей на прием
          'headers' => array(
            'Authorization' => $api_key,
            'date' => $today,
            'days_count' => '7',
            'clinic_id' => '2'
          )
        ));
        $result_prices = wp_remote_get($url_prices, array(  //задаем параметры запроса к API для списка услуг
          'headers' => array(
            'Authorization' => $api_key
          )
        ));
        $result_prices_catalogs = wp_remote_get($url_prices_catalogs, array(  //задаем параметры запроса к API для списка услуг
          'headers' => array(
            'Authorization' => $api_key
          ),
          'timeout' => 10
        ));



        $result_users_decoded = json_decode(wp_remote_retrieve_body($result_users, true));  //декодируем ответ
        $result_specs_decoded = json_decode(wp_remote_retrieve_body($result_specs, true));  //декодируем ответ
        $schedules1 = json_decode(wp_remote_retrieve_body($result_schedules1, true));  //декодируем ответ
        $schedules2 = json_decode(wp_remote_retrieve_body($result_schedules2, true));  //декодируем ответ
        $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
        $prices_catalogs = json_decode(wp_remote_retrieve_body($result_prices_catalogs, true));  //декодируем ответ

        $users = $result_users_decoded->data;  //проваливаемся на шаг внутрь массива
        $specs = $result_specs_decoded->data;  //проваливаемся на шаг внутрь массива
        $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива



        // foreach ($prices_catalogs as $c) {
        //   echo '<pre>';
        //   print_r($c->title);
        //   echo '</pre>';
        // }

        if ('WP_Error Object')
          echo '<pre>';
        print_r($result_prices_catalogs);
        echo '</pre>';
        ?>

        <!-- <div style="width: 50px; height: 50px; background: red;" class="test"></div>
        <div ><form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>" >
                <label class="screen-reader-text" for="s">Поиск: </label>
                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
                <input type="submit" id="searchsubmit" value="найти" />
              </form>
        </div> -->

      </div>
    </div>
  </section>





  <?php get_footer(); ?>