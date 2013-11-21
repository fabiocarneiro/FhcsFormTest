<?php

namespace FhcsFormTest\Form;

use Zend\Form\Fieldset;
use FhcsFormTest\Entity\Freight;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class FreightFieldset extends Fieldset {

    protected $entityManager;

    public function getEntityManager() {
        return $this->entityManager;
    }

    public function setEntityManager($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function init(){
        $this->setHydrator(new DoctrineHydrator($this->getEntityManager()));

        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'products',
            'options' => array(
                'target_element' => array(
                    'type' => 'FhcsFormTest\Form\ProductFieldset'
                )
            )
        ));
        $this->get('products')->setHydrator(new DoctrineHydrator($this->getEntityManager()));
    }
}