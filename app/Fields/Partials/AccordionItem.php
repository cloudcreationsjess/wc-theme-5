<?php

    namespace App\Fields\Partials;

    use Log1x\AcfComposer\Partial;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class AccordionItem extends Partial
    {
        /**
         * The partial field group.
         *
         * @return \StoutLogic\AcfBuilder\FieldsBuilder
         */
        public function fields() {
            $accordionItem = new FieldsBuilder('accordion_item');

            $accordionItem
                ->addRepeater('accordion_items', [
                    'label'  => 'Accordion Items',
                    'layout' => 'block',
                ])
                ->addText('accordion_title')
                ->addText('accordion_content')
                ->endRepeater();

            return $accordionItem;
        }
    }
