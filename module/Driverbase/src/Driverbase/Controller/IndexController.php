<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Driverbase\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Driverbase\Entity\Circuit;
use Driverbase\Entity\Country;
use Driverbase\Entity\Driver;
use Driverbase\Entity\Team;
//use Driverbase\Model\Driver as DriverModel;
use Driverbase\Form\DriverForm;


class IndexController extends AbstractActionController
{
    protected $_objectManager;

    public function indexAction()
    {
    }

    public function listCircuitsAction()
    {
        $circuits = $this->getObjectManager()->getRepository('\Driverbase\Entity\Circuit')->findAll();

        return new ViewModel(array('circuits' => $circuits));
    }

    public function listCountriesAction()
    {
        $countries = $this->getObjectManager()->getRepository('\Driverbase\Entity\Country')->findAll();

        return new ViewModel(array('countries' => $countries));
    }

    public function listDriversAction()
    {
        $drivers = $this->getObjectManager()->getRepository('\Driverbase\Entity\Driver')->findAll();

        return new ViewModel(array('drivers' => $drivers));
    }

    public function listTeamsAction()
    {
        $teams = $this->getObjectManager()->getRepository('\Driverbase\Entity\Team')->findAll();

        return new ViewModel(array('teams' => $teams));
    }

    public function addCircuitAction()
    {
        if ($this->request->isPost()) {
            $circuit = new Circuit();
            $circuit->setName($this->getRequest()->getPost('name'));
            $circuit->setCountryId($this->getRequest()->getPost('country_id'));

            $this->getObjectManager()->persist($circuit);
            $this->getObjectManager()->flush();
            $newId = $circuit->getId();

            $this->flashMessenger()->addMessage('Circuit with id:' . $newId . " added");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listCircuits'
    		));
        }
        return new ViewModel();
    }

    public function addCountryAction()
    {
        if ($this->request->isPost()) {
            $country = new Country();
            $country->setCode($this->getRequest()->getPost('code'));
            $country->setName($this->getRequest()->getPost('name'));
            $country->setNationality($this->getRequest()->getPost('nationality'));

            $this->getObjectManager()->persist($country);
            $this->getObjectManager()->flush();
            $newId = $country->getId();

            $this->flashMessenger()->addMessage('Country with id:' . $newId . " added");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listCountries'
    		));
        }
        return new ViewModel();
    }

    public function addDriverAction()
    {
        if ($this->request->isPost()) {
            $driver = new Driver();
            $driver->setFullName($this->getRequest()->getPost('fullname'));

            $this->getObjectManager()->persist($driver);
            $this->getObjectManager()->flush();
            $newId = $driver->getId();

            $this->flashMessenger()->addMessage('Driver with id:' . $newId . " added");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listDrivers'
    		));
        }
        return new ViewModel();
    }

    public function displayDriverAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $driver = $this->getObjectManager()->find('\Driverbase\Entity\Driver', $id);

        return new ViewModel(array('driver' => $driver));
    }

    public function displayTeamAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $team = $this->getObjectManager()->find('\Driverbase\Entity\Team', $id);

        return new ViewModel(array('team' => $team));
    }

    public function editCountryAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $country = $this->getObjectManager()->find('\Driverbase\Entity\Country', $id);

        if ($this->request->isPost()) {
            $country->setCode($this->getRequest()->getPost('code'));
            $country->setName($this->getRequest()->getPost('name'));
            $country->setNationality($this->getRequest()->getPost('nationality'));

            $this->getObjectManager()->persist($country);
            $this->getObjectManager()->flush();

            $this->flashMessenger()->addMessage('Country with id:' . $id . " updated");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listCountries'
    		));
        }

        return new ViewModel(array('country' => $country));
    }


    public function editDriverAction()
    {
    	$form = new \Driverbase\Form\DriverForm();
    	$form->get('submit')->setValue('Save');

    	$request = $this->getRequest();

		$id = (int) $this->params()->fromRoute('id', 0);
		$driver = $this->getObjectManager()->find('\Driverbase\Entity\Driver', $id);

    	if ($request->isPost()) {
    		$driver->setFullName($this->getRequest()->getPost('fullname'));
    		$driver->setDoB($this->getRequest()->getPost('DoB'));
    		$driver->setDoD($this->getRequest()->getPost('DoD'));

    		$this->getObjectManager()->persist($driver);
    		$this->getObjectManager()->flush();

    		$form->setInputFilter($driver->getInputFilter());
    		$form->setData($request->getPost());

    		if ($form->isValid()) {
    			$driver->exchangeArray($driver->getData());
    			$this->getObjectManager()->persist($driver);
    			$this->getObjectManager()->flush();


           $this->flashMessenger()->addMessage('Driver with id:' . $id . " updated");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listDrivers'
    		));
    		}
    	}
//    	return array('form' => $form);

        return new ViewModel(array('driver' => $driver));
    }

    public function editDriverActionxxx()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $driver = $this->getObjectManager()->find('\Driverbase\Entity\Driver', $id);

        if ($this->request->isPost()) {
            $driver->setFullName($this->getRequest()->getPost('fullname'));
            $driver->setDoB($this->getRequest()->getPost('DoB'));
            $driver->setDoD($this->getRequest()->getPost('DoD'));

            $this->getObjectManager()->persist($driver);
            $this->getObjectManager()->flush();

            $this->flashMessenger()->addMessage('Driver with id:' . $id . " updated");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listDrivers'
    		));
        }

        return new ViewModel(array('driver' => $driver));
    }

    public function deleteDriverAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $driver = $this->getObjectManager()->find('\Driverbase\Entity\Driver', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($driver);
            $this->getObjectManager()->flush();

            $this->flashMessenger()->addMessage('Driver with id:' . $id . " deleted");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listDrivers'
    		));
        }

        return new ViewModel(array('driver' => $driver));
    }


    public function addTeamAction()
    {
    	if ($this->request->isPost()) {
    		$team = new Team();
    		$team->setName($this->getRequest()->getPost('name'));

    		$this->getObjectManager()->persist($team);
    		$this->getObjectManager()->flush();
    		$newId = $team->getId();

    		$this->flashMessenger()->addMessage('Team with id:' . $newId . " added");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listTeams'
    		));

    	}
    	return new ViewModel();
    }

    public function editTeamAction()
    {
    	$id = (int) $this->params()->fromRoute('id', 0);
    	$team = $this->getObjectManager()->find('\Driverbase\Entity\Team', $id);

    	if ($this->request->isPost()) {
    		$team->setName($this->getRequest()->getPost('name'));

    		$this->getObjectManager()->persist($team);
    		$this->getObjectManager()->flush();

    		$this->flashMessenger()->addMessage('Team with id:' . $id . " updated");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listTeams'
    		));

    	}

    	return new ViewModel(array('team' => $team));
    }

    public function deleteTeamAction()
    {
    	$id = (int) $this->params()->fromRoute('id', 0);
    	$team = $this->getObjectManager()->find('\Driverbase\Entity\Team', $id);

    	if ($this->request->isPost()) {
    		$this->getObjectManager()->remove($team);
    		$this->getObjectManager()->flush();

    		$this->flashMessenger()->addMessage('Team with id:' . $id . " deleted");

    		return $this->redirect()->toRoute('driverbase', array(
    				'controller' => 'index',
    				'action' =>  'listTeams'
    		));

    	}

    	return new ViewModel(array('team' => $team));
    }


    protected function getObjectManager()
    {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }
}
