<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;

/**
 * Class CloudDeviceInfo
 * @package SkyCentrics\Cloud\DTO\Device
 */
class CloudDeviceInfo implements CloudDTOInterface
{
    /**
     * @var int
     *
     * @Property(key="version")
     */
    protected $version;

    /**
     * @var int
     *
     * @Property(key="vendor")
     */
    protected $vendor;

    /**
     * @var array
     *
     * @Property(key="type")
     */
    protected $type = [
        'code' => null,
        'desc' => null
    ];

    /**
     * @var int
     *
     * @Property(key="revision")
     */
    protected $revision;

    /**
     * @var int
     *
     * @Property(key="capabilities")
     */
    protected $capabilities;

    /**
     * @var string
     *
     * @Property(key="model")
     */
    protected $model = "";

    /**
     * @var string
     *
     * @Property(key="serial")
     */
    protected $serial;

    /**
     * @var array
     *
     * @Property(key="firmware")
     */
    protected $firmware = [
        'version' => null,
        'build' => null
    ];

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return int
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @return array
     */
    public function getType(): array
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * @return int
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * @return array
     */
    public function getFirmware(): array
    {
        return $this->firmware;
    }
}