<?php

    namespace App\Fields;

    use Log1x\AcfComposer\Field;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Project extends Field
    {
        /**
         * The field group.
         *
         * @return array
         */
        public function fields() {
            $project = new FieldsBuilder('project', [
                'title'    => 'Services Used',
                'position' => 'side',
            ]);

            $project
                ->setLocation('post_type', '==', 'project');

            $project
                ->addRelationship('services_relationship', [
                    'label'         => 'Services Used',
                    'post_type'     => ['service'],
                    'filters'       => [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'service',
                        ],
                    ],
                    'return_format' => 'post_object',
                ]);

            return $project->build();
        }
    }
