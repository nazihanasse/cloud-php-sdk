<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class UpdateDevice
 * @package SkyCentrics\Cloud\Query\Device
 */
class UpdateDevice extends AbstractDeviceQuery
{
    /**
     * @var AbstractCloudDevice
     */
    protected $cloudDevice;

    /**
     * UpdateDevice constructor.
     * @param AbstractCloudDevice $cloudDevice
     */
    public function __construct(
        AbstractCloudDevice $cloudDevice
    )
    {
        $this->cloudDevice = $cloudDevice;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->addSecurityHeaders(Request::createFromParams([
            'path' => sprintf('/%s/%s/', $this->getPath($this->cloudDevice->getDeviceType()), $this->cloudDevice->getId()),
            'method' => Request::METHOD_PUT,
            'data' => $this->sanitizeDeviceInfo($this->map($this->cloudDevice), $this->cloudDevice->getDeviceType())
        ]));
    }

    /**
     * @param ResponseInterface|MultiResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        // TODO: Implement mapResponse() method.
    }
}