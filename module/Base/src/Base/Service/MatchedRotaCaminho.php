<?php
namespace Base\Service;
use Doctrine\ORM\EntityManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;
class MatchedRotaCaminho implements EventManagerAwareInterface
{
	/**
	 *
	 * @var EntityManager
	 */
	protected $em;
	protected $match;
	/**
	 * @var EventManagerInterface
	 */
	protected $eventManager;
	public function __construct(EntityManager $em, $RouteMatch)
	{
		$this->em = $em;
		$this->match = $RouteMatch;
	}
   public function geraCaminhoSite()
   {
   		if($this->match->getParams()['action'] == "wallpaper")
   		{
   			return array("rota" => $this->match->getMatchedRouteName(), "nome" => "Wallpaper", "subtitulo" => "Papéis de Parede - Wallpapers");
   		}
   		else if($this->match->getParams()['action'] == "midia")
   		{
   			return array("rota" => $this->match->getMatchedRouteName(), "nome" => "Mídia",  "subtitulo" => "Assista as ultimas ações produzidas pela Bout’s - Mídia");
   		}
  		else if($this->match->getParams()['action'] == "produto")
   		{
   			$categoria = $this->em->getRepository("Produto\Entity\ProdutoCategoria")->findOneByslug($this->match->getParam("categoria"));	
   			if($categoria)
   			{
   			return array("rota" => array("MatchedRouteName" => $this->match->getMatchedRouteName(), array("categoria" => $categoria->getSlug())), "nome" => $categoria->getNome(),  "subtitulo" => strtoupper($categoria->getNome()));
   			}
   			else
   			{
   				$this->getEventManager()->trigger('geraCaminhoSite');
   			}
   		}
   		else if($this->match->getParams()['action'] == "produtoSubcategoria")
   		{
   			$subcategoria = $this->em->getRepository("Produto\Entity\ProdutoSubcategoria")->findOneByslug($this->match->getParam("subcategoria"));	
   			if($subcategoria)
   			{
   			return array("rota" => array("MatchedRouteName" => "produto", array("categoria" => $subcategoria->getCategoria()->getSlug())), "nome" => $subcategoria->getCategoria()->getNome(),  "subtitulo" =>  strtoupper($subcategoria->getNome()));
   			}
   			else
   			{
   				$this->getEventManager()->trigger('geraCaminhoSite');
   			}
   		}
   		else if($this->match->getParams()['action'] == "produtoDetalhe")
   		{
   			$produto = $this->em->getRepository("Produto\Entity\ProdutoTenis")->findOneByslug($this->match->getParam("slugProduto"));
   			if($produto)
   			{
   			return array(
   					"subtitulo" => ucwords($produto->getSubcategoriaTenis()->getNome()." - ".$produto->getModeloTenis()->getNome()),
   					"lista" => array(
   						array("rota" => array(
   								"MatchedRoute" => "produto",
   								"arrayDefines" => array("categoria" => $produto->getSubcategoriaTenis()->getCategoria()->getSlug())		
   					), "nome" => $produto->getSubcategoriaTenis()->getCategoria()->getNome()),
   						array("rota" => array(
   								"MatchedRoute" => "produto/produto-subcategoria",
   								"arrayDefines" => array("categoria" => $produto->getSubcategoriaTenis()->getCategoria()->getSlug(), "subcategoria" => $produto->getSubcategoriaTenis()->getSlug())
   						), "nome" => $produto->getSubcategoriaTenis()->getNome())
   					)
   			
   			);
   			}
   			else
   			{
   				$this->getEventManager()->trigger('geraCaminhoSite');
   			}
   		}
   		else if($this->match->getParams()['action'] == "tecnologia")
   		{
   			$conteudo = $this->em->getRepository("Base\Entity\BaseConteudo")->localizaPelaSubcategoria($this->match->getParam("slug"));
   			return array("rota" => array("MatchedRouteName" => "tecnologia/tecnologia-detalhe", array("slug" => $this->match->getParam("slug"))), "nome" => $conteudo->getSubmenu()->getNome(), "subtitulo" => "Tecnologia - ".$conteudo->getSubmenu()->getNome());
   		}
   }
   public function setEventManager(EventManagerInterface $eventManager)
   {
   	$eventManager->addIdentifiers(array(
   			get_called_class()
   	));
   
   	$this->eventManager = $eventManager;
   }
   /**
    * @return EventManagerInterface
    */
   public function getEventManager()
   {
   	if (null === $this->eventManager) {
   		$this->setEventManager(new EventManager());
   	}
   
   	return $this->eventManager;
   }
}

?>