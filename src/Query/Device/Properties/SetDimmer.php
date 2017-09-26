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
     * @var int|null
     */
    protected $id;

    /**
     * SetDimmer constructor.
     * @param CloudDeviceID $deviceId
     * @param int $dimmer
     * @param int|null $id
     */
    public function __construct(CloudDeviceID $deviceId, int $dimmer, int $id = null)
    {
        parent::__construct($deviceId);
        $this->dimmer = $dimmer;
        $this->id = $id;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('dimmer',
            is_int($this->id)
            ? ['id' => $this->id, 'data' => $this->dimmer]
            : ['d' => $this->dimmer]
        );
    }
}