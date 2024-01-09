<?php

    namespace App\Fields\Partials;

    use Log1x\AcfComposer\Partial;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class Image extends Partial
    {
        /**
         * The partial field group.
         *
         * @return \StoutLogic\AcfBuilder\FieldsBuilder
         */
        public function fields() {
            $image = new FieldsBuilder('image');

            $image
                ->setLocation('options_page', '==', 'theme-settings');

            $image
                ->addTab('Logos')
                ->addImage('banner_image', ['label' => 'Banner Logo'])
                ->addImage('footer_image', ['label' => 'Footer Logo']);

            return $image;
        }
    }
