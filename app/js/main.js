'use strict';

function addErrorClass(inputElement, errorTextElement) {
    inputElement.classList.add('wpcf7-not-valid');
    errorTextElement.querySelector('.form__error-label').classList.add('form__error-label_active');
}
function removeErrorClass(inputElement, errorTextElement) {
    inputElement.classList.remove('wpcf7-not-valid');
    errorTextElement.querySelector('.form__error-label').classList.remove('form__error-label_active');
}
function detectDeviceWidth() {
    if (window.innerWidth < 992) {
        isMobile = true;
        return;
    }
    isMobile = false;
}
function getScrollbarWidth() {
    return window.innerWidth - document.documentElement.clientWidth;
}
function changeLayout() {
    detectDeviceWidth();
    if (isMobile && !isCompleted) {
        jQuery('.about-course__title').after(jQuery('.about-course__author'));
        jQuery('.about-course__title').after(jQuery('.about-course__video'));
        jQuery('.lecturer-modal__grid').after(jQuery('.lecturer-modal__text'));
        jQuery('.lecturer-modal__img img').after(jQuery('.lecturer-modal__title'));
        jQuery('.footer-menu').after(jQuery('.google-testimonials'));
        isCompleted = true;
    } else if (!isMobile && isCompleted) {
        jQuery('.about-course .col-lg-7').append(jQuery('.about-course__video'));
        jQuery('.about-course .col-lg-7').append(jQuery('.about-course__author'));
        jQuery('.lecturer-modal__info').append(jQuery('.lecturer-modal__title'));
        jQuery('.lecturer-modal__info').append(jQuery('.lecturer-modal__text'));
        jQuery('.footer__logo').after(jQuery('.google-testimonials'));
        isCompleted = false;
    }
}
function getCookie(name) {
    const matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}
