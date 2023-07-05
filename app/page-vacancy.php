<?php get_header();  ?>

<!-- ИНДЕКС -->
<section class="section">
    <div class="wrap wrap--blog">
        <div class="section__container">
            <div class="section__description">
                <div class="section__title"><?php the_title(); ?></div>
            </div>
            <div class="section__items page-blog-note__items">
                <div class="page-blog-note__item-content">
                    <?php
                        get_post();
                        the_content();
                    ?>
                    <button class="doctors__join-btn page-more__btn">
                        Присоединиться к команде
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>