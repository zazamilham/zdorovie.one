<?php get_header();  ?>
<!-- главная страница -->

<div data-menuanchor="p1" class="bg bg1"></div>
<div data-menuanchor="p2" class="bg bg2"></div>
<div data-menuanchor="p3" class="bg bg3"></div>
<div data-menuanchor="p4" class="bg bg4"></div>
<div data-menuanchor="p5" class="bg bg5"></div>
<div data-menuanchor="p6" class="bg bg6"></div>
<div data-menuanchor="p7" class="bg bg7"></div>


<div id="fullpage" class="fullpage">
  <!-- <div> -->
  <?php $all_options = get_option('true_options'); ?>
  <!-- slider -->
  <section class="section slider__section">
    <div class="slider__arrow-box">
      <i class="slider__arrow slider__arrow--left fas fa-chevron-left fp-controlArrow fp-prev"></i>
      <i class="slider__arrow slider__arrow--right fas fa-chevron-right fp-controlArrow fp-next"></i>
    </div>

    <?php
    $slide = get_posts(array(
      'post_type' => 'slider',
      'orderby' => 'date',
      'order' => 'DESC',
      'numberposts' => 5
    ));
    foreach ($slide as $post) {
      setup_postdata($post); ?>
    <div class="slide">
      <?php the_content(); ?>
    </div>

    <?php
    }
    wp_reset_postdata();
    ?>

  </section>

  <!-- services -->
  <section class="section services__section">
    <div class="wrap">
      <div class="section__container services__container">
        <div class="section__description">
          <div class="section__title services__title">наши услуги</div>
          <div class="section__text services__text"><?php echo $all_options['index_services']; ?></div>
          <a href="<?php echo get_home_url(); ?>/services" class="section__link services__link"><i
              class="fas fa-angle-right"></i>весь список услуг</a>
        </div>
        <div class="section__items services__items">
          <a class="services__item-link item__link-1" href="<?php echo get_home_url(); ?>/services#analyzes">
            <div class="services__item">
              <img class="services__item-img"
                src="<?php bloginfo('template_url'); ?>/assets/img/services__microscope.svg" alt="Анализы">
              <p class="services__item-text">Анализы</p>
            </div>
          </a>
          <a class="services__item-link item__link-2" href="<?php echo get_home_url(); ?>/services#diagnostics">
            <div class="services__item">
              <img class="services__item-img"
                src="<?php bloginfo('template_url'); ?>/assets/img/services__diagnostics.svg" alt="Диагностика">
              <p class="services__item-text">Диагностика</p>
            </div>
          </a>
          <a class="services__item-link item__link-3" href="<?php echo get_home_url(); ?>/services#reproductive-health">
            <div class="services__item">
              <img class="services__item-img" src="<?php bloginfo('template_url'); ?>/assets/img/services__uterus.svg"
                alt="Репродуктивное здоровье">
              <p class="services__item-text">Репродуктивное здоровье</p>
            </div>
          </a>
          <a class="services__item-link item__link-4" href="<?php echo get_home_url(); ?>/services#adults">
            <div class="services__item">
              <img class="services__item-img"
                src="<?php bloginfo('template_url'); ?>/assets/img/services__pregnancy.svg" alt="Взрослые">
              <p class="services__item-text">Взрослые</p>
            </div>
          </a>
          <a class="services__item-link item__link-5" href="<?php echo get_home_url(); ?>/services#kids">
            <div class="services__item">
              <img class="services__item-img" src="<?php bloginfo('template_url'); ?>/assets/img/services__baby-boy.svg"
                alt="Дети">
              <p class="services__item-text">Дети</p>
            </div>
          </a>
          <a class="services__item-link item__link-6" href="<?php echo get_home_url(); ?>/sales">
            <div class="services__item">
              <img class="services__item-img" src="<?php bloginfo('template_url'); ?>/assets/img/services__sales.svg"
                alt="Акции">
              <p class="services__item-text">Акции</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- about -->
  <section class="section about__section">
    <div class="wrap">
      <div class="section__container about__container">
        <div class="section__description">
          <div class="section__title about__title">ПОЧЕМУ МЫ</div>
          <div class="section__text"><?php echo $all_options['index_whywe']; ?></div>
        </div>
        <div class="section__items about__items">
          <div class="about__item about__item-1">
            <div class="about__ball about__ball-1"></div>
            <div class="about__num about__num-1">11</div>
            <div class="about__text about__text-1">ЛЕТ ЗАБОТЫ<br>О ВАШЕМ ЗДОРОВЬЕ</div>

          </div>
          <div class="about__item about__item-2">
            <div class="about__ball about__ball-2"></div>
            <div class="about__num about__num-2">14 034</div>
            <div class="about__text about__text-2">ДОВОЛЬНЫХ ПАЦИЕНТОВ</div>
          </div>
          <div class="about__item about__item-3">
            <div class="about__ball about__ball-3"></div>
            <div class="about__num about__num-3">36</div>
            <div class="about__text about__text-3">ДЕТСКИХ И ВЗРОСЛЫХ<br>СПЕЦИАЛИСТОВ</div>

          </div>
          <div class="about__item about__item-4">
            <div class="about__ball about__ball-4"></div>
            <div class="about__num about__num-4">960</div>
            <div class="about__text about__text-4">АНАЛИЗОВ</div>

          </div>
          <div class="about__item about__item-5">
            <div class="about__ball about__ball-5"></div>
            <div class="about__num about__num-5">БЕЗ</div>
            <div class="about__text about__text-5">ОЧЕРЕДЕЙ</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- doctors -->
  <section class="section doctors__section">
    <div class="wrap">
      <div class="section__container doctors__container">
        <div class="section__description">
          <div class="section__title doctors__title">НАШИ СПЕЦИАЛИСТЫ</div>
          <div class="section__text"><?php echo $all_options['index_doctors']; ?></div>
          <a href="<?php echo get_home_url(); ?>/doctors" class="section__link page-doctor__link"><i
              class="fas fa-angle-right"></i>к списку врачей</a>
        </div>
        <div class="section__items doctors__items">

          <?php
          $doctors_page = get_pages(array('child_of' => 235));
          foreach ($doctors_page as $page) {
            $content = $page->post_content;
            if (!$content) continue;
            $content = apply_filters('the_content', $content);
          ?>
          <div class="doctors__item">

            <div class="doctors__btn" id="docBtn<?php the_field('doctors_id', $page->ID); ?>">записаться</div>
            <script>
            docBtn<?php the_field('doctors_id', $page->ID); ?>.onclick = function() {
              var docId = '<?php the_field('doctors_id', $page->ID); ?>';
            }
            </script>
            <a class="doctors__id-link" href="<?php echo get_page_link($page->ID); ?>">
              <!-- <img class="doctors__img" src="<?php //echo wp_get_attachment_image( get_field('doctors_photo', $page->ID), 'medium' ); 
                                                    ?>" alt="doctor"> -->
              <img class="doctors__img" src="<?php the_field('doctors_photo', $page->ID); ?>" alt="doctor">
              <div class="doctors__disc">
                <p class="doctors__name"><?php echo $page->post_title; ?></p>
                <p class="doctors__spec"><?php the_field('doctors_spec', $page->ID); ?></p>
              </div>
            </a>

          </div>
          <?php
          }
          wp_reset_postdata();
          ?>
        </div>
        <a class="page-more__btn" href="<?php echo home_url(); ?>/vacancy">
          Посмотреть вакансии
        </a>
      </div>
    </div>
  </section>

  <!-- news -->
  <section class="section news__section">
    <div class="wrap">
      <div class="section__container news__container">
        <div class="news__block-left">
          <div class="section__title news__title">БЛОГ О ЗДОРОВЬЕ</div>
          <div class="news__box">
            <div class="news__list">

              <?php
              $myposts = get_posts(array(
                'category' => 1,
                'numberposts' => 4

              ));
              foreach ($myposts as $post) {
                setup_postdata($post); ?>

              <a class="news__item" href="<?php the_permalink(); ?>">
                <div class="news__item-title"><?php echo $post->post_title; ?></div>
                <div class="news__item-text"><?php the_excerpt(); ?></div>
                <div class="news__item-date"><?php echo get_the_date('j F Y') . ' | читать' ?></div>
              </a>

              <?php
              }
              wp_reset_postdata();
              ?>

            </div>
            <a class="news__link-btn link-underline" href="<?php echo get_home_url(); ?>/blog"><i
                class="fas fa-angle-right"></i>читать все</a>
          </div>
        </div>
        <div class="news__block-right">
          <div class="section__title news__title">ОБРАТНАЯ СВЯЗЬ</div>
          <div class="news__box">
            <div class="news__feedback">
              <p class="news__feedback-title">Здесь вы можете оставить свой отзыв или задать нам любой вопрос.</p>
              <?php echo do_shortcode('[contact-form-7 id="1299" title="Обратная связь"]');  ?>
            </div>
            <div class="news__calltodirector">
              <div class="calltodirector__description">
                <div class="calltodirector__title">ПОЗВОНИТЬ ДИРЕКТОРУ</div>
                <div class="calltodirector__text"><?php echo $all_options['index_calltodir']; ?></div>
              </div>
              <div class="calltodirector__btn-box">
                <a class="calltodirector__btn" href="tel:<?php echo $all_options['dir_number_phone']; ?>">позвонить
                  директору</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- reviews -->
  <section class="section reviews__section">
    <div class="wrap">
      <div class="section__container reviews__container">
        <div class="section__description">
          <div class="section__title reviews__title">ОТЗЫВЫ О НАС</div>
          <div class="section__text">На независимых ресурсах</div>
        </div>
        <div class="section__items reviews__items">

          <div class="reviews__item">
            <a class="reviews__item-link" href="<?php the_field('link_flamp', 2716); ?>">
              <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/img/reviews__flamp.svg"
                alt="Flamp">
              <div class="reviews__item-desc">
                <div class="reviews__item-rate">
                  <i class="fas fa-star-half-alt"></i> <?php the_field('rate_flamp', 2716); ?>
                </div>
                <?php the_field('amount_flamp', 2716); ?>
              </div>
            </a>
          </div>

          <div class="reviews__item">
            <a class="reviews__item-link" href="<?php the_field('link_2gis', 2716); ?>">
              <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/img/reviews__2gis.svg"
                alt="2gis">
              <div class="reviews__item-desc">
                <div class="reviews__item-rate">
                  <i class="fas fa-star-half-alt"></i> <?php the_field('rate_2gis', 2716); ?>
                </div>
                <?php the_field('amount_2gis', 2716); ?>
              </div>
            </a>
          </div>

          <div class="reviews__item">
            <a class="reviews__item-link" href="<?php the_field('link_yandex', 2716); ?>">
              <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/img/reviews__yandex.svg"
                alt="Yandex">
              <div class="reviews__item-desc">
                <div class="reviews__item-rate">
                  <i class="fas fa-star-half-alt"></i> <?php the_field('rate_yandex', 2716); ?>
                </div>
                <?php the_field('amount_yandex', 2716); ?>
              </div>
            </a>
          </div>

          <div class="reviews__item">
            <a class="reviews__item-link" href="<?php the_field('link_pro', 2716); ?>">
              <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/img/reviews__pro.svg"
                alt="Продокторов">
              <div class="reviews__item-desc">
                <div class="reviews__item-rate">
                  <i class="fas fa-star-half-alt"></i> <?php the_field('rate_pro', 2716); ?>
                </div>
                <?php the_field('amount_pro', 2716); ?>
              </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>