function setCookie(name, value, options = {}) {
    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
    for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }
    document.cookie = updatedCookie;
}
function showPopup() {
    const modal = jQuery('#event-modal');
    const cookieData = {
        path: '/',
        secure: true,
        'max-age': 3600
    };
    if (modal) {
        const cookie = getCookie('event');
        if (!cookie) {
            setCookie('event', 'true', cookieData);
            setTimeout(function () {
                modal.modal({
                    fadeDuration: 300
                });
            }, 5000);
        }
    }
}
function handleSelect(evt) {
    const target = evt.target;
    const targetName = target.name;
    const targetValue = target.value;

    switch (targetName) {
        case 'test-course-date':
            document.querySelector('input[name="ums-date"]').value = targetValue;
            break;
        case 'timetable':
            document.location.replace(targetValue);
            break;
        case 'delivery':
            if (+targetValue === 1) {
                target.parentElement.nextElementSibling.classList.add('delivery-input_state-active');
            }
            if (+targetValue === 0) {
                target.parentElement.classList.remove('form__select_state-active');
                target.nextElementSibling.classList.remove('form__label_active');
            } else {
                target.parentElement.nextElementSibling.classList.remove('delivery-input_state-active');
                target.parentElement.classList.add('form__select_state-active');
                target.nextElementSibling.classList.add('form__label_active');
            }
            break;
    }
}
function initInputListener() {
    const inputs = document.querySelectorAll('.form__input input, .form__input textarea');

    for (const input of inputs) {
        const wrapper = input.closest('.form__input');
        const label = wrapper.querySelector('.form__label');

        if (input.value !== '') {
            wrapper.classList.add('form__input_filled');
            if (label) {
                label.classList.add('form__label_active');
            }
        }
        input.addEventListener('focus', () => {
            wrapper.classList.add('form__input_focused');
            wrapper.classList.add('form__input_filled');
            if (label) {
                label.classList.add('form__label_active');
            }
        });
        input.addEventListener('blur', () => {
            if (input.value !== '') {
                wrapper.classList.remove('form__input_focused');
                return;
            }
            wrapper.classList.remove('form__input_filled');
            wrapper.classList.remove('form__input_focused');
            if (label) {
                label.classList.remove('form__label_active');
            }
        });
    }
}
function videoModalCloseHandler(event) {
    const modal = event.target;
    modal.querySelector('iframe').setAttribute('src', '');
}
function lecturerHandlerFunction(evt) {
    const target = evt.target.closest('.lecturers-page__item');
    const id = target.dataset.lecturerPostId;
    const data = {
        action: 'team',
        id: id
    }
    const beforeSendHandler = function () {
        target.style.opacity = .3;
    }

    jQuery.when(window.utils.ajaxRequest(data, beforeSendHandler, target)).then((response) => {
        target.style.opacity = 1;
        document.querySelector('.ajax-lecturer-modal').innerHTML = '';
        document.querySelector('.ajax-lecturer-modal').insertAdjacentHTML('afterBegin', response);
        if (window.innerWidth < 992) {
            jQuery('.ajax-lecturer-modal .lecturer-modal__img img').after(jQuery('.ajax-lecturer-modal .modal__title'));
            jQuery('.ajax-lecturer-modal').append(jQuery('.ajax-lecturer-modal .lecturer-modal__text'));
        }
        jQuery('.ajax-lecturer-modal').modal();
    }, error => console.log(new Error(error)));
}
function addCustomEventHandler(event, collection, handlerFunction) {
    for (const el of collection) {
        el.addEventListener(event, handlerFunction);
    }
}
function wpcf7InvalidHandler(event) {
    const target = event.target;
    const button = target.querySelector('button[type="submit"]');

    button.textContent = defaultSubmitButtonText;
    button.classList.remove('btn_is-loading');
}
function wpcf7SentHandler(event) {
    const wpcf7MailStatus = event.detail.status;
    const target = event.target;
    const id = +event.detail.contactFormId;
    // const uri = event.target.baseURI;
    const inputs = event.detail.inputs;
    const button = target.querySelector('button[type="submit"]');
    let requestData, crmObject;
    let sendPulseData;

    switch (id) {
        // INSTALLMENT PAYMENT SUCCESS MODAL
        case 6494:
            const installmentForm = document.querySelector(`.installment-form`);
            const installmentFormData = new FormData(installmentForm);
            installmentFormData.set(`action`, `installment`);
            const installmentRequest = fetch(ajax.url, {
                method: 'POST',
                credentials: 'same-origin',
                body: installmentFormData
            });
            installmentRequest.then(resp => resp.json()).then(data => {
                if (data.status === `OK`) {
                    const installmentPaymentForm = document.querySelector(`.installment-form`);
                    const paymentSectionCollection = document.querySelectorAll(`.payment-section`);
                    const paymentMethodCollection = document.querySelectorAll(`.payment-item__input`);
                    // SHOW SUCCESS MODAL
                    jQuery(`#modal-success-installment-payment`).modal();
                    // RESET PAYMENT MODULE
                    globalUtils.resetForm(installmentPaymentForm);
                    globalUtils.removeClass(paymentSectionCollection, `payment-section_state-active`);
                    for (const paymentMethod of paymentMethodCollection) {
                        paymentMethod.checked = false;
                    }
                    button.textContent = defaultSubmitButtonText;
                    button.classList.remove('btn_is-loading');
                    jQuery('body, html').animate({
                        scrollTop: 0
                    }, 800);
                }
                else {
                    alert('Извините, ошибка регистрации заявки. Сообщите менеджеру школы о возникшем вопросе.');
                }
            }).catch(error => console.log(error));
            break;
        case 131:
            console.log(wpcf7MailStatus);
            if (wpcf7MailStatus === `mail_sent`) {
                button.textContent = defaultSubmitButtonText;
                button.classList.remove('btn_is-loading');
                jQuery.modal.close();
                jQuery('#success-modal-first').modal();
                //Send to CRM
                crmObject = new amoCRMInsance(131, inputs, 'lead');
                requestData = crmObject.getRequestObject();
                jQuery.when(window.utils.ajaxRequest(requestData)).then((resp) => {
                    console.log(jQuery.parseJSON(resp));
                    // Yandex conversion
                    ym(49171171, 'reachGoal', 'lead_form');
                }, error => console.log(new Error(error)));
            }
            break;
        case 837:
            button.textContent = defaultSubmitButtonText;
            button.classList.remove('btn_is-loading');
            jQuery.modal.close();
            jQuery('#success-modal-first').modal();
            break;
        case 859:
            crmObject = new amoCRMInsance(859, inputs, 'intensive');
            requestData = crmObject.getRequestObject();
            jQuery.when(window.utils.ajaxRequest(requestData)).then(() => {
                button.textContent = defaultSubmitButtonText;
                button.classList.remove('btn_is-loading');
                jQuery.modal.close();
                jQuery('#success-modal-first').modal();
            }, error => console.log(new Error(error)));
            break;
        case 1447:
            if (wpcf7MailStatus === `mail_sent`) {
                target.querySelector('.form__input').classList.remove('form__input_filled');
                target.querySelector('.form__label').classList.remove('form__label_active');
                button.textContent = defaultSubmitButtonText;
                button.classList.remove('btn_is-loading');
                jQuery.modal.close();
                jQuery('#success-modal-free-start').modal();
            }
            crmObject = new amoCRMInsance(1447, inputs, 'free');
            requestData = crmObject.getRequestObject();
            sendPulseData = {
                action: 'add_to_book',
                id: 89064264,
                email: inputs[3].value
            }
            // SENDING DATA TO AMOCRM
            jQuery.when(window.utils.ajaxRequest(requestData)).then(data => {
                const respObject = JSON.parse(data);
                if (respObject.result) {
                    //Yandex conversion
                    // ym(49171171, 'reachGoal', 'freelessons');
                }
            }, error => console.log(new Error(error)));
            // SENDING DATA TO SENDPULSE
            jQuery.when(window.utils.ajaxRequest(sendPulseData)).then(resp => {
                console.log(resp);
            }, error => console.log(new Error(error)));
            break;
        case 1655:
            sendPulseData = {
                action: 'add_to_book',
                id: 89064300,
                email: inputs[1].value
            }
            jQuery.when(window.utils.ajaxRequest(sendPulseData)).then((resp) => {
                const respObject = JSON.parse(resp);
                if (respObject.result) {
                    target.querySelector('.form__input').classList.remove('form__input_filled');
                    target.querySelector('.form__label').classList.remove('form__label_active');
                    button.textContent = defaultSubmitButtonText;
                    button.classList.remove('btn_is-loading');
                    jQuery.modal.close();
                    jQuery('#success-modal-test').modal();
                }
            }, error => console.log(new Error(error)));
            break;
        case 1628:
            sendPulseData = {
                action: 'add_to_book',
                id: 89086955,
                email: inputs[0].value
            }
            jQuery.when(window.utils.ajaxRequest(sendPulseData)).then((resp) => {
                const respObject = JSON.parse(resp);
                if (respObject.result) {
                    //Yandex conversion
                    // ym(49171171, 'reachGoal', 'emailsub');
                    // ga('send', 'event', { eventCategory: 'emailbutton', eventAction: 'click'});
                    // gtag('event', 'success', {'send_to': 'analytics','event_category': 'emailbutton'});
                    // gtag('event', 'conversion', {'event_category' : 'emailbutton', eventAction: 'click'});
                    target.querySelector('.form__input').classList.remove('form__input_filled');
                    target.querySelector('.form__label').classList.remove('form__label_active');
                    button.textContent = defaultSubmitButtonText;
                    button.classList.remove('btn_is-loading');
                    jQuery('#success-modal-third').modal();
                }
            }, error => console.log(new Error(error)));
            break;
        case 779:
            crmObject = new amoCRMInsance(779, inputs, 'call');
            requestData = crmObject.getRequestObject();
            jQuery.when(window.utils.ajaxRequest(requestData)).then(() => {
                button.textContent = defaultSubmitButtonText;
                button.classList.remove('btn_is-loading');
                jQuery.modal.close();
                jQuery('#success-modal-second').modal();
            }, error => console.log(new Error(error)));
            break;
        case 1839:
            crmObject = new amoCRMInsance(1839, inputs, 'intensive');
            requestData = crmObject.getRequestObject();
            jQuery.when(window.utils.ajaxRequest(requestData)).then(() => {
                ga('send', { hitType: 'event', eventCategory: 'emailbutton', eventAction: 'click' });
                button.textContent = defaultSubmitButtonText;
                button.classList.remove('btn_is-loading');
                jQuery.modal.close();
                jQuery('#success-modal-first').modal();
            }, error => console.log(new Error(error)));
            break;
        case 1805:
            button.textContent = defaultSubmitButtonText;
            button.classList.remove('btn_is-loading');
            jQuery.modal.close();
            jQuery('#success-modal-second').modal();
            break;
    }
}
function pageNavigationLinkHandler(event) {
    const target = event.target;
    const activeClass = 'page-navigation__link_state-active';

    window.utils.removeClass(navigationLinksCollection, activeClass);
    target.classList.add(activeClass);
}
function paymentInputsHandler(event) {
    const target = event.target;
    const targetName = target.name;

    if (targetName === 'total' || targetName === 'wsb_total') {
        const saleInput = target.closest('.form').querySelector('input[name="sale"]');
        if (saleInput) {
            saleInput.checked = false;
        }
        paymentInstance.setTotalPrice(target.value);
        paymentInstance.changeCurenciesPrice(paymentMethodInstance.getPaymentMethodIndex());
    }
}
function initItiPlugin() {
    const telInputs = document.querySelectorAll('input[type="tel"]');

    for (const input of telInputs) {
        if (!input.closest('.modal')) {
            itiInstance.init(input);
            input.addEventListener("countrychange", onItiCountyChangeHandler);
        }
    }
}
function initSwiperInstance(swiperInstance, swiperInstanceOptionsData) {
    if (typeof swiperInstance === `object`) {
        const swiperInstances = Array.from(swiperInstance);

            swiperInstances.forEach((swiperInstanceItem, index) => {
                swiperInstanceItem.classList.add(`inner-carousel-instance-${index}`);
                new Swiper(`.inner-carousel-instance-${index}`, {
                    pagination: {
                        el: swiperInstanceItem.nextElementSibling,
                        type: 'bullets'
                    },
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    navigation: {
                        prevEl: swiperInstanceItem.parentElement.querySelector(`.inner-carousel__btn-prev`),
                        nextEl: swiperInstanceItem.parentElement.querySelector(`.inner-carousel__btn-next`)
                    }
                });
            });

        return;
    }
    if (swiperInstance) {
        const swiperInstanceContainer = document.querySelector(swiperInstance);
    
        if (swiperInstanceContainer) {
            return new Swiper(swiperInstanceContainer, swiperInstanceOptionsData);
        }
    }
}

