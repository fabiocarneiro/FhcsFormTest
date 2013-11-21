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
        //test products
        $product1 = new Product();
        $product1->setId(1);
        $product1->setName('Some Nice Product');
        
        $product2 = new Product();
        $product2->setId(2);
        $product2->setName('Some Different Product');
        
        $order = new Order();
        
        $freight = new Freight();  
        $freight->addProduct($product1);
        $freight->addProduct($product2);   
        $order->addFreight($freight);
        
        $freight2 = new Freight();
        $freight2->addProduct($product1);
        $freight2->addProduct($product2);
        $order->addFreight($freight2);
        
        $form = $this->getFormElementManager()->get('FhcsFormTest\Form\SomeForm');
        $form->bind($order);
        
        return array('form' => $form);
    }
}