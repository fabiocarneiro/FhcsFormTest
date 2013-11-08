<?php

namespace FhcsFormTest\Form;

use Zend\Form\Form;

class SomeForm extends Form {
    
    public function init(){
        
        $this->add(array(
            'type' => 'FhcsFormTest\Form\OrderFieldset',
            'name' => 'order',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));
        
    }
}