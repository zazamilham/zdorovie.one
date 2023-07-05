<?php get_header();  ?>
<!-- страница списка записей блога -->



<section class="section page-blog__section">
    <div class="wrap wrap--margin">
        <div class="section__container page-blog__container">
            <div class="section__description">
                <div class="section__title page-blog__title"><?php the_title(); ?></div>
            </div>
            <div class="section__items page-blog__items">

                <?php
                    $WP_posts = get_posts([
                        'posts_per_page' => -1,
                        'post_type' => 'post',
                        'category' => 1,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ]);
                    if ($WP_posts) {
                    foreach ($WP_posts as $post) {
                ?>
                <a class="link page-blog__item-link" href="<?php the_permalink(); ?>">
                    <div class="page-blog__item">
                        <img class="page-blog__item-img"
                            src="<?php the_post_thumbnail_url('blog-page_cover_list', array()); ?>" alt="">
                        <div class="page-blog__item-box" style="color: <? the_field('title_color') ?>">
                            <div class="page-blog__item-date"><?php echo get_the_date('j F Y'); ?></div>
                            <div class="page-blog__item-title"><?php echo $post->post_title; ?></div>
                            <div class="page-blog__item-text"><?php the_excerpt(); ?></div>
                        </div>
                    </div>
                </a>
                <?}}?>

                <!-- </div>
          <div class="page-more__btn" id="page-more__btn">показать еще</div> -->

            </div>
            <div class="page-blog-note__item-tags">
                <?php
                    echo 'Теги: ';
                    $tags = get_tags();
                    foreach ($tags as $tag) {
                    $tag_link = get_tag_link($tag->term_id);
                    echo "<a href='{$tag_link}' class='link'>{$tag->name}</a>, ";
                    } 
                ?>
            </div>
        </div>
</section>



<?php get_footer(); ?>