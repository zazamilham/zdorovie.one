<?php get_header();  ?>
<!-- страница списка докторов -->



<section class="section page-doctors__section">
  <div class="wrap wrap--margin">
    <div class="section__container page-doctors__container">
      <div class="section__description">
        <div class="section__title page-doctors__title">Наши специалисты</div>
        <div class="section__text">Вы можете быть уверены, что доверяете свое здоровье в опытные и надежные
          руки.<br>На сайте вы можете записаться к нужному вам специалисту.
        </div>
      </div>

      <div class="section__search">
        <form class="section__search-form">
          <input class="section__search-input" id="page-doctors__search-input" type="search" name="q"
            placeholder="Поиск по ФИО и специальности" spellcheck="true" autocomplete="off">
        </form>
      </div>

      <button class="link section__link section__link--fu doctors__join-btn">
        хочешь в нашу команду?
      </button>

      <div class="section__items page-doctors__items">

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
        if ($doctors_page) {
        
        foreach ($doctors_page as $page) {
          // $content = $page->post_content;
          // if (!$content) continue;
          // $content = apply_filters('the_content', $content);
        ?>
        <div class="page-doctors__item">
          <a class="link page-doctors__item-link" href="<?php the_permalink($page->ID); ?>">
            <? echo get_the_post_thumbnail($page->ID, 'doctor-page_cover', array('class' => "page-doctors__img")); ?>
            <div class="page-doctors__disc">
              <p class="page-doctors__name"><?php echo $page->post_title; ?></p>
              <p class="page-doctors__spec"><?php the_field('doctors_spec', $page->ID); ?></p>
            </div>
          </a>
          <div class="page-doctors__btn">записаться на приём</div>
          <div class="page-doctors__select-box">
            <div class="page-doctors__select-title">
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
              data-id="<?php the_field('doctors_id', $page->ID); ?>" data-clinic="2">ул. Ключ-Камышенское</div>
            <?}}?>
          </div>
        </div>
        <? }} ?>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>