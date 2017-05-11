<?php


namespace SkyCentrics\Cloud\DTO\Device;


/**
 * Class AbstractData
 * @package SkyCentrics\Cloud\DTO\Device
 */
abstract class AbstractData
{
    /**
     * @var int
     */
    protected $deviceId;

    /**
     * @var \DateTime
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
     * @param int $type
     * @return bool
     */
    abstract public function supportType(int $type) : bool;

    /**
     * @param array $response
     * @return AbstractData
     */
    abstract public static function fromResponse(array $response) : AbstractData;
}