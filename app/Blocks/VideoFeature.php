<?php

    namespace App\Blocks;

    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class VideoFeature extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Video Feature';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Video block with a title and video embed';

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
                'is_preview' => get_field('is_preview'),
                'title'      => get_field('title'),
            ];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $videoFeature = new FieldsBuilder('videoFeature');

            $videoFeature
                ->addText('title', [
                    'label' => 'Title',
                ])
                ->addMessage('message', 'message', [
                    'label'   => 'Instructions',
                    'message' => 'To add a video, go to block preview mode and add an inner block',

                ]);

            return $videoFeature->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {
            wp_enqueue_style(
                'video-feature',
                get_template_directory_uri() . '/resources/styles/blocks/video-feature.scss', // Adjust the path to your compiled CSS file

            );
        }
    }
