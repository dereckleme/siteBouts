<?php
namespace Base\Service;
use Doctrine\ORM\EntityManager;
class MatchedRotaCaminho
{
	/**
	 *
	 * @var EntityManager
	 */
	protected $em;
	protected $match;
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
   			return array("rota" => $this->match->getMatchedRouteName(), "nome" => "Mídia",  "subtitulo" => "Assista as ultimas ações produzidas pela Bout’s - Mídia");
   		}
   		else if($this->match->getParams()['action'] == "produtoSubcategoria")
   		{
   			return array("rota" => "home", "nome" => "Mídia",  "subtitulo" => "Assista as ultimas ações produzidas pela Bout’s - Mídia");
   		}
   		else if($this->match->getParams()['action'] == "produtoDetalhe")
   		{
   			return array("rota" => "home", "nome" => "Mídia",  "subtitulo" => "Assista as ultimas ações produzidas pela Bout’s - Mídia");
   		}
   }
}

?>