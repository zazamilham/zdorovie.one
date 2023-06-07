<?php get_header();  ?>

<!-- главная страница -->

<!-- <div> -->
<?php $all_options = get_option('true_options'); ?>
<!-- slider -->
<section class="section slider__section">
    <!-- <div class="slider__arrow-box">
    <i class="slider__arrow slider__arrow--left fas fa-chevron-left fp-controlArrow fp-prev"></i>
    <i class="slider__arrow slider__arrow--right fas fa-chevron-right fp-controlArrow fp-next"></i>
  </div> -->

    <?php
  $slide = get_posts(array(
    'post_type' => 'slider',
    'orderby' => 'date',
    'order' => 'DESC',
    'numberposts' => 5
  ));
  foreach ($slide as $post) {
    setup_postdata($post); ?>
    <div class="slide" style="object-position: <? the_field('cover_position') ?>%">

        <? the_post_thumbnail('blog-page_cover_slide', array()); ?>

        <div class="wrap">
            <div class="section__title slider__description" style="color: <? the_field('title_color') ?>">
                <?php the_content(); ?>
            </div>
        </div>
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
                <? if ($all_options['index_services']) {?>
                <div class="section__text services__text"><?php echo $all_options['index_services']; ?></div>
                <?}?>
                <a href="<?php echo get_home_url(); ?>/services" class="link section__link section__link--white"><i
                        class="fas fa-angle-right"></i>весь список услуг</a>
            </div>
            <div class="section__items services__items">
                <a class="link services__item-link item__link--analyzes"
                    href="<?php echo get_home_url(); ?>/services#analyzes">
                    <div class="services__item">
                        <img class="services__item-img"
                            src="<?php bloginfo('template_url'); ?>/assets/theme/img/services__microscope.svg"
                            alt="Анализы">
                        <p class="services__item-text">Анализы</p>
                    </div>
                </a>
                <a class="link services__item-link item__link--diagnostics"
                    href="<?php echo get_home_url(); ?>/services#diagnostics">
                    <div class="services__item">
                        <img class="services__item-img"
                            src="<?php bloginfo('template_url'); ?>/assets/theme/img/services__diagnostics.svg"
                            alt="Диагностика">
                        <p class="services__item-text">Диагностика</p>
                    </div>
                </a>
                <!-- <a class="link services__item-link item__link--health"
          href="<?php echo get_home_url(); ?>/services#reproductive-health">
          <div class="services__item">
            <img class="services__item-img"
              src="<?php bloginfo('template_url'); ?>/assets/theme/img/services__uterus.svg"
              alt="Репродуктивное здоровье">
            <p class="services__item-text">Репродуктивное здоровье</p>
          </div>
        </a> -->
                <a class="link services__item-link item__link--adults"
                    href="<?php echo get_home_url(); ?>/services#adults">
                    <div class="services__item">
                        <img class="services__item-img"
                            src="<?php bloginfo('template_url'); ?>/assets/theme/img/services__pregnancy.svg"
                            alt="Взрослые">
                        <p class="services__item-text">Взрослые</p>
                    </div>
                </a>
                <a class="link services__item-link item__link--kids" href="<?php echo get_home_url(); ?>/services#kids">
                    <div class="services__item">
                        <img class="services__item-img"
                            src="<?php bloginfo('template_url'); ?>/assets/theme/img/services__baby-boy.svg" alt="Дети">
                        <p class="services__item-text">Дети</p>
                    </div>
                </a>
                <a class="link services__item-link item__link--sales"
                    href="<?php echo get_home_url(); ?>/services/#sales">
                    <div class="services__item">
                        <img class="services__item-img"
                            src="<?php bloginfo('template_url'); ?>/assets/theme/img/services__sales.svg" alt="Акции">
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
                <? if ($all_options['index_whywe']) {?>
                <div class="section__text"><?php echo $all_options['index_whywe']; ?></div>
                <?}?>
                <a href="<?php echo get_home_url(); ?>/about" class="link section__link"><i
                        class="fas fa-angle-right"></i>о
                    клинике</a>
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
                <? if ($all_options['index_doctors']) {?>
                <div class="section__text"><?php echo $all_options['index_doctors']; ?></div>
                <?}?>
                <a class="link section__link" style="margin-right: 30px;"
                    href="<?php echo get_home_url(); ?>/doctors"><i class="fas fa-angle-right"></i>к
                    списку врачей</a>
                <a class="link section__link section__link--fu" href="<?php echo home_url(); ?>/vacancy">
                    <i class="fas fa-angle-right"></i>
                    Посмотреть вакансии
                </a>
            </div>
            <div class="section__items doctors__items">

                <?php
        $doctors_page = get_posts([
            'posts_per_page' => -1,
            'post_type' => 'doctors',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_query' => [
              // 'relation' => 'AND',
              [
                'key' => 'doctors_active',
                'value' => 'on',
                'compare' => 'LIKE'
              ]
            ],
          ]);
        foreach ($doctors_page as $page) {
        ?>
                <div class="doctors__item">
                    <a class="link doctors__id-link" href="<?php the_permalink($page->ID); ?>">
                        <?
                          if ( has_post_thumbnail($page->ID) ) {
                            echo get_the_post_thumbnail($page->ID, 'doctor-page_cover', array('class' => "doctors__img"));
                          } 
                          else {
                            echo '<img class="doctors__img" src="' . wp_get_attachment_image_url( 1704, 'doctor-list_cover' ). '"/>';
                          }
                        ?>
                        <div class="doctors__disc">
                            <p class="doctors__name"><?php echo $page->post_title; ?></p>
                            <p class="doctors__spec"><?php the_field('doctors_spec', $page->ID); ?></p>
                        </div>
                    </a>
                    <div class="doctors__btn">
                        записаться на приём
                    </div>
                    <div class="doctors__select-box">
                        <div class="doctors__select-title">
                            Выберите отделение клиники
                        </div>
                        <? 
            foreach (get_field('doctors_clinics', $page->ID) as $clinic) {
            if ($clinic == 1) {?>
                        <div class="link section__link page-doctor__item-btn page-doctor__item-btn--m-auto"
                            data-id="<?php the_field('doctors_id', $page->ID); ?>" data-clinic="1">ул. Выборная</div>
                        <?}?>
                        <? if ($clinic == 2) {?>
                        <div class="link section__link page-doctor__item-btn page-doctor__item-btn--m-auto"
                            data-id="<?php the_field('doctors_id', $page->ID); ?>" data-clinic="2">ул. Ключ-Камышенское
                        </div>
                        <?}}?>
                    </div>

                </div>
                <?php
        }
        wp_reset_postdata();
        ?>
            </div>
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

                        <a class="link news__item" href="<?php the_permalink(); ?>">
                            <div class="news__item-title"><?php echo $post->post_title; ?></div>
                            <div class="news__item-text"><?php the_excerpt(); ?></div>
                            <div class="news__item-date"><?php echo get_the_date('j F Y') . ' | читать' ?></div>
                        </a>

                        <?php
            }
            wp_reset_postdata();
            ?>

                    </div>
                    <a class="link news__link-btn link-underline" href="<?php echo get_home_url(); ?>/blog"><i
                            class="fas fa-angle-right"></i>читать все</a>
                </div>
            </div>
            <div class="news__block-right">
                <div class="section__title news__title">ОБРАТНАЯ СВЯЗЬ</div>
                <div class="news__box">
                    <div class="news__feedback">
                        <p class="news__feedback-title">Здесь вы можете оставить свой отзыв или задать нам любой вопрос.
                        </p>
                        <?php echo do_shortcode('[contact-form-7 id="1299" title="Обратная связь"]');  ?>
                    </div>
                    <div class="news__calltodirector">
                        <div class="calltodirector__description">
                            <div class="calltodirector__title">ПОЗВОНИТЬ ДИРЕКТОРУ</div>
                            <div class="calltodirector__text"><?php echo $all_options['index_calltodir']; ?></div>
                        </div>
                        <div class="calltodirector__btn-box">
                            <a class="link calltodirector__btn"
                                href="tel:<?php echo $all_options['dir_number_phone']; ?>">ПОЗВОНИТЬ
                                ДИРЕКТОРУ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- reviews -->
<!-- <section class="section reviews__section">
  <div class="wrap">
    <div class="section__container reviews__container">
      <div class="section__description">
        <div class="section__title reviews__title">ОТЗЫВЫ О НАС</div>
        <div class="section__text">На независимых ресурсах</div>
      </div>
      <div class="section__items reviews__items">

        <div class="reviews__item">
          <a class="link reviews__item-link" href="<?php the_field('link_flamp', 2716); ?>">
            <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/theme/img/reviews__flamp.svg"
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
          <a class="link reviews__item-link" href="<?php the_field('link_2gis', 2716); ?>">
            <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/theme/img/reviews__2gis.svg"
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
          <a class="link reviews__item-link" href="<?php the_field('link_yandex', 2716); ?>">
            <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/theme/img/reviews__yandex.svg"
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
          <a class="link reviews__item-link" href="<?php the_field('link_pro', 2716); ?>">
            <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/theme/img/reviews__pro.svg"
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
</section> -->

<!-- <script>
function medodsRecDoctors(elem) {
  let id = elem.getAttribute("data-id");
  console.log(id);
  mv("showOnClick", {
    // target: elem,
    path: "/clinic/1/doctor/" + id,
  });
}
</script> -->

<?php get_footer(); ?>