<?php
namespace Admin\Service;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;
use Admin\Service\AbstractService;


class Tecnologia extends AbstractService
{
    public function __construct(EntityManager $em){
    	parent::__construct($em);
    	$this->entity = "Base\Entity\BaseSubmenu";
    }
    public function insert(array $data)
    {
    	$this->entity = "Base\Entity\BaseSubmenu";
	    	$this->setTargetEntity(array(
	    			array("setTargetEntity" => "Base\Entity\BaseMenu",
	    					"setCampo" => "setBasemenu",
	    					"setActionReference" => 3),
	    	));
    	$BaseSubmenu = parent::insert(array("nome" => $data['titulo']));
    	
    	$this->entity = "Base\Entity\BaseConteudo";
    		$this->setTargetEntity(array(
    				array("setTargetEntity" => "Base\Entity\BaseSubmenu",
    						"setCampo" => "setSubmenu",
    						"setActionReference" => $BaseSubmenu->getIdbaseSubmenu()),
    				array("setTargetEntity" => "Base\Entity\BaseMenu",
    						"setCampo" => "setMenu",
    						"setActionReference" => 3),
    		));
    	$BaseConteudo = parent::insert(array("descricao" => $data['descricao'],"src" => $data['arquivos']['imagem_destaque'],"logo" => $data['arquivos']['logo']));
    	
    	$this->entity = "Base\Entity\BaseImagens";
	    	$this->setTargetEntity(array(
	    			array("setTargetEntity" => "Base\Entity\BaseConteudo",
	    					"setCampo" => "setConteudo",
	    					"setActionReference" => $BaseConteudo->getIdconteudo()),
	    	));
	    parent::insert(array("src" => $data['arquivos']['imagem_perspectiva_primeira'],"tituloImagem" => $data['titulo']));
	    parent::insert(array("src" => $data['arquivos']['imagem_perspectiva_segunda'],"tituloImagem" => $data['titulo']));
	    parent::insert(array("src" => $data['arquivos']['imagem_perspectiva_terceira'],"tituloImagem" => $data['titulo']));
	    parent::insert(array("src" => $data['arquivos']['imagem_perspectiva_quarta'],"tituloImagem" => $data['titulo']));
    }
}

?>