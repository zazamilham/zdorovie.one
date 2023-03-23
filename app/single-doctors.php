<?php get_header();
/*
Template Name: Шаблон - Страница доктора
Template Post Type: page
*/
?>
<!-- страница доктора -->

<div data-menuanchor="p1" class="bg bg2"></div>

<div class="fullpage">
  <section class="section page-doctor__section">
    <div class="wrap wrap--margin">
      <div class="section__container page-doctor__container">
        <div class="section__description">
          <div class="section__title page-doctor__title">
            Наши специалисты
          </div>
          <a href="<?php echo get_home_url(); ?>/doctors" class="link section__link section__link--blue">
            <i class="fas fa-angle-left"></i>
            к списку врачей
          </a>
        </div>
        <div class="section__items page-doctor__items">
          <? the_post_thumbnail('doctor-page_cover', array('class' => "page-doctor__item-img")); ?>
          <div class="page-doctor__item-textbox">

            <?php
            $mark = get_field('doctors_mark');
            if ($mark) {
              echo '<div class="page-doctor__item-icons">';
              if ($mark && in_array('1', $mark)) {
                echo '<i class="fas fa-baby-carriage" data-title="Детский врач"></i>';
              }
              if ($mark && in_array('2', $mark)) {
                echo '<i class="fas fa-briefcase-medical" data-title="Выезд на дом"></i>';
              }
              if ($mark && in_array('3', $mark)) {
                echo '<i class="fas fa-graduation-cap" data-title="Большой опыт"></i>';
              }
              if ($mark && in_array('4', $mark)) {
                echo '<i class="fas fa-thumbs-up" data-title="Хорошие отзывы"></i>';
              }
              if ($mark && in_array('5', $mark)) {
                echo '<i class="fas fa-headset"" data-title="Онлайн консультация"></i>';
              }
              if ($mark && in_array('6', $mark)) {
                echo '<i class="fas fa-user-md"" data-title="Взрослые"></i>';
              }
              echo '</div>';
            }
            ?>

            <div class="page-doctor__item-title">
              <?php echo get_the_title(); ?>
            </div>
            <div class="page-doctor__item-record">
              <div class="page-doctor__item-record-title">
                Записаться на приём:
              </div>
              <?
              foreach (get_field('doctors_clinics') as $clinic) {
                if ($clinic == 1) {?>
              <div class="link section__link page-doctor__item-btn" data-id="<?php the_field('doctors_id'); ?>"
                data-clinic="1">ул. Выборная
              </div>
              <?}?>
              <? if ($clinic == 2) {?>
              <div class="link section__link page-doctor__item-btn" data-id="<?php the_field('doctors_id'); ?>"
                data-clinic="2">ул. Ключ-Камышенское
              </div>
              <?}}?>
            </div>
            <div class="page-doctor__item-spec"><?php the_field('doctors_spec'); ?></div>
            <div class="page-doctor__item-experience">стаж:
              <?php echo $docs_exp = date('Y') - get_field('doctors_exp'); ?>
              <?php
              if (substr($docs_exp, -1) == '0') echo 'лет';
              elseif ($docs_exp >= '10' && $docs_exp <= '20') echo 'лет';
              elseif (substr($docs_exp, -1) == '1') echo 'год';
              elseif (substr($docs_exp, -1) <= '4') echo 'года';
              else echo 'лет'; ?>
            </div>
            <?php
            $mark = get_field('doctors_cat');
            if ($mark) {
            ?>
            <div class="page-doctor__item-categories"><?php the_field('doctors_cat'); ?> категория</div>
            <?php
            }
            ?>
            <div class="page-doctor__item-text"><?php echo the_content(); ?></div>
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
              if (get_field('hints-check-3', $page->ID)) {
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
    </div>
  </section>


  <?php get_footer(); ?>