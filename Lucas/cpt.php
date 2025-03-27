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
    update_post_meta( $id, 'from_user', false );
}
add_action( 'save_post', 'lucas_post_save_mymeta', 10, 2 );



// Partie pour les couleurs
function add_lucas_post_color_metabox() {
    add_meta_box(
        'colors',
        'Couleurs :',
        'lucas_post_render_colors',
        'lucas_post'
    );
}
add_action( 'add_meta_boxes', 'add_lucas_post_color_metabox', 10, 1 );

function lucas_post_render_colors() {
    $id = get_the_id();
    $bg_value = get_post_meta($id, 'colorbg', true);
    $border_value = get_post_meta($id, 'colorborder', true);
    var_dump($bg_value);
    if(empty($bg_value) || !isset($bg_value)){
        $bg_value = '#d2e0f1';
    }
    if(empty($border_value) || !isset($border_value)){
        $border_value = '#5881b3';
    }
    wp_nonce_field( 'lulu_nonce_action_colors', 'lulu_nonce_field_colors' );
    ?>

    <label for="colorbg">Couleur de fond</label>
    <input type="color" name="colorbg" id="colorbg" value="<?php echo esc_attr( $bg_value ); ?>" />

    <label for="colorborder">Couleur de la bordure</label>
    <input type="color" name="colorborder" id="colorborder" value="<?php echo esc_attr( $border_value ); ?>" />

    <?php
}

function lucas_post_save_colors( $id, $post ) {
    // Vérification des données et autorisations
    if(!isset($_POST['lulu_nonce_field_colors'])) {return;}
    if(!wp_verify_nonce($_POST['lulu_nonce_field_colors'], 'lulu_nonce_action_colors')) {return;}
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return;}
    if(!current_user_can('edit_post', $id)) {return;}
    if(!isset($_POST['colorbg']) && !isset($_POST['colorborder'])) {return;}

    $colorbg = sanitize_text_field( $_POST['colorbg'] );
    $colorborder = sanitize_text_field( $_POST['colorborder'] );
    update_post_meta( $id, 'colorbg', $colorbg );
    update_post_meta( $id, 'colorborder', $colorborder );
}
add_action( 'save_post', 'lucas_post_save_colors', 10, 2 );
