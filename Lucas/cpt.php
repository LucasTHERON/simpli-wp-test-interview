<?php

//Mon Custom Post Type
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
        'has_archive' => false,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'trackbacks', 'page-attributes', 'post-formats' ),
        'menu_position' => 15,
        'can_export' => true,
        'delete_with_user' => false,
        'query_var' => 'lucas_post',
    );
    register_post_type('lucas_post' , $args );
}
add_action('init', 'lucas_register_post');
