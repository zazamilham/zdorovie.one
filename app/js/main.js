//FullPage
jQuery(function ($) {
	$('#fullpage').fullpage({
		licenseKey: 'B1681994-FBBC4960-8CC99280-349E0B33',
		//Навигация
		//menu: '#header__menu',
		lockAnchors: false,
		// anchors: ['p1', 'p2', 'p3', 'p4', 'p5', 'p6'],
		navigation: true,
		//navigationPosition: 'left',
		//navigationTooltips: ['firstSlide', 'secondSlide'],
		showActiveTooltip: false,
		slidesNavigation: true,
		//slidesNavPosition: 'bottom',


		//Скроллинг
		css3: true,
		scrollingSpeed: 700,
		autoScrolling: true,
		fitToSection: true,
		fitToSectionDelay: 1000,
		scrollBar: false,
		easing: 'easeInOutCubic',
		easingcss3: 'ease',
		loopBottom: false,
		loopTop: false,
		loopHorizontal: true,
		continuousVertical: false,
		continuousHorizontal: false,
		scrollHorizontally: false,
		interlockedSlides: false,
		dragAndMove: false,
		offsetSections: true,
		resetSliders: false,
		fadingEffect: false,
		normalScrollElements: '.page-services__link-container, .category__service-description-box, .swal2-container, .wpdreams_asl_results, .medods-widget_iframe-drawer, .medods-widget_overlay, .search__wrap',
		scrollOverflow: true,
		scrollOverflowReset: false,
		scrollOverflowOptions: null,
		touchSensitivity: 15,
		bigSectionsDestination: null,

		//Доступ
		keyboardScrolling: true,
		animateAnchor: true,
		recordHistory: true,

		//Дизайн
		controlArrows: true,
		verticalCentered: true,
		//sectionsColor : ['#fff', 'red'],
		//paddingTop: '3em',
		//paddingBottom: '10px',
		//fixedElements: '#header, .footer',

		// отключаем на ширине 750px
		responsiveWidth: 750,
		responsiveHeight: 0,
		responsiveSlides: false,
		parallax: false,
		parallaxOptions: { type: 'reveal', percentage: 62, property: 'translate' },
		cards: false,
		cardsOptions: { perspective: 100, fadeContent: true, fadeBackground: true },

		//Настроить селекторы
		sectionSelector: '.section',
		slideSelector: '.slide',

		lazyLoading: true,

		//события
		onLeave: function (origin, destination, direction) { },
		afterLoad: function (origin, destination, direction) { },
		afterRender: function () {
			setInterval(function () {
				$.fn.fullpage.moveSlideRight();
			}, 7000);
		},
		afterResize: function (width, height) { },
		afterReBuild: function () { },
		afterResponsive: function (isResponsive) { },
		afterSlideLoad: function (section, origin, destination, direction) { },
		onSlideLeave: function (section, origin, destination, direction) { }
	});


	//бургер меню
	$(".burger").click(function () {
		$('.burger__btn').toggleClass('burger__btn--active');
		$('.header__menu').toggleClass('header__menu--active');
	});
	$(".header__btn-search").click(function () {
		$('.header__search').addClass('header__search--active');
		$('.header__menu').removeClass('header__menu--active');
		$('.burger__btn').removeClass('burger__btn--active');
	});
	$(".search__close").click(function () {
		$('.header__search').removeClass('header__search--active');
	});


	//модалки в блоге 
	$(".page-blog-note__hints-close-i").click(function () {
		$(this).closest('.page-blog-note__hints-modal').removeClass('page-blog-note__hints-modal-on');
	});


	// //2gis-widget
	// $(".footer__map-button--open").click(function () {
	// 	$('.footer__map-button--open').addClass('hide');
	// 	$('.footer__map-button--close').removeClass('hide');
	// 	$('.footer__map').addClass('footer__map--on');
	// 	$('.footer__map-container').addClass('footer__map-container--on');
	// 	$('.footer__map-box').addClass('footer__map-box--on');
	// 	$('.footer__menu').addClass('footer__menu--on');
	// 	$('.record__btn').css('opacity', '0');
	// 	$('.record__btn').css('z-index', '0');
	// });
	// $(".footer__map-button--close").click(function () {
	// 	$('.footer__map-button--open').removeClass('hide');
	// 	$('.footer__map-button--close').addClass('hide');
	// 	$('.footer__map').removeClass('footer__map--on');
	// 	$('.footer__map-container').removeClass('footer__map-container--on');
	// 	$('.footer__map-box').removeClass('footer__map-box--on');
	// 	$('.footer__menu').removeClass('footer__menu--on');
	// 	$('.record__btn').css('opacity', '1');
	// 	$('.record__btn').css('z-index', '1');
	// });


	//мини скрипт для прокрутки до адресов клиники
	$(".header__top-adres").click(function () {
		if ($(".fullpage").is("#fullpage")) {
			$(".footer__section").attr('id', '');
			$("#fp-nav ul li:last-child a span").click();
		}
	});

	//мини скрипт для кнопки записи
	var $nav = $('.record__btn'),
		$win = $(window),
		winH = $win.height();    // Get the window height.

	$win.on("scroll", function () {
		$nav.toggleClass("active", $(this).scrollTop() > winH);
	}).on("resize", function () { // If the user resizes the window
		winH = $(this).height(); // you'll need the new height value
	});

	//кнопка вызова на дом
	$(".call-to-home__btn").click(function () {
		$('.call-to-home').addClass('side-form--active');
	});
	//кнопка вакансии
	$(".doctors__join-btn").click(function () {
		$('.vacancy').addClass('side-form--active');
	});
	//закрыть форму
	$(".side-form__bg").click(function () {
		$('.call-to-home').removeClass('side-form--active');
		$('.vacancy').removeClass('side-form--active');
	});
	$(".side-form__close").click(function () {
		$('.call-to-home').removeClass('side-form--active');
		$('.vacancy').removeClass('side-form--active');
	});
	//выбор файлов
	$('.feedback__input-file').change(function () {
		if ($(this).val() != '') $(this).next().text('Выбрано файлов: ' + $(this)[0].files.length);
		else $(this).next().text('Выберите файлы');
	});

	//sweetalert2
	$(".online-pay").click(function () {
		Swal.fire({
			icon: 'info',
			iconColor: '#08bfcc',
			title: 'Онлайн-оплата',
			html: '<p class="sweet-payment__text">В этом разделе Вы можете осуществить оплату услуг медицинского центра «Здоровье и материнство». После нажатия на кнопку "<b>Перейти к оплате</b>" Вы будете перенаправлены <b>на платежный шлюз ОАО "Сбербанк России"</b> для ввода реквизитов: Вашей банковской карты, ФИО пациента, телефона пациента, email для получения чека, номера заказа.<br><br>Оплата происходит с использованием Банковских карт следующих платежных систем:<br><img class="sweet-payment__img" src="https://zdorovie.one/wp-content/uploads/2020/11/cards.png" alt=""></p><div class="sweet-payment__container"><a class="sweet-payment__title sweet-payment__title-btn" href="#sweet_p2">Информация о защите платежа</a><p class="sweet-payment__text" id="sweet_p2">Для оплаты (ввода реквизитов Вашей карты) Вы будете перенаправлены на платёжный шлюз ПАО СБЕРБАНК. Соединение с платёжным шлюзом и передача информации осуществляется в защищённом режиме с использованием протокола шифрования SSL. В случае если Ваш банк поддерживает технологию безопасного проведения интернет-платежей Verified By Visa, MasterCard SecureCode, MIR Accept, J-Secure, для проведения платежа также может потребоваться ввод специального пароля.<br><br>Настоящий сайт поддерживает 256-битное шифрование. Конфиденциальность сообщаемой персональной информации обеспечивается ПАО СБЕРБАНК. Введённая информация не будет предоставлена третьим лицам за исключением случаев, предусмотренных законодательством РФ. Проведение платежей по банковским картам осуществляется в строгом соответствии с требованиями платёжных систем МИР, Visa Int., MasterCard Europe Sprl, JCB.</p></div><div class="sweet-payment__container"><a class="sweet-payment__title sweet-payment__title-btn" id="sweet-payment__title-btn" href="#sweet_p1">Информация о возврате платежа</a><p class="sweet-payment__text" id="sweet_p1">- Заявление на возврат составляется при личном посещении клиники.<br>- Денежные средства возвращаются на ту же карту, с которой производилась оплата.<br>- Возврат денег на карту осуществляется в течение 5-30 рабочих дней (срок зависит от банка, который выдал вашу банковскую карту) с момента предоставления заявления, предъявления паспортных данных и полных банковских реквизитов карты клиента по адресу г.Новосибирск, ул.Выборная, 125/1, этаж 1.</p></div>',
			confirmButtonText: '<a href="https://securepayments.sberbank.ru/shortlink/GT4MIh5B" target="_blank">Перейти к оплате</a>',
			confirmButtonColor: '#08bfcc',
			showCancelButton: true,
			cancelButtonText: 'Отмена',
		})
	});
	$("#sweet-payment__title-btn").click(function () {
		$('.sweet-payment__title-btn').toggleClass('sweet-payment__title-btn--active');
		$(this).next().toggleClass('sweet-payment__text--active');
	});

	//CF7
	document.addEventListener('wpcf7invalid', function (event) {
		Swal.fire({
			icon: 'error',
			iconColor: 'red',
			title: 'Ошибка',
			text: 'Одно или несколько полей пустые, или содержат ошибочные данные. Пожалуйста, проверьте их и попробуйте ещё раз.',
			confirmButtonColor: '#08bfcc',
		})
	}, false);

	document.addEventListener('wpcf7mailfailed', function (event) {
		Swal.fire({
			icon: 'error',
			title: 'Ошибка',
			text: 'При отправке сообщения произошел сбой. Пожалуйста, попробуйте ещё раз позже.',
			confirmButtonColor: '#08bfcc',
		})
	}, false);

	document.addEventListener('wpcf7mailsent', function (event) {

		Swal.fire({

			icon: 'success',
			title: 'Отлично!',
			text: 'Спасибо за Ваше сообщение. Оно успешно отправлено.',
			confirmButtonColor: '#08bfcc',
		})
	}, false);

	//аккордеон в услугах
	$(".category__description").click(function () {
		$(this).toggleClass('category__description--active');
	});

	$(".category__description-child").click(function () {
		$(this).toggleClass('category__description--active');
	});
});

