<?php

    namespace App\Options;

    use Log1x\AcfComposer\Options as Field;
    use StoutLogic\AcfBuilder\FieldsBuilder;
    use App\Fields\Partials\Button;

    class General extends Field
    {
        /**
         * The option page menu name.
         *
         * @var string
         */
        public $name = 'General Settings';

        /**
         * The option page document title.
         *
         * @var string
         */
        public $title = 'General Settings';

        /**
         * The option page menu order.
         *
         * @var int
         */
        public $position = 2; // Change this value to the desired menu order

        /**
         * The option page field group.
         *
         * @return array
         */
        public function fields() {
            $general = new FieldsBuilder('settings', [
                'title' => 'General Settings',
            ]);

            $general
                ->addTab('Banner', [
                    'label'     => 'Banner',
                    'placement' => 'left',
                ])
                ->addMessage('main_menu_message', 'message', [
                    'label'   => 'Main Menu',
                    'message' => 'The main menu is automatically generated. To change the main menu links, edit it in Appearance > Menus.',
                    'wrapper' => [
                        'class' => 'acf-seamless',
                    ],
                ])
                ->addImage('banner_logo',
                    [
                        'label'         => 'Banner Logo',
                        'return_format' => 'array',
                        'wrapper'       => [
                            'class' => 'acf-seamless',
                        ],
                    ])
                ->addFields($this->get(Button::class))
                ->addTab('Mobile', [
                    'label'     => 'Mobile',
                    'placement' => 'left',
                ])
                ->addMessage('mobile_message', 'message', [
                    'label'   => 'Mobile Menu',
                    'message' => 'The mobile menu is automatically generated. To change the mobile menu links, edit it in Appearance > Menus.',
                    'wrapper' => [
                        'class' => 'acf-seamless',
                    ],
                ])
                ->addLink('mobile_menu_button', [
                    'label' => 'Mobile Menu Button',
                ])
                ->addTab('Footer', [
                    'label'     => 'Footer',
                    'placement' => 'left',
                ])
                ->addImage('footer_logo', [
                    'label'         => 'Footer Logo',
                    'return_format' => 'array',
                    'wrapper'       => [
                        'width' => '50%', // Set the width to 50%
                        'class' => 'acf-seamless',
                    ],
                ])
                ->addGroup('footer_contact_info', [
                    'label' => 'Business Contact Information',
                ])
                ->addText('phone', [
                    'label' => 'Phone',
                ])
                ->addText('email', [
                    'label' => 'Email',
                ])
                ->addText('address', [
                    'label'   => 'Address',
                    'wrapper' => [
                        'width' => '50%', // Set the width to 50%
                        'class' => 'acf-seamless',
                        'id'    => '',
                    ],
                ])
                ->addText('map_link', [
                    'label'   => 'Map Link',
                    'wrapper' => [
                        'width' => '50%', // Set the width to 50%
                        'class' => 'acf-seamless',
                        'id'    => '',
                    ],
                ])
                ->endGroup()
                ->addRepeater('social_links', [
                    'label'        => 'Social Links',
                    'layout'       => 'block',
                    'button_label' => 'Add Social Link',
                    'sub_fields'   => ['social_icon', 'social_link'],
                ])
                ->addImage('social_icon', [
                    'label'   => 'Social Icon',
                    'wrapper' => [
                        'width' => '50%', // Set the width to 50%
                        'class' => 'acf-seamless',
                        'id'    => '',
                    ],
                ])
                ->addText('social_link', [
                    'label'         => 'Social Link',
                    'return_format' => 'array',
                    'wrapper'       => [
                        'width' => '50%', // Set the width to 50%
                        'class' => 'acf-seamless',
                        'id'    => '',
                    ],
                ])
                ->endRepeater()
                ->addText('subscribe_form_title', [
                    'label' => 'Subscribe Form Title',
                ])
                ->addTextArea('subscribe_form_embed', [
                    'label' => 'Subscribe Embed Code',
                ]);

            return $general->build();
        }
    }
