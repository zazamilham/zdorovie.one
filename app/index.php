<?php 
/*
Template name: Страница с картинкой в колонке
Template post type: page
*/
get_header();  ?>
<!-- страница страница SEO-страницы услуги -->



<section class="section page-blog-note__section">
  <div class="wrap wrap--blog">
    <div class="section__container page-blog-note__container">
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
          } ?>
          <div class="page-blog-note__item-content">
            <?php the_content(); ?>
          </div>
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