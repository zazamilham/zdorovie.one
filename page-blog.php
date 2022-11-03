<?php get_header();  ?>
<!-- страница списка записей блога -->


<div data-menuanchor="p1" class="bg bg2"></div>

<div class="fullpage">
  <section class="section page-blog__section">
    <div class="wrap">
      <div class="section__container page-blog__container">
        <div class="section__description">
          <div class="section__title page-blog__title"><?php the_title(); ?></div>
        </div>
        <div class="section__items page-blog__items">

          <?php
          if (have_posts()) :
            // Start the Loop.
            query_posts("cat=1");
            while (have_posts()) :
              the_post();
          ?>
          <a class="page-blog__item-link" href="<?php the_permalink(); ?>">
            <div class="page-blog__item">
              <img class="page-blog__item-img" src="<?php the_post_thumbnail_url(); ?>" alt="">
              <div class="page-blog__item-box">
                <div class="page-blog__item-date"><?php echo get_the_date('j F Y'); ?></div>
                <div class="page-blog__item-title"><?php echo $post->post_title; ?></div>
                <div class="page-blog__item-text"><?php the_excerpt(); ?></div>
              </div>
            </div>
          </a>
          <?php
            endwhile;
            the_posts_pagination();
            wp_reset_query();

          else :
            echo '</div>';
          endif;
          ?>

          <!-- </div>
          <div class="page-more__btn" id="page-more__btn">показать еще</div> -->

        </div>
        <div class="page-blog-note__item-tags">
          <?php
          echo 'Теги: ';
          $tags = get_tags();
          foreach ($tags as $tag) {
            $tag_link = get_tag_link($tag->term_id);
            echo "<a href='{$tag_link}'>{$tag->name}</a>, ";
          } ?>
        </div>
      </div>
  </section>



  <?php get_footer(); ?>