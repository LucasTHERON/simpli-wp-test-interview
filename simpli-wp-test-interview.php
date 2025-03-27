<?php
/*
Plugin Name: simpli-wp-test-interview
Description: TEST
Author: Lucas THERON
Version: 1.1
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
        register_block_type(plugin_dir_path( __FILE__ ) . '/build/block-lucas');
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
