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

        ob_start();

        include_once plugin_dir_path( __FILE__ ).'form.php';

        $file_content = ob_get_clean();

        $path = plugin_dir_path( __FILE__ ) . 'form.php';


        $post = array(
            'post_title'    => 'Ajouter un post (par Lucas)',
            'post_content'  =>  $path,
            'post_status'   => 'publish',
            'post_type'     => 'page',
            // 'page_template' => plugin_dir_path( __FILE__ ).'form.php'
        );
        
        wp_insert_post($post);
    }
}

add_action('init', 'check_if_lucas_already_created_a_form_page');

/*
* Pour gagner du temps, on cherche la page avec ce nom car je sais qu'il n'existera pas sur le Wordpress test
* En production, on stockera l'ID de la page à sa création, 
*/
