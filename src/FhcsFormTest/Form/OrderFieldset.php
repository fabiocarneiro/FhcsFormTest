<?php

namespace FhcsFormTest\Form;

use Zend\Form\Fieldset;

class OrderFieldset extends Fieldset {

    public function init(){
        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'freights',
            'options' => array(
                'target_element' => array(
                    'type'     => 'FhcsFormTest\Form\FreightFieldset',
                    'hydrator' => 'DoctrineModule\Stdlib\Hydrator\DoctrineObject',
                    'object'   => 'FhcsFormTest\Entity\Freight',
                )
            )
        ));
    }
}
