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

/* Création ou suppression de la page qui sert de form depuis le plugin */
function add_lucas_form_page() {

    echo '<h1>Insertion</h1>';

    // $post = array(
    //   'post_title'    => 'Ajouter un post (par Lucas)',
    //   'post_content'  => 'Hello content',
    //   'post_status'   => 'publish',
    //   'post_author'   => 'plugin_activation',
    //   'post_type'     => 'page',
    // );

    // wp_insert_post($post);
}

function remove_lucas_form_page() {
    // $page_id = get_option('vidpage');
    // wp_delete_post($page_id);
}


register_activation_hook( __FILE__, 'add_lucas_form_page' );
register_deactivation_hook( __FILE__, 'remove_lucas_form_page' );

