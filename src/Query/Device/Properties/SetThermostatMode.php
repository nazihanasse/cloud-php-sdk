<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class SetThermostatMode
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetThermostatMode extends AbstractPropertyQuery
{
    const MODE_OFF = 0;
    const MODE_COOL = 3;
    const MODE_HEAT = 4;
    const MODE_FAN = 8;

    /**
     * @var int
     */
    protected $mode;

    /**
     * SetThermostatMode constructor.
     * @param CloudDeviceID $deviceId
     * @param int $mode
     */
    public function __construct(CloudDeviceID $deviceId, int $mode = self::MODE_OFF)
    {
        parent::__construct($deviceId);

        $this->mode = $mode;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('thermostat_mode', [
            'data' => $this->mode
        ]);
    }
}