<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class SetFanMode
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetFanMode extends AbstractPropertyQuery
{
    const MODE_AUTO = 0;
    const MODE_LOW = 3;
    const MODE_HIGH = 5;

    /**
     * @var int
     */
    protected $mode;

    /**
     * SetFanMode constructor.
     * @param CloudDeviceID $deviceId
     * @param int $mode
     */
    public function __construct(CloudDeviceID $deviceId, int $mode = self::MODE_AUTO)
    {
        parent::__construct($deviceId);
        $this->mode = $mode;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('fan_mode', ['data' => $this->mode]);
    }

}