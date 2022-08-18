<?php
/**
 * Template Name: Оплата картой
 * The template for displaying payment with card page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UX_Mind_School
 */

get_header();
$page_queried_object = get_queried_object();
$page_id = $page_queried_object->ID;
//Page params
$is_promocode = get_field('promocode_bool', 2);
?>
<!-- Begin main -->
<main class="main template payment-page pages-template">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs breadcrumbs_style-dark template__breadcrumbs">
					<?php bcn_display($return = false, $linked = true, $reverse = false, $force = false) ?>
				</div>
				<div class="pages-template__grid">
					<h1 class="title title_style-dark template__title payment-page__title">Оплатить курс картой</h1>
					<div class="row">
						<div class="col-12 col-lg-9">
							<div class="form payment-form">
								<section class="payment-form__section">
									<p class="payment-form__section-name">1. Выберите тип курса</p>
									<div class="payment-form__section-grid">
										<div class="form__input form__select payment-form__select payment-form__input">
											<?php
											$courses_array = array(
												'post_type'=>'post',
												'post_status'=>'publish',
												'cat'=>'1,15,2,4,99,121,124,127,3',
												'posts_per_page'=>-1,
												'meta_key'=>'ums_course_info_start',
												'orderby'=>'meta_value',
												'order'=>'ASC',
											);
											$courses_query = new WP_Query($courses_array); if ($courses_query->have_posts()): ?>
											<div data-type="payment" class="ums-select">
												<button data-price="0" data-sale-price="0" type="button"
													class="ums-select__btn">Нажмите, чтобы выбрать курс</button>
												<ul class="ums-select__list">
													<li data-payment-level="2" data-price="0" data-sale-price="0"
														class="ums-select__list-item">Оплата следующего этапа
														действующего курса</li>
													<?php
														$counter = 0;
														while ( $courses_query->have_posts() ): $courses_query->the_post();
															$course_full_price = get_field('ums_course_info_price');
															$course_date = get_field('ums_course_info_start');
															$course_data_object = DateTime::createFromFormat('d/m/Y', $course_date);
															$course_date_string = $course_data_object->getTimestamp();
															$course_sale_price = get_field('ums_course_info_price_sale');
															$course_type = get_field( 'ums_course_info_type' );
															$is_partial_payment = get_field( 'is_partial_payment' );
													?>
													<li data-course-name="<?php echo esc_attr( the_title() . ', ' . date_i18n('j F', $course_date_string) . ', ' . mb_strtolower( $course_type ) ); ?>"
														data-price="<?php echo $course_full_price; ?>"
														data-partial-payment="<?php if ( $is_partial_payment ): ?>yes<?php else: ?>no<?php endif; ?>"
														data-sale-price="<?php if($course_sale_price): echo $course_sale_price; else: echo $course_full_price; endif; ?>"
														class="ums-select__list-item">
														<?php echo date_i18n('j F', $course_date_string); ?> –
														<?php esc_html( the_title() ); ?><span>
															(<?php echo mb_strtolower( $course_type ); ?>)</span></li>
													<?php endwhile; ?>
												</ul>
											</div>
											<?php endif; ?>
										</div>
									</div>
								</section>
								<section class="payment-form__section">
									<p class="payment-form__section-name">2. Выберите способ оплаты</p>
									<div data-target="card" class="payment-form__section-grid payment-form__section-options payment-methods"></div>
								</section>
								<div id="payment-anchor"></div>
								<section class="payment-form__section payment-section">
									<div class="form erip-payment webpay-form payment-form__section-item">
										<p class="payment-form__section-name">3. Введите ваши данные</p>
										<div class="payment-form__section-grid grid-second">
											<div class="webpay-form__item">
											<div class="erip-payment__price">Сумма для оплаты<br>
												<span class="erip-payment__price-value erip-payment__price-value_with-card">0 BYN</span>
														<div class="d-none erip-payment__price-input">
															<input type="text" value="0" name="manual-price"> BYN
														</div>
													</div>
													<input type="text" value="0" name="total" hidden>
												<div class="erip-payment__grid">
													<div class="promocode b-promocode erip-payment__promocode">
														<label class="toggle-checkbox b-promocode__toggle-button">
															<input type="checkbox" name="promocode-toggle"
																class="toggle-checkbox__input">
															<div class="toggle-checkbox__element"></div>
															<p class="toggle-checkbox__name">У меня есть промокод</p>
														</label>
														<div
															class="form__input promocode-input payment-form__input b-promocode__input">
															<input data-payment="erip" type="text"
																class="b-promocode__input-field" inputmode="text"
																name="promocode">
															<span class="form__label">Промокод</span>
															<span role="alert" class="form__error-label">Промокод не
																найден</span>
															<button type="button"
																class="btn promocode-input__btn b-promocode__button">Применить</button>
														</div>
													</div>
													<div
														class="payment-options payment-options_d-vertical erip-payment__options">
														<label class="checkbox payment-options__item">
															<input type="checkbox" name="installment-school"
																class="checkbox__input">
															<p class="checkbox__name">Рассрочка на 3 месяца от UX Mind
																School</p>
														</label>
														<label class="checkbox payment-options__item">
															<input type="checkbox" name="sale-school"
																class="checkbox__input">
															<p class="checkbox__name">Скидка 10% выпускникам UX Mind
																School</p>
														</label>
													</div>
												</div>
												<p class="payment-message erip-payment__message"><span
														class="erip-payment__message-note">*Скидки по акциям и
														промокодам не суммируются.</span>После внесения платежа,
													отправьте копию квитанции на <a
														href="mailto:hello@ux-school.by">hello@ux-school.by</a></p>
											</div>
											<div class="webpay-form__item">
												<div class="form__input payment-form__input">
													<input type="text" inputmode="text" required name="name">
													<span class="form__label">Имя и фамилия ученика</span>
													<span role="alert" class="form__error-label">Поле обязательно для
														заполнения</span>
												</div>
											</div>
											<div>
											<button type="button" data-payment-method="alfa" class="btn webpay-form__btn webpay-form__btn-ajax">Перейти к оплате</button>
											</div>
											<label class="checkbox privacy-checkbox">
												<input type="checkbox" checked=""
													class="checkbox__input privacy-checkbox__input">
												<p class="checkbox__name">Я согласен с условиями обработки
													<button type="button" data-modal="#personal-data-modal"
														class="link checkbox__link">персональных данных</button>
												</p>
											</label>
										</div>
									</div>
							</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</main>
<!-- End main -->
<!-- Begin templates -->
<template id="payment-method">
	<label class="payment-item payment-form__method">
		<input type="radio" name="payment" class="payment-item__input" />
		<p class="payment-item__name"></p>
	</label>
</template>
<!-- End template -->
<?php get_footer();