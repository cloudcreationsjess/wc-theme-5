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
         * The option page field group.
         *
         * @return array
         */
        public function fields() {
            $general = new FieldsBuilder('settings');

            $general
                ->addTab('Banner', [
                    'label'             => 'Banner',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => [],
                    'wrapper'           => [
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ],
                    'default_value'     => '',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                    'placement'         => '',
                ])
                ->addImage('banner_logo',
                    [
                        'label'   => 'Banner Logo',
                        'wrapper' => [
                            'width' => '50%', // Set the width to 50%
                            'class' => 'acf-seamless',
                            'id'    => '',
                        ],
                    ])
                ->addFields($this->get(Button::class))
                ->addTab('Footer', [
                    'label' => 'Footer',
                ])
                ->addImage('footer_logo', [
                    'label'   => 'Footer Logo',
                    'wrapper' => [
                        'width' => '50%', // Set the width to 50%
                        'class' => 'acf-seamless',
                        'id'    => '',
                    ],
                ])
                ->addWysiwyg('company_info', [
                    'label'   => 'Company Info',
                    'wrapper' => [
                        'width' => '50%', // Set the width to 50%
                        'class' => 'acf-seamless',
                        'id'    => '',
                    ],
                ])
                ->addRepeater('social_links', [
                    'label'        => 'Social Links',
                    'layout'       => 'block',
                    'button_label' => 'Add Social Link',
                    'sub_fields'   => [
                        [
                            'label'   => 'Social Link',
                            'name'    => 'social_link',
                            'type'    => 'link',
                            'wrapper' => [
                                'width' => '50%', // Set the width to 50%
                                'class' => 'acf-seamless',
                                'id'    => '',
                            ],
                        ],
                        [
                            'label'   => 'Social Icon',
                            'name'    => 'social_icon',
                            'type'    => 'image',
                            'wrapper' => [
                                'width' => '50%', // Set the width to 50%
                                'class' => 'acf-seamless',
                                'id'    => '',
                            ],
                        ],
                    ],
                ]);

            return $general->build();
        }
    }
