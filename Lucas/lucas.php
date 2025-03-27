<?php

/*
*
* CONFIGURATION
*
*/

/* Insertion du cpt: */
include_once plugin_dir_path( __FILE__ ).'cpt.php';

/* Création et insertion de la page backend */
function lucas_menu() {
    add_menu_page(
        'Ajout de CPT par Lucas',
        'CPT par Lucas',
        'manage_options', 
        'cpt_lucas',
        'lucas_view',
        'dashicons-media-spreadsheet',
        15
    );
}
add_action('admin_menu', 'lucas_menu');

function lucas_view(){
    include_once plugin_dir_path( __FILE__ ).'view.php';
}

function check_if_lucas_already_created_a_form_page(){
    // On créé la page prévue pour le form si elle n'existe pas

    $args = array(
        'post_type' => 'page',
        'name' => 'Ajouter un post (par Lucas)',
    );
          
    $query = new WP_Query($args);
          
    if(!$query->have_posts()){

        // On ajoute une page vide
        $post = array(
            'post_title'    => 'Ajouter un post (par Lucas)',
            'post_status'   => 'publish',
            'post_type'     => 'page',
        );
        
        $form_id = wp_insert_post($post);

        // On stocke l'ID de la page qu'on a créée
        global $wpdb;
        $variableCheck = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'lucas_form_post_id';");
        if($variableCheck == null){
            $wpdb->insert(
                'wp_options',
                array(
                    'option_name' => 'lucas_form_post_id',
                    'option_value' => $form_id,
                )
            );
        }else{
            $wpdb->update(
                'wp_options',
                array(
                    'option_value' => $form_id,
                ),
                array(
                    'option_name' => 'lucas_form_post_id',
                )
            );
        }
    }
}

add_action('init', 'check_if_lucas_already_created_a_form_page');

add_action('template_redirect', function() {
    // Get current page ID
    global $post;
    $post_id = $post->ID;

    // Get form page ID
    global $wpdb;
    $form_id = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'lucas_form_post_id';");

    if ( $form_id == $post_id ) {
        add_filter('template_include', function() {
            return plugin_dir_path( __FILE__ ).'form.php';
        });
    }
});