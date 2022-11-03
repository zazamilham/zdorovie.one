<?php get_header();  ?>
<!-- страница записи блога или акции -->


<div data-menuanchor="p1" class="bg bg2"></div>

<div class="fullpage">
  <section class="section page-blog-note__section">
    <div class="wrap">
      <div class="section__container page-blog-note__container">
        <div class="section__description">
          <div class="section__title page-blog-note__title">
            <?php
            $post = get_post();
            $category = get_the_category();
            echo $category[0]->name;
            // echo "<pre>";
            // print_r ($category); 
            // echo "</pre>";
            ?>
          </div>
          <a href="<?php echo get_home_url(); ?>/blog" class="section__link section__link--blue link-underline">
            <i class="fas fa-angle-left"></i>
            вернуться в раздел
          </a>
        </div>
        <div class="section__items page-blog-note__items">

          <div class="page-blog-note__item">

            <?php
            if ($category[0]->term_id == 4) { ?>
              <div class="page-blog-note__item-date"><?php the_field('sale_start', $post->ID) ?> -
                <?php the_field('sale_end', $post->ID) ?></div>
            <?php
            } else { ?>
              <div class="page-blog-note__item-date"><?php echo get_the_date('j F Y'); ?></div>
            <?php
            }
            ?>

            <h1 class="page-blog-note__item-title">
              <?php echo $post->post_title; ?>
            </h1>
            <div class="page-blog-note__item-content">
              <?php the_content(); ?>
            </div>
            <div class="page-blog-note__item-tags">
              <?php the_tags('Теги: ');
              wp_reset_postdata(); ?>
            </div>
            <div class="page-blog-note__item-share ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp,skype,telegram" data-limit="3">
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
                echo '<a class="page-blog-note__hints-link" href="' . get_field('hint-link-1') . '">перейти</a>';
              }
              echo '</div>';
            }
            if (get_field('hints-check-2')) {
              echo '<div class="page-blog-note__hints-modal page-blog-note__hints-modal-on page-blog-note__hints-modal-2">
                          <div class="page-blog-note__hints-close"><i class="page-blog-note__hints-close-i fas fa-times"></i></div>
                          <div class="page-blog-note__hints-desc">' . get_field('hint-2') . '</div>';
              if (get_field('hint-link-2')) {
                echo '<a class="page-blog-note__hints-link" href="' . get_field('hint-link-2') . '">перейти</a>';
              }
              echo '</div>';
            }
            if (get_field('hints-check-3')) {
              echo '<div class="page-blog-note__hints-modal page-blog-note__hints-modal-on page-blog-note__hints-modal-3">
                          <div class="page-blog-note__hints-close"><i class="page-blog-note__hints-close-i fas fa-times"></i></div>
                          <div class="page-blog-note__hints-desc">' . get_field('hint-3') . '</div>';
              if (get_field('hint-link-3')) {
                echo '<a class="page-blog-note__hints-link" href="' . get_field('hint-link-3') . '">перейти</a>';
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