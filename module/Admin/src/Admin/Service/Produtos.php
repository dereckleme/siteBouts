<?php
namespace Admin\Service;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;
use Admin\Service\AbstractService;


class Produtos extends AbstractService
{
    public function __construct(EntityManager $em){
    	parent::__construct($em);
    	$this->entity = "Produto\Entity\ProdutoTenis";
    }
    public function insert(array $data)
    {
    		$this->setTargetEntity(array(
    				array("setTargetEntity" => "Produto\Entity\ProdutoModelo",
    						"setCampo" => "setModeloTenis",
    						"setActionReference" => $data['modelo']),
    				array("setTargetEntity" => "Produto\Entity\ProdutoSubcategoria",
    						"setCampo" => "setSubcategoriaTenis",
    						"setActionReference" => $data['subcategoria']),
    		));
    	parent::insert($data);
    }
}

?>