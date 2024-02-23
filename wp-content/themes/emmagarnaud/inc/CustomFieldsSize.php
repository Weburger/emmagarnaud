<?php

namespace Theme;

class CustomFieldsSize
{

    public function register() {
        add_action('save_post_oeuvre', array($this, 'save_project_completion_date'));
        add_action('add_meta_boxes', array($this, 'add_project_completion_date_metabox'));
    }

    public function save_project_completion_date($post_id) {
        if (isset($_POST['_project_completion_date'])) {
            update_post_meta($post_id, '_project_completion_date', sanitize_text_field($_POST['_project_completion_date']));
        }

        if (isset($_POST['_oeuvre_size'])) {
            update_post_meta($post_id, '_oeuvre_size', sanitize_text_field($_POST['_oeuvre_size']));
        }
    }

    public function add_project_completion_date_metabox() {
        add_meta_box(
            'project_completion_date_metabox',
            'Date de réalisation du projet',
            array($this, 'project_completion_date_metabox_callback'),
            PostType::SLUG,
            'normal',
            'high'
        );

        add_meta_box(
            'oeuvre_size_metabox',
            'Taille de l\'Oeuvre',
            array($this, 'oeuvre_size_metabox_callback'),
            PostType::SLUG,
            'normal',
            'high'
        );
    }

    public function project_completion_date_metabox_callback($post) {
        $project_completion_date = get_post_meta($post->ID, '_project_completion_date', true);
        echo '<label for="project_completion_date">Date de réalisation :</label>';
        echo '<input type="date" id="project_completion_date" name="_project_completion_date" value="' . esc_attr($project_completion_date) . '">';
    }

    public function oeuvre_size_metabox_callback($post) {
        $oeuvre_size = get_post_meta($post->ID, '_oeuvre_size', true);
        echo '<label for="oeuvre_size">Taille de l\'Oeuvre :</label>';
        echo '<input type="text" id="oeuvre_size" name="_oeuvre_size" value="' . esc_attr($oeuvre_size) . '">';
    }
}