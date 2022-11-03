<?php get_header();  ?>
<!-- страница услуг -->


<div data-menuanchor="p1" class="bg bg2"></div>

<div class="fullpage">
  <section class="section page-services__section">
    <div class="wrap">
      <div class="section__container page-services__container">
        <div class="section__description">
          <div class="section__title page-services__title"><?php the_title(); ?></div>
          <div class="page-services__link-container">
            <div class="page-services__inner">
              <a class="page-services__link page-services__link-1" href="#analyzes"><img class="page-services__link-img" src="<?php bloginfo('template_url'); ?>/assets/img/page-services__microscope.svg"> Анализы</a>
              <a class="page-services__link page-services__link-2" href="#diagnostics"><img class="page-services__link-img" src="<?php bloginfo('template_url'); ?>/assets/img/page-services__diagnostics.svg">
                Диагностика</a>
              <a class="page-services__link page-services__link-3" href="#adults"><img class="page-services__link-img" src="<?php bloginfo('template_url'); ?>/assets/img/page-services__pregnancy.svg"> Взрослые</a>
              <a class="page-services__link page-services__link-4" href="#kids"><img class="page-services__link-img" src="<?php bloginfo('template_url'); ?>/assets/img/page-services__baby-boy.svg"> Дети</a>
              <a class="page-services__link page-services__link-5" href="#reproductive-health"><img class="page-services__link-img" src="<?php bloginfo('template_url'); ?>/assets/img/page-services__pregnancy.svg">
                Репродуктивное<br>здоровье</a>
            </div>
          </div>
        </div>
        <div class="section__search">
          <form class="section__search-form">
            <input class="section__search-input" id="services_search" type="search" name="q" placeholder="Поиск по услугам" spellcheck="true" autocomplete="off">
          </form>
        </div>
        <div class="section__items page-services__items">

          <?php

          $url_prices_catalogs = 'https://mediczdrav.medods.ru/api/v1/prices/catalogs'; //тянем список каталогов услуг
          $api_key = 'TeU5zUbFWRyB_SMWeuzm';    //ключ доступа в API (брать в настройках CMS MEDODS)
          $result_prices_catalogs = wp_remote_get($url_prices_catalogs, array(  //задаем параметры запроса к API для списка услуг
            'headers' => array(
              'Authorization' => $api_key
            ),
            'timeout' => 10
          ));
          $prices_catalogs = json_decode(wp_remote_retrieve_body($result_prices_catalogs, true));  //декодируем ответ
          //---------
          // $url_prices = 'https://mediczdrav.medods.ru/api/v1/prices?count=50&page=' . $page; //тянем список услуг
          // $result_prices = wp_remote_get($url_prices, array(	//задаем параметры запроса к API для списка услуг
          //   'headers' => array(
          //     'Authorization' => $api_key)
          // ));
          // $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices));	//декодируем ответ
          // $prices = $result_prices_decoded -> data;	//проваливаемся на шаг внутрь массива



          // echo "<pre>";
          // print_r ($prices_catalogs);
          // echo "</pre>";
          //----------


          $analyzes = array(
            'covid' => 374,
            'comanalize' => 376,  //распространенные анализы
            'analize' => 289      //все виды анализов
          );


          $diagnostics_1 = array(
            //узи 322
            'uzi1' => 380,  //УЗИ внутренних органов
            'uzi2' => 406,  //УЗИ Детям
            'uzi3' => 379,  //УЗИ для женщин
            'uzi4' => 381,  //УЗИ для мужчин
            'uzi5' => 383,  //УЗИ лимфоузлов
            'uzi6' => 382,  //УЗИ сосудов и сердца
            'uzi7' => 384   //УЗИ суставов
          );
          $diagnostics_0 = array(
            'ekg' => 388,   //ЭКГ
            'ktg' => 407,   //КТГ
            'x-ray' => 350  //Рентген
          );


          $adults_1 = array(
            //гинекология 325
            'obstetrician' => 386,  //Прием акушера гинеколога
            'manipulation' => 387   //Манипуляции
          );
          $adults_2 = array(
            //кардиология 327
            'cardiologist' => 411,  //Кардиолог
            'sportCardio' => 394,   //Спортивный кардиолог
            'ekg' => 388,           //ЭКГ
            'uziHearth' => 382      //УЗИ сосудов и сердца
          );
          $adults_3 = array(
            //лор 297
            'otorhinolaryngologist' => 420, //Прием врача-оториноларинголога
            'manipulation' => 389           //манипуляции
          );
          $adults_4 = array(
            //невролог 345
            'neurologist' => 428, //Прием врача невролога
            'blockade' => 397     //Манипуляции
          );
          $adults_5 = array(
            //логопед 317
            'speechTherapist1' => 395,  //Логопед Наумова Е.О.
            'speechTherapist2' => 392   //Логопед Олейникова Ю.В.
          );
          $adults_6 = array(
            //офтальмолог 329
            'ophthalmologist' => 430, //Прием врача офтальмолога
            'manipulation' => 410     //Манипуляции
          );
          $adults_7 = array(
            //Косметолог 378
            'biorevitalization' => 412, //Биоревитализация
            'botulinum' => 418,         //Ботулинотерапия
            'lipContouring' => 415,     //Контурная пластика губ
            'facialMassage' => 416,     //Массаж лица
            'mesotherapy' => 413,       //Мезотерапия
            'peelings' => 414,          //Пилинги
            'faceCleaning' => 417,      //Чистка лица
            'cosmetologist' => 419      //Прием врача косметолога
          );
          $adults_0 = array(
            'allergist' => 423,       //Прием аллерголога-иммунолога
            'gastro' => 340,          //Гастроэнтеролог
            'mammologist' => 344,     //Онколог-маммолог
            // 'chiropractor' => 377,    //Мануальный терапевт
            'psychologist' => 391,    //Психолог
            'therapist' => 326,       //Терапевт
            'endocrinologist' => 348, //Эндокринолог
            'cabinet' => 341         //Услуги процедурного кабинета
          );


          $kids_1 = array(
            //аллерголог 346
            'allergist' => 423, //Прием аллерголога-иммунолога
          );
          $kids_2 = array(
            //лор 297
            'otorhinolaryngologist' => 420, //Прием врача-оториноларинголога
            'manipulation' => 389,          //Манипуляции
            'reference' => 399              //Оформление справок в детский сад и школу
          );
          $kids_3 = array(
            //педиатр 342
            'reference' => 400,         //Оформление справок для детского сада и школы
            'homePatronage' => 424,     //Патронаж на дому
            'pediatrician' => 425,      //Прием врача-педиатра
            'pediatricianHome' => 426   //Прием врача-педиатра на дому
          );
          $kids_4 = array(
            //невролог 345
            'neurologist' => 428, //Прием врача невролога
            'reference' => 396  //Оформление справок в детский сад и школу
          );
          $kids_5 = array(
            //логопед 317
            'speechTherapist1' => 395,  //Логопед Наумова Е.О.
            'speechTherapist2' => 392   //Логопед Олейникова Ю.В.
          );
          $kids_6 = array(
            //офтальмолог 329
            'reference' => 398,   //Оформление справок в детский сад и школу
            'manipulation' => 410, //Манипуляции
            'ophthalmologist' => 430 //Прием врача офтальмолога
          );
          $kids_7 = array(
            //детский ортопед-травмотолог 402
            'traumatologist' => 429,  //Прием травматолога-ортопеда
            'reference' => 405        //Офомрление справок в детский сад и школу
          );
          $kids_0 = array(
            'psychologist' => 391,          //Психолог
            'sportCardio' => 394,           //Спортивный кардилог
            'pediatricSurgeon' => 401,      //Детский хирург
            'pediatricGynecologist' => 393, //Детский гинеколог
            'chiropractor' => 377,          //Манульаный терапевт
            // 'massage' => 298,               //Массаж
            'uziKids' => 406,               //УЗИ Детям
            'procedures' => 341             //Услуги процедурного кабинета
          );


          $health = array(
            'obstetrics1' => 323,   //Акушерство/Ведение беременности
            'obstetrics2' => 403,   //Программы ведения беременности
            'ktg' => 407,           //КТГ
            // 'urologist' => 407      //Уролог-андролог
          );

          ?>

          <!-- АНАЛИЗЫ -->
          <div class="page-services__item" id="page-services__item--1">
            <div class="page-services__item-title">
              Анализы
            </div>
            <div class="page-services__item-box">

              <?php
              foreach ($analyzes as $i) {
              ?>
                <div class="page-services__category">
                  <div class="category__description <?php if ($i == '374') { ?>category__description--active <?php } ?>">
                    <?php
                    foreach ($prices_catalogs as $c) {
                      $cat_id = $c->id;
                      if ($cat_id == $i) { ?>
                        <div class="category__title"><?php echo $c->title; ?></div>
                      <?php
                      }
                    }
                    $services_page = get_pages(array('child_of' => $post->ID));
                    foreach ($services_page as $page) {
                      $content = $page->post_content;
                      if (!$content) continue;
                      $content = apply_filters('the_content', $content);
                      if (get_field("services_page", $page->ID) == $i) {
                      ?>

                        <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                    <?php }
                    } ?>
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
                      $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
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
              <?php
              }
              ?>
            </div>
          </div>

          <!-- ДИАГНОСТИКА -->
          <div class="page-services__item" id="page-services__item--2">
            <div class="page-services__item-title">
              Диагностика
            </div>
            <div class="page-services__item-box">
              <div class="page-services__category">
                <div class="category__description category__description--active">
                  <div class="category__title">УЗИ</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '322') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($diagnostics_1 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              foreach ($diagnostics_0 as $i) {
              ?>
                <div class="page-services__category">
                  <div class="category__description <?php if ($i != '350') { ?>category__description--active <?php } ?>">

                    <?php
                    foreach ($prices_catalogs as $c) {
                      $cat_id = $c->id;
                      if ($cat_id == $i) { ?>
                        <div class="category__title"> <?php echo $c->title; ?></div> <?php
                                                                                    }
                                                                                  }
                                                                                  $services_page = get_pages(array('child_of' => $post->ID));
                                                                                  foreach ($services_page as $page) {
                                                                                    $content = $page->post_content;
                                                                                    if (!$content) continue;
                                                                                    $content = apply_filters('the_content', $content);
                                                                                    if (get_field("services_page", $page->ID) == $i) {
                                                                                      ?>
                        <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                    <?php }
                                                                                  } ?>
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
                      $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
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
              <?php
              }
              ?>
            </div>
          </div>

          <!-- ВЗРОСЛЫЕ -->
          <div class="page-services__item" id="page-services__item--3">
            <div class="page-services__item-title">
              Взрослые
            </div>
            <div class="page-services__item-box">

              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Гинекология</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '325') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($adults_1 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end adults-1 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Кардиология</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '327') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($adults_2 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end adults-2 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Лор</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '297') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($adults_3 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end adults-3 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Невролог</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '345') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($adults_4 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end adults-4 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Логопед</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '317') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($adults_5 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end adults-5 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Офтальмолог</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '329') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($adults_6 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end adults-6 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Косметолог</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '378') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($adults_7 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end adults-7 -->

              <?php
              foreach ($adults_0 as $i) {
              ?>
                <div class="page-services__category">
                  <div class="category__description <?php if ($i == '423' || $i == '340' || $i == '344' || $i == '377' || $i == '391' || $i == '326' || $i == '348') { ?>category__description--active <?php } ?>">
                    <?php
                    foreach ($prices_catalogs as $c) {
                      $cat_id = $c->id;
                      if ($cat_id == $i) { ?>
                        <div class="category__title"> <?php echo $c->title; ?></div> <?php
                                                                                    }
                                                                                  }
                                                                                  $services_page = get_pages(array('child_of' => $post->ID));
                                                                                  foreach ($services_page as $page) {
                                                                                    $content = $page->post_content;
                                                                                    if (!$content) continue;
                                                                                    $content = apply_filters('the_content', $content);
                                                                                    if (get_field("services_page", $page->ID) == $i) {
                                                                                      ?>
                        <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                    <?php }
                                                                                  } ?>
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
                      $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
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
              <?php
              }
              ?>
            </div>
          </div>

          <!-- ДЕТИ -->
          <div class="page-services__item" id="page-services__item--4">
            <div class="page-services__item-title">
              Дети
            </div>
            <div class="page-services__item-box">

              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Детский алерголог иммунолог</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '346') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($kids_1 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end kids-1 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Детский лор</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '297') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($kids_2 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end kids-2 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Педиатр</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '342') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($kids_3 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end kids-3 -->

              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Детский невролог</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '345') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($kids_4 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end kids-4 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Логопед</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '317') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($kids_5 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end kids-5 -->
              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Офтальмолог</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '329') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($kids_6 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end kids-6 -->

              <div class="page-services__category">
                <div class="category__description">
                  <div class="category__title">Детский ортопед-травмотолог</div>
                  <?php
                  $services_page = get_pages(array('child_of' => $post->ID));
                  foreach ($services_page as $page) {
                    $content = $page->post_content;
                    if (!$content) continue;
                    $content = apply_filters('the_content', $content);
                    if (get_field("services_page", $page->ID) == '402') {
                  ?>
                      <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                  <?php }
                  } ?>
                  <div class="category__btn">
                    <div class="category__btn-inner">
                      <div class="category__btn-strip-1"></div>
                      <div class="category__btn-strip-2"></div>
                    </div>
                  </div>
                </div>
                <div class="category__service-description-box">
                  <?php
                  foreach ($kids_7 as $i) {
                  ?>
                    <div class="page-services__category-child">
                      <div class="category__description-child">
                        <div class="category__title-child">
                          <?php
                          foreach ($prices_catalogs as $c) {
                            $cat_id = $c->id;
                            if ($cat_id == $i) {
                              echo $c->title;
                            }
                          }
                          ?>
                        </div>
                        <?php
                        $services_page = get_pages(array('child_of' => $post->ID));
                        foreach ($services_page as $page) {
                          $content = $page->post_content;
                          if (!$content) continue;
                          $content = apply_filters('the_content', $content);
                          if (get_field("services_page", $page->ID) == $i) { ?>
                            <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                        <?php }
                        }
                        ?>
                        <div class="category__btn-child">
                          <div class="category__btn-inner-child">
                            <div class="category__btn-strip-1-child"></div>
                            <div class="category__btn-strip-2-child"></div>
                          </div>
                        </div>
                      </div>
                      <div class="category__service-description-box-child">

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
                          $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
                          $prices = $result_prices_decoded->data;  //проваливаемся на шаг внутрь массива
                          if ($prices) {
                            foreach ($prices as $p) {
                              // $parent_id = $p -> relationships -> category -> data -> id;
                              echo
                              '<div class="category__service-description-child">
                                    <div class="category__service-title-child">' . $p->attributes->title . '</div>
                                    <div class="category__service-price-child">' . $p->attributes->price . '</div>
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
                  <?php
                  }
                  ?>
                </div>
              </div><!-- end kids-7 -->

              <?php
              foreach ($kids_0 as $i) {
              ?>
                <div class="page-services__category">
                  <div class="category__description <?php if ($i == '391' || $i == '394' || $i == '410' || $i == '393' || $i == '377' || $i == '298') { ?>category__description--active <?php } ?>">
                    <?php
                    foreach ($prices_catalogs as $c) {
                      $cat_id = $c->id;
                      if ($cat_id == $i) { ?>
                        <div class="category__title"> <?php echo $c->title; ?></div> <?php
                                                                                    }
                                                                                  }
                                                                                  $services_page = get_pages(array('child_of' => $post->ID));
                                                                                  foreach ($services_page as $page) {
                                                                                    $content = $page->post_content;
                                                                                    if (!$content) continue;
                                                                                    $content = apply_filters('the_content', $content);
                                                                                    if (get_field("services_page", $page->ID) == $i) {
                                                                                      ?>
                        <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                    <?php }
                                                                                  } ?>
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
                      $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
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
              <?php
              }
              ?>
            </div>
          </div>

          <!-- РЕПРОДУКТИВНОЕ ЗДОРОВЬЕ -->
          <div class="page-services__item" id="page-services__item--5">
            <div class="page-services__item-title">
              Репродуктивное здоровье
            </div>
            <div class="page-services__item-box">
              <?php
              foreach ($health as $i) {
              ?>
                <div class="page-services__category page-services__category--active">
                  <div class="category__description category__description--active">
                    <?php
                    foreach ($prices_catalogs as $c) {
                      $cat_id = $c->id;
                      if ($cat_id == $i) { ?>
                        <div class="category__title"> <?php echo $c->title; ?></div> <?php
                                                                                    }
                                                                                  }
                                                                                  $services_page = get_pages(array('child_of' => $post->ID));
                                                                                  foreach ($services_page as $page) {
                                                                                    $content = $page->post_content;
                                                                                    if (!$content) continue;
                                                                                    $content = apply_filters('the_content', $content);
                                                                                    if (get_field("services_page", $page->ID) == $i) {
                                                                                      ?>
                        <a href="<?php echo get_page_link($page->ID); ?>"><span>Узнать больше</span><i class="far fa-question-circle"></i></a>
                    <?php }
                                                                                  } ?>
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
                      $result_prices_decoded = json_decode(wp_remote_retrieve_body($result_prices, true));  //декодируем ответ
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
              <?php
              }
              ?>
            </div>
          </div>

          <!-- ПОИСК -->
          <div class="page-services__item" id="page-services__item--s">
            <div class="page-services__item-title">
              Результаты поиска:
            </div>
            <div class="page-services__item-box">
              <div class="page-services__category">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>



<?php get_footer(); ?>