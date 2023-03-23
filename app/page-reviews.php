<?php get_header();  ?>

<!-- ИНДЕКС -->

<section class="section reviews__section">
  <div class="wrap wrap--blog">
    <div class="section__container reviews__container">
      <div class="section__description">
        <div class="section__title reviews__title"><?php the_title(); ?></div>
        <div class="section__text">На независимых ресурсах</div>
      </div>
      <div class="section__items reviews__items">

        <div class="reviews__item">
          <a class="link reviews__item-link" href="<?php the_field('link_flamp'); ?>">
            <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/theme/img/reviews__flamp.svg"
              alt="Flamp">
            <div class="reviews__item-desc">
              <div class="reviews__item-rate">
                <i class="fas fa-star-half-alt"></i> <?php the_field('rate_flamp'); ?>
              </div>
              <?php the_field('amount_flamp'); ?>
            </div>
          </a>
        </div>

        <div class="reviews__item">
          <a class="link reviews__item-link" href="<?php the_field('link_2gis'); ?>">
            <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/theme/img/reviews__2gis.svg"
              alt="2gis">
            <div class="reviews__item-desc">
              <div class="reviews__item-rate">
                <i class="fas fa-star-half-alt"></i> <?php the_field('rate_2gis'); ?>
              </div>
              <?php the_field('amount_2gis'); ?>
            </div>
          </a>
        </div>

        <div class="reviews__item">
          <a class="link reviews__item-link" href="<?php the_field('link_yandex'); ?>">
            <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/theme/img/reviews__yandex.svg"
              alt="Yandex">
            <div class="reviews__item-desc">
              <div class="reviews__item-rate">
                <i class="fas fa-star-half-alt"></i> <?php the_field('rate_yandex'); ?>
              </div>
              <?php the_field('amount_yandex'); ?>
            </div>
          </a>
        </div>

        <div class="reviews__item">
          <a class="link reviews__item-link" href="<?php the_field('link_pro'); ?>">
            <img class="reviews__img" src="<?php bloginfo('template_url'); ?>/assets/theme/img/reviews__pro.svg"
              alt="Продокторов">
            <div class="reviews__item-desc">
              <div class="reviews__item-rate">
                <i class="fas fa-star-half-alt"></i> <?php the_field('rate_pro'); ?>
              </div>
              <?php the_field('amount_pro'); ?>
            </div>
          </a>
        </div>

      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>