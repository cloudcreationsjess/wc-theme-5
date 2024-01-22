<?php

    namespace App\Blocks;

    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class FeaturedPosts extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Featured Posts';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Featured Posts block.';

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
                'is_preview'     => get_field('is_preview'),
                'style_settings' => get_field('style_settings'),
                'logo'           => get_field('logo'),
                'title'          => get_field('title'),
                'featured_posts' => get_field('featured_posts'),

            ];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $featuredPosts = new FieldsBuilder('featured_posts');

            $featuredPosts
                ->addButtonGroup('style_settings', [
                    'label'         => 'Decor',
                    'choices'       => [
                        'plain' => 'Plain',
                        'logo'  => 'Logo',
                    ],
                    'default_value' => 'plain',
                    'position'      => 'side',
                ])
                ->addImage('logo', [
                    'label'             => 'Logo',
                    'conditional_logic' => [
                        [
                            'field'    => 'style_settings',
                            'operator' => '==',
                            'value'    => 'logo',
                        ],
                    ],
                ])
                ->addText('title', ['label' => 'Title'])
                ->addPostObject('featured_posts', [
                    'label'         => 'Featured Posts',
                    'instructions'  => 'Pick 3 posts to feature',
                    'required'      => 1,
                    'post_type'     => ['post'],
                    'allow_null'    => 0,
                    'multiple'      => 1,
                    'return_format' => 'object',
                    'ui'            => 1,
                    'min'           => 3,
                    'max'           => 3,
                ]);

            return $featuredPosts->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {

        }
    }
