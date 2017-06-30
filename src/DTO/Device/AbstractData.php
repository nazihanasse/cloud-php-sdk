<?php


namespace SkyCentrics\Cloud\DTO\Device;

use SkyCentrics\Cloud\Annotation\Property;


/**
 * Class AbstractData
 * @package SkyCentrics\Cloud\DTO\Device
 */
abstract class AbstractData
{
    /**
     * @var int
     * @Property(key="device")
     */
    protected $deviceId;

    /**
     * @var \DateTime
     * @Property(key="time")
     */
    protected $time;

    /**
     * AbstractData constructor.
     * @param $deviceId
     * @param $time
     */
    public function __construct(
        int $deviceId,
        \DateTime $time
    )
    {
        $this->deviceId = $deviceId;
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getDeviceId() : int
    {
        return $this->deviceId;
    }

    /**
     * @return \DateTime
     */
    public function getTime() : \DateTime
    {
        return $this->time;
    }

    /**
     * @param int $deviceId
     */
    public function setDeviceId(int $deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @param \DateTime $time
     */
    public function setTime(\DateTime $time)
    {
        $this->time = $time;
    }

    /**
     * @param int $type
     * @return bool
     */
    abstract public function supportType(int $type) : bool;
}