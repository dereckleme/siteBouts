<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\File\Transfer\Adapter\Http AS httpUploadFile;
use Zend\Filter\File\Rename;
use Zend\Validator\File\MimeType;
use Zend\Validator\File\ImageSize;

class NewslatterController extends AbstractActionController
{

	public function newslatterAction()
    {
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
    public function newslatterCrudAction()
    {
    	if($this->getRequest()->isPost())
    	{
    		$service = $this->getServiceLocator()->get('Admin\Service\Newslatter');
    		$service->insert(array("email" => $this->getRequest()->getPost("email")));
    	}
    	$layout = new ViewModel();
    	$layout->setTerminal(1);
    	return $layout;
    }
}

