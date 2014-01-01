<?php
namespace Driverbase\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Country
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

    /**
     * @ORM\OneToMany(targetEntity="Circuit", mappedBy="country")
     */
    private $circuit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->circuit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     * @return Country
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Add circuit
     *
     * @param \Driverbase\Entity\Circuit $circuit
     * @return Country
     */
    public function addCircuit(\Driverbase\Entity\Circuit $circuit)
    {
        $this->circuit[] = $circuit;

        return $this;
    }

    /**
     * Remove circuit
     *
     * @param \Driverbase\Entity\Circuit $circuit
     */
    public function removeCircuit(\Driverbase\Entity\Circuit $circuit)
    {
        $this->circuit->removeElement($circuit);
    }

    /**
     * Get circuit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCircuit()
    {
        return $this->circuit;
    }

}
