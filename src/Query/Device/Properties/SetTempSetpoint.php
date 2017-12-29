<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class SetTempSetpoint
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetTempSetpoint extends AbstractPropertyQuery
{
    const UNITS = 'F';
    const TYPE = 10;

    /**
     * @var int
     */
    protected $heat;

    /**
     * @var int
     */
    protected $cool;

    /**
     * @var int
     */
    protected $type;

    /**
     * SetTempSetpoint constructor.
     * @param CloudDeviceID $deviceId
     * @param int $heat
     * @param int $cool
     * @param int $type
     */
    public function __construct(CloudDeviceID $deviceId, int $heat, int $cool, int $type = self::TYPE)
    {
        parent::__construct($deviceId);
        $this->heat = $heat;
        $this->cool = $cool;
        $this->type = $type;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('temp_setpoint', [
            'setpoint' => [
                $this->heat,
                $this->cool
            ],
            'units' => self::UNITS,
            'type' => $this->type
        ]);
    }

}