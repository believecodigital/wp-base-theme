<?php
namespace Believeco\Editor\Blocks\Accordion;

function register_acf_fields(){

    // Accordion Group 
    acf_add_local_field_group(array(
        'key' => 'group_01_accordion_grp',
        'title' => 'Block: Accordion Group',
        'fields' => array(
            array(
                "key" => "field_accordion_grp_close",
                "label" => "Close other accordions on open?",
                "name" => "autoclose",
                "type" => "true_false",
                "message" => "Yes"
            )
        ),
        'location' => array(
            array(
                array(
                    'param'     => 'block',
                    'operator'  => '=',
                    'value'     => 'acf/accordion-group'
                )
            )
        )
    ));

    // Single Accordion
    acf_add_local_field_group(array(
        'key' => 'group_accordion_01',
        'title' => 'Block: Accordion',
        'fields' => array(
            array(
                "key" => "field_accordion_summary",
                "label" => "Summary",
                "name" => "summary",
                "type" => "text"
            )
        ),
        'location' => array(
            array(
                array(
                    'param'     => 'block',
                    'operator'  => '=',
                    'value'     => 'acf/accordion'
                )
            )
        )
    ));
}

add_action('acf/init', 'Believeco\Editor\Blocks\Accordion\register_acf_fields');