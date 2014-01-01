<?php
namespace Driverbase\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Title
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
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $class;

    /**
     * @ORM\ManyToOne(targetEntity="Championship", inversedBy="title")
     * @ORM\JoinColumn(name="championship_id", referencedColumnName="id", nullable=false)
     */
    private $championship;

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
     * @return Title
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
     * Set type
     *
     * @param string $type
     * @return Title
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return Title
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set championship
     *
     * @param \Driverbase\Entity\Championship $championship
     * @return Title
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
