<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use Application\Model\Student;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
    	$student    = new Student();
    	$builder    = new AnnotationBuilder();
    	$form       = $builder->createForm($student);

    	$request = $this->getRequest();
    	if ($request->isPost()){
    		$form->bind($student);
    		$form->setData($request->getPost());
    		if ($form->isValid()){
    			print_r($form->getData());
    		}
    	}

    	return array('form'=>$form);
    }

}
