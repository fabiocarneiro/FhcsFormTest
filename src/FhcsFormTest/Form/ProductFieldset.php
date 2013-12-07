<?php

namespace FhcsFormTest\Form;

use Zend\Form\Fieldset;

class ProductFieldset extends Fieldset {
    public function init() {
        $this->add(array(
            'type' => 'text',
            'name' => 'id',
            'options' => array(
                'label' => 'id'
            )
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'name',
            'options' => array(
                'label' => 'Name'
            )
        ));

    }

}
