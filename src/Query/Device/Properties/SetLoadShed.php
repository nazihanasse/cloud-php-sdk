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
 * Class SetLoadShed
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetLoadShed extends AbstractPropertyQuery
{
    /**
     * @var bool
     */
    protected $statusOn;

    /**
     * SetLoadShed constructor.
     * @param CloudDeviceID $deviceId
     * @param bool $statusOn
     */
    public function __construct(CloudDeviceID $deviceId, bool $statusOn = true)
    {
        parent::__construct($deviceId);
        $this->statusOn = $statusOn;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('load_shed', [
                's' => $this->statusOn ? 1 : 0
            ]);
    }

}