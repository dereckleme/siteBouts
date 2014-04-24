<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\File\Transfer\Adapter\Http AS httpUploadFile;
use Zend\Filter\File\Rename;
use Zend\Validator\File\MimeType;
use Zend\Validator\File\ImageSize;

class ProdutosController extends AbstractActionController
{

	public function produtosAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
    		$repositoryCategoria = $doctrine->getRepository("Produto\Entity\ProdutoCategoria")->findAll();
    		$repositoryTecnologias = $doctrine->getRepository("Base\Entity\BaseMenu")->findOneByidmenu(3);
    	$layout = new ViewModel(array(
    		"categorias" => $repositoryCategoria,
    		"tecnologia" => $repositoryTecnologias 
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
    		$produtoLast = null;
    		foreach($requestPost->getFileInfo() as $file => $info)
    		{
    			if($file == "imagem")
    			{
    				$erros = false;
	    			$fname = $info['name'];
	    			$ext = pathinfo($fname, PATHINFO_EXTENSION);
	    			
	    			$filtro = $requestPost->addFilters(array(new Rename(array(
	    					"target" => "load.".$ext,
	    					"randomize" => true
	    			))), null, $file);
	    			$tamanho = new ImageSize(array(
	    					'minWidth' => 650, 'minHeight' => 400,
	    			));
	    			$mime = new MimeType(array(
	    					'image/gif', 'image/jpg','image/png','image/jpeg',
	    					'enableHeaderCheck' => true
	    			));
	    			if(!$tamanho->isValid($info)) $erros = "- É necessário uma imagem com tamanho minimo de 650x400\n";
	    			if(!$mime->isValid($info)) $erros = "- O tipo de arquivo suportado é gif, jpg, png\n";
	    			
	    			if($requestPost->receive() && $erros == false)
	    			{
	    				$im = new \Imagick();
	    				$im->readImage($filtro->getFileName("imagem"));
	    				$im->flattenImages();
	    				$im->setImageFormat('png');
	    				$im->thumbnailImage(650,400);
	    				$im->writeImage($filtro->getFileName("imagem")."big.png");
	    				$im->thumbnailImage(400,250);
	    				$im->writeImage($filtro->getFileName("imagem")."medio.png");
	    				$service = $this->getServiceLocator()->get('Admin\Service\Produtos');
	    				$produtoLast = $service->insert(array(
	    						"titulo" => $this->getRequest()->getPost("titulo"),
	    						"src" => $filtro->getFileInfo("imagem")['imagem']['name'],
	    						"subcategoria" => $this->getRequest()->getPost("subcategoria"),
	    						"numeracaoInicial" => $this->getRequest()->getPost("tamanhoMin"),
	    						"numeracaoFinal" => $this->getRequest()->getPost("tamanhoMax"),
	    						"tecnologia" => $this->getRequest()->getPost("tecnologia"),
	    						"nossoNumero" => $this->getRequest()->getPost("modelo"),
	    						"descricao" => $this->getRequest()->getPost("descricao")
	    				));
	    			}
    			}	
    			else if($file == "imagemVitrine")
    			{
    				$service = $this->getServiceLocator()->get('Admin\Service\Vitrine');
    				$service->insert(array("idProduto" => $produtoLast->getIdtenis(),
    									   "src" => $filtro->getFileInfo("imagemVitrine")['imagemVitrine']['name']));
    			}
    		}
    	}
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
    public function deleteAction()
    {
    	if($this->getRequest()->isPost())
    	{
    		$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    		$vitrine = $doctrine->getRepository("Produto\Entity\ProdutoVitrine")->findOneBytenis($this->getRequest()->getPost("idAction"));
    		if($vitrine)
    		{
    			$service = $this->getServiceLocator()->get("Admin\Service\Vitrine");
    			$service->delete($vitrine->getIdvitrine());
    		}
    		$service = $this->getServiceLocator()->get("Admin\Service\Produtos");
    		$service->delete($this->getRequest()->getPost("idAction"));
    	}
    	$layout = new ViewModel(array("msg" => "Produto removido com sucesso!"));
    	$layout->setTerminal(1);
    	return $layout;
    }
}

