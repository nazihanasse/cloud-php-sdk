<?php


namespace SkyCentrics\Cloud\DTO;


/**
 * Class CloudSchedule
 * @package SkyCentrics\Cloud\DTO
 */
class CloudSchedule implements CloudDTOInterface
{
    /**
     * @var int
     *
     * @Property(key="i")
     */
    protected $id;

    /**
     * @var string
     *
     * @Property(key="n")
     */
    protected $name;

    /**
     * @var int
     *
     * @Property(key="u")
     */
    protected $user;


    /**
     * @var int
     *
     * @Property(key="t")
     */
    protected $type;


    /**
     * @var array
     *
     * @Property(key="d")
     */
    protected $days;

    /**
     * CloudSchedule constructor.
     * @param string $name
     * @param int $user
     */
    public function __construct($name, $user)
    {
        $this->name = $name;
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param int $user
     */
    public function setUser(int $user)
    {
        $this->user = $user;
    }


    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param array $days
     */
    public function setDays(array $days)
    {
        $this->days = $days;
    }
}