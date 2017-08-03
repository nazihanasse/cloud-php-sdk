<?php


namespace SkyCentrics\Cloud\DTO;

use SkyCentrics\Cloud\Annotation\Property;


/**
 * Class CloudOrganization
 * @package SkyCentrics\Cloud\DTO
 */
class CloudOrganization implements CloudDTOInterface
{
    /**
     * @var int
     *
     * @Property(key="id")
     */
    protected $id;

    /**
     * @var string
     *
     * @Property(key="name")
     */
    protected $name;

    /**
     * @var int
     *
     * @Property(key="user")
     */
    protected $user;

    /**
     * CloudOrganization constructor.
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
}