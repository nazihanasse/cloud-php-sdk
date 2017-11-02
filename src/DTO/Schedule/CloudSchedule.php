<?php


namespace SkyCentrics\Cloud\DTO\Schedule;

use SkyCentrics\Cloud\DTO\CloudDTOInterface;


/**
 * Class CloudSchedule
 * @package SkyCentrics\Cloud\DTO\Schedule
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
    protected $data = [];

    /**
     * CloudSchedule constructor.
     * @param string $name
     * @param int $user
     * @param int $type
     * @param array $data
     */
    public function __construct($name, $user, $type, $data)
    {
        $this->name = $name;
        $this->user = $user;
        $this->type = $type;
        $this->data = $data;
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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setDays(array $data)
    {
        $this->data = $data;
    }
}