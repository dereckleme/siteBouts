<?php
//dereck
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CrudController extends AbstractActionController
{
    public function bannerAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
        return $layout;
    }
}

