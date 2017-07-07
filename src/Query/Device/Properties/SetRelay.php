<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class SetRelay
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetRelay extends AbstractPropertyQuery
{
    /**
     * @var bool
     */
    protected $on;

    /**
     * SetRelay constructor.
     * @param CloudDeviceID $deviceId
     * @param bool $on
     */
    public function __construct(CloudDeviceID $deviceId, bool $on)
    {
        parent::__construct($deviceId);
        $this->on = $on;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('relay', [
                    'd' => $this->on ? 1 : 0
                ]);
    }

}