<?php
namespace Diverbase\Form;

use Zend\Form\Form;

class DriverForm extends Form
{
	public function __construct($name = null)
	{
		// we want to ignore the name passed
		parent::__construct('driver');

		$this->add(array(
				'name' => 'id',
				'type' => 'Hidden',
		));
		$this->add(array(
				'name' => 'fullname',
				'type' => 'Text',
				'options' => array(
						'label' => 'Full Name',
				),
		));
		$this->add(array(
				'name' => 'DoB',
				'type' => 'Date',
				'options' => array(
						'label' => 'DoB',
				),
		));
		$this->add(array(
				'name' => 'DoD',
				'type' => 'Date',
				'options' => array(
						'label' => 'DoD',
				),
		));
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
						'value' => 'Go',
						'id' => 'submitbutton',
				),
		));
	}
}