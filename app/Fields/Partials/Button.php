<?php

    namespace App\Fields\Partials;

    use Log1x\AcfComposer\Partial;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Button extends Partial
    {
        /**
         * The partial field group.
         *
         * @return \StoutLogic\AcfBuilder\FieldsBuilder
         */
        public function fields() {
            $button = new FieldsBuilder('button');

            $button
                ->addLink('button', [
                    'label'             => 'Button',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => [],
                    'wrapper'           => [
                        'width' => '',
                        'class' => 'acf-seamless',
                        'id'    => '',
                    ],
                    'return_format'     => 'array',
                ]);

            return $button;
        }
    }
