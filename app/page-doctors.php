<?php get_header();  ?>
<!-- страница списка докторов -->



<section class="section page-doctors__section">
  <div class="wrap wrap--margin">
    <div class="section__container page-doctors__container">
      <div class="section__description">
        <div class="section__title page-doctors__title"><?php the_title(); ?></div>
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
      <div class="section__items page-doctors__items">

        <?php
        $doctors_page = get_pages(array('child_of' => $post->ID));
        foreach ($doctors_page as $page) {
          // $content = $page->post_content;
          // if (!$content) continue;
          // $content = apply_filters('the_content', $content);
        ?>
        <div class="page-doctors__item">

          <div class="page-doctors__btn" data-id="<?php the_field('doctors_id', $page->ID); ?>">записаться</div>
          <!-- <script>
          <?php the_field('doctors_id', $page->ID); ?>.onclick = function() {
            var docId = '<?php the_field('doctors_id', $page->ID); ?>';
          }
          </script> -->
          <a class="link page-doctors__item-link" href="<?php echo get_page_link($page->ID); ?>">
            <img class="page-doctors__img" src="<?php the_field('doctors_photo', $page->ID); ?>" alt="doctor">
            <div class="page-doctors__disc">
              <p class="page-doctors__name"><?php echo $page->post_title; ?></p>
              <p class="page-doctors__spec"><?php the_field('doctors_spec', $page->ID); ?></p>
            </div>
          </a>

        </div>
        <?php
        }
        wp_reset_postdata();
        ?>
      </div>
      <button class="link section__link page-more__btn doctors__join-btn">
        присоединиться к команде
      </button>
    </div>
  </div>
</section>


<?php get_footer(); ?>