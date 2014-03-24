<?php
//dereck
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\File\Transfer\Adapter\Http AS httpUploadFile;
use Zend\Filter\File\Rename;

class CrudController extends AbstractActionController
{
    public function bannerAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
        return $layout;
    }
    public function bannerCrudAction()
    {
    	if($this->getRequest()->isPost())
    	{
    		$requestPost = new httpUploadFile();
    		$requestPost->setDestination('./public/img/banners');
    		foreach($requestPost->getFileInfo() as $file => $info)
    		{
    			$fname = $info['name'];
    			$filtro = $requestPost->addFilter(new Rename(array(
    					"target" => $fname,
    					"randomize" => true
    			)), null, $file);
    			if($requestPost->receive())
    			{
    				$service = $this->getServiceLocator()->get('Admin\Service\Banner');
    				$service->insert(array("titulo" => $this->getRequest()->getPost("titulo"), "src" => $filtro->getFileInfo()['imagem']['name'], "url" => $this->getRequest()->getPost("url")));
    			}
    			
    		}
    	}
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
    public function midiaAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
    public function ondeComprarAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
    public function produtosAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
    		$repositoryCategoria = $doctrine->getRepository("Produto\Entity\ProdutoCategoria")->findAll();
    		$repositoryModelos = $doctrine->getRepository("Produto\Entity\ProdutoModelo")->findAll();
    	$layout = new ViewModel(array(
    		"categorias" => $repositoryCategoria,
    		"modelos" => 	$repositoryModelos
    	));
    	$layout->setTerminal(1);
    	return $layout;
    }
    public function produtosCrudAction()
    {
    	if($this->getRequest()->isPost())
    	{
    		$requestPost = new httpUploadFile();
    		$requestPost->setDestination('./public/img/produtos');
    		foreach($requestPost->getFileInfo() as $file => $info)
    		{
    			$fname = $info['name'];
    			$filtro = $requestPost->addFilter(new Rename(array(
    					"target" => $fname,
    					"randomize" => true
    			)), null, $file);
    			if($requestPost->receive())
    			{
    				$service = $this->getServiceLocator()->get('Admin\Service\Produtos');
    				$service->insert(array(
    						"src" => $filtro->getFileInfo()['imagem']['name'],
    						"subcategoria" => $this->getRequest()->getPost("subcategoria"),
    						"modelo" => $this->getRequest()->getPost("modelo"),
    						"numeracaoInicial" => $this->getRequest()->getPost("tamanhoMin"),
    						"numeracaoFinal" => $this->getRequest()->getPost("tamanhoMax")
    				));
    			}
    			 
    		}
    	}
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
    public function tecnologiaAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
    public function wallpaperAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
   	
    public function populateSubcategoriaAjaxAction()
    {
    	if($this->getRequest()->isPost())
    	{
    		$doctrine = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
    		$repositoryCategoria = $doctrine->getRepository("Produto\Entity\ProdutoCategoria")->findOneByidcategoria($this->getRequest()->getPost("idCategoria"));
    		
    		$layout = new ViewModel(array(
    			"listaSubcategorias" => $repositoryCategoria->getSubcategorias()
    		));
    	}
    	$layout->setTerminal(1);
    	return $layout;
    }
}

