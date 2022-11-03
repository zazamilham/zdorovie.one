<?php get_header();  ?>

<div data-menuanchor="p1" class="bg bg2"></div>
<!-- ИНДЕКС -->
<div class="fullpage">
  <section class="section">
    <div class="wrap">
      <div class="section__container">
        <div class="section__description">
          <div class="section__title"><?php the_title(); ?></div>
        </div>
        <div class="section__items page-blog-note__items">
          <div class="page-blog-note__item-content">
            <?php
            get_post();
            the_content();
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>