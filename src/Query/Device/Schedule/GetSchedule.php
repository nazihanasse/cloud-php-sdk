<?php


namespace SkyCentrics\Cloud\Query\Device\Schedule;

use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Mapper\AnnotationMapper;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;
use SkyCentrics\Cloud\Query\Device\AbstractDeviceQuery;

/**
 * Class GetSchedule
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetSchedule extends AbstractDeviceQuery
{
    /**
     * @var GetSchedule
     */
    protected $cloudDeviceId;


    /**
     * GetDeviceDataQuery constructor.
     * @param CloudDeviceID $cloudDeviceId
     */
    public function __construct(CloudDeviceID $cloudDeviceId)
    {
        $this->cloudDeviceId = $cloudDeviceId;

    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf("/%s/%s/schedule", $this->getPath($this->cloudDeviceId->getType()), $this->cloudDeviceId->getId())
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed|\SkyCentrics\Cloud\DTO\CloudDTOInterface
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $response->getData();
    }

}