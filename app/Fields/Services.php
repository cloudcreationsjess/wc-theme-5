<?php

    namespace App\Fields;

    use Log1x\AcfComposer\Field;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Services extends Field
    {
        /**
         * The field group.
         *
         * @return array
         */
        public function fields() {
            $services = new FieldsBuilder('services', ['title' => 'Details', 'position' => 'side', 'order' => 1]);

            $services
                ->setLocation('post_type', '==', 'service');

            $services
                ->addTextarea('excerpt', [
                    'label'        => 'Excerpt',
                    'instructions' => 'Add a short description of the service, this shows on services slider block.',
                    'rows'         => 5,
                ]);

            return $services->build();
        }
    }
