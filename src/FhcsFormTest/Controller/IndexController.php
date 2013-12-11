<?php

namespace FhcsFormTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController {

    protected $formElementManager;

    public function getFormElementManager() {
        return $this->formElementManager;
    }

    public function setFormElementManager($formElementManager) {
        $this->formElementManager = $formElementManager;
    }

    public function indexAction() {
        $form = $this->getFormElementManager()->get('FhcsFormTest\Form\SomeForm');

        $data = array(
            'order' => array(
                'freights' => array(
                    array(
                        'products' => array(
                            array('name' => 'product 1'),
                        ),
                    ),
                    array(
                        'products' => array(
                            array('name' => 'product 2'),
                            array('name' => 'product 3'),
                        ),
                    ),
                    array(
                        'products' => array(
                            array('name' => 'product 4'),
                            array('name' => 'product 5'),
                            array('name' => 'product 6'),
                        ),
                    ),
                ),
            ),
        );

        $form->setData($data);
        $form->isValid();

        // Returns a validated, filtered and hydrated instance of FhcsFormTest\Entity\Order ;)
        var_dump($form->getData());

        return array('form' => $form);
    }
}
