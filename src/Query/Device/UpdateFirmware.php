<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class UpdateDevice
 * @package SkyCentrics\Cloud\Query\Device
 */
class UpdateFirmware extends AbstractDeviceQuery
{
    /**
     * @var CloudDeviceID
     */
    protected $cloudDevice;

    /**
     * @var array
     */
    protected $data;

    /**
     * UpdateDevice constructor.
     * @param CloudDeviceID $cloudDevice
     * @param array $data
     */
    public function __construct(
        CloudDeviceID $cloudDevice,
        array $data
    )
    {
        $this->cloudDevice = $cloudDevice;
        $this->data = $data;
    }


    /**
     * @return RequestInterface|MultiRequestInterface
     * @throws \SkyCentrics\Cloud\Exception\CloudQueryException
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/%s/%s/update', $this->getPath($this->cloudDevice->getType()), $this->cloudDevice->getId()),
            'method' => Request::METHOD_PUT,
            'data' => $this->data
        ]);
    }

    /**
     * @param ResponseInterface|MultiResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        // TODO: Implement mapResponse() method.
    }
}