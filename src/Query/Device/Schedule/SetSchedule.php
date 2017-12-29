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
     * @var array|object
     */
    protected $data;

    /**
     * @var array
     */
    protected $parameters;


    /**
     * GetDeviceDataQuery constructor.
     * @param CloudDeviceID $cloudDeviceId
     * @param array|object $data
     * @param array $parameters
     */
    public function __construct(CloudDeviceID $cloudDeviceId, $data, array $parameters)
    {
        $this->cloudDeviceId = $cloudDeviceId;
        $this->data = $data;
        $this->parameters = $parameters;

    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->addSecurityHeaders(Request::createFromParams([
            'path' => sprintf("/%s/%s/schedule", $this->getPath($this->cloudDeviceId->getType()), $this->cloudDeviceId->getId()),
            'method' => Request::METHOD_PUT,
            'query' => $this->parameters,
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