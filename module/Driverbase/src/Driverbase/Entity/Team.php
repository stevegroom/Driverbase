<?php
namespace Driverbase\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Team
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Entry", mappedBy="team")
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
     * Set name
     *
     * @param string $name
     * @return Team
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
     * Add entry
     *
     * @param \Driverbase\Entity\Entry $entry
     * @return Team
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
}
