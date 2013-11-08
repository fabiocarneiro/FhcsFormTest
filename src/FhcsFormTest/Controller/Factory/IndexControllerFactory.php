<?php

namespace FhcsFormTest\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use FhcsFormTest\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $controller = new IndexController();
        $controller->setFormElementManager($serviceLocator->getServiceLocator()->get('FormElementManager'));
        return $controller;
    }    
}