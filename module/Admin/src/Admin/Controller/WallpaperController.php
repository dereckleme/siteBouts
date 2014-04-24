<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class WallpaperController extends AbstractActionController
{

	public function wallpaperAction()
    {
    	$doctrine = $this->getServiceLocator()->get("Doctrine\Orm\EntityManager");
    	$wallpaper = $doctrine->getRepository("Base\Entity\BaseConteudo")->findOneBymenu(5);
    	$layout = new ViewModel(array("wallpaper" => $wallpaper));
    	$layout->setTerminal(1);
    	return $layout;
    }


}

