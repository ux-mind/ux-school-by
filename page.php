<?php
/**
 * The template for displaying all pages
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
<main class="main template <?php if ($page_id == 60): ?>about-page <?php endif; ?><?php if ($page_id == 1653): ?>test-page <?php endif; ?><?php if ($page_id == 1641): ?>lecturers-page <?php endif; ?><?php if ($page_id == 62): ?>contact-page <?php endif; ?><?php if ($page_id == 77): ?>f-lecturers-page <?php endif; ?>pages-template">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs breadcrumbs_style-dark template__breadcrumbs">
					<?php bcn_display($return = false, $linked = true, $reverse = false, $force = false) ?>
				</div>
				<?php if ($page_id == 60): get_template_part('template-parts/page', 'about'); endif; ?>
				<?php if ($page_id == 62): get_template_part('template-parts/page', 'contacts'); endif; ?>
				<?php if ($page_id == 77): get_template_part('template-parts/page', 'finding-lecturers'); endif; ?>
				<?php if ($page_id == 75): get_template_part('template-parts/page', 'certificates'); endif; ?>
				<?php if ($page_id == 1641): get_template_part('template-parts/page', 'lecturers'); endif; ?>
				<?php if ($page_id == 1653): get_template_part('template-parts/page', 'test'); endif; ?>
			</div>
		</div>
	</div>
</main>
<!-- End main -->
<?php
get_footer();