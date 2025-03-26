<?php

// Mon Custom Post Type
function lucas_register_post() {
    $labels = array(
        'name' => 'Post',
        'all_items' => 'Tous les posts',
        'singular_name' => 'Post',
        'plural_name' => 'Posts',
        'add_new_item' => 'Ajouter un post',
        'edit_item' => 'Modifier post',
        'new_item' => 'Nouveau post',
        'view_item' => 'Voir post',
        'search_items' => 'Rechercher post',
        'not_found' => 'Pas de post',
        'not_found_in_trash' => 'Pas de post dans la corbeille',
        'menu_name' => 'Lucas POSTS',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'rest_base' => 'post',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'trackbacks', 'page-attributes', 'post-formats' ),
        'menu_position' => 15,
        'menu_icon' => 'dashicons-media-spreadsheet',
        'can_export' => true,
        'delete_with_user' => false,
        'query_var' => 'lucas_post',
    );
    register_post_type('lucas_post' , $args );
}
add_action('init', 'lucas_register_post');




// Partie pour mymeta
function add_lucas_post_metabox() {
    add_meta_box(
        'mymeta',
        'Metadonnées :',
        'lucas_post_render_mymeta',
        'lucas_post'
    );
}
add_action( 'add_meta_boxes', 'add_lucas_post_metabox', 10, 1 );

function lucas_post_render_mymeta() {
    $id = get_the_id();
    $value = get_post_meta($id, 'mymeta', true);
    wp_nonce_field( 'lulu_nonce_action', 'lulu_nonce_field' );
    ?>

    <label for="mymeta">My meta</label>
    <input type="text" name="mymeta" id="mymeta" value="<?php echo esc_attr( $value ); ?>" />

    <?php
}

function lucas_post_save_mymeta( $id, $post ) {
    // Vérification des données et autorisations
    if(!isset($_POST['lulu_nonce_field'])) {return;}
    if(!wp_verify_nonce($_POST['lulu_nonce_field'], 'lulu_nonce_action')) {return;}
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return;}
    if(!current_user_can('edit_post', $id)) {return;}
    if(!isset($_POST['mymeta'])) {return;}

    $mymeta = sanitize_text_field( $_POST['mymeta'] );
    update_post_meta( $id, 'mymeta', $mymeta );
}
add_action( 'save_post', 'lucas_post_save_mymeta', 10, 2 );
