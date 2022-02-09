<?php
/**
 * Template Name: Успешная оплата
 * The template for displaying payment page
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
?>
<!-- Begin main -->
<main class="main template success-payment-page pages-template">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs breadcrumbs_style-dark template__breadcrumbs">
					<?php bcn_display($return = false, $linked = true, $reverse = false, $force = false) ?>
				</div>
				<div class="pages-template__grid">
					<h1 class="title title_size-m template__title success-payment-page__title">Оплата прошла успешно!</h1>
					<div class="success-payment-page__content"><?php the_content(); ?></div>
				</div>
			</div>
		</div>
	</div>
	<div class="success-payment-page__info">
		<div class="figure success-payment-page__figure">
			<img src="<?php echo get_template_directory_uri(); ?>/img/ums-payment-figure.png" alt="<?php echo get_bloginfo('name'); ?>">
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-xl-8">
					<p class="success-payment-page__info-title">Что будет дальше?</p>
					<div class="success-payment-page__info-wrapper">
						<p class="success-payment-page__info-item">
							<svg width="190" height="50" viewBox="0 0 190 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="25" cy="25" r="25" fill="url(#paint001_linear)"/>
								<path d="M18.6364 23.875L24.1818 29.375L22.5455 31L17 25.5L18.6364 23.875Z" fill="white"/>
								<path d="M34 19.625L22.5455 31L20.9091 29.375L32.3636 18L34 19.625Z" fill="white"/>
								<path d="M190 24L185 21.1132V26.8868L190 24ZM60 24.5H185.5V23.5H60V24.5Z" fill="#E6E0EB"/>
								<linearGradient id="paint001_linear" x1="19.1729" y1="0" x2="19.1729" y2="63.75" gradientUnits="userSpaceOnUse">
									<stop stop-color="#33AAFF"/>
									<stop offset="1" stop-color="#8B24B7"/>
								</linearGradient>
							</svg>
							На ваш емейл прийдет письмо с подтверждением заявки, условиями договора и способами оплаты
						</p>
						<p class="success-payment-page__info-item">
							<svg width="190" height="50" viewBox="0 0 190 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="25" cy="25" r="25" fill="url(#paint002_linear)"/>
								<path d="M21.103 33.208L27.767 26.656C30.399 24.08 30.987 22.4 30.987 20.524C30.987 17.248 28.467 15.232 24.491 15.232C21.495 15.232 19.059 16.24 17.547 18.032L18.975 19.264C20.263 17.78 22.027 17.08 24.323 17.08C27.319 17.08 28.915 18.48 28.915 20.748C28.915 22.092 28.495 23.408 26.283 25.592L18.135 33.572V35H31.883V33.208H21.103Z" fill="white"/>
								<path d="M190 24L185 21.1132V26.8868L190 24ZM60 24.5H185.5V23.5H60V24.5Z" fill="#E6E0EB"/>
								<linearGradient id="paint002_linear" x1="19.1729" y1="0" x2="19.1729" y2="63.75" gradientUnits="userSpaceOnUse">
									<stop stop-color="#33AAFF"/>
									<stop offset="1" stop-color="#8B24B7"/>
								</linearGradient>
							</svg>
							После оплаты мы свяжемся с тобой и закрепляем место в группе 
						</p>
						<p class="success-payment-page__info-item">
							<svg width="190" height="50" viewBox="0 0 190 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="25" cy="25" r="25" fill="#FCF0FF"/>
								<path d="M25.2177 23.8L30.7617 16.828V15.4H18.1617V17.192H28.1857L22.7537 23.996V25.48H24.1537C27.7937 25.48 29.4457 27.02 29.4457 29.372C29.4457 31.808 27.6537 33.32 24.4057 33.32C21.8577 33.32 19.5897 32.368 18.3297 31.052L17.3497 32.648C18.8617 34.188 21.5777 35.168 24.4057 35.168C29.1377 35.168 31.5177 32.648 31.5177 29.372C31.5177 26.236 29.4177 24.024 25.2177 23.8Z" fill="#4D4357"/>
							</svg>
							За 2 дня до начала курса мы создаем студенческий Telegram-чат с информацией о встрече
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- End main -->
<?php get_footer();