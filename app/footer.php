		<!-- footer -->
		<section class="section footer__section" id="footer">
		    <div class="wrap wrap--footer">
		        <div class="section__container footer__container one">
		            <div class="section__description">
		                <div class="section__title footer__title">КОНТАКТНАЯ ИНФОРМАЦИЯ</div>
		                <?php $all_options = get_option('true_options');
						$clink1 = $all_options['checkbox_1'];
						$clink2 = $all_options['checkbox_2'];
						$clink3 = $all_options['checkbox_3'];
						$clink4 = $all_options['checkbox_4'];
						$clink5 = $all_options['checkbox_5']; ?>
		            </div>
		            <div class="footer__contacts">
		                <div class="footer__clinic-contacts">
		                    <a class="link footer__clinic-tel" href="tel:<?php echo $all_options['number_phone']; ?>">
		                        <i class="fas fa-phone-alt"></i>
		                        <?php echo $all_options['number_phone']; ?>
		                    </a>
		                    <a class="link footer__clinic-email" href="mailto:<?php echo $all_options['email_to_send']; ?>">
		                        <i class="far fa-envelope"></i>
		                        <?php echo $all_options['email_to_send']; ?>
		                    </a>
		                    <a class="link footer__clinic-media" target="_blank"
		                        href="<?php echo $all_options['wa_link']; ?>">
		                        <i class="fab fa-whatsapp"></i>WhatsApp
		                    </a>
		                    <a class="link footer__clinic-media" target="_blank"
		                        href="<?php echo $all_options['tg_link']; ?>">
		                        <i class="fab fa-telegram-plane"></i>Telegram
		                    </a>
		                    <a class="link footer__clinic-media" target="_blank"
		                        href="<?php echo $all_options['vk_link']; ?>">
		                        <i class="fab fa-vk"></i></i>Вконтакте
		                    </a>
		                    <a class="link footer__clinic-media" target="_blank"
		                        href="<?php echo $all_options['insta_link']; ?>">
		                        <i class="fab fa-instagram"></i>Instagram
		                    </a>
		                </div>
		                <div class="footer__clinic">
		                    <?php
							if ($clink1) {
								echo "
									<a class=\"footer__clinic-item\" href=\"" . $all_options['2gis_1'] . "\" target=\"_blank\">
										<div class=\"footer__clinic-adres\"><i class=\"fas fa-map-marker-alt\"></i>" . $all_options['adres_1'] . "</div>
										<div class=\"footer__clinic-worktime\">
											<i class=\"far fa-calendar-alt\"></i>
											<div>
												<div class=\"footer__clinic-worktime-p1\">" . $all_options['worktime_1_1'] . "</div>
												<div class=\"footer__clinic-worktime-p2\">" . $all_options['worktime_2_1'] . "</div>
											</div>
										</div>
									</a>";
							}
							if ($clink2) {
								echo "
									<a class=\"footer__clinic-item\" href=\"" . $all_options['2gis_2'] . "\" target=\"_blank\">
										<div class=\"footer__clinic-adres\"><i class=\"fas fa-map-marker-alt\"></i>" . $all_options['adres_2'] . "</div>
										<div class=\"footer__clinic-worktime\">
											<i class=\"far fa-calendar-alt\"></i>
											<div>
												<div class=\"footer__clinic-worktime-p1\">" . $all_options['worktime_1_2'] . "</div>
												<div class=\"footer__clinic-worktime-p2\">" . $all_options['worktime_2_2'] . "</div>
											</div>
										</div>
									</a>";
							}
							if ($clink3) {
								echo "
									<a class=\"footer__clinic-item\" href=\"" . $all_options['2gis_3'] . "\" target=\"_blank\">
										<div class=\"footer__clinic-adres\"><i class=\"fas fa-map-marker-alt\"></i>" . $all_options['adres_3'] . "</div>
										<div class=\"footer__clinic-worktime\">
											<i class=\"far fa-calendar-alt\"></i>
											<div>
												<div class=\"footer__clinic-worktime-p1\">" . $all_options['worktime_1_3'] . "</div>
												<div class=\"footer__clinic-worktime-p2\">" . $all_options['worktime_2_3'] . "</div>
											</div>
										</div>
									</a>";
							}
							if ($clink4) {
								echo "
									<a class=\"footer__clinic-item\" href=\"" . $all_options['2gis_4'] . "\" target=\"_blank\">
										<div class=\"footer__clinic-adres\"><i class=\"fas fa-map-marker-alt\"></i>" . $all_options['adres_4'] . "</div>
										<div class=\"footer__clinic-worktime\">
											<i class=\"far fa-calendar-alt\"></i>
											<div>
												<div class=\"footer__clinic-worktime-p1\">" . $all_options['worktime_1_4'] . "</div>
												<div class=\"footer__clinic-worktime-p2\">" . $all_options['worktime_2_4'] . "</div>
											</div>
										</div>
									</a>";
							}
							if ($clink5) {
								echo "
									<a class=\"footer__clinic-item\" href=\"" . $all_options['2gis_5'] . "\" target=\"_blank\">
										<div class=\"footer__clinic-adres\"><i class=\"fas fa-map-marker-alt\"></i>" . $all_options['adres_5'] . "</div>
										<div class=\"footer__clinic-worktime\">
											<i class=\"far fa-calendar-alt\"></i>
											<div>
												<div class=\"footer__clinic-worktime-p1\">" . $all_options['worktime_1_5'] . "</div>
												<div class=\"footer__clinic-worktime-p2\">" . $all_options['worktime_2_5'] . "</div>
											</div>
										</div>
									</a>";
							}
							?>
		                </div>
		            </div>
		        </div>
		        <div class="footer__map">
		            <a class="link footer__map-link"
		                href="https://2gis.ru/novosibirsk/branches/141274359490806?m=83.041497%2C54.99563%2F14.21"
		                target="_blank">
		                <p>открыть карту</p>
		                <img class="footer__map-img" src="https://zdorovie.one/wp-content/uploads/2021/02/map.jpg" alt="2gis">
		            </a>
		        </div>
		        <div class="section__container footer__container two">
		            <div class="footer__menu">
		                <div class="footer__menu-block">
		                    <?php
							$args = array(
								'theme_location' => 'footer_menu-1'
							);
							wp_nav_menu($args);
							?>
		                </div>
		                <div class="footer__menu-block">
		                    <?php
							$args = array(
								'theme_location' => 'footer_menu-2'
							);
							wp_nav_menu($args);
							?>
		                </div>
		                <div class="footer__menu-block">
		                    <?php
							$args = array(
								'theme_location' => 'footer_menu-3'
							);
							wp_nav_menu($args);
							?>
		                </div>
		                <div class="footer__menu-block">
		                    <?php
							$args = array(
								'theme_location' => 'footer_menu-4'
							);
							wp_nav_menu($args);
							?>
		                </div>
		            </div>
		            <div class="footer__media">
		                <div class="footer__media-watermark">ИМЕЮТСЯ ПРОТИВОПОКАЗАНИЯ, НЕОБХОДИМА КОНСУЛЬТАЦИЯ
		                    СПЕЦИАЛИСТА.
		                </div>
		            </div>
		            <div class="footer__info">
		                <p class="footer__info-block1"><?php echo $all_options['footer_block1']; ?></p>
		                <p class="footer__info-block2"><?php echo $all_options['footer_block2']; ?></p>
		                <p class="footer__info-block3"><?php echo $all_options['footer_block3']; ?></p>
		                <p class="footer__info-block4"><?php echo $all_options['footer_block4']; ?></p>
		            </div>
		            <div class="footer__dev">
		                <span class="footer__copy">Здоровье и материнство &copy; 2020-<?= date('Y'); ?> </span>
		                <a class="link footer__dev-link" target="_blank" href="http://fufuter.ru/">Постарались и
		                    разработали
		                    сайт</a>
		            </div>
		        </div>
		    </div>
		</section>

		<script type="text/javascript" id="cookieinfo" src="//cookieinfoscript.com/js/cookieinfo.min.js" data-bg="#FFFFFF"
		    data-fg="#404040" data-link="#08bfcc" data-font-size="14px"
		    data-message="Мы cохраняем файлы cookie для улучшения работы сайта." data-moreinfo="/confidentiality"
		    data-linkmsg="Посмотреть соглашение." data-close-text="Принимаю">
		</script>

		<!-- WEBICA code -->
		<script type="text/javascript">
(function(a, b, c) {
    try {
        function f() {
            var g = document.createElement('script'),
                h = document.getElementsByTagName('script')[0];
            g.type = 'text/javascript', g.async = !0, g.src = '//widget.webica.pro/code/loader.js?id=' + c, h
                .parentNode
                .insertBefore(g, h)
        }
        '[object Opera]' == b.opera ? a.addEventListener('DOMContentLoaded', f, !1) : f()
    } catch (f) {}
})(document, window, '9YqslRwKffNTDBFK');
		</script>
		<!-- /WEBICA code -->

		</body>
		<?php wp_footer(); ?>

		</html>