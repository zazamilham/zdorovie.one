<?php get_header();
/*
Template Name: SEO-страницы для услуг
*/
?>
<!-- SEO-страницы для услуг -->

<div data-menuanchor="p1" class="bg bg2"></div>
<!-- ИНДЕКС -->
<div class="fullpage">
  <section class="section">
    <div class="wrap">
      <div class="section__container">
        <div class="section__description">
          <h1 class="section__title"><?php the_title(); ?></h1>
          <a href="<?php echo get_home_url(); ?>/services" class="section__link section__link--blue">
            <i class="fas fa-angle-left"></i>
            к списку услуг
          </a>
        </div>
        <div class="section__items page-blog-note__items">
          <div class="page-blog-note__item-content">
            <div class="page-blog-note__item">
              <?php
              get_post();
              the_content();
              ?>
            </div>


            <?php
            $url_prices_catalogs = 'https://mediczdrav.medods.ru/api/v1/prices/catalogs'; //тянем список каталогов услуг
            $api_key = 'TeU5zUbFWRyB_SMWeuzm';    //ключ доступа в API (брать в настройках CMS MEDODS)
            $result_prices = wp_remote_get($url_prices, array(  //задаем параметры запроса к API для списка услуг
              'headers' => array(
                'Authorization' => $api_key
              ),
              'timeout' => 10
            ));
            $prices_catalogs = json_decode(wp_remote_retrieve_body($result_prices_catalogs));  //декодируем ответ

            $i = get_field('services_page');
            if ($i != '322' && $i != '325' && $i != '327' && $i != '297' && $i != '345' && $i != '317' && $i != '329' && $i != '342' && $i != '402') {
            ?>
            <div class="page-blog-note__item">
              <div class="page-services__item-box">
                <div class="page-services__category">
                  <div
                    class="category__description <?php if ($i != '289' && $i != '376' && $i != '350' && $i != '341') { ?>category__description--active <?php } ?>">
                    <?php
                      foreach ($prices_catalogs as $c) {
                        $cat_id = $c->id;
                        if ($cat_id == $i) { ?>
                    <div class="category__title"><?php echo $c->title; ?></div>
                    <?php
                        }
                      }
                      ?>
                    <div class="category__btn">
                      <div class="category__btn-inner">
                        <div class="category__btn-strip-1"></div>
                        <div class="category__btn-strip-2"></div>
                      </div>
                    </div>
                  </div>
                  <div class="category__service-description-box">

                    <?php
                      $page = 1;
                      while (true) {
                        $url_prices = 'https://mediczdrav.medods.ru/api/v1/prices?category_id=' . $i . '&count=50&page=' . $page; //тянем список услуг
                        $result_prices = wp_remote_get($url_prices, array(  //задаем параметры запроса к API для списка услуг
                          'headers' => array(
                            'Authorization' => $api_key
                          ),
                          'timeout' => 10
                        ));
                        $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices));  //декодируем ответ
                        $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                        if ($prices) {
                          foreach ($prices as $p) {
                            // $parent_id = $p -> relationships -> category -> data -> id;
                            echo
                            '<div class="category__service-description">
                                  <div class="category__service-title">' . $p->attributes->title . '</div>
                                  <div class="category__service-price">' . $p->attributes->price . '</div>
                                </div>';
                          }
                          $page++;
                        } else {
                          break;
                        }
                      }
                      ?>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>


          <div class="page-blog-note__hints-container" id="page-blog-note__hints-container">
            <div class="page-blog-note__hints-inner" id="page-blog-note__hints-inner">
              <?php
              if (get_field('seo-hints-check-1', 239)) {
                echo '<div class="page-blog-note__hints-modal page-blog-note__hints-modal-on page-blog-note__hints-modal-1">
                            <div class="page-blog-note__hints-close"><i class="page-blog-note__hints-close-i fas fa-times"></i></div>
                            <div class="page-blog-note__hints-desc">' . get_field('seo-hint-1', 239) . '</div>';
                if (get_field('seo-hint-link-1', 239)) {
                  echo '<a class="page-blog-note__hints-link" href="' . get_field('seo-hint-link-1', 239) . '">перейти</a>';
                }
                echo '</div>';
              }
              if (get_field('seo-hints-check-2', 239)) {
                echo '<div class="page-blog-note__hints-modal page-blog-note__hints-modal-on page-blog-note__hints-modal-2">
                            <div class="page-blog-note__hints-close"><i class="page-blog-note__hints-close-i fas fa-times"></i></div>
                            <div class="page-blog-note__hints-desc">' . get_field('seo-hint-2', 239) . '</div>';
                if (get_field('seo-hint-link-2', 239)) {
                  echo '<a class="page-blog-note__hints-link" href="' . get_field('seo-hint-link-2', 239) . '">перейти</a>';
                }
                echo '</div>';
              }
              if (get_field('seo-hints-check-3', $page->ID)) {
                echo '<div class="page-blog-note__hints-modal page-blog-note__hints-modal-on page-blog-note__hints-modal-3">
                            <div class="page-blog-note__hints-close"><i class="page-blog-note__hints-close-i fas fa-times"></i></div>
                            <div class="page-blog-note__hints-desc">' . get_field('seo-hint-3', 239) . '</div>';
                if (get_field('seo-hint-link-3', 239)) {
                  echo '<a class="page-blog-note__hints-link" href="' . get_field('seo-hint-link-3', 239) . '">перейти</a>';
                }
                echo '</div>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>