// document.getElementById("docBtn<?php the_field('doctors_id');?>").onclick = function () { dddd() };
// function dddd() {
// 	var docId = '<?php the_field(\'doctors_id\');?>';
// }
//==============================================================================================
//medods-widget
(function (m, w, i, d, g, e, t) {
	m['MEDODSWidgetObject'] = g, m[g] = (m[g] || function () { (m[g].q = m[g].q || []).push(Array.from(arguments)) });
	e = w.createElement(i), t = w.getElementsByTagName(i)[0];
	e.async = 1; e.src = d; t.parentNode.insertBefore(e, t);
})
	(window, document, 'script', 'https://online-mediczdrav.medods.ru/scripts/embeddable_script.js', 'mv');
mv('updateConfiguration', {
	zIndex: 2,
	drawerWidth: 500,
	origin: 'https://online-mediczdrav.medods.ru/',
	showRecordingButton: true,
	recordingButtonMessage: 'Онлайн запись',
	recordingButtonTop: 'auto',
	recordingButtonBottom: 25,
	recordingButtonLeft: 'auto',
	recordingButtonRight: 25,
	recordingButtonSize: 60,
	recordingButtonFontSize: 12,
	recordingButtonColor: '#08bfcc',
	recordingButtonTextColor: '#ffffff'
});
// mv('showOnClick', 'medods-btn-slider');
// mv('showOnClick', 'record__btn');
// mv('showOnClick', document.getElementById('medods-btn-slider'));
// mv('showOnClick', document.getElementsByClassName('record__btn'));
mv('showOnClick', ...Array.from(document.getElementsByClassName('medods-record-btn')));

// Нижеприведенный код открывает указанную страницу виджета при клике на элемент с указанным ID
// path: '/clinic/1/doctor/1' - в адресе страницы не указываем URL виджета
mv(
	'showOnClick',
	{
		target: 'docBtn' + docId,
		path: '/clinic/1/doctor/' + docId,
	}
);

// mv(
// 	'showOnClick',
// 	{
// 		target: document.getElementById('doc-btn'), 
// 		path: '/clinic/1/doctor/1',
// 	}
// );

// mv(
// 	'showOnClick',
// 	{
// 		target: document.getElementsByClassName('record__btn'),
// 		path: '/clinic/1/doctor/113'
// 	}
// );


