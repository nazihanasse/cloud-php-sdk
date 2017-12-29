<?php


namespace SkyCentrics\Cloud\DTO;

use SkyCentrics\Cloud\Annotation\Property;


/**
 * Class CloudGroup
 * @package SkyCentrics\Cloud\DTO
 */
class CloudGroup implements CloudDTOInterface
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
    protected $userId;

    /**
     * @var int
     *
     * @Property(key="p")
     */
    protected $parent;

    /**
     * @var int
     *
     * @Property(key="t")
     * @TODO: it is a temp property's name is needed for mapping
     */
    protected $target = 0;

    /**
     * @var string
     * @Property(key="address.street")
     */
    protected $street;

    /**
     * @var string
     * @Property(key="address.city")
     */
    protected $city;

    /**
     * @var string
     * @Property(key="address.state")
     */
    protected $state;

    /**
     * @var string
     * @Property(key="address.zip")
     */
    protected $zip;

    /**
     * @var string
     * @Property(key="address.country")
     */
    protected $country;

    /**
     * @var string
     * @Property(key="address.lat")
     */
    protected $lat;

    /**
     * @var string
     * @Property(key="address.long")
     */
    protected $long;

    /**
     * CloudGroup constructor.
     * @param string $name
     * @param int $userId
     * @param int $parent
     */
    public function __construct(string $name, int $userId, int $parent = 0)
    {
        $this->id = 0;
        $this->name = $name;
        $this->userId = $userId;
        $this->parent = $parent;
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
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param int $parent
     */
    public function setParent(int $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     */
    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return string
     */
    public function getLong(): string
    {
        return $this->long;
    }

    /**
     * @param string $long
     */
    public function setLong(string $long): void
    {
        $this->long = $long;
    }
}