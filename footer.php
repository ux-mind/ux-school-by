<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UX_Mind_School
 */
// BEGIN OPTIONS
$telephone_number = get_field( 'telephone_number', 'option' );
$logo_light = get_field( 'logo_light', 'option' );
// END OPTIONS
$google_link = 'https://www.google.com/maps/place/UX+Mind+School/@53.9165638,27.584838,17z/data=!4m7!3m6!1s0x46dbcfc1ae2d4963:0x3fdc01c741408b64!8m2!3d53.9165638!4d27.5870267!9m1!1b1';
$doc_link = 'https://ux-school.by/wp-content/uploads/2021/05/public_offer.pdf';
$doc_link_entity = 'https://ux-school.by/wp-content/uploads/2022/05/dogovor_publichnoj_oferty_dlya_yuridicheskih_licz.pdf';
$developer_link = 'http://ux-mind.pro';
$instagram_link = 'https://www.instagram.com/ux_mind_school/';
?>
<!-- Begin footer -->
<footer class="footer">
	<div class="footer__top">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-3 col-xl-4">
					<?php if (!is_page_template('home.php')): ?>
					<a class="footer__logo" href="<?php echo esc_url(get_home_url()); ?>"><img src="<?php echo esc_url( $logo_light['url'] ); ?>" alt="<?php echo esc_attr( $logo_light['alt'] ); ?>"></a>
					<?php else: ?>
					<img class="footer__logo" src="<?php echo esc_url( $logo_light['url'] ); ?>" alt="<?php echo esc_attr( $logo_light['alt'] ); ?>">
					<?php endif; ?>
					<!-- <div class="d-none d-lg-block footer__course-type">
						<div class="footer__course-select-wrapper">
							<select name="course-type" class="footer__course-select">
								<option value="remote" selected>Дистанционные курсы</option>
								<option value="class">Занятия в классе</option>
								<option value="online">Онлайн курсы</option>
							</select>
						</div>
					</div> -->
					<div class="d-none d-lg-block footer__company">
						<p class="footer__text company-info">ИП Колесень И.Г., <br>УНП 190602238. Выдано 15.10.2020 <br>Мингорисполкомом.</p>
						<p class="footer__text company-info"><span>Режим работы:</span><br>Пн-Сб с 10:00 до 20.00</p>
					</div>
					<div class="d-lg-none social footer__social">
						<?php if (get_field('ums_vk_link', 2)): ?>
							<a href="<?php echo esc_url(get_field('ums_vk_link', 2)); ?>" rel="noopener noreferrer" target="_blank" data-icon="vk" class="social__link"></a>
						<?php endif; ?>
						<?php if (get_field('ums_behance_link', 2)): ?>
							<a href="<?php echo esc_url(get_field('ums_behance_link', 2)); ?>" rel="noopener noreferrer" target="_blank" data-icon="behance" class="social__link"></a>
						<?php endif; ?>
						<?php if (get_field('ums_dribbble_link', 2)): ?>
							<a href="<?php echo esc_url(get_field('ums_dribbble_link', 2)); ?>" rel="noopener noreferrer" target="_blank" data-icon="dribbble" class="social__link"></a>
						<?php endif; ?>
						<?php if (get_field('ums_youtube_link', 2)): ?>
							<a href="<?php echo esc_url(get_field('ums_youtube_link', 2)); ?>" rel="noopener noreferrer" target="_blank" data-icon="youtube" class="social__link"></a>
						<?php endif; ?>
						<?php if (get_field('ums_instagram_link', 2)): ?>
							<a href="<?php echo esc_url(get_field('ums_instagram_link', 2)); ?>" rel="noopener noreferrer" target="_blank" data-icon="instagram" class="social__link"></a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-12 col-lg-6 col-xl-5">
					<nav class="footer-menu">
						<ul class="list footer-menu__col">
							<p class="d-none d-lg-block footer-menu__col-title">Школа</p>
							<?php
							$footer_first_menu_arg = array(
								'theme_location'=>'Footer first',
								'menu'=>'Footer first',
								'container'=>'',
								'items_wrap'=>'%3$s'
							);
							wp_nav_menu( $footer_first_menu_arg );
							?>
						</ul>
						<ul class="list footer-menu__col">
							<p class="d-none d-lg-block footer-menu__col-title">Направления</p>
							<?php
							$footer_second_menu_arg = array(
								'theme_location'=>'Footer second',
								'menu'=>'Footer second',
								'container'=>'',
								'items_wrap'=>'%3$s'
							);
							wp_nav_menu( $footer_second_menu_arg );
							?>
						</ul>
					</nav>
				</div>
				<div class="col-12 col-lg-3 col-xl-3">
					<div class="d-none d-lg-flex social footer__social">
						<p class="d-none d-lg-block footer__testimonials-title">Наши социальные сети</p>
						<?php if ( get_field( 'ums_vk_link', HOME_PAGE_ID ) ): ?>
							<a href="<?php echo esc_url( get_field( 'ums_vk_link', HOME_PAGE_ID ) ); ?>" rel="noopener noreferrer" target="_blank" data-icon="vk" class="social__link"></a>
						<?php endif; ?>
						<?php if ( get_field( 'ums_behance_link', HOME_PAGE_ID ) ): ?>
							<a href="<?php echo esc_url( get_field( 'ums_behance_link', HOME_PAGE_ID ) ); ?>" rel="noopener noreferrer" target="_blank" data-icon="behance" class="social__link"></a>
						<?php endif; ?>
						<?php if ( get_field( 'ums_dribbble_link', HOME_PAGE_ID ) ): ?>
							<a href="<?php echo esc_url( get_field( 'ums_dribbble_link', HOME_PAGE_ID ) ); ?>" rel="noopener noreferrer" target="_blank" data-icon="dribbble" class="social__link"></a>
						<?php endif; ?>
						<?php if ( get_field( 'ums_youtube_link', HOME_PAGE_ID ) ): ?>
							<a href="<?php echo esc_url( get_field( 'ums_youtube_link', HOME_PAGE_ID ) ); ?>" rel="noopener noreferrer" target="_blank" data-icon="youtube" class="social__link"></a>
						<?php endif; ?>
						<?php if ( get_field( 'ums_instagram_link', HOME_PAGE_ID ) ): ?>
							<a href="<?php echo esc_url( get_field( 'ums_instagram_link', HOME_PAGE_ID ) ); ?>" rel="noopener noreferrer" target="_blank" data-icon="instagram" class="social__link"></a>
						<?php endif; ?>
					</div>
					<div class="footer__testimonials-wrapper">
						<p class="d-none d-lg-block footer__testimonials-title">Отзывы</p>
						<a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( $google_link ); ?>" class="google-testimonials footer__testimonials">
							<header class="google-testimonials__header">
								<p class="google-testimonials__rate">5.0</p>
								<div class="google-testimonials__stars"></div>
							</header>
							<p class="google-testimonials__text">Рейтинг школы на основе отзывов в Google</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer__bottom">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-9">
					<div class="footer__info">
						<p class="footer__info-text">Торговый реестр: 147946 2018-05-28</p>
						<p class="footer__info-text">Предоставляемая Вами персональная информация (например: имя, адрес, телефон, e-mail, номер банковской карты и прочее) является конфиденциальной и не подлежит разглашению. Данные карточки передаются только в зашифрованном виде и не сохраняются на данном интернет-ресурсе</p>
						<div class="footer__info-links">
							<button type="button" data-modal="#content-modal" class="link footer__info-link">Как оплатить</button>
							<a href="<?php echo esc_url($doc_link); ?>" target="_blank" rel="noopener noreferrer" class="link footer__info-link">Договор оферты (физ. лица)</a>
							<a href="<?php echo esc_url($doc_link_entity); ?>" target="_blank" rel="noopener noreferrer" class="link footer__info-link">Договор оферты (юр. лица)</a>
						</div>
					</div>
				</div>
				<div class="d-none d-lg-block col-12 col-lg-4 col-xl-3">
					<button type="button" data-modal="#personal-data-modal" class="link footer__link">Политика конфиденциальности</button>
					<a href="<?php echo esc_url($developer_link); ?>" target="_blank" class="link footer__link">Разработка UX MIND</a>
				</div>
			</div>
			<div class="row">
				<div class="col-12 footer__bottom-imges">
					<img src="<?php echo get_template_directory_uri(); ?>/img/ums-payment-icons-top.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/ums-payment-icons-bottom.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
				</div>
			</div>
			<div class="d-lg-none footer__company">
				<p class="footer__text company-info">ИП&nbsp;Колесень&nbsp;И.Г., УНП 190602238. Свидетельство о&nbsp;госрегистрации выдано Мингорисполкомом</p>
			</div>
			<div class="d-lg-none col-12 col-lg-4 col-xl-3">
				<button type="button" data-modal="#personal-data-modal" class="link footer__link">Политика конфиденциальности</button>
				<a href="<?php echo esc_url($developer_link); ?>" target="_blank" class="link footer__link">Разработка UX MIND</a>
			</div>
		</div>
	</div>
