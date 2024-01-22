<?php

    namespace App\Blocks;

    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class ContactBlock extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Contact Block';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Contact Block block.';

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
                'is_preview'       => get_field('is_preview'),
                'title'            => get_field('title'),
                'subtitle'         => get_field('subtitle'),
                'background_image' => get_field('background_image'),
                'contact_info'     => $this->getContactInfo(),
                'contact_form'     => $this->getContactForm(),
            ];
        }

        /**
         * Helper function to get contact info.
         *
         * @return array
         */
        private function getContactInfo() {
            return [
                'phone'   => get_field('contact_info')['phone'],
                'email'   => get_field('contact_info')['email'],
                'address' => get_field('contact_info')['address'],
                'map'     => get_field('contact_info')['google_map'],
            ];
        }

        /**
         * Helper function to get contact form data.
         *
         * @return array
         */
        private function getContactForm() {
            return [
                'form_title'     => get_field('contact_form')['form_title'],
                'form_shortcode' => get_field('contact_form')['form_shortcode'],
            ];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $contactBlock = new FieldsBuilder('contact_block');

            $contactBlock
                ->addText('title', ['label' => 'Title'])
                ->addText('subtitle', ['label' => 'Subtitle'])
                ->addImage('background_image', ['label' => 'Background Image'])
                ->addGroup('contact_info', ['label' => 'Contact Info'])
                ->addText('phone', ['label' => 'Phone'])
                ->addText('email', ['label' => 'Email'])
                ->addText('address', [
                    'label'   => 'Address',
                    'wrapper' => ['width' => '50%'],
                ])
                ->addText('google_map', [
                    'label'   => 'Link to Google Map',
                    'wrapper' => ['width' => '50%'],
                ])
                ->endGroup()
                ->addGroup('contact_form', ['label' => 'Contact Form'])
                ->addText('form_title', ['label' => 'Form Title'])
                ->addText('form_shortcode', ['label' => 'Form ShortCode'])
                ->endGroup();

            return $contactBlock->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {

        }
    }
