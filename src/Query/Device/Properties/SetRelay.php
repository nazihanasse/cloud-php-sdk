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
     * @var int|null
     */
    protected $id;

    /**
     * SetRelay constructor.
     * @param CloudDeviceID $deviceId
     * @param bool $on
     * @param int|null $id
     */
    public function __construct(CloudDeviceID $deviceId, bool $on, int $id = null)
    {
        parent::__construct($deviceId);
        $this->on = $on;
        $this->id = $id;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        $id = $this->id;
        $relay = (int)$this->on;

        return $this->createPropertyRequest('relay',
            is_int($id)
            ? ['id' => $id, 'data' => $relay]
            : ['d' => $relay]
        );
    }

}