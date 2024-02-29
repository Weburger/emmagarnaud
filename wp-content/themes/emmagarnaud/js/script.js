import 'slick-carousel';

console.log('slick.js');

jQuery(document).ready(function($) {
    console.log('document ready');
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });
});
