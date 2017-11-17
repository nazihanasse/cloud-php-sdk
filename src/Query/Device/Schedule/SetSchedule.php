<?php


namespace SkyCentrics\Cloud\Query\Device\Schedule;

use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Schedule\CloudSchedule;
use SkyCentrics\Cloud\Mapper\AnnotationMapper;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;
use SkyCentrics\Cloud\Query\Device\AbstractDeviceQuery;


class SetSchedule extends AbstractDeviceQuery
{
    /**
     * @var CloudDeviceID
     */
    protected $cloudDeviceId;

    /**
     * @var CloudSchedule
     */
    protected $cloudSchedule;


    /**
     * GetDeviceDataQuery constructor.
     * @param CloudDeviceID $cloudDeviceId
     * @param CloudSchedule $cloudSchedule
     */
    public function __construct(CloudDeviceID $cloudDeviceId, CloudSchedule $cloudSchedule)
    {
        $this->cloudDeviceId = $cloudDeviceId;
        $this->cloudSchedule = $cloudSchedule;

    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {

        return $this->addSecurityHeaders(Request::createFromParams([
            'path' => sprintf("/%s/%s/schedule", $this->getPath($this->cloudDeviceId->getType()), $this->cloudDeviceId->getId()),
            'method' => Request::METHOD_POST,
            'data' => $this->map($this->cloudSchedule)
        ]));

    }

    /**
     * @param ResponseInterface $response
     * @return int|null
     */
    public function mapResponse(ResponseInterface $response)
    {
        $id = $response->getIdFromLocation();

        $this->cloudSchedule->setId($id);

        return $id;
    }
}