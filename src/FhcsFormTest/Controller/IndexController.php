<?php

namespace FhcsFormTest\Controller;

use FhcsFormTest\Entity\Freight;
use FhcsFormTest\Entity\Order;
use FhcsFormTest\Entity\Product;
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

        $freight1 = new Freight;
        $freight2 = new Freight;
        $freight3 = new Freight;

        $freight1->addProduct(new Product('Product 1'));

        $freight2->addProduct(new Product('Product 2'));
        $freight2->addProduct(new Product('Product 3'));

        $freight3->addProduct(new Product('Product 4'));
        $freight3->addProduct(new Product('Product 5'));
        $freight3->addProduct(new Product('Product 6'));

        $order = new Order;

        $order->addFreight($freight1);
        $order->addFreight($freight2);
        $order->addFreight($freight3);

        $form->bind($order);

        return array('form' => $form);
    }
}
