<?php

    namespace App\Fields;

    use Log1x\AcfComposer\Field;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class TeamMember extends Field
    {
        /**
         * The field group.
         *
         * @return array
         */
        public function fields() {
            $teamMember = new FieldsBuilder('team_member');

            $teamMember
                ->setLocation('post_type', '==', 'team_member');

            $teamMember
                ->addText('first_name', [
                    'label'   => 'First Name',
                    'wrapper' => [
                        'class' => 'acf-seamless',
                    ],
                ])
                ->addText('last_name', [
                    'label'   => 'Last Name',
                    'wrapper' => [
                        'class' => 'acf-seamless',
                    ],
                ])
                ->addText('job_title', [
                    'label'   => 'Job Title',
                    'wrapper' => [
                        'class' => 'acf-seamless',
                    ],
                ])
                ->addImage('photo', [
                    'label'   => 'Photo',
                    'wrapper' => [
                        'class' => 'acf-seamless',
                    ],
                ])
                ->addWysiwyg('bio', [
                    'label'        => 'Bio',
                    'media_upload' => 0,
                    'wrapper'      => [
                        'class' => 'acf-seamless',
                    ],
                ])
                ->addText('social_link', [
                    'label'   => 'Social Link',
                    'wrapper' => [
                        'class' => 'acf-seamless',
                    ],
                ]);

            return $teamMember->build();
        }
    }
