<?php

    namespace App\Fields\Partials;

    use Log1x\AcfComposer\Partial;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Logo extends Partial
    {
        /**
         * The partial field group.
         *
         * @return \StoutLogic\AcfBuilder\FieldsBuilder
         */
        public function fields() {
            $logo = new FieldsBuilder('logo');

            $logo
                ->addImage('logo', [
                    'label'         => 'Logo',
                    'return_format' => 'array',
                    'preview_size'  => 'thumbnail',
                    'library'       => 'all',
                ]);

            return $logo;
        }
    }
