<?php get_header();  ?>
<!-- страница онлайн оплаты -->



<section class="section page-pay__section">
    <div class="wrap wrap--blog">
        <div class="section__container page-pay__container">
            <div class="section__description">
                <div class="section__title"><?php the_title(); ?></div>
            </div>

            <div class="page-pay__box">
                <iframe
                    src="https://money.yandex.ru/quickpay/shop-widget?writer=seller&targets=%D1%82%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D1%8B%D0%B9%20%D0%BF%D0%BB%D0%B0%D1%82%D0%B5%D0%B6&targets-hint=&default-sum=&button-text=11&payment-type-choice=on&mobile-payment-type-choice=on&fio=on&phone=on&comment=on&hint=&successURL=http%3A%2F%2Fzdravmat2%2F&quickpay=shop&account=41001249715676"
                    width="100%" height="500" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
            </div>

        </div>
    </div>
</section>


<?php get_footer(); ?>