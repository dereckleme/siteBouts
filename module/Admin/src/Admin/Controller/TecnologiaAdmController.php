<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TecnologiaAdmController extends AbstractActionController
{

	public function tecnologiaAdmAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    	$tecnologia = $doctrine->getRepository("Base\Entity\BaseConteudo")->findBymenu(3);
    	$layout = new ViewModel(array("tecnologia" => $tecnologia));
    	$layout->setTerminal(1);
    	return $layout;
    }


}

