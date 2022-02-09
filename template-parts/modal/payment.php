<?php
/**
 * Template part for displaying payment modal
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UX_Mind_School
 */
$queried_object = get_queried_object();
//Get course template id
$template_id = $queried_object->ID;
//Get global site currency
$price_currency = 'BYN';
//Get course term id
$term_id = get_field('ums_course_parent_term', $template_id);
//Ger URL parameter
$course_post_id;
if (!isset($_GET['id'])):
	$courses_settings = array(
		'cat' => $term_id,
		'post_status' => 'publish',
		'posts_per_page' => 1,
		'orderby' => 'id',
		'order' => 'DESC'
	);
	$courses_query = new WP_Query($courses_settings);
	if ($courses_query->have_posts()): while ($courses_query->have_posts()): $courses_query->the_post();
		$course_post_id = $post->ID;
	endwhile; wp_reset_postdata(); endif;
else:
	$course_post_id = $_GET['id'];
endif;
//Event params
$ums_course_price = get_field('ums_course_info_price', $course_post_id);
//Currencies rates
$ums_rub_rate = get_currency_rate('RUB');
$ums_usd_rate = get_currency_rate('USD');
?>
<div id="payment-modal" class="modal payment-modal">
	<p class="modal__title test-course-modal__title">Оплатить участие</p>
	<div class="form payment-form">
		<div class="form__row">
			<div class="form__input payment-form__input payment-form__input_width-full">
				<input type="text" required inputmode="text" name="name">
				<span class="form__label">Имя и фамилия</span>
				<span role="alert" class="form__error-label">Поле обязательно для заполнения</span>
			</div>
		</div>
		<div class="form__row">
			<div class="form__input payment-form__input payment-form__input_width-full">
				<input type="email" required inputmode="email" name="email">
				<span class="form__label">Email</span>
				<span role="alert" class="form__error-label">Поле обязательно для заполнения</span>
			</div>
		</div>
		<input type="hidden" value="<?php echo get_the_title($course_post_id); ?>" name="title">
		<div class="form__row">
			<div class="form__input form__input_filled form__input_disabled payment-form__input payment-form__input_width-full currency-input-wrapper currency-input-wrapper_size-s">
				<input type="text" name="total" value="<?php echo $ums_course_price; ?>">
				<span class="form__label form__label_active">Сумма для оплаты</span>
				<div class="ums-currency form__ums-currency">
					<p class="ums-currency__value ums-currency__symbol">BYN</p>
					<p class="ums-currency__value ums-currency__value_color-gray icon-currency icon-dollar_color-gray">&nbsp;≈&nbsp;<?php echo get_price_in_currency($ums_course_price, 'USD', $ums_usd_rate); ?></p>
					<p class="ums-currency__value ums-currency__value_color-gray icon-currency icon-ruble_color-gray">&nbsp;≈&nbsp;<?php echo get_price_in_currency($ums_course_price, 'RUB', $ums_rub_rate); ?></p>
				</div>
			</div>
		</div>
		<input type="hidden" value="<?php echo $ums_course_price; ?>" name="total">
		<button class="btn modal__btn payment-modal__btn" type="button">Перейти к оплате</button>
	</div>
	<label class="checkbox privacy-checkbox modal__privacy-checkbox">
		<input type="checkbox" checked class="checkbox__input privacy-checkbox__input">
		<p class="checkbox__name">Я согласен с условиями обработки <button type="button" data-modal="#personal-data-modal" class="link checkbox__link">персональных данных</button></p>
	</label>
</div>