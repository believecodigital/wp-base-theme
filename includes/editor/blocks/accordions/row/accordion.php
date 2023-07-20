<?php 
$summary = get_field('summary') ? get_field('summary') : "Accordion Title";
?>

<details class="accordion-block">
    <summary><?php echo $summary; ?></summary>
    <div class="accordion-block__inner">
    <InnerBlocks/>
    </div>
</details>