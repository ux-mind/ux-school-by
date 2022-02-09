<?php
/**
 * The template for displaying finding lecturers page
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
global $post;
$post_id = $post->ID;
?>
<div class="pages-template__grid f-lecturers-page__grid">
    <div class="row">
        <div class="col-12">
            <h1 class="title title_style-dark pages-template__title"><?php echo the_title(); ?></h1>
            <div class="row no-gutters">
                <div class="col-12 col-xl-8">
                    <div class="f-lecturers-page__content">
                        <?php echo the_content(); ?>
                    </div>
                    <div class="email-help">
                        <p class="email-help__title">Напишите на:<a href="mailto:hello@ux-school.by?subject=Работа%20преподавателем">hello@ux-school.by</a></p>
                        <ul class="list email-help__grid">
                            <li class="email-help__grid-item">Укажите в теме письма «Работа преподавателем».</li>
                            <li class="email-help__grid-item">Опишите свой опыт в дизайне.</li>
                            <li class="email-help__grid-item">Пришлите ссылку на своё портфолио</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
