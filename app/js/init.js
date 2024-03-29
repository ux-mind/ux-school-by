'use strict';

// Constants
const PAYMENT_METHODS_DATA_WITH_CARD = [{
    id: 0,
    name: `erip`,
    title: `Оплатить картой`,
    checked: false
}];
const PAYMENT_METHODS_DATA = [{
        id: 0,
        name: `erip`,
        title: `Оплатить через ЕРИП`,
        checked: false
    },
    {
        id: 4,
        name: `installment`,
        title: `Кредит от&nbsp;Альфа&nbsp;банка до&nbsp;12&nbsp;месяцев`,
        checked: false
    },
    {
        id: 2,
        name: `halva`,
        title: `Рассрочка от 2 до 9 месяцев по карте Халва`,
        checked: false
    },
    {
        id: 3,
        name: `offline`,
        title: `В отделении банка`,
        checked: false
    },
    // {
    //     id: 5,
    //     name: `online`,
    //     title: `Рассрочка на&nbsp;8&nbsp;месяцев по&nbsp;карте&nbsp;Черепаха`,
    //     checked: false
    // },
    {
        id: 1,
        name: `erip`,
        title: `Оплатить картой`,
        checked: false
    }
];
const INSTALLMENT_TERM = 12;
const INSTALLMENT_RATE = 25.9;
const INSTALLMENT_TEST_SHOP_ID = `1374`;
const INSTALLMENT_SHOP_ID = `1403`;
const RAND_BASE = 36;
const START_RAND_SUBSTR_INDEX = 2;
const END_RAND_SUBSTR_INDEX = 5;