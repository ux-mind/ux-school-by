<?php
/**
 * Template part for displaying short course
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UX_Mind_School
 */
?>
<?php echo get_field('ums_course_info_days', $post_id); ?> <?php echo get_field('ums_course_info_time_start', $post_id); ?>-<? echo get_field('ums_course_info_time_end', $post_id); ?>