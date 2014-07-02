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
    	$vitrine = $doctrine->getRepository("Produto\Entity\ProdutoVitrine")->findAll();
    	$tecnologias = $doctrine->getRepository("Base\Entity\BaseMenu")->findOneByidmenu(3);
    	
    	$midia = $doctrine->getRepository("Base\Entity\BaseVideos")->findOneBy(array(), array('idVideos' => 'DESC'));
        return new ViewModel(array(
        	"bannersDestaque" => $repo->findAll(),
        	"vitrine" => $vitrine,
        	"tecnologias" => $tecnologias,
        	"midia" => $midia		 
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
    	$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    	$produto = $doctrine->getRepository("Produto\Entity\ProdutoTenis")->findOneByslug($this->params()->fromRoute("slugProduto"));
    	return new ViewModel(array("produto" => $produto));
    }
    public function tecnologiaAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    	$conteudo = $doctrine->getRepository("Base\Entity\BaseConteudo")->localizaPelaSubcategoria($this->params()->fromRoute("slug"));
    	
	    return new ViewModel(array("conteudo" => $conteudo));
    }
    public function midiaAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    	$midia = $doctrine->getRepository("Base\Entity\BaseVideos")->findBy(array(), array('idVideos' => 'DESC'));
    	if(!$midia)
    	{
    		return $this->redirect()->toRoute("home");
    	}
    	else
    	{
    		return new ViewModel(array("midias" => $midia));
    	}
    }
    public function wallpaperAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    	$wallpaper = $doctrine->getRepository("Base\Entity\BaseConteudo")->findOneBymenu(5);
    	if(count($wallpaper->getFotos()) == 0)
    	{
    		return $this->redirect()->toRoute("home");
    	}
    	else {
    		return new ViewModel(array("wallpaper" => $wallpaper));
    	}
    }
    public function contatoAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
    public function enviarContatoAction()
    {
    	$request = $this->getRequest();
    	if($request->isPost())
    	{
    		$email = array();
    		$dados = $request->getPost()->toArray();
    		if(!empty($dados['sac'])) $email[] = "sac@bouts.com.br";
    		if(!empty($dados['marketing'])) $email[] = "marketing@bouts.com.br";
    		$email = implode(",", $email);
    		
    		$view = new ViewModel(array(
    				'fullname' => $dados['Nome'],
    				'Email' => $dados['Email'],
    				'telefone' => $dados['telefone'],
    				'Modelo' => $dados['Modelo'],
    				'Mensagem' => $dados['Mensagem'],
    		));
    		$view->setTerminal(true);
    		$view->setTemplate('Base/view/emails/contato');
    		$this->mailerZF2()->send(array(
    				'to' => '',
    				'cc' => $dados['Email'],
    				'bcc' => $email,
    				'subject' => 'Contato Bouts'
    		), $view);
    	}

    	//	'bcc' => 'contato@bouts.com.br',
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
}
