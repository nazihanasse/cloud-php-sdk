<?php


namespace SkyCentrics\Cloud\DTO\Device;


abstract class AbstractDeviceData
{
    protected $deviceId;

    protected $time;

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

    public function getDeviceId() : int
    {
        return $this->deviceId;
    }

    public function getTime() : \DateTime
    {
        return $this->time;
    }

    abstract public function supportType(int $type) : bool;

    abstract public static function fromResponse(array $response) : AbstractDeviceData;
}