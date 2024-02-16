<?php


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('mon_style', get_template_directory_uri() . '/style.css', false);
});

add_action( 'after_setup_theme', function() {
    register_nav_menu( 'main-menu', 'Menu principal' );
    add_theme_support( 'post-thumbnails' );
});






