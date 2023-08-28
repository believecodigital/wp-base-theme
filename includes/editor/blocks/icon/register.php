<?php

namespace Believeco\Editor\Blocks\Icon;

include(__DIR__ . "/acf_fields.php");

function register_block(){
    register_block_type( __DIR__ . "/block.json" );
}
add_action( 'init', 'Believeco\Editor\Blocks\Icon\register_block' );
