import $ from 'jquery';

export { mobileMenu };

// nav menu

function mobileMenu() {
    $('.js-menu-toggle').on('click', function () {
        $('body').toggleClass('is-menu-on');
    });
}
