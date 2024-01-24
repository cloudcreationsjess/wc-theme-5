<?php

    namespace App\Blocks;

    use Log1x\AcfComposer\Block;
    use Roots\Acorn\Application;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Hero extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Hero';

        /**
         * The block slug.
         *
         * @var string
         */
        public $slug = 'hero';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Hero block with background image, title, and subheading.';

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
        public $styles = [];

        /**
         * The block preview example data.
         *
         * @var array
         */
        public $example = [
            'title'      => 'Example Title',
            'subheading' => 'Example Subheading',
            'is_preview' => true,
        ];

        /**
         * Data to be passed to the block before rendering.
         *
         * @return array
         */
        public function with() {

            return [
                'hero_data' => $this->heroData(),
            ];
        }

        /**
         * Return the Hero data.
         *
         * @return array
         */
        public function heroData() {
            return [
                'background_image' => [
                    'desktop' => get_field('background_image')['desktop_background_image'],
                    'mobile'  => get_field('background_image')['mobile_background_image'],
                ],
                'title'            => get_field('title'),
                'subheading'       => get_field('subheading'),
                'is_preview'       => get_field('is_preview'),
            ];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $hero = new FieldsBuilder('hero');

            $hero
                ->addGroup('background_image', ['label' => 'Background Image'])
                ->addImage('desktop_background_image', ['label' => 'Desktop'])
                ->addImage('mobile_background_image', ['label' => 'Mobile'])
                ->endGroup()
                ->addText('title', ['label' => 'Title'])
                ->addTextarea('subheading', ['label' => 'Subheading']);

            return $hero->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {

        }
    }
