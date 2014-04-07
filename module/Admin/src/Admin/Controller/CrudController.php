<?php
//dereck
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\File\Transfer\Adapter\Http AS httpUploadFile;
use Zend\Filter\File\Rename;
use Zend\Validator\File\MimeType;
use Zend\Validator\File\ImageSize;
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
    			
    			$erros = false;
    			$fname = $info['name'];
    			$ext = pathinfo($fname, PATHINFO_EXTENSION);
    			
    			$filtro = $requestPost->addFilter(new Rename(array(
    					"target" => "load.".$ext,
    					"randomize" => true
    			)), null, $file);
    			$tamanho = new ImageSize(array(
    					'minWidth' => 640, 'minHeight' => 480,
    			));
    			$mime = new MimeType(array(
    					'image/gif', 'image/jpg','image/png','image/jpeg',
    					'enableHeaderCheck' => true
    			));
    			if(!$tamanho->isValid($info)) $erros = "- É necessário uma imagem com tamanho minimo 640px\n";
    			if(!$mime->isValid($info)) $erros = "- O tipo de arquivo suportado é gif, jpg, png\n";
    			if($requestPost->receive() && $erros == false)
    			{
    				
    				$im = new \Imagick();
    				$im->readImage($filtro->getFileName());
    				$im->flattenImages();
    				$im->setImageFormat('png');
    				$im->thumbnailImage(650,400);
    				$im->writeImage($filtro->getFileName()."big.png");
    				$im->thumbnailImage(400,250);
    				$im->writeImage($filtro->getFileName()."medio.png");
    				$service = $this->getServiceLocator()->get('Admin\Service\Produtos');
    				$service->insert(array(
    						"titulo" => $this->getRequest()->getPost("titulo"),
    						"src" => $filtro->getFileInfo()['imagem']['name'],
    						"subcategoria" => $this->getRequest()->getPost("subcategoria"),
    						"modelo" => $this->getRequest()->getPost("modelo"),
    						"numeracaoInicial" => $this->getRequest()->getPost("tamanhoMin"),
    						"numeracaoFinal" => $this->getRequest()->getPost("tamanhoMax")
    				));
    			}
    			else
    			{
    				print $erros;
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

