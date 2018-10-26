<?php
namespace Admin;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
         'routes' => [
             'admin' => [
                 'type' => Literal::class,
                 'options' => [
                     'route'    => '/admin',
                     'defaults' => [
                         'controller' => Controller\IndexController::class,
                         'action'     => 'index',
                     ],
                 ],
             ],
             'logout' => [
                 'type' => Literal::class,
                 'options' => [
                     'route'    => '/logout',
                     'defaults' => [
                         'controller' => Controller\IndexController::class,
                         'action'     => 'logout',
                     ],
                 ],
             ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
     'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'template_map' => [
            'admin/index/index'   => __DIR__ . '/../view/admin/index/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
