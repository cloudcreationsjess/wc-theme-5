<?php

    namespace App\Fields\Partials;

    use Log1x\AcfComposer\Partial;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Content extends Partial
    {
        /**
         * The partial field group.
         *
         * @return \StoutLogic\AcfBuilder\FieldsBuilder
         */
        public function fields() {
            $content = new FieldsBuilder('content');

            $content
                ->addWysiwyg('content', [
                    'label'        => 'Content',
                    'media_upload' => 0,
                ]);

            return $content;
        }
    }
