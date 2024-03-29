<?php get_header(); ?>
<!-- страница услуг -->

<section class="section page-services__section">
    <div class="wrap wrap--margin">
        <div class="section__container page-services__container">
            <div class="section__description">
                <div class="section__title page-services__title">Наши услуги</div>
                <div class="page-services__link-container">
                    <div class="page-services__inner">
                        <a class="link page-services__link page-services__link--analyzes" href="#analyzes"><img
                                class="page-services__link-img"
                                src="<?php bloginfo('template_url'); ?>/assets/theme/img/page-services__microscope.svg">
                            Анализы</a>
                        <a class="link page-services__link page-services__link--diagnostics" href="#diagnostics"><img
                                class="page-services__link-img"
                                src="<?php bloginfo('template_url'); ?>/assets/theme/img/page-services__diagnostics.svg">
                            Диагностика</a>
                        <a class="link page-services__link page-services__link--adults" href="#adults"><img
                                class="page-services__link-img"
                                src="<?php bloginfo('template_url'); ?>/assets/theme/img/page-services__pregnancy.svg">
                            Взрослые</a>
                        <a class="link page-services__link page-services__link--kids" href="#kids"><img
                                class="page-services__link-img"
                                src="<?php bloginfo('template_url'); ?>/assets/theme/img/page-services__baby-boy.svg">
                            Дети</a>
                        <a class="link page-services__link page-services__link--sales" href="#sales">
                            <!-- <img
                                class="page-services__link-img"
                                src="<?php bloginfo('template_url'); ?>/assets/theme/img/page-services__sales.svg"> -->
                            <svg width="72" height="72" viewBox="0 0 72 72" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="page-services__link-img sales">
                                <g clip-path="url(#clip0_747_37)">
                                    <path
                                        d="M35.989 68.2674L2.97112 35.1337C2.00001 34.1592 2 32.2102 2 32.2102C1.99997 28.7993 2.00012 7.84712 2 5.89809C1.99989 3.94907 3.94219 1.99924 6.37001 2.00001C8.79784 2.00078 30.1623 2.00033 32.1045 2.00001C34.0422 1.99969 34.0467 2.00422 35.0111 2.96778L35.0178 2.97453C35.989 3.94481 67.0646 35.1336 68.5213 36.5955C69.9779 38.0574 70.949 41.4683 68.5213 43.9044C66.0935 46.3406 49.099 64.3692 44.729 68.2674C40.3589 72.1657 35.989 68.2674 35.989 68.2674Z"
                                        stroke="#404040" stroke-width="3" />
                                    <circle cx="13" cy="12" r="6" stroke="#404040" stroke-width="3" />
                                    <path class="heart"
                                        d="M42.2242 35.5034C41.2616 37.4555 40.7462 40.0031 40.7462 41.0028C40.7462 42.0024 40.3703 37.4282 39.2683 35.5034C37.2293 31.9424 34.458 29.91 30.4005 30.0041C25.3664 30.1209 21.5545 33.9199 21.04 39.003C20.8202 41.1744 21.5327 43.0027 22.518 44.5023C23.5034 46.0019 40.7462 63 40.7462 63C40.7462 63 57.4966 46.0019 58.4819 44.5023C59.4672 43.0027 60.1802 41.1743 59.9598 39.003C59.4294 33.7773 55.2814 29.8546 50.1067 30.0041C46.2126 30.1167 43.9676 31.9681 42.2242 35.5034Z"
                                        stroke="#404040" stroke-width="3" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_747_37">
                                        <rect width="72" height="72" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            Акции
                        </a>
                    </div>
                </div>
            </div>
            <div class="section__search">
                <form class="section__search-form">
                    <input class="section__search-input" id="services_search" type="search" name="q"
                        placeholder="Поиск по услугам" spellcheck="true" autocomplete="off">
                </form>
            </div>
            <div class="section__items page-services__items">

                <?
                  // получаем страницы из базы WP
                  function find_categories($parent_id, $meta_value)
                  {
                    $WP_posts = get_posts([
                      'posts_per_page' => -1,
                      'post_parent' => $parent_id,
                      'post_type' => 'services',
                      'post_status' => 'any',
                      'meta_query' => [
                        'relation' => 'AND',
                        [
                          'key' => 'services_cat',
                          'value' => $meta_value,
                          'compare' => 'LIKE'
                        ],
                        [
                          'key' => 'services_active',
                          'value' => 'on',
                          'compare' => 'LIKE'
                        ]
                      ],
                      'orderby' => 'parent',
                      'order' => 'ASC'
                    ]);

                    if ($WP_posts) {
                      return $WP_posts;
                    } else {
                      return null;
                    }
                    wp_reset_postdata();
                  }

                  function find_services($parent_id)
                  {
                    $WP_posts = get_posts([
                      'posts_per_page' => -1,
                      'post_parent' => $parent_id,
                      'post_type' => 'services',
                      'post_status' => 'any',
                      'meta_query' => [
                        'relation' => 'AND',
                        [
                          'key' => 'services_type',
                          'value' => 'service',
                          'compare' => 'LIKE'
                        ],
                        [
                          'key' => 'services_active',
                          'value' => 'on',
                          'compare' => 'LIKE'
                        ]
                      ],
                      'orderby' => 'title',
                      'order' => 'ASC'
                    ]);

                    if ($WP_posts) {
                      return $WP_posts;
                    } else {
                      return null;
                    }
                    wp_reset_postdata();
                  }
                  // END получаем посты из WP

                  // функция вывода постов
                  function print_posts($meta_value)
                  {
                    $categories = find_categories('', $meta_value);

                    if ($categories) {
                      $fix = [];
                      foreach ($categories as $post) {
                        if (!in_array($post->ID, $fix)) {
                          $PRINT_RESULT = '';

                          $categories_children = find_categories($post->ID, $meta_value);
                          $service = find_services($post->ID);

                          if ($categories_children || $service) {
                            $PRINT_RESULT .= '<div class="page-services__category">';
                            $PRINT_RESULT .= '<div class="category__description">';
                            $PRINT_RESULT .= '<div class="category__title">';
                            $PRINT_RESULT .= $post->post_title;
                            $PRINT_RESULT .= '</div>'; //category__title
                            if ($post->post_status == 'publish') {
                              $PRINT_RESULT .= '<a href="' . get_permalink($post) . '" class="link"><span>узнать больше</span><i class="far fa-question-circle"></i></a>';
                            }
                            $PRINT_RESULT .= '<div class="category__btn">';
                            $PRINT_RESULT .= '<div class="category__btn-inner">';
                            $PRINT_RESULT .= '<div class="category__btn-strip-1"></div>';
                            $PRINT_RESULT .= '<div class="category__btn-strip-2"></div>';
                            $PRINT_RESULT .= '</div>'; //category__btn-inner
                            $PRINT_RESULT .= '</div>'; //category__btn
                            $PRINT_RESULT .= '</div>'; //category__description
                            $PRINT_RESULT .= '<div class="category__service-description-box">';

                            if ($categories_children) {
                              foreach ($categories_children as $post) {
                                $service_children = find_services($post->ID);
                                if ($service_children && !in_array($post->ID, $fix)) {
                                  array_push($fix, $post->ID);
                                  $PRINT_RESULT .= '<div class="page-services__category-child">';
                                  $PRINT_RESULT .= '<div class="category__description-child">';
                                  $PRINT_RESULT .= '<div class="category__title-child">';
                                  $PRINT_RESULT .= $post->post_title;
                                  $PRINT_RESULT .= '</div>'; //category__title-child
                                  if ($post->post_status == 'publish') {
                                    $PRINT_RESULT .= '<a href="' . get_permalink($post) . '" class="link"><span>узнать больше</span><i class="far fa-question-circle"></i></a>';
                                  }
                                  $PRINT_RESULT .= '<div class="category__btn-child">';
                                  $PRINT_RESULT .= '<div class="category__btn-inner-child">';
                                  $PRINT_RESULT .= '<div class="category__btn-strip-1-child"></div>';
                                  $PRINT_RESULT .= '<div class="category__btn-strip-2-child"></div>';
                                  $PRINT_RESULT .= '</div>'; //category__btn-inner-child
                                  $PRINT_RESULT .= '</div>'; //category__btn-child
                                  $PRINT_RESULT .= '</div>'; //category__description-child
                                  $PRINT_RESULT .= '<div class="category__service-description-box-child">';
                                  foreach ($service_children as $post) {
                                    $PRINT_RESULT .= '<div class="category__service-description-child">';
                                    $PRINT_RESULT .= '<div class="category__service-title-child">';
                                    $PRINT_RESULT .= $post->post_title;
                                    $PRINT_RESULT .= '</div>'; //category__service-title-child
                                    if ($post->post_status == 'publish') {
                                      $PRINT_RESULT .= '<a href="' . get_permalink($post) . '" class="link"><span>узнать больше</span><i class="far fa-question-circle"></i></a>';
                                    }
                                    $PRINT_RESULT .= '<div class="category__service-price-child">';
                                    $PRINT_RESULT .= get_field('services_price', $post->ID);
                                    $PRINT_RESULT .= ' ₽</div>'; //category__service-price-child
                                    $PRINT_RESULT .= '</div>'; //category__service-description-child
                                  }
                                  $PRINT_RESULT .= '</div>'; //category__service-description-box-child
                                  $PRINT_RESULT .= '</div>'; //page-services__category-child
                                }
                              }
                            }

                            if ($service) {
                              foreach ($service as $post) {
                                $PRINT_RESULT .= '<div class="category__service-description">';
                                $PRINT_RESULT .= '<div class="category__service-title">';
                                $PRINT_RESULT .= $post->post_title;
                                $PRINT_RESULT .= '</div>'; //category__service-title

                                if ($post->post_status == 'publish') {
                                  $PRINT_RESULT .= '<a href="' . get_permalink($post) . '" class="link"><span>узнать больше</span><i class="far fa-question-circle"></i></a>';
                                }

                                $PRINT_RESULT .= '<div class="category__service-price">';
                                $PRINT_RESULT .= get_field('services_price', $post->ID);
                                $PRINT_RESULT .= ' ₽</div>'; //category__service-price
                                $PRINT_RESULT .= '</div>'; //category__service-description
                              }
                            }
                            $PRINT_RESULT .= '</div>'; //category__service-description-box
                            $PRINT_RESULT .= '</div>'; //page-services__category

                            echo $PRINT_RESULT;
                          }
                          // $categories = array_diff($categories, $categories_children);
                        }
                      }
                    } else {
                      echo 'В данном разделе услуги не представлены';
                    }
                  }
                  // END функция вывода постов
                ?>

                <!-- АНАЛИЗЫ -->
                <div class="page-services__item" id="page-services__item--analyzes">
                    <div class="page-services__item-title">
                        Анализы
                    </div>
                    <div class="page-services__item-box">
                        <? print_posts('analyzes'); ?>
                    </div>
                </div>

                <!-- ДИАГНОСТИКА -->
                <div class="page-services__item" id="page-services__item--diagnostics">
                    <div class="page-services__item-title">
                        Диагностика
                    </div>
                    <div class="page-services__item-box">
                        <? print_posts('diagnostics'); ?>
                    </div>
                </div>

                <!-- ВЗРОСЛЫЕ -->
                <div class="page-services__item" id="page-services__item--adults">
                    <div class="page-services__item-title">
                        Взрослые
                    </div>
                    <div class="page-services__item-box">
                        <? print_posts('adults'); ?>
                    </div>
                </div>

                <!-- ДЕТИ -->
                <div class="page-services__item" id="page-services__item--kids">
                    <div class="page-services__item-title">
                        Дети
                    </div>
                    <div class="page-services__item-box">
                        <? print_posts('kids'); ?>
                    </div>
                </div>

                <!-- АКЦИИ -->
                <div class="page-services__item" id="page-services__item--sales">
                    <div class="page-services__item-title">
                        Акции
                    </div>
                    <div class="page-services__item-box">
                        <div class="section__items page-blog__items">
                            <?php
                              $WP_posts = get_posts([
                                'posts_per_page' => -1,
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'category' => 4,
                                'orderby' => 'meta_value',
                                'meta_key'  => 'sale_end',
                                'order' => 'DESC',
                                'posts_per_page' => 6
                              ]);
                            if ($WP_posts) {
                              foreach ($WP_posts as $post) {
                            ?>
                            <a class="link page-blog__item-link" href="<?php the_permalink(); ?>">
                                <div
                                    class="page-blog__item page-sales__item<?php if (get_field('sale_end', false, false) >= date("Ymd")) echo 'active'?>">
                                    <img class="page-blog__item-img"
                                        src="<?php the_post_thumbnail_url('blog-page_cover_list', array()); ?>" alt="">
                                    <div class="page-blog__item-box" style="color: <? the_field('title_color') ?>">
                                        <div class="page-blog__item-date"><?php the_field('sale_start') ?> -
                                            <?php 
                                              the_field('sale_end');
                                              if (get_field('sale_end', false, false) < date("Ymd")) {
                                                echo '<div class="sale-marker red">АКЦИЯ ЗАКОНЧИЛАСЬ</div>';
                                              } else {
                                                echo '<div class="sale-marker green">АКЦИЯ ДЕЙСТВУЕТ</div>';
                                              }
                                              ?>
                                        </div>
                                        <div class="page-blog__item-title"><?php echo $post->post_title; ?></div>
                                        <div class="page-blog__item-text"><?php the_excerpt(); ?></div>
                                    </div>
                                </div>
                            </a>
                            <?}}
                              else {echo '</div>';}?>
                        </div>
                    </div>
                </div>

                <!-- ПОИСК -->
                <div class="page-services__item" id="page-services__item--search">
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
</section>



<?php get_footer(); ?>