<?php get_header();	?>
<!-- страница списка акций -->


  <div data-menuanchor="p1" class="bg bg2"></div>

  <div class="fullpage">
    <section class="section page-sales__section">
      <div class="wrap">
        <div class="section__container page-sales__container">
          <div class="section__description">
            <div class="section__title page-sales__title"><?php the_title(); ?></div>
          </div>
          <div class="section__items page-sales__items">

            <?php
              if ( have_posts() ) :
                // Start the Loop.
                query_posts("cat=4");
                // query_posts("cat=2");
                while ( have_posts() ) :
                  the_post();
                  ?>
                  <a class="page-sales__item-link" href="<?php the_permalink(); ?>">
                    <div class="page-sales__item">
                      <?php the_post_thumbnail(); ?>
                      <div class="page-sales__item-text-box">
                        <div class="page-sales__item-date"><?php the_field('sale_start', $post->ID)?> - <?php the_field('sale_end', $post->ID)?></div>
                        <div class="page-sales__item-title"><?php	echo $post->post_title; ?></div>
                        <div class="page-sales__item-text"><?php the_excerpt(); ?></div>
                      </div>
                    </div>
                  </a>
                <?php 
                endwhile;
                wp_reset_query();
              else :
                echo '</div>';
              endif;
            ?>
          </div>
        </div>
      </div>
    </section>


<?php get_footer(); ?>