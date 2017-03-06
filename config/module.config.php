<?php
return array(
    'module' => array(
        'ola-home' => array(
            'name' => 'ola-home',
            'version' => '1.0.0'
        )
    ),
    'controllers' => array(
        'factories' => array(
            // auction
            'Ola\Home\Auction\Controller\AdminController' => 'Ola\Home\Auction\Controller\Factory\AdminControllerFactory',
            'Ola\Home\Auction\Controller\RestController' => 'Ola\Home\Auction\Controller\Factory\RestControllerFactory',
            // banner
            'Ola\Home\Banner\Controller\AdminController' => 'Ola\Home\Banner\Controller\Factory\AdminControllerFactory',
            'Ola\Home\Banner\Controller\RestController' => 'Ola\Home\Banner\Controller\Factory\RestControllerFactory',
        )
    ),
    'service_manager' => array(
        'factories' => array(
            // auction
            'Ola\Home\Auction\Service\ServiceInterface' => 'Ola\Home\Auction\Service\Factory\ServiceFactory',
            'Ola\Home\Auction\Mapper\MapperInterface' => 'Ola\Home\Auction\Mapper\Factory\MapperFactory',
            'Ola\Home\Auction\Form\Form' => 'Ola\Home\Auction\Form\Factory\FormFactory',
            // banner
            'Ola\Home\Banner\Service\ServiceInterface' => 'Ola\Home\Banner\Service\Factory\ServiceFactory',
            'Ola\Home\Banner\Mapper\MapperInterface' => 'Ola\Home\Banner\Mapper\Factory\MapperFactory',
            'Ola\Home\Banner\Form\Form' => 'Ola\Home\Banner\Form\Factory\FormFactory',
        )
    ),
    'router' => array(
        'routes' => array(
            'home-auction-admin-index' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/home/auction',
                    'defaults' => array(
                        'controller' => 'Ola\Home\Auction\Controller\AdminController',
                        'action' => 'index'
                    )
                )
            ),
            'home-auction-admin-create' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/home/auction/create',
                    'defaults' => array(
                        'controller' => 'Ola\Home\Auction\Controller\AdminController',
                        'action' => 'create'
                    )
                )
            ),
            'home-auction-admin-delete' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/home/auction/[:id]/delete',
                    'defaults' => array(
                        'controller' => 'Ola\Home\Auction\Controller\AdminController',
                        'action' => 'delete'
                    )
                )
            ),
            
            'home-banner-admin-index' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/home/banner',
                    'defaults' => array(
                        'controller' => 'Ola\Home\Banner\Controller\AdminController',
                        'action' => 'index'
                    )
                )
            ),
            'home-banner-admin-create' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/home/banner/create',
                    'defaults' => array(
                        'controller' => 'Ola\Home\Banner\Controller\AdminController',
                        'action' => 'create'
                    )
                )
            ),
            'home-banner-admin-update' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/home/banner/[:id]/update',
                    'defaults' => array(
                        'controller' => 'Ola\Home\Banner\Controller\AdminController',
                        'action' => 'update'
                    )
                )
            ),
            'home-banner-admin-delete' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/home/banner/[:id]/delete',
                    'defaults' => array(
                        'controller' => 'Ola\Home\Banner\Controller\AdminController',
                        'action' => 'delete'
                    )
                )
            ),
            'home-banner-admin-view' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/home/banner/[:id]/view',
                    'defaults' => array(
                        'controller' => 'Ola\Home\Banner\Controller\AdminController',
                        'action' => 'view'
                    )
                )
            ),
            // auction
            'home-banner--rest' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/home-page/banner[/:id]',
                    'defaults' => array(
                        'controller' => 'Ola\Home\Banner\Controller\RestController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                
            )
        )
    ),
    'view_helpers' => array(
        'factories' => array(
            'BannerSlider' => 'Ola\Home\Banner\View\Helper\Factory\SliderFactory'
        ),
        'invokables' => array()
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Ola\Help' => true
        ),
        'template_map' => array(
            'ola/home/banner/admin/index' => __DIR__ . '/../view/banner/admin/index.phtml',
            'ola/home/banner/admin/create' => __DIR__ . '/../view/banner/admin/create.phtml',
            'ola/home/banner/admin/update' => __DIR__ . '/../view/banner/admin/update.phtml',
            'ola/home/banner/admin/delete' => __DIR__ . '/../view/banner/admin/delete.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'acl' => array(
        'default' => array(
            'GUEST' => array(),
            'BASIC' => array(),
            'VERIFIED' => array(),
            'SELLER' => array(),
            'CHARTER' => array(),
            'FOUNDING' => array(),
            'BUSINESS' => array(),
            'EXECUTIVE' => array(),
            'ENTERPRISE' => array(),
            'NONE' => array(),
            'SALES' => array(),
            'CUSTOMER_SERVICE' => array(),
            'ACCOUNTING' => array(),
            'GOD' => array(
                'home-banner-admin-index',
                'home-banner-admin-create',
                'home-banner-admin-update',
                'home-banner-admin-delete',
                'home-banner-admin-view',
                'home-auction-admin-index',
                'home-auction-admin-create',
                'home-auction-admin-delete'
                
            )
        )
    ),
    'navigation' => array(
        'default' => array()
    ),
    'menu' => array(
        'default' => array()
    )
);