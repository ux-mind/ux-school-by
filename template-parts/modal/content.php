<?php
/**
 * Template part for displaying content modal
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UX_Mind_School
 */
?>
<div id="content-modal" class="modal content-modal">
	<?php
	$content_page = get_post(645);
	$content_text = apply_filters('the_content', $content_page->post_content);
	echo $content_text;
	?>
</div>