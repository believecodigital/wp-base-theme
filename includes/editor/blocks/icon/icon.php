<?php
/**
 * Icon Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}


// block classes
$class_name = 'icon-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align_text'] ) ) {
    $class_name .= ' text-' . $block['align_text'];
}
if ( ! empty( $block['fontSize']) ){
    $class_name .= 'has-' . $block['fontSize'];
}

//symbol classes
$symbol_class_name = "icon-symbol";
if ( ! empty( $block['background'] )){
    $symbol_class_name .= ' has-background has-'.$block['backgroundColor'].'-background-color'; 
}
if ( ! empty( $block['textColor'] )){
    $symbol_class_name .= ' has-text-color has-'.$block['textColor'].'-color'; 
}


$fields = get_fields();

?>


<div class="<?php echo $class_name; ?>" >
  <div class="icon icon-position-<?php echo $fields['position']; ?>">
  
  <?php if( !empty($fields['link']['url']) and  !$is_preview ): ?>
    <a href="<?php echo $fields['link']['url']; ?>" 
       target="<?php echo $fields['link']['target'] ? '_blank' : '_self'; ?>" 
       class="icon-link">
  <?php endif; ?>

    <!-- ICON AFTER / BOTTOM -->
    <?php if( $fields['position'] == 'after' || $fields['position'] == 'bottom'): ?>
        <div class="icon-label"><?php echo $fields['label']; ?></div>
    <?php endif; ?>

    <!-- SYMBOL -->
    <div class="<?php echo $symbol_class_name; ?>" 
      style="font-size: <?php echo $fields['icon_size'].$fields['unit']; ?>">
      <?php if($is_preview and empty($fields['icon'])): ?>
        [choose an icon]
      <?php else: ?>
        <i class="<?php echo $fields['icon']; ?>" 
            <?php if($fields['label']): ?> 
              aria-hidden='true' 
            <?php else: ?>
              aria-label='<?php echo $fields['icon']; ?>' 
            <?php endif; ?> >
        </i>
      <?php endif; ?>
    </div>

    <!-- ICON BEFORE / TOP -->
    <?php if( $fields['position'] == 'before' || $fields['position'] == 'top'): ?>
        <div class="icon-label"><?php echo $fields['label']; ?></div>
    <?php endif; ?>

    <?php if( !empty($fields['link']['url']) and  !$is_preview ): ?>
        </a>
    <?php endif; ?>
  </div>
</div>
