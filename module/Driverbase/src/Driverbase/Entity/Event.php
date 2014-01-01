<?php
namespace Driverbase\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $startDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $confirmed;

    /**
     * @ORM\OneToMany(targetEntity="Entry", mappedBy="event")
     */
    private $entry;

    /**
     * @ORM\ManyToOne(targetEntity="Circuit", inversedBy="event")
     * @ORM\JoinColumn(name="circuit_id", referencedColumnName="id", nullable=false)
     */
    private $circuit;

    /**
     * @ORM\ManyToOne(targetEntity="Championship", inversedBy="event")
     * @ORM\JoinColumn(name="championship_id", referencedColumnName="id", nullable=false)
     */
    private $championship;

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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Event
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Event
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Event
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set confirmed
     *
     * @param boolean $confirmed
     * @return Event
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Add entry
     *
     * @param \Driverbase\Entity\Entry $entry
     * @return Event
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
     * Set circuit
     *
     * @param \Driverbase\Entity\Circuit $circuit
     * @return Event
     */
    public function setCircuit(\Driverbase\Entity\Circuit $circuit)
    {
        $this->circuit = $circuit;

        return $this;
    }

    /**
     * Get circuit
     *
     * @return \Driverbase\Entity\Circuit
     */
    public function getCircuit()
    {
        return $this->circuit;
    }

    /**
     * Set championship
     *
     * @param \Driverbase\Entity\Championship $championship
     * @return Event
     */
    public function setChampionship(\Driverbase\Entity\Championship $championship)
    {
        $this->championship = $championship;

        return $this;
    }

    /**
     * Get championship
     *
     * @return \Driverbase\Entity\Championship
     */
    public function getChampionship()
    {
        return $this->championship;
    }
}
