<?php get_header();  ?>

<!-- СТРАНИЦА ОТЗЫВОВ -->

<section class="section page-blog-note__slide-cover" style="object-position: <? the_field('cover_position') ?>%">

    <? if (has_post_thumbnail()) { ?>
    <? the_post_thumbnail('blog-page_cover_slide', array('class' => "page-blog-note__slide-cover-img")); ?>
    <? } ?>

    <div class="wrap wrap--margin">
        <div class="section__container">
            <div class="section__description">
                <h1 class="section__title page-blog-note__item-title" style="color: <? the_field('title_color') ?>">
                    <?php echo $post->post_title; ?>
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="section page-blog-note__section reviews__section">
    <div class="wrap wrap--slide-cover">
        <div class="section__container reviews__container">
            <div class="section__items  slide-cover">
                <script src="https://res.smartwidgets.ru/app.js" defer></script>
                <div class="sw-app" data-app="70ddc22e9cd1805697f16c03b8c7f0f5"></div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>