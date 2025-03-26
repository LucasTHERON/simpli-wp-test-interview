<?php
/*
Plugin Name: simpli-wp-test-interview
Description: TEST
Author: Simplifia
Version: 1.0
*/

namespace SimpliCeremonyStreamingPlugin;
use \SimpliCeremonyStreamingPlugin\Models\Singleton;

include_once plugin_dir_path(__FILE__).'/Autoloader.php';
include_once plugin_dir_path(__FILE__).'/Models/Singleton.php';

class SimpliCeremonyStreamingPlugin extends Singleton
{

    public function __construct()
    {
        include_once plugin_dir_path( __FILE__ ).'/CeremonyStreaming.php';
        new CeremonyStreamingPlugin();
        register_block_type(plugin_dir_path( __FILE__ ) . '/build/demo');
    }

}
Autoloader::register();
\SimpliCeremonyStreamingPlugin\SimpliCeremonyStreamingPlugin::GetInstance();

/*
*
* Mon code ira dans le dossier "Lucas"
*
*/

include_once plugin_dir_path( __FILE__ ).'/Lucas/lucas.php';


function add_lucas_form_page() {
    include_once plugin_dir_path( __FILE__ ).'/Lucas/activation.php';
}

function remove_lucas_form_page() {
    include_once plugin_dir_path( __FILE__ ).'/Lucas/deactivation.php';
}


register_activation_hook(__FILE__, 'add_lucas_form_page' );
register_deactivation_hook(__FILE__, 'remove_lucas_form_page' );