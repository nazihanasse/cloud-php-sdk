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
 * Class AbstractPropertyQuery
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
abstract class AbstractPropertyQuery extends AbstractDeviceQuery
{
    /**
     * @var CloudDeviceID
     */
    protected $deviceId;

    /**
     * AbstractPropertyQuery constructor.
     * @param CloudDeviceID $deviceId
     */
    public function __construct(CloudDeviceID $deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @param string $path
     * @param array $data
     * @return RequestInterface
     */
    public function createPropertyRequest(string $path, array $data): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/%s/%s/%s', $this->getPath($this->deviceId->getType()), $this->deviceId->getId(), $path),
            'method' => Request::METHOD_PUT,
            'data' => $data
        ]);
    }

    public function mapResponse(ResponseInterface $response)
    {
        // TODO: Implement mapResponse() method.
    }


}