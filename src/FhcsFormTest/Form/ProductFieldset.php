<?php

namespace FhcsFormTest\Form;

use Zend\Form\Fieldset;
use FhcsFormTest\Entity\Product;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class ProductFieldset extends Fieldset {
    
    protected $entityManager;
    
    public function getEntityManager() {
        return $this->entityManager;
    }

    public function setEntityManager($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function init() {
        
        $this->setHydrator(new DoctrineHydrator($this->getEntityManager(), 'FhcsFormTest\Entity\Product'))->setObject(new Product());
        
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