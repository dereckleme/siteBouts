<?php
namespace Produto;

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
    public function onBootstrap($e)
    {
    	 
    	$e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
    		$controller      = $e->getTarget();
    		$orm = $e->getApplication()->getServiceManager()->get('Doctrine\ORM\EntityManager');
    		//Definição to view tenis.
    	
    		$listaMenuTenis = $orm->getRepository("Produto\Entity\ProdutoCategoria")->findAll();
    		$controller->layout()->menuListaTenis = $listaMenuTenis;
    		
    	}, 100);
    }
}
