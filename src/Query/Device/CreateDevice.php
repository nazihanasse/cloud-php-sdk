<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class CreateDevice
 * @package SkyCentrics\Cloud\Query\Device
 */
class CreateDevice extends AbstractDeviceQuery
{
    /**
     * @var AbstractCloudDevice
     */
    protected $cloudDevice;

    /**
     * CreateDevice constructor.
     * @param AbstractCloudDevice $cloudDevice
     */
    public function __construct(AbstractCloudDevice $cloudDevice)
    {
        $this->cloudDevice = $cloudDevice;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->addSecurityHeaders(Request::createFromParams([
            'path' => sprintf('/%s/', $this->getPath($this->cloudDevice->getDeviceType())),
            'method' => Request::METHOD_POST,
            'data' => $this->map($this->cloudDevice)
        ]));
    }

    /**
     * @param ResponseInterface $response
     * @return int|null
     */
    public function mapResponse(ResponseInterface $response)
    {
        $id = $response->getIdFromLocation();

        $this->cloudDevice->setId($id);

        return $id;
    }
}