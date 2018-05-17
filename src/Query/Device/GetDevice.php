<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Device\CloudMeter;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDeviceQuery
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDevice extends AbstractDeviceQuery
{
    /**
     * @var CloudDeviceID
     */
    protected $cloudDeviceID;

    /**
     * GetDeviceQuery constructor.
     * @param CloudDeviceID $cloudDeviceID
     */
    public function __construct(
        CloudDeviceID $cloudDeviceID
    )
    {
        $this->cloudDeviceID = $cloudDeviceID;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf("/%s/%s/", $this->getPath($this->cloudDeviceID->getType()), $this->cloudDeviceID->getId())
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return \SkyCentrics\Cloud\DTO\CloudDTOInterface
     */
    public function mapResponse(ResponseInterface $response)
    {
        $deviceData = $response->getData();
        return $this->map(
            AbstractCloudDevice::getDeviceClassFromType($this->cloudDeviceID->getType()),
            $deviceData
        );
    }
}