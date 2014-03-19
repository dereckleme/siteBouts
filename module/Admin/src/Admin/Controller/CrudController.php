<?php
//dereck
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\File\Transfer\Adapter\Http AS httpUploadFile;
use Zend\Filter\File\Rename;

class CrudController extends AbstractActionController
{
    public function bannerAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
        return $layout;
    }
    public function bannerCrudAction()
    {
    	if($this->getRequest()->isPost())
    	{
    		$requestPost = new httpUploadFile();
    		$requestPost->setDestination('./public/img/banners');
    		foreach($requestPost->getFileInfo() as $file => $info)
    		{
    			$fname = $info['name'];
    			$filtro = $requestPost->addFilter(new Rename(array(
    					"target" => $fname,
    					"randomize" => true
    			)), null, $file);
    			 
    			var_dump($requestPost->receive());
    			
    		}
    	}
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

