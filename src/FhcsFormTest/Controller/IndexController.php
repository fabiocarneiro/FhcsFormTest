<?php

namespace FhcsFormTest\Controller;

use FhcsFormTest\Entity\Freight;
use FhcsFormTest\Entity\Order;
use FhcsFormTest\Entity\Product;
use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\Common\Collections\ArrayCollection;
use FhcsFormTest\Entity\Order;
use FhcsFormTest\Entity\Freight;
use FhcsFormTest\Entity\Product;

class IndexController extends AbstractActionController {

    protected $formElementManager;
    /**
     * This is useful since we can create an DoctrineHydrator instance here
     */
    protected $entityManager;
    
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }  
    
    public function getFormElementManager() {
        return $this->formElementManager;
    }

    public function setFormElementManager($formElementManager) {
        $this->formElementManager = $formElementManager;
    }

    public function indexAction() {

        $product1 = new Product;
        $product1->setName('Some Nice Product');
        
        $product2 = new Product;
        $product2->setName('Some Different Product');
        
        $productCollection = new ArrayCollection();
        $productCollection->add($product1);
        $productCollection->add($product2);
        
        $order = new Order;
        
        $freight = new Freight;  
        $freight->addProducts($productCollection);
        $freightCollection1 = new ArrayCollection();
        $freightCollection1->add($freight);
        $order->addFreights($freightCollection1);
        
        $freight2 = new Freight;
        
        $freight2->addProducts($productCollection);
        $freightCollection2 = new ArrayCollection();
        $freightCollection2->add($freight2);
        $order->addFreights($freightCollection2);
        
        $form = $this->getFormElementManager()->get('FhcsFormTest\Form\SomeForm');
        $form->bind($order);

        return array('form' => $form);
    }
}
