<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\Annotation\Property;

/**
 * Class CloudMeter
 * @package SkyCentrics\Cloud\DTO\Device
 */
class CloudMeter extends AbstractCloudDevice
{
    /**
     * @var int
     *
     * @Property(key="i", to_type="int")
     */
    protected $id = 0;

    /**
     * @var int
     *
     * @Property(key="u", to_type="int")
     */
    protected $userId;

    /**
     * @var int
     *
     * @Property(key="g", to_type="int")
     */
    protected $groupId = 0;

    /**
     * @var string
     *
     * @Property(key="n", to_type="string")
     */
    protected $name;

    /**
     * @var int
     *
     * @Property(key="m", to_type="string")
     */
    protected $mac = 0;

    /**
     * @var int
     *
     * @Property(key="t", to_type="int")
     */
    protected $type = 0;


    /**
     * @var string
     *
     * @Property(key="mdl")
     */
    protected $model;


    /**
     * @var string
     *
     * @Property(key="mfg")
     */
    protected $manufacturer;

    /**
     * @var string
     *
     * @Property(key="url")
     */
    protected $url;


    /**
     * AbstractCloudDevice constructor.
     * @param int $userId
     * @param string $name
     * @param int $type
     * @param string $mac
     * @param string|null $model
     */
    public function __construct(
        int $userId,
        string $name,
        int $type,
        string $mac,
        int $groupId = 0,
        string $model = ''
    )
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->type=  $type;
        $this->mac = $mac;
        $this->model = $model;
        $this->groupId = $groupId;
    }

    /**
     * @return int
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }


    /**
     * @param string $manufacturer
     */
    public function setManufacturer(string $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

}