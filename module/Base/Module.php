<?php
namespace Base;
use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;
use Zend\Mvc\MvcEvent;
use Base\Service\Caminho;
class Module
{
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
    public function getServiceConfig() {
    	return array(
    			'factories' => array(
    					'Base\Service\Caminho' => function($service){
    						$caminho = new Caminho($service);
    						return $caminho;
    					},
    			));
    }					
    public function onBootstrap($e)
    {
       
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
    		/*
    		 * Definições de sessoes
    		*/
    		$auth = new AuthenticationService;
    		$auth->setStorage(new SessionStorage("Usuario"));
    		$controller      = $e->getTarget();
    		$controllerClass = get_class($controller);
    		$moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
    		$config          = $e->getApplication()->getServiceManager()->get('config');
    		/*
    		 * Definição de Layout de todos modulos
    		*/
    		
    		$controller->layout($config['module_layouts'][$moduleNamespace]);
    		/*
    		 * Definição de menu publico
    		 */
    		$orm = $e->getApplication()->getServiceManager()->get('Doctrine\ORM\EntityManager');
    		$listaMenu = $orm->getRepository("Base\Entity\BaseMenu")->findAll();
    		$controller->layout()->menu = $listaMenu;
    	}, 100);      
    }
}
