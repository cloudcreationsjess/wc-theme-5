<?php

    namespace App\Blocks;

    use App\Fields\Partials\Button;
    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class CallToAction extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Call To Action';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Call To Action block.';

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
            'color'         => [
                'background' => true,
                'text'       => false,
            ],
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
                'is_preview'       => get_field('is_preview'),
                'background_type'  => get_field('background_choose'),
                'background_image' => get_field('background_image'),
                'title'            => get_field('title'),
                'button'           => get_field('button'),
                'subtext'          => get_field('subtext'),
            ];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $callToAction = new FieldsBuilder('call_to_action');

            $callToAction
                ->addButtonGroup('background_choose', [
                    'label'         => 'Background',
                    'choices'       => [
                        'image'  => 'Image',
                        'colour' => 'Colour',
                    ],
                    'default_value' => '',
                    'layout'        => 'horizontal',
                    'return_format' => 'value',
                ])
                ->addImage('background_image', [
                    'label'             => 'Background Image',
                    'conditional_logic' => [
                        [
                            'field'    => 'background_choose',
                            'operator' => '==',
                            'value'    => 'image',
                        ],
                    ],
                ])
                ->addTextArea('title', [
                    'label'     => 'Title',
                    'new_lines' => 'br',
                ])
                ->addFields($this->get(Button::class))
                ->addText('subtext', ['label' => 'Subtext']);

            return $callToAction->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {

        }
    }
