<?php
namespace Driverbase\Entity;

//use BjyAuthorize\Acl\HierarchicalRoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class MyCountry
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, length=3, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", unique=true, length=50, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $nationality;

    public function getId()
    {
    	return $this->id;
    }

    public function getCode()
    {
    	return $this->code;
    }

    public function getName()
    {
    	return $this->name;
    }

    public function getNationality()
    {
    	return $this->nationality;
    }

    public function setName($value)
    {
    	$this->name = $value;
    }

    public function setCode($value)
    {
    	$this->code = $value;
    }
    public function setNationality($value)
    {
    	$this->nationality = $value;
    }
}