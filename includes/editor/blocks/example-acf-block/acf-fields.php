<?php
namespace Believeco\Editor\Blocks\Example;

add_action('acf/init', 'Believeco\Editor\Blocks\Example\register_acf_fields');

function register_acf_fields(){

    acf_add_local_field_group(array(
        'key' => 'group_01_example_block',  //Unique identifier for field group. Must begin with 'group_'
        'title' => 'Block: Example Block',
        'fields' => array(
            array(
                "key" => "field_example_name", // Unique identifier for the field. Must begin with 'field_'
                "label" => "Name",
                "name"  => "name", // Used to save and load data. Single word, no spaces. Underscores and dashes allowed 
                "type"  => "text"
            ),
            array(
                "key" => "field_example_is_neutered", 
                "label" => "Is this dog spayed or neutered?", 
                "name" => "is_neutered", 
                "type" => "true_false",
                "message" => "Yes"
            ),
            array(
                "key" => "field_example_age",
                "label" => "Age",
                "name"  => "age",
                "type"  => "number",
                "min"   => 0,
            ),
            array(
                "key" => "field_example_breed", 
                "label" => "Breed",
                "name"  => "breed",
                "type"  => "text"
            )
        ),
        'location' => array(
            array(
                array(
                    'param'     => 'block',
                    'operator'  => '=',
                    'value'     => 'acf/example-afc-block' // match name in block.json
                )
            )
        )
    ));

}