//Event handlers
function onPortfolioLoadMoreButtonClickHandler() {
    const portfolioLoadMoreButtonLocation = portfolioLoadMoreButton.dataset.location;
    const maxLoadPages = +portfolioLoadMoreButton.dataset.maxPages;
    const portfolioListContainer = portfolioLoadMoreButton.closest(`.portfolio`).querySelector(`.portfolio__list`);
    const portfolioLoadMoreRequestData = {
        action: 'portfolio',
        currentPage: currentPage
    };
    const portfolioLoadMorebeforeRequestHandler = function() {
        portfolioLoadMoreButton.closest(`.portfolio`).querySelector(`.portfolio__list`).classList.add('portfolio__list_state-is-loading');
        portfolioLoadMoreButton.classList.add('ajax-btn_state-is-loading');
    };

    if (portfolioLoadMoreButtonLocation === `post`) {
        const portfolioLoadMoreButtonPostTag = portfolioLoadMoreButton.dataset.postTag;
        portfolioLoadMoreRequestData.action = portfolioLoadMoreButtonLocation + '_portfolio';
        portfolioLoadMoreRequestData.tag = portfolioLoadMoreButtonPostTag;
    }

    jQuery.when(globalUtils.ajaxRequest(portfolioLoadMoreRequestData, portfolioLoadMorebeforeRequestHandler, portfolioLoadMoreButton)).then(
        resp => {
            setTimeout(() => {
                portfolioListContainer.insertAdjacentHTML('beforeEnd', resp);
                portfolioListContainer.classList.remove('portfolio__list_state-is-loading');
                portfolioLoadMoreButton.classList.remove('ajax-btn_state-is-loading');
                currentPage++;
                if (currentPage === maxLoadPages) {
                    portfolioLoadMoreButton.classList.add('portfolio__btn_disabled');
                }
            }, 250);
        },
        error => {
            console.log(new Error(error));
        }
    );
}
function onCoursesTabsButtonsClickHandler(evt) {
    const target = evt.target;
    dataCurrentPageValue = 1;
    const coursesCategoryId = target.dataset.id.split(`,`);
    const coursesListGrid = target.parentElement.nextElementSibling;
    const coursesListContainer = coursesListGrid.querySelector(`.course-list__wrapper`);
    const isShowFull = target.dataset.showFull;
    const showMoreCoursesButton = coursesListGrid.querySelector(`.course-list__more-btn`);
    const showMoreCoursesButtonContainer = showMoreCoursesButton ? showMoreCoursesButton.parentElement : null;
    const coursesRequestData = {
        action: `tabs`,
        id: coursesCategoryId,
        showTestPost: false
    }
    const beforeSendHandler = function () {
        const el = target.parentElement.nextElementSibling;
        el.classList.add(`course-list__grid_state-is-loading`);
    }

    if (isShowFull) {
        coursesRequestData.showFullPosts = true;
    }

    globalUtils.removeClass(coursesTabsButtons, `tabs__btn_active`);
    target.classList.add(`tabs__btn_active`);
    jQuery.when(globalUtils.ajaxRequest(coursesRequestData, beforeSendHandler, target)).then(resp => {
        setTimeout(function () {
            coursesListGrid.classList.remove(`course-list__grid_state-is-loading`);
            coursesListContainer.innerHTML = ``;
            coursesListContainer.insertAdjacentHTML(`afterBegin`, resp);
            if (!isShowFull) {
                dataMaxPagesValue = +coursesListContainer.querySelector(`.course-list__row_first`).dataset.maxNumPages;
                if (dataCurrentPageValue === dataMaxPagesValue) {
                    showMoreCoursesButton.classList.add(`course-list__more-btn_disabled`);
                    showMoreCoursesButtonContainer.classList.add(`course-list__footer_state-disabled`);
                } else {
                    showMoreCoursesButton.classList.remove(`course-list__more-btn_disabled`);
                    showMoreCoursesButtonContainer.classList.remove(`course-list__footer_state-disabled`);
                }
            }
        }, 250);
    }, error => console.log(new Error(error)));
}
function onPaymentPageClickHandler(evt) {
    const target = evt.target;

    if (target.matches(`input[name="sale"]`)) {
        const paymentMethodIndex = paymentMethodInstance.getPaymentMethodIndex();
        if (target.checked) {
            paymentInstance.changeInputPrice(paymentMethodIndex, true);
            return;
        }
        paymentInstance.updatePrices(paymentMethodIndex, true);
        paymentInstance.changeInputPrice(paymentMethodIndex);
    }
}
function onMobileOptionsMenuOpenButtonClickHandler() {
    const mobileMenuEl = document.querySelector('.m-menu');
    const scrollBarWidth = getScrollbarWidth();
    mobileMenuEl.classList.add('m-menu_opened');
    document.body.style.paddingRight = scrollBarWidth;
    document.documentElement.classList.add('is-locked');
}
function onMobileOptionsMenuCloseButtonClickHandler() {
    const mobileMenuEl = document.querySelector('.m-menu');
    mobileMenuEl.classList.remove('m-menu_opened');
    document.body.style.paddingRight = 0;
    document.documentElement.classList.remove('is-locked');
}
function onPageTemplateContainerClickHandler(evt) {
    const target = evt.target;
    if (target.matches(`.content-list__title`)) {
        
        target.classList.toggle('content-list__title_active');
        target.nextElementSibling.classList.toggle('content-list__text_state-actived');
    }
}
function onContactPageInfoContainerClickHandler(evt) {
    const target = evt.target;

    if (target.matches(`.contact-page__info-item`)) {
        const contactPageAdresses = document.querySelectorAll(`.contact-page__info-item`);
        jQuery('body, html').animate({
            scrollTop: jQuery('#map-anchor').offset().top
        }, 800);
        globalUtils.removeClass(contactPageAdresses, `contact-page__info-item_active`);
        target.classList.add(`contact-page__info-item_active`);
    }
}
function onSortNavigationContainerClickHandler(evt) {
    const target = evt.target;

    if (target.matches('.sort-navigation__button')) {
        const sortValue = target.dataset.sort;
        globalUtils.removeClass(sortNavigationButtons, 'sort-navigation__button_state-active');
        globalUtils.removeClass(sortListContainer.children, 'd-none');
        target.classList.add('sort-navigation__button_state-active');

        if (sortValue !== 'all') {
            for (let sortListContainerElement of sortListContainer.children) {
                let tagValues = sortListContainerElement.dataset.tag;
                if (!tagValues.split(', ').includes(sortValue)) {
                    sortListContainerElement.classList.add('d-none');
                }
            }
        }
    }
}
function onItiCountyChangeHandler(evt) {
    const target = evt.target;
    const form = target.closest('.wpcf7-form') || target.closest('.form');
    const code = form.querySelector('.iti__selected-dial-code').textContent;
    const hiddenInput = form.querySelector('input[name="ums-country-code"]');
    hiddenInput.value = code;
}
function onTextareaElementClickHandler(evt) {
    const target = evt.target;

    target.classList.toggle(`form__textarea-btn_active`);
    target.nextElementSibling.lastElementChild.classList.toggle(`form__textarea_visibility-hide`);
}
function onModalOpenHandler(evt) {
    const modal = evt.target;
    const input = modal.querySelector('input[type="tel"]');

    if (input) {
        itiInstance.init(input);
        input.addEventListener("countrychange", onItiCountyChangeHandler);
    }

    if (modal.classList.contains(`order-modal`)) {
        const textareaElement = modal.querySelector(`.form__textarea-btn`);
        textareaElement.addEventListener(`click`, onTextareaElementClickHandler);
    }
}
function onModalCloseHandler(evt) {
    const target = evt.target;
    const input = target.querySelector('input[type="tel"]');

    if (input) {
        const instance = window.intlTelInputGlobals.getInstance(input);
        instance.destroy();
    }

    if (target.classList.contains(`order-modal`)) {
        const textareaElement = target.querySelector(`.form__textarea-btn`);
        textareaElement.removeEventListener(`click`, onTextareaElementClickHandler);
    }
}
function onTestBtnClickHandler() {
    const testData = {
        action: 'lt'
    };
    jQuery.when(globalUtils.ajaxRequest(testData).then(
        resp => {
            console.log(resp);
            alert(resp);
        },
        error => {
            console.log(error);
            alert(error);
        }
    ));
}

