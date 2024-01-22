<?php

    namespace App\Blocks;

    use App\Fields\Partials\Button;
    use App\Fields\Partials\Logo;
    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class ProcessList extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Process List';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Process List block.';

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
        public $styles = [

        ];

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
                'block_data' => $this->blockData(),
            ];
        }

        /**
         * Return the blockData().
         *
         * @return array
         */
        public function blockData() {
            return [
                'is_preview'   => get_field('is_preview'),
                'title'        => get_field('title'),
                'process_list' => get_field('process_list'),
                'button'       => get_field('button'),
                'button_type'  => get_field('button_type'),
                'logo'         => get_field('logo'),
            ];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $processList = new FieldsBuilder('process_list');

            $processList
                ->addText('title', [
                    'label' => 'Title',
                ])
                ->addFields($this->get(Button::class))
                ->addFields($this->get(Logo::class))
                ->addRepeater('process_list', [
                    'label'        => 'Process List',
                    'layout'       => 'block',
                    'button_label' => 'Add Process',
                ])
                ->addText('title', ['label' => 'Title'])
                ->addWysiwyg('description', ['label' => 'Description'])
                ->endRepeater();

            return $processList->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {

        }
    }
