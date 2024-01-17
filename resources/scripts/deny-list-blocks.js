import 'lodash';

wp.domReady(function () {
  const allowedEmbedBlocks = ['vimeo', 'youtube'];
  wp.blocks.getBlockVariations('core/embed').forEach(function (blockVariation) {
    if (-1 === allowedEmbedBlocks.indexOf(blockVariation.name)) {
      wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name);
    }
  });

  wp.hooks.addFilter(
    'blocks.registerBlockType',
    'sage/sage-blocks',
    function (settings, name) {
      let supported_blocks = ['core/list'];
      if (supported_blocks.includes(name)) {
        return lodash.assign({}, settings, {
          supports: lodash.assign({}, settings.supports, {
            // allow support for full and wide alignment.
            align: ['center'],
          }),
        });
      }
      return settings;
    },
  );
});