// Подгружаем необходимые модули
const amoCRMInsance = window.amoCRM.init;
const paymentMethodInstance = window.paymentMethod.instance;
const paymentInstance = window.payment.instance;
const globalUtils = window.utils;
const itiInstance = window.iti.instance;

// Variables
let defaultSubmitButtonText;
let requiredInputsCollection;
let certificatePaymentObject;
let telInputValidation = false;
let emailInputValidation = false;
let textInputValidation = false;
let selectValidation = false;
let dataCurrentPageValue = 1;
let dataMaxPagesValue;
let currentPage = 1;
if (document.querySelector('.course-list__row_first')) {
    dataMaxPagesValue = +document.querySelector('.course-list__row_first').dataset.maxNumPages;
}
let deliveryElement = document.querySelector('select[name="delivery"]');
let isCompleted = false;
let isMobile = false;
const certificateForm = '#wpcf7-f1805-o1';
const lecturersCollection = document.querySelectorAll('.lecturers-page__item');
const wpcf7Collection = document.querySelectorAll('.wpcf7');
const contactPageItems = document.querySelectorAll('.contact-page__info-item');
const navigationLinksCollection = document.querySelectorAll('.page-navigation__link');
const inputs = document.querySelectorAll('input');
const selects = document.querySelectorAll('select');
const testBtn = document.querySelector(`.test-btn`)
const weCarouselOptions = {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 5000
    },
    pagination: {
        el: '.we__pagination',
        type: 'bullets'
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 0,
            pagination: {
                el: '.we__pagination',
                type: 'bullets'
            }
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 30,
            pagination: {
                el: null
            }
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        1230: {
            slidesPerView: 4
        }
    }
}
const courseGalleryCarouselOptions = {
    slidesPerView: 5,
    loop: true,
    autoplay: {
        delay: 3000
    },
    navigation: {
        prevEl: '.course-gallery__btn-prev',
        nextEl: '.course-gallery__btn-next'
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        576: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 3
        },
        992: {
            slidesPerView: 5
        }
    }
}
const graduatesCarouselOptions = {
    slidesPerView: `auto`,
    spaceBetween: 25,
    loop: true,
    autoplay: {
        delay: 3000
    },
    breakpoints: {
        360: {
            slidesPerView: 2
        },
        480: {
            slidesPerView: 3
        },
        576: {
            slidesPerView: 4
        },
        768: {
            slidesPerView: `auto`
        }
    }
}
const testimonialsCarouselOptions = {
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    loop: true,
    autoplay: {
        delay: 5000
    },
    navigation: {
        nextEl: '.testimonials__btn-next',
        prevEl: '.testimonials__btn-prev',
    },
    pagination: {
        el: '.testimonials__pagination',
        type: 'bullets',
        clickable: true
    }
}
const innerCarouselOptions = {
    pagination: {
        el: '.inner-carousel__pagination',
        type: 'bullets'
    },
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    navigation: {
        prevEl: '.inner-carousel__btn-prev',
        nextEl: '.inner-carousel__btn-next'
    }
}
const portfolioLoadMoreButton = document.querySelector(`.portfolio__btn`);
const coursesTabsButtonsContainer = document.querySelector(`.tabs`);
const coursesTabsButtons = document.querySelectorAll(`.tabs__btn`);
const paymentPageContainer = document.querySelector(`.payment-page`);
const mobileOptionsMenuOpenButton = document.querySelector(`.m-options__menu-btn`);
const mobileOptionsMenuCloseButton = document.querySelector(`.m-menu__options-close-btn`);
const pageTemplateContainer = document.querySelector(`.page-template`);
const contactPageInfoContainer = document.querySelector(`.contact-page__info`);
const sortNavigationContainer = document.querySelector(`.sort-navigation`);
const sortNavigationButtons = document.querySelectorAll(`.sort-navigation__button`);
const sortListContainer = document.querySelector(`.sort-list`);
const innerCarouselElements = document.querySelectorAll(`.inner-carousel__grid`);
const selectCourseBox = document.querySelector(`.ums-select`);

