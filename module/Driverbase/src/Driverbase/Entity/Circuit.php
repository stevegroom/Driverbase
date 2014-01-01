<?php
namespace Driverbase\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Circuit
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Event", mappedBy="circuit")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="cIrcuit")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=false)
     */
    private $country;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Circuit
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
     * Add event
     *
     * @param \Driverbase\Entity\Event $event
     * @return Circuit
     */
    public function addEvent(\Driverbase\Entity\Event $event)
    {
        $this->event[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Driverbase\Entity\Event $event
     */
    public function removeEvent(\Driverbase\Entity\Event $event)
    {
        $this->event->removeElement($event);
    }

    /**
     * Get event
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set country
     *
     * @param \Driverbase\Entity\Country $country
     * @return Circuit
     */
    public function setCountry(\Driverbase\Entity\Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Driverbase\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}
