<?php

/*
*
* CONFIGURATION
*
*/

/* Xréation et insertion de la page backend */
function lucas_menu() {
    add_menu_page(
        'Ajout de CPT par Lucas',
        'CPT par Lucas',
        'manage_options', 
        'cpt_lucas',
        'lucas_view',
        15
    );
}
add_action('admin_menu', 'lucas_menu');

function lucas_view(){
    echo '<h1>Hello plugin</h1>';
}
