wp.domReady(function() {

    //REMOVE most embed variations
    const keepEmbeds = [ 'youtube','vimeo' ];
    wp.blocks.unregisterBlockVariation('core/embed', 'twitter');
    wp.blocks.getBlockVariations('core/embed').forEach( blockVariation => {
        if( !keepEmbeds.includes(blockVariation.name) ) {
            wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name);
        }
    });


    //REMOVE block styles
    // wp.blocks.unregisterBlockStyle('core/button', 'outline');
    // wp.blocks.unregisterBlockStyle('core/button', 'fill');


    //ADD block styles
    wp.blocks.registerBlockStyle('core/spacer', {
        name: 'responsive-xsmall',
        label: 'Extra Small'
    });
    wp.blocks.registerBlockStyle('core/spacer', {
        name: 'responsive-small',
        label: 'Small'
    });
    wp.blocks.registerBlockStyle('core/spacer', {
        name: 'responsive-medium',
        label: 'Medium'
    });
    wp.blocks.registerBlockStyle('core/spacer', {
        name: 'responsive-large',
        label: 'Large'
    });


    //REMOVE all theme blocks
    wp.blocks.getBlockTypes()
        .filter( block => block.category === 'theme' )
        .forEach( block => { wp.blocks.unregisterBlockType(block.name) });


    //REMOVE most widget blocks
    const removeWidgetBlocks = [
        'core/archives',
        'core/calendar',
        'core/latest-posts',
        'core/latest-comments',
        'core/page-list',
        'core/rss',
        'core/search',
        'core/social-link',
        'core/social-links',
        'core/tag-cloud',
    ];
    wp.blocks.getBlockTypes()
        .filter( block => block.category === 'widgets' )
        .forEach( block => { 
            if( removeWidgetBlocks.includes(block.name) ) {
                wp.blocks.unregisterBlockType(block.name) 
            }
        });
});