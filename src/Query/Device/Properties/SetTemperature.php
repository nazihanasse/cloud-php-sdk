<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Query\Device\AbstractDeviceQuery;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class SetTemperature
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetTemperature extends AbstractPropertyQuery
{
    const HOLD = 0;

    /**
     * @var int
     */
    protected $cool;

    /**
     * @var int
     */
    protected $heat;

    /**
     * SetTemperature constructor.
     * @param CloudDeviceID $deviceId
     * @param int $cool
     * @param int $heat
     */
    public function __construct(CloudDeviceID $deviceId, int $cool, int $heat)
    {
        parent::__construct($deviceId);
        $this->cool = $cool;
        $this->heat = $heat;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('temp2', [
                'cool' => $this->cool,
                'heat' => $this->heat,
                'hold' => self::HOLD
            ]);
    }

}