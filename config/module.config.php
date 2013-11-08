<?php
namespace FhcsFormTest;

return array(
    'controllers' => array(
        'factories' => array(
            'FhcsFormTest\Controller\Index' => 'FhcsFormTest\Controller\Factory\IndexControllerFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'test' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/test[/:action]',
                    'defaults' => array(
                        'controller' => 'FhcsFormTest\Controller\Index',
                        'action' => 'index',
                    )
                )
            )
        )
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'FhcsFormTest\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
);
