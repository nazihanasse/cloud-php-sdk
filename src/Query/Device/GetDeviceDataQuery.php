<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\AbstractCloudDevice;
use SkyCentrics\Cloud\Mapper\DeviceDataMapper;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDeviceDataQuery
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDeviceDataQuery implements QueryInterface
{
    /**
     * @var AbstractCloudDevice
     */
    protected $cloudDevice;

    /**
     * GetDeviceDataQuery constructor.
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
        $request = DeviceRequestFactory::createRequest($this->cloudDevice);

        $request->setPath(sprintf("%s/data", $request->getPath()));

        return $request;
    }

    /**
     * @param ResponseInterface $response
     * @return mixed|\SkyCentrics\Cloud\DTO\CloudDTOInterface
     */
    public function mapResponse(ResponseInterface $response)
    {
        return DeviceDataMapper::fromResponse($response->getData());
    }
}