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
}

