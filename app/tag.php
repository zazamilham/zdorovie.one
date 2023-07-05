<?php get_header();  ?>
<!-- страница списка записей блога -->



<section class="section page-blog__section">
    <div class="wrap wrap--margin">
        <div class="section__container page-blog__container">
            <div class="section__description">
                <div class="section__title page-blog__title">публикации с тегом:
                    <span><?php single_term_title(); ?></span>
                </div>
            </div>
            <div class="section__items page-blog__items">

                <?php
                    if (have_posts()) :
                    // Start the Loop.
                    while (have_posts()) :
                        the_post();
                ?>
                <a class="link page-blog__item-link" href="<?php the_permalink(); ?>">
                    <div class="page-blog__item">
                        <img class="page-blog__item-img" src="<?php the_post_thumbnail(); ?>" alt="">
                        <div class="page-blog__item-box">
                            <div class="page-blog__item-type"><?php $category = get_the_category();
                                                    echo $category[0]->cat_name; ?></div>
                            <div class="page-blog__item-date"><?php echo get_the_date('j F Y'); ?></div>
                            <div class="page-blog__item-title"><?php echo $post->post_title; ?></div>
                            <div class="page-blog__item-text"><?php the_excerpt(); ?></div>
                        </div>
                    </div>
                </a>
                <?php
                    endwhile; //End the loop
                    the_posts_pagination();

                    else :
                    echo '</div>';
                    endif;
                ?>

                <!-- </div>
          <div class="page-more__btn" id="page-more__btn">показать еще</div> -->

            </div>
        </div>
</section>



<?php get_footer(); ?>