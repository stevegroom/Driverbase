<?php
namespace Driverbase\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Championship
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $season;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @ORM\OneToMany(targetEntity="Title", mappedBy="championship")
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="Event", mappedBy="championship")
     */
    private $event;


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
     * @return Championship
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
     * Set season
     *
     * @param integer $season
     * @return Championship
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return integer
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Championship
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add event
     *
     * @param \Driverbase\Entity\Event $event
     * @return Championship
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
}
