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
        public $post_types = ['page', 'service'];

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
        /**
         * Return the offsetData().
         *
         * @return array
         */
        public function offsetData() {
            $offsetData = [
                'title'      => get_field('title'),
                'layout'     => get_field('layout'),
                'content'    => [],
                'logo'       => get_field('spinning_logo'),
                'is_preview' => get_field('is_preview'),
                'button'     => get_field('button'),
            ];

            // Check the layout and populate content accordingly
            if ( $offsetData['layout'] === 'one' ) {
                $offsetData['content'] = get_field('one_column_text');
            } else {
                $offsetData['content'] = [
                    'left_column'  => get_field('left_column'),
                    'right_column' => get_field('right_column'),
                ];
            }

            return $offsetData;
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $offset = new FieldsBuilder('offset');

            $offset
                ->addText('title', ['label' => 'Title'])
                ->addButtonGroup('layout', [
                    'label'   => 'Design',
                    'default' => 'one', // Set default value to 'one
                    'choices' => [
                        'one' => 'One Column Text with Logo',
                        'two' => 'Two Column Text',
                    ],
                ])
                ->addGroup('spinning_logo', [
                    'label'             => 'Spinning Logo',
                    'conditional_logic' => [
                        [
                            'field'    => 'layout',
                            'operator' => '==',
                            'value'    => 'one',
                        ],
                    ],
                ])
                ->addImage('spinning_logo', [
                    'label'             => 'Spinning Logo',
                    'conditional_logic' => [
                        [
                            'field'    => 'layout',
                            'operator' => '==',
                            'value'    => 'one',
                        ],
                    ],
                ])
                ->addImage('stationary_logo', [
                    'label'             => 'Stationary Logo',
                    'conditional_logic' => [
                        [
                            'field'    => 'layout',
                            'operator' => '==',
                            'value'    => 'one',
                        ],
                    ],
                ])
                ->endGroup()
                ->addWysiwyg('one_column_text', [
                    'label'             => 'Column',
                    'media_upload'      => 0,
                    'conditional_logic' => [
                        [
                            'field'    => 'layout',
                            'operator' => '==',
                            'value'    => 'one',
                        ],
                    ],
                ])
                ->addWysiwyg('left_column', [
                    'label'             => 'Left Column',
                    'media_upload'      => 0,
                    'wrapper'           => [
                        'width' => '50%',
                        'class' => 'acf-seamless',
                    ],
                    'conditional_logic' => [
                        [
                            'field'    => 'layout',
                            'operator' => '==',
                            'value'    => 'two',
                        ],
                    ],
                ])
                ->addWysiwyg('right_column', [
                    'label'             => 'Right Column',
                    'media_upload'      => 0,
                    'wrapper'           => [
                        'width' => '50%',
                        'class' => 'acf-seamless',

                    ],
                    'conditional_logic' => [
                        [
                            'field'    => 'layout',
                            'operator' => '==',
                            'value'    => 'two',
                        ],
                    ],
                ])
                ->addLink('button', ['label' => 'Button']);

            return $offset->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {

        }
    }
