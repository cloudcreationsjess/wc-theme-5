<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\ListItems;

class Example extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $example = new FieldsBuilder('example');

        $example
            ->setLocation('post_type', '==', 'post');

        $example
            ->addFields($this->get(ListItems::class));

        return $example->build();
    }
}
