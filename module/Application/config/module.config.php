<?php

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'savekl' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/savekl',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'savekl',
                    ],
                ],
            ],
            'getsviringi' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/getsviringi',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'getsviringi',
                    ],
                ],
            ],
            'contests' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/contests',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'contests',
                    ],
                ],
            ],
            'contest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/contest[/:id]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'contest',
                    ],
                ],
            ],
            'contestors' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/contestors[/:id]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'contestors',
                    ],
                ],
            ],
            'contestor' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/contestor[/:id]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'contestor',
                    ],
                ],
            ],
            'PrivacyPolicyURL' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/privacy/policy',
                    'defaults' => [
                        'controller' => Controller\FacebookController::class,
                        'action' => 'ppolicy',
                    ],
                ],
            ],
            'TermsofServiceURL' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/terms/service',
                    'defaults' => [
                        'controller' => Controller\FacebookController::class,
                        'action' => 'tservice',
                    ],
                ],
            ],
            'FBAuthCallback' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/fb/auth/callback/',
                    'defaults' => [
                        'controller' => Controller\FacebookController::class,
                        'action' => 'callback',
                    ],
                ],
            ],
            'FBAuthCallback' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/fb/auth/save/',
                    'defaults' => [
                        'controller' => Controller\FacebookController::class,
                        'action' => 'auth',
                    ],
                ],
            ]
        ],
    ],
    'service_manager' => [
        'factories' => [
            Middleware\IndexAction::class => InvokableFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\FacebookController::class => Controller\Factory\FacebookControllerFactory::class,
        ],
    ],
    'translator' => [
        'locale' => 'en_US',
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ],
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            //'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
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