</footer>
<!-- End footer -->
<!-- Begin mobile menu -->
<div class="m-menu">
	<noindex>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="m-menu__wrapper">
						<header class="m-menu__header">
							<div class="row align-items-center">
								<div class="col-8">
									<a href="<?php echo esc_url( get_home_url() ); ?>" class="m-menu__logo"><img src="<?php echo $logo_light['url']; ?>" alt="<?php echo esc_attr( $logo_light['alt'] ); ?>"></a>
								</div>
								<div class="col-4">
									<div class="m-menu__options">
										<button class="m-menu__options-btn m-menu__options-close-btn"></button>
									</div>
								</div>
							</div>
						</header>
						<!-- Begin all-courses -->
						<div class="all-courses d-none">
							<div class="all-courses__wrapper">
								<div class="container">
									<div class="all-courses__row">
										<p class="all-courses__note">Показаны <span class="d-none d-sm-inline">только</span> <span class="all-courses__bold">дистанционные</span> курсы</p>
										<button class="all-courses__btn">Смотреть все</button>
									</div>
								</div>
							</div> 
						</div>
						<!-- End all-courses -->
						<div class="m-menu__grid">
							<nav class="menu header__menu">
								<ul class="list menu__wrapper">
									<?php
									if (is_home() || is_front_page() || is_page(12) || is_page_template(array('course.php', 'event.php'))):
										$primary_menu_arg = array(
											'theme_location'=>'Primary',
											'menu'=>'Header',
											'container'=>'',
											'items_wrap'=>'%3$s'
										);
									else:
										$primary_menu_arg = array(
											'theme_location'=>'Secondary',
											'menu'=>'Header',
											'container'=>'',
											'items_wrap'=>'%3$s'
										);
									endif;
									wp_nav_menu($primary_menu_arg);
									?>
								</ul>
							</nav>
						</div>
						<footer class="m-menu__footer">
							<a href="tel:+375<?php echo preg_replace('/[^0-9]/', '', $telephone_number); ?>" class="header__phone-number">
								+375 <?php echo $telephone_number; ?>
								<span>Viber&nbsp;&nbsp;Telegram&nbsp;&nbsp;WhatsApp</span>
							</a>
							<div class="social m-menu__social">
							<?php if (get_field('ums_vk_link', HOME_PAGE_ID)): ?>
							<a href="<?php echo esc_url(get_field('ums_vk_link', HOME_PAGE_ID)); ?>" rel="noopener noreferrer" target="_blank" data-icon="vk" class="social__link social__link_style-background"></a>
							<?php endif; ?>
							<?php if (get_field('ums_behance_link', HOME_PAGE_ID)): ?>
								<a href="<?php echo esc_url(get_field('ums_behance_link', HOME_PAGE_ID)); ?>" rel="noopener noreferrer" target="_blank" data-icon="behance" class="social__link social__link_style-background"></a>
							<?php endif; ?>
							<?php if (get_field('ums_dribbble_link', HOME_PAGE_ID)): ?>
								<a href="<?php echo esc_url(get_field('ums_dribbble_link', HOME_PAGE_ID)); ?>" rel="noopener noreferrer" target="_blank" data-icon="dribbble" class="social__link social__link_style-background"></a>
							<?php endif; ?>
							<?php if (get_field('ums_youtube_link', HOME_PAGE_ID)): ?>
								<a href="<?php echo esc_url(get_field('ums_youtube_link', HOME_PAGE_ID)); ?>" rel="noopener noreferrer" target="_blank" data-icon="youtube" class="social__link social__link_style-background"></a>
							<?php endif; ?>
							<?php if (get_field('ums_instagram_link', HOME_PAGE_ID)): ?>
								<a href="<?php echo esc_url(get_field('ums_instagram_link', HOME_PAGE_ID)); ?>" rel="noopener noreferrer" target="_blank" data-icon="instagram" class="social__link social__link_style-background"></a>
							<?php endif; ?>
							</div>
							<a href="<?php echo esc_url($instagram_link); ?>" target="_blank" rel="noopener noreferrer" class="instagram-badge m-menu__instagram-badge">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icons/instagram-badge-icon.svg" class="instagram-badge__icon" alt="<?php echo get_bloginfo('name'); ?>">
								<p class="instagram-badge__title">Наш Instagram<span>Оу май! Он такой горячий...</span></p>
								<svg class="instagram-badge__arrow" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M12.2657 9.17419L11.2051 10.2349L16.6747 15.7045L11.2051 21.1742L12.2657 22.2349L18.7961 15.7045L12.2657 9.17419Z" fill="#CCC6D1" />
								</svg>
							</a>
						</footer>
					</div>
				</div>
			</div>
		</div>
	</noindex>
