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
     * @var array
     */
    protected $data;

    /**
     * @var int
     */
    protected $day;


    /**
     * GetDeviceDataQuery constructor.
     * @param CloudDeviceID $cloudDeviceId
     * @param array $data
     * @param int $day
     */
    public function __construct(CloudDeviceID $cloudDeviceId, array $data, int $day)
    {
        $this->cloudDeviceId = $cloudDeviceId;
        $this->data = $data;
        $this->day = $day;

    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->addSecurityHeaders(Request::createFromParams([
            'path' => sprintf("/%s/%s/schedule", $this->getPath($this->cloudDeviceId->getType()), $this->cloudDeviceId->getId()),
            'method' => Request::METHOD_PUT,
            'query' => [
                'd' => $this->day
            ],
            'data' => $this->data
        ]));

    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $response->getStatusCode();
    }
}