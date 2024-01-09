<?php

    namespace App\Blocks;

    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Example extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Example';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Example block.';

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
        public $post_types = [];

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
        public $mode = 'preview';

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
            'align'         => true,
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
        public $styles = [

        ];

        /**
         * The block preview example data.
         *
         * @var array
         */
        public $example = [
            'items' => [
                ['item' => 'Item one'],
                ['item' => 'Item two'],
                ['item' => 'Item three'],
            ],
        ];

        /**
         * Data to be passed to the block before rendering.
         *
         * @return array
         */
        public function with() {
            return [
                'items' => $this->items(),
            ];
        }

        /**
         * Return the items field.
         *
         * @return array
         */
        public function items() {
            return get_field('items') ?: $this->example['items'];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $example = new FieldsBuilder('example');

            $example
                ->addRepeater('items')
                ->addText('item')
                ->endRepeater();

            return $example->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {
            wp_enqueue_style(
                'example-block',
                get_template_directory_uri() . '/resources/styles/blocks/example.scss', // Adjust the path to your compiled CSS file

            );
        }
    }
