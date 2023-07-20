<?php
namespace Believeco\Editor\Blocks\Accordion;
include(__DIR__ . "/acf_fields.php");

function register_block(){
    register_block_type( __DIR__ . "/group/block.json");
    register_block_type( __DIR__ . "/row/block.json");
}
add_action( 'init', 'Believeco\Editor\Blocks\Accordion\register_block' );