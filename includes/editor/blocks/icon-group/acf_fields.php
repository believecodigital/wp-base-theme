<?php
namespace Believeco\Editor\Blocks\IconGroup;

function register_acf_fields(){  
      
    acf_add_local_field_group(array(
        'key' => 'group_icon_group_01',
        'title' => 'Block: Icon Group',
        'fields' => array(
            array(
                "key" => "field_icon_group_02",
                "label" => "Alignment",
                "name" => "alignment",
                "type" => "radio",
                "choices" => array(
                    "horizontal" => "horizontal",
                    "vertical" => "vertical"
                ),
                "default_value" => "horizontal"
            )
        ),
        'location' => array(
            array(
                array(
                    'param'     => 'block',
                    'operator'  => '=',
                    'value'     => 'acf/icon-group'
                )
            )
        )
    ));
}

add_action('acf/init', 'Believeco\Editor\Blocks\IconGroup\register_acf_fields');