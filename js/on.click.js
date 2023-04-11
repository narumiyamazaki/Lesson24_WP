/*ハンバーガーメニューのクリックイベント*/
$('.p-nav__btn').on('click', function () {
    $(this).toggleClass('open');
    $('.p-header__nav__wrapper--sp').toggleClass('open');
    $('.p-nav__btn > a').toggleClass('open');
    $('.l-header').toggleClass('active');
    $('.p-header__top__wrapper').toggleClass('none');
    $('.c-btn__text').toggleClass('active');
});

/*サブメニューのクリックイベント*/
$('.c-icon--has-sub-menu').on('click', function () {
    $(this).siblings('.p-sub-menu__items').toggleClass('open');
});
