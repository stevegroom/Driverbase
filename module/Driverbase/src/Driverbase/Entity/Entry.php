<?php
namespace Driverbase\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Entry
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(nullable=true)
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="entry")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", nullable=false)
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="entry")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id", nullable=false)
     */
    private $team;

    /**
     * @ORM\ManyToMany(targetEntity="Driver", mappedBy="entry")
     */
    private $driver;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->driver = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set car
     *
     * @param string $car
     * @return Entry
     */
    public function setCar($car)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return string
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set event
     *
     * @param \Driverbase\Entity\Event $event
     * @return Entry
     */
    public function setEvent(\Driverbase\Entity\Event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Driverbase\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set team
     *
     * @param \Driverbase\Entity\Team $team
     * @return Entry
     */
    public function setTeam(\Driverbase\Entity\Team $team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \Driverbase\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Add driver
     *
     * @param \Driverbase\Entity\Driver $driver
     * @return Entry
     */
    public function addDriver(\Driverbase\Entity\Driver $driver)
    {
        $this->driver[] = $driver;

        return $this;
    }

    /**
     * Remove driver
     *
     * @param \Driverbase\Entity\Driver $driver
     */
    public function removeDriver(\Driverbase\Entity\Driver $driver)
    {
        $this->driver->removeElement($driver);
    }

    /**
     * Get driver
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDriver()
    {
        return $this->driver;
    }
}
