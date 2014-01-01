<?php
namespace Driverbase\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Driver
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fullName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DoB;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DoD;

    /**
     * @ORM\ManyToMany(targetEntity="Entry", inversedBy="driver")
     * @ORM\JoinTable(
     *     name="EntryToDriver",
     *     joinColumns={@ORM\JoinColumn(name="driver_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="entry_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $entry;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entry = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fullName
     *
     * @param string $fullName
     * @return Driver
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Add entry
     *
     * @param \Driverbase\Entity\Entry $entry
     * @return Driver
     */
    public function addEntry(\Driverbase\Entity\Entry $entry)
    {
        $this->entry[] = $entry;

        return $this;
    }

    /**
     * Remove entry
     *
     * @param \Driverbase\Entity\Entry $entry
     */
    public function removeEntry(\Driverbase\Entity\Entry $entry)
    {
        $this->entry->removeElement($entry);
    }

    /**
     * Get entry
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Set DoB
     *
     * @param \DateTime $doB
     * @return Driver
     */
    public function setDoB($doB)
    {
        $this->DoB = $doB;

        return $this;
    }

    /**
     * Get DoB
     *
     * @return \DateTime 
     */
    public function getDoB()
    {
        return $this->DoB;
    }

    /**
     * Set DoD
     *
     * @param \DateTime $doD
     * @return Driver
     */
    public function setDoD($doD)
    {
        $this->DoD = $doD;

        return $this;
    }

    /**
     * Get DoD
     *
     * @return \DateTime 
     */
    public function getDoD()
    {
        return $this->DoD;
    }
}
