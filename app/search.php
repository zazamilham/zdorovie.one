<?php get_header();  ?>


<!-- ИНДЕКС -->
<section class="section page-search__section">
    <div class="wrap wrap--blog">
        <div class="section__container">
            <div class="section__description">
                <?php if (have_posts()) : ?>
                <div class="section__title page-blog__title">Результаты поиска по&nbsp;запросу:
                    <span><?php the_search_query(); ?></span>
                </div>
                <?php else : ?>
                <div class="section__title">Ничего не найдено</div>
                <?php endif; ?>
            </div>
            <div class="section__items page-search__items">
                <?php
                  if (have_posts()) :
                    // Start the Loop.
                    while (have_posts()) :
                      the_post(); ?>

                <a class="link page-search__item-link" href="<?php the_permalink(); ?>">
                    <div class="page-search__item">
                        <div class="page-search__item-box">
                            <div class="page-search__item-type">
                                <?
                                  if ($post->post_type == 'doctors') {
                                    echo 'Врач';
                                  }
                                  if ($post->post_type == 'page') {
                                    echo 'Страница';
                                  }
                                  if ($post->post_type == 'post') {
                                    echo get_the_category()[0]->name; 
                                    // echo '<pre>';
                                    // print_r(get_the_category());
                                    // echo '</pre>';
                                  }
                                  if ($post->post_type == 'services') {
                                    echo 'Услуга';
                                  }
                                ?>
                            </div>
                            <div class="page-search__item-title"><?php echo $post->post_title; ?></div>
                            <div class="page-search__item-date">
                                <? 
                                  if ($post->post_type == 'doctors') {
                                    the_field('doctors_spec', $page->ID); 
                                  }
                                  if ($post->post_type == 'post' && get_the_category()[0]->slug = 'sales') {
                                    echo get_field('sale_start') . ' - '. get_field('sale_end');
                                  }else {
                                  if ($post->post_type == 'post' && get_the_category()[0]->slug = 'blog') {
                                    the_date('j F Y');
                                  }}
                                ?>
                            </div>
                            <div class="page-search__item-text"><?php the_excerpt(); ?></div>
                        </div>
                        <?
                          if ($post->post_type == 'doctors')
                        {?>
                        <img class="page-search__item-img page-search__item-img--docs"
                            src="<?php the_post_thumbnail_url(); ?>" alt="doctor">
                        <?}else{?>
                        <img class="page-search__item-img" src="<?php the_post_thumbnail_url(); ?>" alt="">
                        <?}?>
                    </div>
                </a>
                <?php
                  endwhile; //End the loop  
                  the_posts_pagination();
                  else : ?>
                <p>
                    <?php _e('Извините, но нет совпандений по условиям поиска. Пожалуйста, попробуйте еще раз, используя другие ключевые слова.', 'twentyseventeen'); ?>
                </p>
                <?php
                  get_search_form();
                  endif;
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>