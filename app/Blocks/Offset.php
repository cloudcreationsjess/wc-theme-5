<?php

    namespace App\Blocks;

    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Offset extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Offset Content';

        /**
         * The block slug.
         *
         * @var string
         */
        public $slug = 'offset';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'Content offset to the right';

        /**
         * The block category.
         *
         * @var string
         */
        public $category = 'white-canvas';

        /**
         * The block icon.
         *
         * @var string|array
         */
        public $icon = 'star-filled';

        /**
         * The block keywords.
         *
         * @var array
         */
        public $keywords = [];

        /**
         * The block post type allow list.
         *
         * @var array
         */
        public $post_types = ['page'];

        /**
         * The parent block type allow list.
         *
         * @var array
         */
        public $parent = [];

        /**
         * The default block mode.
         *
         * @var string
         */
        public $mode = 'edit';

        /**
         * The default block alignment.
         *
         * @var string
         */
        public $align = '';

        /**
         * The default block text alignment.
         *
         * @var string
         */
        public $align_text = '';

        /**
         * The default block content alignment.
         *
         * @var string
         */
        public $align_content = '';

        /**
         * The supported block features.
         *
         * @var array
         */
        public $supports = [
            'align'         => false,
            'align_text'    => false,
            'align_content' => false,
            'full_height'   => false,
            'anchor'        => false,
            'mode'          => true,
            'multiple'      => true,
            'jsx'           => true,
        ];

        /**
         * The block styles.
         *
         * @var array
         */
        public $styles = [];

        /**
         * The block preview example data.
         *
         * @var array
         */
        public $example = [
            'is_preview' => true,
        ];

        /**
         * Data to be passed to the block before rendering.
         *
         * @return array
         */
        public function with() {
            return [
                'offset_data' => $this->offsetData(),
            ];
        }

        /**
         * Return the offsetData().
         *
         * @return array
         */
        public function offsetData() {
            return [
                'logo'       => get_field('logo'),
                'title'      => get_field('title'),
                'content'    => get_field('content'),
                'button'     => get_field('button'),
                'is_preview' => get_field('is_preview'),
            ];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $offset = new FieldsBuilder('offset');

            $offset
                ->addImage('logo', ['label' => 'Logo'])
                ->addText('title', ['label' => 'Title'])
                ->addWysiwyg('content', ['label' => 'Content'])
                ->addLink('button', ['label' => 'Button']);

            return $offset->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {
            wp_enqueue_style(
                'example-block',
                get_template_directory_uri() . '/resources/styles/blocks/offset-content.scss', // Adjust the path to your compiled CSS file

            );
        }
    }
