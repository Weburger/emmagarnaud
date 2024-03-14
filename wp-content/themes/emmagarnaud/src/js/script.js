//jsp pourquoi sur mon pc je peux pas juste faire import 'slick-carousel', du coup je fais tout le chemin
import '../../node_modules/slick-carousel/slick/slick.min.js';

jQuery(document).ready(function($) {
    console.log('document ready');
    $('.slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev">avant</button>',
        nextArrow: '<button type="button" class="slick-next">apres</button>',
    });
});
