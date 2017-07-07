<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class SetEvent
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetEvent extends AbstractPropertyQuery
{
    const CPE = 0;
    const GE = 1;
    const LU = 2;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var int
     */
    protected $event;

    /**
     * SetEvent constructor.
     * @param CloudDeviceID $deviceId
     * @param int $event
     * @param int $duration
     */
    public function __construct(CloudDeviceID $deviceId, int $event = self::CPE, int $duration = 0)
    {
        parent::__construct($deviceId);
        $this->event = $event;
        $this->duration = $duration;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('event', [
                'duration' => $this->duration,
                'event' => ['CPE', 'GE', 'LU'][$this->event]
            ]);
    }
}