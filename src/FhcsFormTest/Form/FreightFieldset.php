<?php

namespace FhcsFormTest\Form;

use Zend\Form\Fieldset;

class FreightFieldset extends Fieldset {

    public function init(){
        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'products',
            'options' => array(
                'target_element' => array(
                    'type'     => 'FhcsFormTest\Form\ProductFieldset',
                    'hydrator' => 'DoctrineModule\Stdlib\Hydrator\DoctrineObject',
                    'object'   => 'FhcsFormTest\Entity\Product',
                )
            )
        ));
    }
}