document.addEventListener(`DOMContentLoaded`, () => {
    initInputListener();
    initItiPlugin();
    changeLayout();
    showPopup();
    if (innerCarouselElements.length) {
        initSwiperInstance(innerCarouselElements, innerCarouselOptions);
    }
    initSwiperInstance(`.we__carousel`, weCarouselOptions);
    initSwiperInstance(`.course-gallery__grid`, courseGalleryCarouselOptions);
    initSwiperInstance(`.graduates__carousel`, graduatesCarouselOptions);
    initSwiperInstance(`.testimonials__carousel`, testimonialsCarouselOptions);

		// Adds price per month
		const elPricePerMonth = document.querySelector('.price-box__item-value .ums-currency__value');
        if (elPricePerMonth) {
            let coursePrice = document.querySelector('.price-box__item-value').innerText;
		    coursePrice = parseInt(coursePrice, 10);
            const coursePricePerMonth = Math.round(coursePrice / 3);
            elPricePerMonth.innerHTML = `&nbsp;≈&nbsp;${coursePricePerMonth} BYN в месяц`;
        }
		//

    if (portfolioLoadMoreButton) {
        portfolioLoadMoreButton.addEventListener(`click`, onPortfolioLoadMoreButtonClickHandler);
    }
    if (coursesTabsButtonsContainer) {
        coursesTabsButtonsContainer.addEventListener(`click`, onCoursesTabsButtonsClickHandler);
    }
    if (paymentPageContainer) {
        paymentPageContainer.addEventListener(`click`, onPaymentPageClickHandler);
    }
    if (mobileOptionsMenuOpenButton) {
        mobileOptionsMenuOpenButton.addEventListener(`click`, onMobileOptionsMenuOpenButtonClickHandler);
    }
    if (mobileOptionsMenuCloseButton) {
        mobileOptionsMenuCloseButton.addEventListener(`click`, onMobileOptionsMenuCloseButtonClickHandler);
    }
    if (pageTemplateContainer) {
        pageTemplateContainer.addEventListener(`click`, onPageTemplateContainerClickHandler);
    }
    if (contactPageInfoContainer) {
        contactPageInfoContainer.addEventListener(`click`, onContactPageInfoContainerClickHandler);
    }
    if (sortNavigationContainer) {
        sortNavigationContainer.addEventListener(`click`, onSortNavigationContainerClickHandler);
    }
    if (testBtn) {
        testBtn.addEventListener(`click`, onTestBtnClickHandler);
    }
    addCustomEventHandler('wpcf7invalid', wpcf7Collection, wpcf7InvalidHandler);
    addCustomEventHandler('wpcf7mailsent', wpcf7Collection, wpcf7SentHandler);
});

