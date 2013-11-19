<?php

namespace FhcsFormTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use FhcsFormTest\Entity\Order;
use FhcsFormTest\Entity\Freight;
use FhcsFormTest\Entity\Product;

class IndexController extends AbstractActionController {
    
    protected $formElementManager;
    
    public function getFormElementManager() {
        return $this->formElementManager;
    }

    public function setFormElementManager($formElementManager) {
        $this->formElementManager = $formElementManager;
    }
    
    public function indexAction() {
        $order = new Order();
        $freight = new Freight();
        $product = new Product();
        $freight->addProduct($product).
        $order->addFreight($freight);
        
        $form = $this->getFormElementManager()->get('FhcsFormTest\Form\OrderFieldset');
        $form->bind($order);
        
        return array('form' => $form);
    }
}