<?php get_header();	?>


  <div data-menuanchor="p1" class="bg bg2"></div>
<!-- ИНДЕКС -->
  <div class="fullpage">
    <section class="section">
      <div class="wrap">
        <div class="section__container">
          <div class="section__description">
            <?php if ( have_posts() ) : ?>
              <div class="section__title page-blog__title">Результаты поиска по запросу: <span><?php the_search_query(); ?></span></div>
            <?php else : ?>
              <div class="section__title">Ничего не найдено</div>
            <?php endif; ?>
          </div>    
          <div class="section__items page-search__items">
            <?php
              if ( have_posts() ) :
                // Start the Loop.
                  while ( have_posts() ) :
                    the_post(); ?>

                    <?php
                    if ($post->post_type == 'page') {
                      if ($post->post_parent == '235') { ?>
                        <a class="page-search__item-link" href="<?php the_permalink(); ?>">
                          <div class="page-search__item">
                            <div class="page-search__item-box">
                              <div class="page-search__item-type">Врач</div>
                              <div class="page-search__item-title"><?php	echo $post->post_title; ?></div>
                              <div class="page-search__item-doctors-spec"><?php the_field('doctors_spec', $page->ID); ?></div>
                              <div class="page-search__item-text"><?php the_excerpt(); ?></div>
                            </div>
                            <img class="page-search__item-img page-search__item-img--docs" src="<?php the_field('doctors_photo', $page->ID); ?>" alt="doctor">
                          </div>
                        </a> <?php 
                      } 
                      else { ?>
                        <a class="page-search__item-link" href="<?php the_permalink(); ?>">
                          <div class="page-search__item">
                            <div class="page-search__item-box">
                              <div class="page-search__item-type">Страница</div>
                              <div class="page-search__item-title"><?php	echo $post->post_title; ?></div>
                              <div class="page-search__item-text"><?php the_excerpt(); ?></div>
                            </div>
                          </div>
                        </a> <?php 
                      }
                    }
                    else { ?>
                      <a class="page-search__item-link" href="<?php the_permalink(); ?>">
                        <div class="page-search__item">
                          <div class="page-search__item-box">
                            <div class="page-search__item-type"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
                            <div class="page-search__item-title"><?php	echo $post->post_title; ?></div>
                            <div class="page-search__item-date"><?php echo get_the_date('j F Y'); ?></div>
                            <div class="page-search__item-text"><?php the_excerpt(); ?></div>                          
                          </div>
                          <img class="page-search__item-img" src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </div>
                      </a> <?php
                    }
                  endwhile; //End the loop  
                the_posts_pagination();

              else :
                ?>

                <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
                <?php
                  get_search_form();

              endif;
            ?>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>