<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class SetThermostatHoldMode
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetThermostatHoldMode extends AbstractPropertyQuery
{

    /**
     * @var bool
     */
    protected $mode;

    /**
     * SetThermostatMode constructor.
     * @param CloudDeviceID $deviceId
     * @param bool $mode
     */
    public function __construct(CloudDeviceID $deviceId, bool $mode = false)
    {
        parent::__construct($deviceId);

        $this->mode = $mode;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('hold_mode', [
            'data' => $this->mode
        ]);
    }
}