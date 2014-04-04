<?php
namespace Admin;
/**
 * Zend Framework (http://framework.zend.com/)x
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD Licensexx
 */

return array(
///[:subcategoria]/:[:subcategoria]
	'controllers' => array(
				'invokables' => array(
						'Admin\Controller\Index' => 'Admin\Controller\IndexController',
						'Admin\Controller\Crud' => 'Admin\Controller\CrudController'
				),
	),
    'router' => array(
        'routes' => array(
        		'admin' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/admin',
        						'defaults' => array(
        								'controller' => 'Admin\Controller\Index',
        								'action'     => 'index',
        						),
        				),
        				'may_terminate' => true,
        				'child_routes' => array(
        						'logar' => array(
        								'type'    => 'Zend\Mvc\Router\Http\Literal',
        								'options' => array(
        										'route'    => '/logar',
        										'defaults' => array(
        												'action'     => 'logar',
        										),
        								),
        						),
        						'crud' => array(
        								'type'    => 'Segment',
        								'options' => array(
        										'route'    => '[/crud[/:action]]',
        										'defaults' => array(
        												'controller' => 'Admin\Controller\Crud'
        										),
        								),
        						),
        				),
        		),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'admin/layout/site'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'doctrine' => array(
        'eventmanager' => array(
        		'orm_default' => array(
        				'subscribers' => array(
        						// pick any listeners you need
        						'Gedmo\Tree\TreeListener',
        						'Gedmo\Timestampable\TimestampableListener',
        						'Gedmo\Sluggable\SluggableListener',
        						'Gedmo\Loggable\LoggableListener',
        						'Gedmo\Sortable\SortableListener'
        				),
        		),
        ),
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),
);