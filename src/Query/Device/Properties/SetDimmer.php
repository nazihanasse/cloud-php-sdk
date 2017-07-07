<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class SetDimmer
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetDimmer extends AbstractPropertyQuery
{
    /**
     * @var int
     */
    protected $dimmer;

    /**
     * SetDimmer constructor.
     * @param CloudDeviceID $deviceId
     * @param int $dimmer
     */
    public function __construct(CloudDeviceID $deviceId, int $dimmer)
    {
        parent::__construct($deviceId);
        $this->dimmer = $dimmer;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('dimmer', [
                'd' => $this->dimmer
            ]);
    }
}