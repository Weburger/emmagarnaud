<?php
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script(
        'custom-gutenberg-script',
        get_template_directory_uri() . '/dist/js/main.js',
        array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-data', 'wp-compose', 'wp-editor' ),
        filemtime(get_template_directory() . '/dist/js/main.js'),
        true
    );
});


function my_register_post_meta() {
    register_post_meta( 'post', 'slick', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'number',
    ) );
}
add_action( 'init', 'my_register_post_meta' );


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('mon_style', get_template_directory_uri() . '/style.css', false);
    wp_enqueue_style('mon_style2', get_template_directory_uri() . '/src/css/style.css', false);
    wp_enqueue_style('about_style', get_template_directory_uri() . '/about.css', false);
    wp_enqueue_style('slick1', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.css', false);
    wp_enqueue_style('slick2', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick-theme.css', false);

    wp_register_script(
        'scriptFO',
        get_template_directory_uri() . '/src/js/script.js',
    );
    wp_enqueue_script('scriptFO');
});

add_action( 'after_setup_theme', function() {
    register_nav_menu( 'main-menu', 'Menu principal' );
    add_theme_support( 'post-thumbnails' );
});

function add_type_attribute($tag, $handle, $src) {
    if ('scriptFO' !== $handle) {
        return $tag;
    }
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}

add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);

