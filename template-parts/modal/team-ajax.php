<?php
/**
 * Template part for displaying team modal
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UX_Mind_School
 */
$post = get_post($post_id);
$lecturer_img = get_field('ums_lecturer_img', $post_id);
?>
<div class="lecturer-modal__grid">
	<div class="lecturer-modal__img">
		<img src="<?php echo $lecturer_img; ?>" alt="<?php echo $post->post_title; ?>">
		<div style="flex-wrap: wrap;" class="modal__social lecturer-modal__social">
			<style>
				.lecturer-modal__social-note {
					font-size: 14px;
					width: 100%;
					margin: 0;
					margin-bottom: 10px;
					font-weight: 500;
					text-align: center;
					color: #665d5d;
				}
				@media screen and (max-width: 991px) {
					.lecturer-modal__social-note {
						text-align: left;
					}
				}
				@media screen and (min-width: 992px) {
					.lecturer-modal__img img {
						margin: 0 auto;
					}
				}
			</style>
			<p class="lecturer-modal__social-note">Мое портфолио</p>
			<?php if (get_field('ums_lecturer_instagram_link', $post_id)): ?>
			<a href="<?php echo esc_url(get_field('ums_lecturer_instagram_link', $post_id)); ?>" target="_blank" rel="noopener noreferrer" class="modal__social-link">
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="20" cy="20" r="20" fill="#F5F2F7" />
					<path
						d="M19.9972 16.4985C18.0692 16.4985 16.4958 18.0719 16.4958 20C16.4958 21.9281 18.0692 23.5015 19.9972 23.5015C21.9252 23.5015 23.4986 21.9281 23.4986 20C23.4986 18.0719 21.9252 16.4985 19.9972 16.4985ZM30.4988 20C30.4988 18.55 30.512 17.1132 30.4305 15.6658C30.3491 13.9847 29.9656 12.4927 28.7363 11.2633C27.5044 10.0314 26.015 9.65051 24.3339 9.56908C22.8839 9.48765 21.4471 9.50078 19.9998 9.50078C18.5499 9.50078 17.113 9.48765 15.6657 9.56908C13.9846 9.65051 12.4926 10.034 11.2633 11.2633C10.0314 12.4953 9.6505 13.9847 9.56908 15.6658C9.48765 17.1158 9.50078 18.5526 9.50078 20C9.50078 21.4474 9.48765 22.8868 9.56908 24.3342C9.6505 26.0153 10.034 27.5073 11.2633 28.7367C12.4952 29.9686 13.9846 30.3495 15.6657 30.4309C17.1157 30.5124 18.5525 30.4992 19.9998 30.4992C21.4498 30.4992 22.8866 30.5124 24.3339 30.4309C26.015 30.3495 27.507 29.966 28.7363 28.7367C29.9682 27.5047 30.3491 26.0153 30.4305 24.3342C30.5146 22.8868 30.4988 21.45 30.4988 20ZM19.9972 25.3875C17.0158 25.3875 14.6098 22.9814 14.6098 20C14.6098 17.0186 17.0158 14.6125 19.9972 14.6125C22.9785 14.6125 25.3846 17.0186 25.3846 20C25.3846 22.9814 22.9785 25.3875 19.9972 25.3875ZM25.6052 15.6501C24.9092 15.6501 24.347 15.0879 24.347 14.3918C24.347 13.6957 24.9092 13.1336 25.6052 13.1336C26.3013 13.1336 26.8634 13.6957 26.8634 14.3918C26.8636 14.5571 26.8312 14.7208 26.7681 14.8736C26.7049 15.0263 26.6123 15.1651 26.4954 15.282C26.3785 15.3989 26.2397 15.4915 26.087 15.5547C25.9342 15.6179 25.7705 15.6503 25.6052 15.6501Z"
						fill="#CCC6D1" />
				</svg>
			</a>
			<?php endif; if (get_field('ums_lecturer_dribbble_link', $post_id)): ?>
			<a href="<?php echo esc_url(get_field('ums_lecturer_dribbble_link', $post_id)); ?>" target="_blank"
				rel="noopener noreferrer" class="modal__social-link">
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="20" cy="20" r="20" fill="#F5F2F7" />
					<path
						d="M20 30.5C18.0996 30.5 16.3428 30.0317 14.7295 29.0952C13.1162 28.1587 11.8413 26.8838 10.9048 25.2705C9.96826 23.6572 9.5 21.9004 9.5 20C9.5 18.0996 9.96826 16.3428 10.9048 14.7295C11.8413 13.1162 13.1162 11.8413 14.7295 10.9048C16.3428 9.96826 18.0996 9.5 20 9.5C21.9004 9.5 23.6572 9.96826 25.2705 10.9048C26.8838 11.8413 28.1587 13.1162 29.0952 14.7295C30.0317 16.3428 30.5 18.0996 30.5 20C30.5 21.9004 30.0317 23.6572 29.0952 25.2705C28.1587 26.8838 26.8838 28.1587 25.2705 29.0952C23.6572 30.0317 21.9004 30.5 20 30.5ZM27.2393 23.0762C26.3232 22.7891 25.4346 22.6455 24.5732 22.6455C24.4365 22.6455 24.1836 22.6729 23.8145 22.7275C24.0742 23.999 24.2109 25.2979 24.2246 26.624C25.5918 25.749 26.5967 24.5664 27.2393 23.0762ZM21.8867 27.6289C21.9141 26.2344 21.791 24.8262 21.5176 23.4043C21.1074 23.6094 20.7314 23.835 20.3896 24.0811C18.9131 25.1201 17.9424 26.2412 17.4775 27.4443C18.2979 27.7314 19.1387 27.875 20 27.875C20.6152 27.875 21.2441 27.793 21.8867 27.6289ZM12.166 19.3027C12.1387 19.5625 12.125 19.7949 12.125 20C12.125 21.2715 12.4087 22.4575 12.9761 23.5581C13.5435 24.6587 14.3193 25.5713 15.3037 26.2959C16.001 24.5049 17.1152 23.0693 18.6465 21.9893C19.3711 21.4834 20.0957 21.0732 20.8203 20.7588C20.6016 20.1436 20.3828 19.583 20.1641 19.0771C18.8516 19.7061 17.4844 20.0137 16.0625 20C14.7637 19.9863 13.4648 19.7539 12.166 19.3027ZM15.7754 13.376C14.4629 14.21 13.4854 15.3311 12.8428 16.7393C13.9365 17.1631 15.0098 17.375 16.0625 17.375C17.0332 17.375 17.9766 17.1562 18.8926 16.7188C17.9766 15.2832 16.9375 14.1689 15.7754 13.376ZM20 12.125C19.3848 12.125 18.7422 12.2139 18.0723 12.3916C19.084 13.1846 20.0137 14.21 20.8613 15.4678C21.9277 14.6338 22.666 13.7314 23.0762 12.7607C22.0918 12.3369 21.0664 12.125 20 12.125ZM25.168 14.0732C24.5117 15.5908 23.5273 16.8486 22.2148 17.8467C22.543 18.5576 22.8438 19.3096 23.1172 20.1025C23.623 20.0342 24.1084 20 24.5732 20C25.626 20.0137 26.7129 20.1777 27.834 20.4922C27.8613 20.1777 27.875 20.0137 27.875 20C27.875 18.8379 27.6357 17.7441 27.1572 16.7188C26.6787 15.6934 26.0156 14.8115 25.168 14.0732Z"
						fill="#CCC6D1" />
				</svg>
			</a>
			<?php endif;  if (get_field('ums_lecturer_behance_link', $post_id)): ?>
			<a href="<?php echo esc_url(get_field('ums_lecturer_behance_link', $post_id)); ?>" target="_blank"
				rel="noopener noreferrer" class="modal__social-link">
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="20" cy="20" r="20" fill="#F5F2F7" />
					<path
						d="M14.9401 12.5C15.6438 12.5 16.28 12.5585 16.8629 12.6875C17.4376 12.8166 17.9335 13.0161 18.3476 13.2974C18.7579 13.5788 19.0783 13.9464 19.3086 14.419C19.5314 14.8878 19.6484 15.47 19.6484 16.1497C19.6484 16.8878 19.4766 17.5098 19.1405 18.0094C18.8007 18.5098 18.3041 18.9081 17.6364 19.2284C18.5426 19.4902 19.2148 19.9471 19.6604 20.5998C20.1098 21.2599 20.3244 22.0491 20.3244 22.9599C20.3244 23.7101 20.1953 24.3507 19.914 24.8901C19.6439 25.4291 19.2453 25.8933 18.7534 26.2419C18.2726 26.59 17.7024 26.8398 17.085 27.0079C16.462 27.1761 15.8195 27.2616 15.1742 27.2622H8V12.5083H14.9394L14.9401 12.5ZM24.9471 24.6635C25.3845 25.0934 26.0177 25.308 26.8422 25.308C27.4318 25.308 27.9405 25.1594 28.3696 24.8586C28.7957 24.5698 29.0493 24.2487 29.1513 23.9209H31.738C31.3359 25.1984 30.6907 26.1204 29.8392 26.6718C28.9877 27.2307 27.9562 27.5 26.7604 27.5C25.9202 27.5 25.1737 27.371 24.4865 27.1017C23.8394 26.8466 23.2535 26.4577 22.767 25.9606C22.3019 25.4722 21.9426 24.8818 21.6882 24.1909C21.4339 23.5 21.3131 22.7416 21.3131 21.9209C21.3131 21.1159 21.4497 20.3815 21.7198 19.6898C21.971 19.0256 22.3508 18.4176 22.8376 17.9006C23.3334 17.389 23.9006 17.0056 24.5765 16.7048C25.2487 16.404 25.9757 16.2712 26.7956 16.2712C27.7064 16.2712 28.4874 16.4355 29.1753 16.7948C29.829 17.1276 30.3973 17.6063 30.8362 18.1939C31.2781 18.7798 31.5865 19.4557 31.7778 20.2179C31.9691 20.9681 32.0276 21.7573 31.9886 22.5975H24.2952C24.2952 23.4377 24.5765 24.2307 25.0064 24.6605L24.9246 24.692L24.9471 24.6635ZM14.7016 24.7138C15.0182 24.7138 15.3228 24.6823 15.6078 24.62C15.8781 24.567 16.1364 24.465 16.37 24.3192C16.5808 24.1864 16.7609 23.9906 16.8937 23.7371C17.0227 23.4985 17.0812 23.1669 17.0812 22.7761C17.0812 22.0259 16.8622 21.4865 16.4406 21.1587C16.0107 20.8383 15.4518 20.6778 14.7526 20.6778H11.2401V24.7296H14.7023V24.698L14.7016 24.7138ZM28.3148 19.0641C27.9592 18.677 27.3733 18.47 26.6539 18.47C26.1887 18.47 25.8024 18.5443 25.4895 18.7086C25.2021 18.8489 24.9487 19.0501 24.7468 19.2982C24.567 19.5192 24.434 19.7744 24.356 20.0484C24.2863 20.28 24.2417 20.5184 24.2232 20.7596H28.9862C28.9157 20.0094 28.6539 19.4587 28.3066 19.0679V19.0799L28.3148 19.0641ZM14.5223 18.4467C15.0969 18.4467 15.5733 18.314 15.9484 18.0364C16.3235 17.7671 16.5036 17.3132 16.5036 16.6965C16.5036 16.353 16.4331 16.0716 16.3235 15.8526C16.2019 15.6431 16.0299 15.4672 15.8231 15.341C15.5998 15.2116 15.3547 15.1242 15.0999 15.0829C14.823 15.0305 14.5416 15.0056 14.2597 15.0086H11.2319V18.4467H14.5223ZM23.6223 13.4887H29.5924V14.9419H23.6223V13.4767V13.4887Z"
						fill="#CCC6D1" />
				</svg>
			</a>
			<?php endif;  if (get_field('ums_lecturer_youtube_link', $post_id)): ?>
			<a href="<?php echo esc_url(get_field('ums_lecturer_youtube_link', $post_id)); ?>" target="_blank"
				rel="noopener noreferrer" class="modal__social-link"></a>
			<?php endif; if (get_field('ums_lecturer_custom_link', $post_id)): ?>
			<a href="<?php echo esc_url(get_field('ums_lecturer_custom_link', $post_id)); ?>" target="_blank"
				rel="noopener noreferrer" class="modal__social-link">
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="20" cy="20" r="20" fill="#F5F2F7" />
					<path
						d="M19.1163 12.0452L20.0001 11.1614C21.1732 9.99118 22.7625 9.33398 24.4195 9.33398C26.0764 9.33398 27.6658 9.99118 28.8388 11.1614C30.0085 12.3348 30.6652 13.924 30.6652 15.5808C30.6652 17.2376 30.0085 18.8268 28.8388 20.0002L26.1863 22.6514C25.0076 23.8314 23.4376 24.4827 21.7676 24.4827C20.0976 24.4827 18.5276 23.8314 17.3488 22.6514L16.4651 21.7677L18.2326 20.0002L19.1163 20.8839C20.5326 22.3002 23.0026 22.3002 24.4188 20.8839L27.0713 18.2327C27.7732 17.5286 28.1673 16.575 28.1673 15.5808C28.1673 14.5866 27.7732 13.633 27.0713 12.9289C26.3669 12.2277 25.4134 11.834 24.4195 11.834C23.4255 11.834 22.472 12.2277 21.7676 12.9289L20.8838 13.8127L19.1163 12.0452Z"
						fill="#CCC6D1" />
					<path
						d="M21.7676 20.0002L20.8839 19.1164C19.4676 17.7002 16.9976 17.7002 15.5814 19.1164L12.9289 21.7677C12.227 22.4718 11.8329 23.4254 11.8329 24.4196C11.8329 25.4137 12.227 26.3673 12.9289 27.0714C13.6333 27.7727 14.5868 28.1664 15.5807 28.1664C16.5747 28.1664 17.5282 27.7727 18.2326 27.0714L19.1164 26.1877L20.8839 27.9552L20.0001 28.8389C19.4202 29.4198 18.7311 29.8803 17.9726 30.1939C17.214 30.5076 16.4009 30.6681 15.5801 30.6664C14.7595 30.6679 13.9467 30.5072 13.1884 30.1936C12.4301 29.88 11.7412 29.4196 11.1614 28.8389C9.99174 27.6655 9.33496 26.0763 9.33496 24.4196C9.33496 22.7628 9.99174 21.1736 11.1614 20.0002L13.8139 17.3489C14.9926 16.1689 16.5626 15.5177 18.2326 15.5177C19.9026 15.5177 21.4726 16.1689 22.6514 17.3489L23.5351 18.2327L21.7676 20.0002Z"
						fill="#CCC6D1" />
				</svg>
			</a>
			<?php endif; ?>
		</div>
	</div>
	<div class="lecturer-modal__info">
		<p class="modal__title lecturer-modal__title"><?php echo $post->post_title; ?></p>
		<div class="lecturer-modal__text"><?php echo apply_filters('the_content', $post->post_content); ?></div>
	</div>
</div>