//Events
document.addEventListener('click', (evt) => {
    const target = evt.target;

    if (target.dataset.modal) {
        const modalId = target.dataset.modal;

        if (modalId === '#personal-data-modal') {
            const modalOptionsData = {
                action: 'personal_data'
            }
            jQuery.when(window.utils.ajaxRequest(modalOptionsData)).then(resp => {
                const modalElement = document.querySelector('.personal-data-modal');
                modalElement.insertAdjacentHTML('afterBegin', resp);
                jQuery(modalElement).modal({
                    closeExisting: false
                });
            }, error => console.log(new Error(error)));
        }
        jQuery(modalId).modal({
            closeExisting: false
        });
    }
    if (target.dataset.videoId) {
        const videoId = target.dataset.videoId;
        const videoLink = 'https://www.youtube.com/embed/' + videoId;
        const videoModalElement = document.querySelector('.video-modal');
        videoModalElement.querySelector('iframe').setAttribute('src', videoLink);
        jQuery('.video-modal').modal({
            closeExisting: false
        });
    }
    if (target.matches('.wpcf7 button[type="submit"]')) {
        defaultSubmitButtonText = target.textContent;
        target.classList.add(`btn_is-loading`);
        target.textContent = `Отправляем...`;
    } 
    if (target.matches('.dropdown-course-info__lecturer')) {
        const postId = target.dataset.postId;
        const text = target.textContent;
        const requestData = {
            action: 'lecturer',
            id: postId
        }
        const beforeSendHandler = function () {
            target.style.opacity = .3;
        }
        target.textContent = 'Загружаем...';
        jQuery.when(window.utils.ajaxRequest(requestData, beforeSendHandler, target)).then((response) => {
            target.style.opacity = 1;
            target.textContent = text;
            document.querySelector('.dropdown-lecturer-modal').innerHTML = '';
            document.querySelector('.dropdown-lecturer-modal').insertAdjacentHTML('afterBegin', response);
            jQuery('.dropdown-lecturer-modal').modal();
        });
    }
    if (target.matches(`.course-list__more-btn`)) {
        const gridElement = target.parentElement.previousElementSibling;
        const id = document.querySelector(`.tabs__btn_active`).dataset.id;
        const data = {
            action: `courses`,
            id: +id,
            current_page: dataCurrentPageValue
        }
        const beforeSendHandler = function () {
            const el = target.parentElement.previousElementSibling;
            el.classList.add('course-list__wrapper_state-is-loading');
            target.classList.add('ajax-btn_state-is-loading');
        }

        jQuery.when(window.utils.ajaxRequest(data, beforeSendHandler, target)).then(resp => {
            setTimeout(function () {
                document.querySelector('.course-list__wrapper').insertAdjacentHTML('beforeEnd', resp);
                gridElement.classList.remove('course-list__wrapper_state-is-loading');
                target.classList.remove('ajax-btn_state-is-loading');
            }, 250);
            dataCurrentPageValue += 1;
            if (dataCurrentPageValue === dataMaxPagesValue) {
                document.querySelector('.course-list__footer').classList.add('course-list__footer_state-disabled');
                document.querySelector('.course-list__more-btn').classList.add('course-list__more-btn_disabled');
            }
        }, error => console.log(new Error(error)));
    }
    if (target.matches('.course-list-item__select-name')) {
        (function () {
            const buttons = document.querySelectorAll('.course-list-item__select-name');
            const dropdowns = document.querySelectorAll('.dropdown');
            const activeClass = 'course-list-item__select-name_active';
            const openClass = 'dropdown_opened';

            if (target.classList.contains(activeClass)) {
                target.classList.remove(activeClass)
                target.nextElementSibling.classList.remove(openClass);
            } else {
                window.utils.removeClass(buttons, activeClass);
                window.utils.removeClass(dropdowns, openClass);
                target.classList.add(activeClass);
                target.nextElementSibling.classList.add(openClass);
            }
        })();
    }
    if (target.matches('.content-list__more-btn')) {
        const contentListContainer = target.parentElement.previousElementSibling;
        if (target.classList.contains('content-list__more-btn_open')) {
            jQuery('html, body').animate({
                scrollTop: jQuery('.faq__title').offset().top - 50
            }, 150);
            target.textContent = `Показать ещё`;
            target.classList.remove('content-list__more-btn_open');
            contentListContainer.classList.remove(`content-list__wrapper_open`);
            return;
        }
        target.textContent = `Скрыть`;
        target.classList.add('content-list__more-btn_open');
        contentListContainer.classList.add(`content-list__wrapper_open`);
    }
    if (target.matches('.webpay-form__btn')) {
        evt.preventDefault();

        const buttonText = target.textContent;
        target.textContent = 'Проверяем...';
        target.style.opacity = .5;
        const form = target.closest('.form');
        const method = target.dataset.paymentMethod;
        const inputs = form.querySelectorAll('input[required]');
        const customer = (method === 'alfa') ? form.querySelector('input[name="name"]').value : form.querySelector('input[name="wsb_customer_name"]').value;
        let isValid;
        let ajaxData = {
            action: 'payment_' + method,
            totalPrice: paymentInstance.getTotalPrice() * 100,
            productName: paymentInstance.getCurrent(),
            customerName: customer
        }

        for (let input of inputs) {
            const value = input.value;
            const label = input.nextElementSibling.nextElementSibling;

            if (!value) {
                input.classList.add('wpcf7-not-valid');
                label.classList.add('form__error-label_active');
                isValid = false;
                setTimeout(() => {
                    target.textContent = buttonText;
                    target.style.opacity = 1;
                }, 300);
                return;
            } else {
                input.classList.remove('wpcf7-not-valid');
                label.classList.remove('form__error-label_active');
                isValid = true;
            }
        }

        if (isValid) {
            inputs.forEach(item => {
                const label = item.nextElementSibling.nextElementSibling;

                item.classList.remove('wpcf7-not-valid');
                label.classList.remove('form__error-label_active');
            });
            if (paymentMethodInstance.getPaymentMethodIndex() !== 3) {
                ajaxData.customerSaleType = paymentInstance.getSaleType();
                ajaxData.customerSaleValue = paymentInstance.getSaleValue();
            }
            jQuery.ajax({
                url: ajax.url,
                type: 'POST',
                dataType: 'json',
                data: ajaxData,
                beforeSend: function () {
                    target.style.opacity = .5;
                    target.textContent = 'Обрабатываем данные...';
                },
                success: function (response) {
                    // Yandex conversion
                    ym(49171171, 'reachGoal', 'payment');
                    target.textContent = 'Перенаправляем на оплату...';
                    if (paymentMethodInstance.getPaymentMethodIndex() === 1) {
                        setTimeout(function () {
                            document.location.replace(response.checkout.redirect_url);
                        }, 200);
                        return;
                    }
                    setTimeout(function () {
                        document.location.replace(response.formUrl);
                    }, 200);
                }
            });
        }
    }
    if (selectCourseBox && selectCourseBox.querySelector(`.ums-select__btn`).classList.contains(`ums-select__btn_state-active`) && !target.closest(`.ums-select`)) {
        selectCourseBox.querySelector(`.ums-select__btn`).classList.remove(`ums-select__btn_state-active`);
        selectCourseBox.querySelector(`.ums-select__list`).classList.remove(`ums-select__list_visibility-open`);
        selectCourseBox.closest(`.form__select`).classList.remove(`form__select_state-active`);
    }
    // ERIP
    if (target.matches(`input[name="installment-school"]`)) {
        const eripPaymentSaleField = document.querySelector(`input[name="sale-school"]`);
        const eripPaymentPromocodeField = document.querySelector(`.promocode-input`);
        if (target.checked) {
            if (eripPaymentSaleField.checked) {
                paymentInstance.updateEripPrice({}, true, true);
            }
            else if (eripPaymentPromocodeField.classList.contains(`promocode-input_state-success`)) {
                paymentInstance.updateEripPrice(window.promocodeData.value, false, true);
            }
            else {
                paymentInstance.updateEripPrice({}, false, true);
            }
        }
        else {
            if (eripPaymentSaleField.checked) {
                paymentInstance.updateEripPrice({}, true, false);
            }
            else if (eripPaymentPromocodeField.classList.contains(`promocode-input_state-success`)) {
                paymentInstance.updateEripPrice(window.promocodeData.value, false, false);
            }
            else {
                paymentInstance.updateEripPrice({}, false, false);
            }
        }
    }
    if (target.matches(`input[name="sale-school"]`)) {
        const eripPaymentInstallmentField = document.querySelector(`input[name="installment-school"]`);
        document.querySelector(`.b-promocode`).classList.toggle(`b-promocode_disabled`);
        document.querySelector(`.erip-payment__message-note`).classList.toggle(`erip-payment__message-note_active`);
        if (target.checked) {
            if (eripPaymentInstallmentField.checked) {
                paymentInstance.updateEripPrice({}, true, true);
            }
            else {
                paymentInstance.updateEripPrice({}, true, false)
            }
        }
        else {
            if (eripPaymentInstallmentField.checked) {
                paymentInstance.updateEripPrice({}, false, true);
            }
            else {
                paymentInstance.updateEripPrice({}, false, false);
            }
        }
    }
    if (target.matches(`input[name="installment-length"]`)) {
        const installmentPaymentTermInput = document.querySelector(`input[name="installment-term"]`);
        installmentPaymentTermInput.value = target.value;
        paymentInstance.recalculateInstallmentPrice(+target.value);
    }
});

