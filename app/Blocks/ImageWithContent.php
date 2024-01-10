<?php

    namespace App\Blocks;

    use App\Fields\Partials\AccordionItem;
    use App\Fields\Partials\Content;
    use App\Fields\Partials\Title;
    use App\Fields\Partials\Button;
    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class ImageWithContent extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Image With Content';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Image With Content block.';

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
            'color'         => [
                'background' => true,
                'text'       => false,
            ],
            'jsx'           => true,
        ];

        /**
         * The block styles.
         *
         * @var array
         */
        public $styles = [
            [
                'name'      => 'right',
                'label'     => 'Image Right',
                'isDefault' => true,
            ],
            [
                'name'  => 'left',
                'label' => 'Image Left',
            ],
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
                'image_block_data' => $this->imageBlockData(),
            ];
        }

        /**
         * Return the blockData().
         *
         * @return array
         */
        public function imageBlockData() {
            $imageBlockData = [
                'is_preview'     => get_field('is_preview'),
                'image'          => get_field('image'),
                'style_settings' => get_field('style_settings'),
                'content_items'  => [],
            ];

            if ( have_rows('flexible_content_field') ) {
                while ( have_rows('flexible_content_field') ) {
                    the_row();

                    $layoutType = get_row_layout();
                    $itemData = ['layout' => $layoutType];

                    switch ( $layoutType ) {
                        case 'title':
                            $itemData['title'] = get_sub_field('text');
                            break;
                        case 'content':
                            $itemData['content'] = get_sub_field('content');
                            break;
                        case 'accordion_item':
                            $itemData['accordion_items'] = get_sub_field('accordion_items');
                            break;
                        case 'button':
                            $itemData['button'] = [
                                'button_type' => get_sub_field('button_type'),
                                'button'      => get_sub_field('button'),
                            ];
                            break;
                    }

                    $imageBlockData['content_items'][] = $itemData;
                }
            }

            return $imageBlockData;
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {

            // Parent Field
            $imageWithContent = new FieldsBuilder('image_with_content');

            // Sub Field
            $title = $this->get(Title::class);
            $content = $this->get(Content::class);
            $accordion = $this->get(AccordionItem::class);
            $button = $this->get(Button::class);

            // Build Layout
            $imageWithContent
                ->addButtonGroup('style_settings', [
                    'label'         => 'Decor',
                    'choices'       => [
                        'plain' => 'Plain',
                        'line'  => 'Line',
                    ],
                    'default_value' => 'plain',
                    'position'      => 'side',
                ])
                ->addImage('image', [
                    'label'   => 'Image',
                    'wrapper' => ['width' => '50%'],
                ])
                ->addFlexibleContent('flexible_content_field', [
                    'button_label' => 'Add Content',
                    'wrapper'      => ['width' => '50%'],
                ])
                ->addLayout($title, [
                    'label'   => 'Title',
                    'display' => 'block',
                ])
                ->addLayout($content, [
                    'label'   => 'Content',
                    'display' => 'block',
                ])
                ->addLayout($accordion, [
                    'label'   => 'Accordion',
                    'display' => 'block',
                ])
                ->addLayout($button, [
                    'label'   => 'Button',
                    'display' => 'block',
                ])
                ->endFlexibleContent();

            return $imageWithContent->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {
            wp_enqueue_style(
                'image-content',
                get_template_directory_uri() . '/resources/styles/blocks/image-with-content.scss', // Adjust the path to your compiled CSS file

            );
        }
    }
