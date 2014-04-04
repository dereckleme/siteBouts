<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    	$repo = $doctrine->getRepository("Base\Entity\BaseBanner");
        return new ViewModel(array(
        	"bannersDestaque" => $repo->findAll() 
        ));
    }
    public function produtoAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    	$produtos = $doctrine->getRepository("Produto\Entity\ProdutoTenis")->localizaPelaCategoria($this->params()->fromRoute("categoria"));
    	return new ViewModel(array("produtos" => $produtos));
    }
    public function produtoSubcategoriaAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    	$produtos = $doctrine->getRepository("Produto\Entity\ProdutoTenis")->localizaPelaSubcategoria($this->params()->fromRoute("categoria"),$this->params()->fromRoute("subcategoria"));
    	return new ViewModel(array("produtos" => $produtos));
    }
    public function produtoDetalheAction()
    {
    	return new ViewModel();
    }
    public function tecnologiaAction()
    {
	    return new ViewModel();
    }
    public function midiaAction()
    {
    	return new ViewModel();
    }
    public function wallpaperAction()
    {
    	return new ViewModel();
    }
    public function contatoAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
}