</div>
<!-- End mobile menu -->
<!-- Begin modal -->
<?php
//All templates
// get_template_part('template-parts/modal/image');
get_template_part('template-parts/modal/content');
get_template_part('template-parts/modal/success', 'first');
get_template_part('template-parts/modal/success', 'second');
get_template_part('template-parts/modal/success', 'installment-payment');
get_template_part('template-parts/modal/personal-data');
if (get_field('popup_bool', HOME_PAGE_ID)):
	get_template_part('template-parts/modal/event');
endif;
//Course template
if (is_page_template(array('course.php', 'event.php'))):
	get_template_part('template-parts/modal/lecturer-post');
endif;
if ( is_page_template( 'course.php' ) ):
	get_template_part('template-parts/modal/order', '', ['post_object' => get_queried_object()]);
endif;
if ( is_page_template( 'event.php' ) ):
	get_template_part('template-parts/modal/order-event', '', ['post_object' => get_queried_object()]);
endif;
if (is_page_template(array('home.php', 'courses.php'))):
	echo '<div class="modal lecturer-modal dropdown-lecturer-modal"></div>';
endif;
if (is_page_template(array('home.php', 'courses.php', 'course.php', 'event.php'))):
	get_template_part('template-parts/modal/route');
	get_template_part('template-parts/modal/video');
endif;
if (is_page(1641)):
	echo '<div class="modal lecturer-modal ajax-lecturer-modal"></div>';
endif;
if (is_page(62)):
	get_template_part('template-parts/modal/contact');
endif;
if (is_page_template('home.php')):
	get_template_part('template-parts/modal/free-start');
	get_template_part('template-parts/modal/success', 'free-start');
endif;
if (is_page(60)):
	get_template_part('template-parts/modal/video');
endif;
if (is_category() || is_single()):
	get_template_part('template-parts/modal/success', 'third');
endif;
if (is_page_template('payment.php')) {
	get_template_part('template-parts/modal/installment', 'conditions');
}
?>
<!-- End modal -->
<?php wp_footer(); ?>
</body>

</html>