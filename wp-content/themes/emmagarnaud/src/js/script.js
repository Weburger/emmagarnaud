//jsp pourquoi sur mon pc je peux pas juste faire import 'slick-carousel', du coup je fais tout le chemin
import '../../node_modules/slick-carousel/slick/slick.min.js';

jQuery(document).ready(function($) {
    console.log('document ready');
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        centerMode: true,
        variableWidth: true
    });
});
