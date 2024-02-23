<?php

namespace Theme;

class PostType
{
    public const SLUG = 'oeuvres';

    public function register(): void
    {
        add_action('init', array($this, 'register_post_type'));
    }

    public function register_post_type() {
        $labels = array(
            'name'               => __('Œuvres'),
            'all_items'          => __('Toutes les oeuvres'),
            'singular_name'      => __('Oeuvre'),
            'add_new_item'       => __('Ajouter une oeuvre'),
            'edit_item'          => __("Modifier l'oeuvre"),
            'menu_name'          => __('Oeuvres'),
            'add_new'            => __('Ajouter une oeuvre'),
            'update_item'        => __('Modifier la réalisation'),
            'search_items'       => __('Rechercher une réalisation'),
            'not_found'          => __('Non trouvée'),
            'not_found_in_trash' => __('Non trouvée dans la corbeille'),
        );

        $args = array(
            'label'        => __('Oeuvres'),
            'description'  => __('Mes oeuvres'),
            'labels' => $labels,
            'supports'     => array(
                'title',
                'editor',
                'excerpt',
                'author',
                'thumbnail',
                'comments',
                'revisions',
                'custom-fields',
            ),
            'show_in_rest' => true,
            'hierarchical' => false,
            'public'       => true,
            'has_archive'  => true,
            'show_in_nav_menus' => true,
            'menu_position' => 2,
            'menu_icon' => 'dashicons-format-gallery',
        );

        register_post_type(self::SLUG, $args);
        add_filter('use_block_editor_for_post_type', function ($use_block_editor, $post_type) {
            if ($post_type === self::SLUG) {
                return false;
            }
            return $use_block_editor;
        }, 10, 2);
    }


}
