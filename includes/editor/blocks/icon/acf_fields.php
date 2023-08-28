<?php
namespace Believeco\Editor\Blocks\Icon;

function register_acf_fields(){  
      
    acf_add_local_field_group(array(
        'key' => 'group_icon_01',
        'title' => 'Block: Icon',
        'fields' => array(
            array(
                "key" => "field_icon_text_01",
                "label" => "Text (optional)",
                "name" => "label",
                "type" => "text"
            ),
            array(
                "key" => "field_icon_01",
                "label" => "Icon",
                "name" => "icon",
                "type" => "font-awesome",
                "required" => 1,
                "icon_sets" => [
                    "fas",
                    "fab"
                ],
                "save_format" => "class",
                "show_preview" => 1
            ),
            array(
                "key" => "field_icon_size_01",
                "label" => "Icon size",
                "name" => "icon_size",
                "type" => "number",
                "required" => 1,
                "wrapper" => array( "width" => "65" ),
                "default_value" => 1
            ),
            array(
                "key" => "field_icon_size_unit_01",
                "label" => "Unit",
                "name" => "unit",
                "type" => "select",
                "choices" => array(
                    "em" => "em",
                    "rem" => "rem",
                    "px" => "px"
                ),
                "return_format" => "value"
            ),
            array(
                "key" => "field_icon_position_01",
                "label" => "Position",
                "name" => "position",
                "type" => "radio",
                "choices" => array(
                    "before" => "Before",
                    "after" => "After",
                    "top" => "Top",
                    "bottom" => "Bottom"
                ),
                "layout" => "vertical",
                "return_format" => "value"
            ),
            array(
                "key" => "field_icon_link_01",
                "label" => "Link (optional)",
                "name" => "link",
                "type" => "group",
                "layout" => "block",
                "sub_fields" => array(
                    array(
                        "key" => "field_icon_link_url_01",
                        "label" => "URL",
                        "name" => "url",
                        "type" => "url"
                    ),
                    array(
                        "key" => "field_icon_link_target_01",
                        "label" => "Open link in new tab?",
                        "name" => "target",
                        "type" => "true_false",
                        "message" => "Yes"
                    )
                )
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'     => 'block',
                    'operator'  => '=',
                    'value'     => 'acf/icon'
                )
            )
        )
    ));
}

add_action('acf/init', 'Believeco\Editor\Blocks\Icon\register_acf_fields');
