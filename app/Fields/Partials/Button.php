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
                ->addButtonGroup('button_type', [
                    'label'   => 'Button Type',
                    'choices' => [
                        'outline' => 'Outline',
                        'primary' => 'Primary',
                    ],
                ])
                ->addLink('button', [
                    'label'         => 'Button',
                    'return_format' => 'array',
                ]);

            return $button;
        }
    }
