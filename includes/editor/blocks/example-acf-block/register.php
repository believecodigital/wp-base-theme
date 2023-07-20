<?php
namespace Believeco\Editor\Blocks\Example;
include(__DIR__ . "/acf-fields.php");

function register_block(){
    register_block_type( __DIR__ . "/block.json");
}
add_action( 'init', 'Believeco\Editor\Blocks\Example\register_block' );