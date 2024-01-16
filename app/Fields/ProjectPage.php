<?php

    namespace App\Fields;

    use Log1x\AcfComposer\Field;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class ProjectPage extends Field
    {
        /**
         * The field group.
         *
         * @return array
         */
        public function fields() {
            $projectPage = new FieldsBuilder('project_page', [
                'title'    => 'Template Logo',
                'position' => 'side',
            ]);

            $projectPage
                ->setLocation('page_template', '==', 'archive-project.blade.php');

            $projectPage
                ->addImage('logo', [
                    'label'   => 'Logo',
                    'wrapper' => [
                        'class' => 'acf-seamless',
                    ],
                ]);

            return $projectPage->build();
        }
    }
