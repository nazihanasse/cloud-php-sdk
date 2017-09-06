<?php


namespace SkyCentrics\Cloud\DTO\Device;

use SkyCentrics\Cloud\Annotation\Property;


/**
 * Class AbstractDeviceData
 * @package SkyCentrics\Cloud\DTO\Device
 */
abstract class AbstractDeviceData
{
    /**
     * @var int
     * @Property(key="device")
     */
    protected $deviceId;

    /**
     * @var \DateTime
     * @Property(key="time", to_type="\DateTime", getter="stringifyTime")
     */
    protected $time;

    /**
     * @var int|null
     * @Property(key="override")
     */
    protected $override;

    /**
     * AbstractDeviceData constructor.
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
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function stringifyTime()
    {
        return $this->time->format('Y-m-d H:i:s');
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