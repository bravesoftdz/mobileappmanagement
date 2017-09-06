<?php

namespace Backoffice;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'Backoffice' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/backoffice',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'BackofficePages' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/backoffice/pages',
                    'defaults' => [
                        'controller' => Controller\PagesController::class,
                        'action' => 'pages',
                    ],
                ],
            ],
            'BackofficePage' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/backoffice/page[/:id]',
                    'defaults' => [
                        'controller' => Controller\PagesController::class,
                        'action' => 'page',
                    ],
                ],
            ]            
        ],
    ],    
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\PagesController::class => Controller\Factory\PagesControllerFactory::class
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            //'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'users/index/index' => __DIR__ . '/../view/index/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
];