jQuery('.modal').on('modal:open', onModalOpenHandler);
jQuery('.modal').on('modal:close', onModalCloseHandler);
jQuery('.video-modal').on('modal:after-close', videoModalCloseHandler);
addCustomEventHandler('click', lecturersCollection, lecturerHandlerFunction);
addCustomEventHandler('click', navigationLinksCollection, pageNavigationLinkHandler);
addCustomEventHandler('input', inputs, paymentInputsHandler);
addCustomEventHandler('change', selects, handleSelect);
window.addEventListener('resize', () => {
    changeLayout();
});
window.addEventListener('scroll', () => {
    if (mobileOptionsMenuOpenButton) {
        if (pageYOffset >= 900) {
            mobileOptionsMenuOpenButton.classList.add(`m-options__menu-btn_active`);
            return;
        }
        mobileOptionsMenuOpenButton.classList.remove(`m-options__menu-btn_active`);
    }
});
document.body.addEventListener('mouseover', (evt) => {
    const target = evt.target;
    if (target.closest('svg') && target.closest('svg').classList.contains('info__icon') && window.innerWidth > 991) {
        target.closest('svg').nextElementSibling.classList.add('info__content_opened');
    }
});
document.body.addEventListener('mouseout', (evt) => {
    const target = evt.target;
    if (target.closest('svg') && target.closest('svg').classList.contains('info__icon') && !event.relatedTarget.closest('svg') && window.innerWidth > 991) {
        target.closest('svg').nextElementSibling.classList.remove('info__content_opened');
    }
});

// FANCY APP SETTINGS
// jQuery('[data-fancybox][data-type="iframe"]').fancybox({
//     iframe : {
//         preload : true
//     }
// })