<?php

    namespace App\Fields\Partials;

    use Log1x\AcfComposer\Partial;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class FlexibleContent extends Partial
    {
        /**
         * The partial field group.
         *
         * @return \StoutLogic\AcfBuilder\FieldsBuilder
         */
        public function fields() {
            $flexibleContent = new FieldsBuilder('flexible_content');

            $title = $this->get(Title::class);
            $content = $this->get(Content::class);

            $flexibleContent->addFlexibleContent('flexible_content', [
                'button_label' => 'Add Content',
                'wrapper'      => ['width' => '50%'],
            ])->addLayout($title, [
                'label'   => 'Title',
                'display' => 'block',
            ])->addLayout($content, [
                'label'   => 'Content',
                'display' => 'block',
            ]);

            return $flexibleContent;
        }
    }
