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
     * @var int|null
     * @Property(key="override")
     */
    protected $override;

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
     * @return int|null
     */
    public function getOverride()
    {
        return $this->override;
    }

    /**
     * @param int $override
     */
    public function setOverride(int $override)
    {
        $this->override = $override;
    }

    /**
     * @param int $type
     * @return bool
     */
    abstract public static function supportType(int $type) : bool;
}