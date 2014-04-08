<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD Licensexx
 */

return array(
///[:subcategoria]/:[:subcategoria]
	'controllers' => array(
				'invokables' => array(
						'Base\Controller\Index' => 'Base\Controller\IndexController'
				),
	),
    'router' => array(
        'routes' => array(
        		'home' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/',
        						'defaults' => array(
        								'controller' => 'Base\Controller\Index',
        								'action'     => 'index',
        						),
        				),
        		),
        		'produto' => array(
        				'type' => 'Segment',
        				'options' => array(
        						'route'    => '[/produto/:categoria]',
        						'constraints' => array(
        								'categoria' => '[a-zA-Z][a-zA-Z0-9_-]*'
        						),
        						'defaults' => array(
        								'controller' => 'Base\Controller\Index',
        								'action'     => 'produto'
        						),
        				),
        				'may_terminate' => true,
        				'child_routes' => array(
	        				'produto-subcategoria' => array(
	        						'type' => 'Segment',
	        						'options' => array(
	        								'route'    => '[/:subcategoria]',
	        								'defaults' => array(
	        										'action'     => 'produtoSubcategoria',
	        								),
	        						),
	        						'may_terminate' => true,
	        						'child_routes' => array(
	        								'produto-detalhe' => array(
	        										'type' => 'Segment',
	        										'options' => array(
	        												'route'    => '[/:slugProduto]',
	        												'defaults' => array(
	        														'action'     => 'produtoDetalhe',
	        												),
	        										)
	        								),
	        						)
	        				),
        				)
        		),
        		'tecnologia' => array(
        				'type' => 'Literal',
        				'options' => array(
        						'route'    => '/tecnologia',
        						'defaults' => array(
        								'controller' => 'Base\Controller\Index',
        								'action'     => 'tecnologia'
        						),
        				),
        				'may_terminate' => true,
        				'child_routes' => array(
        						'tecnologia-detalhe' => array(
        								'type' => 'Segment',
        								'options' => array(
        										'route'    => '[/:slug]',
        										'defaults' => array(
        												'action'     => 'tecnologia',
        										),
        								)
        						),
        				)
        		),
        		'midia' => array(
        				'type' => 'Literal',
        				'options' => array(
        						'route'    => '/midia',
        						'defaults' => array(
        								'controller' => 'Base\Controller\Index',
        								'action'     => 'midia'
        						),
        		
        				),
        		),
        		
        		'wallpaper' => array(
        				'type' => 'Literal',
        				'options' => array(
        						'route'    => '/wallpaper',
        						'defaults' => array(
        								'controller' => 'Base\Controller\Index',
        								'action'     => 'wallpaper'
        						),
        		
        				),
        		),
        		'contato' => array(
        				'type' => 'Literal',
        				'options' => array(
        						'route'    => '/contato',
        						'defaults' => array(
        								'controller' => 'Base\Controller\Index',
        								'action'     => 'contato'
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
            'base/layout/site'           => __DIR__ . '/../view/layout/layout.phtml',
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
    		'driver' => array(
    				'application_entities' => array(
    						'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
    						'cache' => 'array',
    						'paths' => array(__DIR__ . '/../src/Base/Entity')
    				),
    
    				'orm_default' => array(
    						'drivers' => array(
    								'Base\Entity' => 'application_entities'
    						)
    				))),
);