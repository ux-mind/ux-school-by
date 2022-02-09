<?php
/**
 * The template for displaying test page
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
$queried_object = get_queried_object();
$page_id = $queried_object->ID;
?>
<div class="pages-template__grid test-page__grid">
    <div class="row">
        <div class="col-12 col-lg-8">
            <h1 class="title title_style-dark pages-template__title"><?php echo the_title(); ?></h1>
            <img class="test-page__img" src="<?php echo get_template_directory_uri(); ?>/img/ums-test-img.jpg" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <div class="test-page__form test-form">
                <div class="test-form__section">
                    <p class="test-form__section-title">1. Замечаешь ли ты недочеты, когда просматриваешь сайты или
                        используешь мобильные приложения? Например, что-то работает непонятно и тебе кажется, что можно
                        было бы сделать удобнее.</p>
                    <div class="test-form__section-grid">
                        <label class="radio test-form__section-radio">
                            <input type="radio" checked class="radio__input" name="first" value="Да, замечаю">
                            <p class="radio__name">Да, замечаю</p>
                        </label>
                        <label class="radio test-form__section-radio">
                            <input type="radio" class="radio__input" name="first" value="Честно говоря, нет">
                            <p class="radio__name">Честно говоря, нет</p>
                        </label>
                    </div>
                </div>
                <div class="test-form__section">
                    <p class="test-form__section-title">2. Говорят ли тебе, что у тебя хороший вкус?</p>
                    <div class="test-form__section-grid">
                        <label class="radio test-form__section-radio">
                            <input type="radio" checked class="radio__input" name="second" value="Да">
                            <p class="radio__name">Да</p>
                        </label>
                        <label class="radio test-form__section-radio">
                            <input type="radio" class="radio__input" name="second" value="Не припомню">
                            <p class="radio__name">Не припомню</p>
                        </label>
                    </div>
                </div>
                <div class="test-form__section">
                    <p class="test-form__section-title">3. Получается ли у тебя подбирать удачные сочетания цветов?
                        Например, в одежде.</p>
                    <div class="test-form__section-grid">
                        <label class="radio test-form__section-radio">
                            <input type="radio" checked class="radio__input" name="third" value="Да, без проблем">
                            <p class="radio__name">Да, без проблем</p>
                        </label>
                        <label class="radio test-form__section-radio">
                            <input type="radio" class="radio__input" name="third" value="Нет, у меня с этим беда">
                            <p class="radio__name">Нет, у меня с этим беда</p>
                        </label>
                    </div>
                </div>
                <div class="test-form__section">
                    <p class="test-form__section-title">4. Что тебе проще давалось в школе – математика или литература?
                    </p>
                    <div class="test-form__section-grid">
                        <label class="radio test-form__section-radio">
                            <input type="radio" checked class="radio__input" name="fourth"
                                value="Да, с математикой все ОК">
                            <p class="radio__name">Да, с математикой все ОК</p>
                        </label>
                        <label class="radio test-form__section-radio">
                            <input type="radio" class="radio__input" name="fourth" value="Нет, я больше гуманитарий">
                            <p class="radio__name">Нет, я больше гуманитарий</p>
                        </label>
                    </div>
                </div>
                <div class="test-form__section">
                    <p class="test-form__section-title">5. Ты интроверт или экстраверт?</p>
                    <div class="test-form__section-grid">
                        <label class="radio test-form__section-radio">
                            <input type="radio" checked class="radio__input" name="fifth" value="Я интроверт">
                            <p class="radio__name">Я интроверт</p>
                        </label>
                        <label class="radio test-form__section-radio">
                            <input type="radio" class="radio__input" name="fifth" value="Однозначно экстраверт">
                            <p class="radio__name">Однозначно экстраверт</p>
                        </label>
                    </div>
                </div>
                <div class="test-form__section">
                    <p class="test-form__section-title">6. Комфортно ли тебе работать вне офиса (в кафе или дома)?</p>
                    <div class="test-form__section-grid">
                        <label class="radio test-form__section-radio">
                            <input type="radio" checked class="radio__input" name="sixth" value="Да, мне в кайф">
                            <p class="radio__name">Да, мне в кайф</p>
                        </label>
                        <label class="radio test-form__section-radio">
                            <input type="radio" class="radio__input" name="sixth"
                                value="О нет, лучше на своем рабочем месте">
                            <p class="radio__name">О нет, лучше на своем рабочем месте</p>
                        </label>
                    </div>
                </div>
                <div class="test-form__section">
                    <p class="test-form__section-title">7. Что для тебя хороший дизайн?</p>
                    <div class="test-form__section-grid">
                        <label class="radio test-form__section-radio">
                            <input type="radio" checked class="radio__input" name="seventh" value="Красивенький">
                            <p class="radio__name">Красивенький</p>
                        </label>
                        <label class="radio test-form__section-radio">
                            <input type="radio" class="radio__input" name="seventh"
                                value="Который решает определенные задачи">
                            <p class="radio__name">Который решает определенные задачи</p>
                        </label>
                    </div>
                </div>
            </div>
            <button data-modal="#test-modal" type="button" class="btn test-page__btn">Отправить результат теста</button>
        </div>
    </div>
</div>