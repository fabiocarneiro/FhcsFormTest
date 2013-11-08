<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace FhcsFormTest;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\FormElementProviderInterface;
use FhcsFormTest\Form\ProductFieldset;
use FhcsFormTest\Form\OrderFieldset;
use FhcsFormTest\Form\FreightFieldset;

class Module implements FormElementProviderInterface
{
    
    public function getFormElementConfig()
    {
        return array(
            'factories' => array(
                'FhcsFormTest\Form\ProductFieldset' => function($sm) {
                    $entityManager = $sm->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                    $fieldset = new ProductFieldset();
                    $fieldset->setEntityManager($entityManager);
                    return $fieldset;
                },
                'FhcsFormTest\Form\OrderFieldset' => function($sm) {
                    $entityManager = $sm->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                    $fieldset = new OrderFieldset();
                    $fieldset->setEntityManager($entityManager);
                    return $fieldset;
                },
                'FhcsFormTest\Form\FreightFieldset' => function($sm) {
                    $entityManager = $sm->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                    $fieldset = new FreightFieldset();
                    $fieldset->setEntityManager($entityManager);
                    return $fieldset;
                },
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
