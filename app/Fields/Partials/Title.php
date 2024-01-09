<?php

    namespace App\Fields\Partials;

    use Log1x\AcfComposer\Partial;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Title extends Partial
    {
        /**
         * The partial field group.
         *
         * @return \StoutLogic\AcfBuilder\FieldsBuilder
         */
        public function fields() {
            $title = new FieldsBuilder('title');

            $title
                ->addText('text', [
                    'label' => 'Title',
                ]);

            return $title;
        }
    }
