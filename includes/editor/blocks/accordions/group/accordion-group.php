<?php 

$allowed_blocks = array("acf/accordion");
$template = array(
    array('acf/accordion')
);

$autoclose = get_field("autoclose");

?>

<div class="accordion-group-block <?php if($autoclose){ echo 'autoclose-accordions' ;} ?>">
    <InnerBlocks 
        allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>"
        template="<?php echo esc_attr(wp_json_encode( $template )); ?>"
    />
</div>