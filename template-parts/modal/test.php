<?php
/**
 * Template part for displaying test modal
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UX_Mind_School
 */
?>
<div id="test-modal" class="modal test-modal">
	<p class="modal__title test-modal__title">Подойдет ли тебе работа дизайнером?</p>
	<?php echo do_shortcode('[contact-form-7 id="1655" autocomplete="off" title="Подойдет ли тебе работа дизайнером?"]'); ?>
	<label class="checkbox privacy-checkbox modal__privacy-checkbox">
		<input type="checkbox" checked class="checkbox__input privacy-checkbox__input">
		<p class="checkbox__name">Я согласен с условиями обработки <button type="button" data-modal="#personal-data-modal" class="link checkbox__link">персональных данных</button></p>
	</label>
</div>