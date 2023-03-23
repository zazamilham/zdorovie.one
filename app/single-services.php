<?php 
/*
Template name: Запись SEO-страницы услуг с картинкой в колонке
Template post type: services
*/
get_header();  ?>
<!-- страница страница SEO-страницы услуги -->



<section class="section page-blog-note__section">
  <div class="wrap wrap--blog">
    <div class="section__container page-blog-note__container">
      <div class="section__description">
        <div class="section__title page-blog-note__title">
          Наши услуги
        </div>
        <a href="<?php echo get_home_url(); ?>/services" class="link section__link">
          <i class="fas fa-angle-left"></i>
          вернуться в раздел
        </a>
      </div>
      <div class="section__items page-blog-note__items">

        <div class="page-blog-note__item">
          <?
          if (has_post_thumbnail()) { ?>
          <div class="page-blog-note__item-cover">
            <? the_post_thumbnail('blog-page_cover_wide', array('class' => "page-blog-note__item-cover-img")); ?>
            <h1 class="section__title page-blog-note__item-title absolute"
              style="color: <? the_field('title_color') ?>">
              <?php echo $post->post_title; ?>
            </h1>
          </div>
          <?
          } 
          ?>
          <div class="page-blog-note__item-content">
            <?php the_content(); ?>
          </div>
          <?
          if (get_field('bind_services')) {
          ?>
          <div>
            <h2>Услуги по теме</h2>
            <a href="<?php echo get_home_url(); ?>/services" class="link section__link section__link--blue"
              style="margin-top: 0; margin-bottom: 30px"><i class="fas fa-angle-right"></i>весь список услуг</a>

            <?
          // получаем страницы из базы WP
          function find_first_categories($ID)
          {
            $WP_posts = get_posts([
              'posts_per_page' => -1,
              'include' => $ID,
              'post_type' => 'services',
              'post_status' => 'any',
              'meta_query' => [
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


          function find_categories($parent_id)
          {
            $WP_posts = get_posts([
              'posts_per_page' => -1,
              'post_parent' => $parent_id,
              'post_type' => 'services',
              'post_status' => 'any',
              'meta_query' => [
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
          function print_posts($ID)
          {
            $categories = find_first_categories($ID);

            if ($categories) {
              $fix = [];
              foreach ($categories as $post) {
                if (!in_array($post->ID, $fix)) {
                  $PRINT_RESULT = '';

                  $categories_children = find_categories($post->ID);
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

          foreach (get_field('bind_services') as $ID) {
            print_posts($ID);
          }
          ?>
          </div>
          <?
          }
          ?>

          <div class="page-blog-note__item-tags">
            <?php the_tags('Теги: ');
            wp_reset_postdata(); ?>
          </div>
          <div class="page-blog-note__item-share ya-share2"
            data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp,skype,telegram"
            data-limit="3">
          </div>
        </div>
      </div>
      <div class="page-blog-note__hints-container" id="page-blog-note__hints-container">
        <div class="page-blog-note__hints-inner" id="page-blog-note__hints-inner">

          <?php
          if (get_field('hints-check-1')) {
            echo '<div class="page-blog-note__hints-modal page-blog-note__hints-modal-on page-blog-note__hints-modal-1">
                          <div class="page-blog-note__hints-close"><i class="page-blog-note__hints-close-i fas fa-times"></i></div>
                          <div class="page-blog-note__hints-desc">' . get_field('hint-1') . '</div>';
            if (get_field('hint-link-1')) {
              echo '<a class="link page-blog-note__hints-link" href="' . get_field('hint-link-1') . '">перейти</a>';
            }
            echo '</div>';
          }
          if (get_field('hints-check-2')) {
            echo '<div class="page-blog-note__hints-modal page-blog-note__hints-modal-on page-blog-note__hints-modal-2">
                          <div class="page-blog-note__hints-close"><i class="page-blog-note__hints-close-i fas fa-times"></i></div>
                          <div class="page-blog-note__hints-desc">' . get_field('hint-2') . '</div>';
            if (get_field('hint-link-2')) {
              echo '<a class="link page-blog-note__hints-link" href="' . get_field('hint-link-2') . '">перейти</a>';
            }
            echo '</div>';
          }
          if (get_field('hints-check-3')) {
            echo '<div class="page-blog-note__hints-modal page-blog-note__hints-modal-on page-blog-note__hints-modal-3">
                          <div class="page-blog-note__hints-close"><i class="page-blog-note__hints-close-i fas fa-times"></i></div>
                          <div class="page-blog-note__hints-desc">' . get_field('hint-3') . '</div>';
            if (get_field('hint-link-3')) {
              echo '<a class="link page-blog-note__hints-link" href="' . get_field('hint-link-3') . '">перейти</a>';
            }
            echo '</div>';
          }
          ?>

        </div>
      </div>
    </div>
  </div>
</section>



<?php get_footer(); ?>