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
        <div class="section__items about__section">
          <?php
          get_post();
          the_content();
          ?>
        </div>
      </div>
    </div>
  </section>




  <?php get_footer(); ?>