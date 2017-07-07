<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class SetPowerLevel
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetPowerLevel extends AbstractPropertyQuery
{
    /**
     * @var int
     */
    protected $powerLevel;

    /**
     * SetPowerLevel constructor.
     * @param CloudDeviceID $deviceId
     * @param int $powerLevel
     */
    public function __construct(CloudDeviceID $deviceId, int $powerLevel)
    {
        parent::__construct($deviceId);
        $this->powerLevel = $powerLevel;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('power_level', [
                'd' => $this->powerLevel
            ]);
    }

}