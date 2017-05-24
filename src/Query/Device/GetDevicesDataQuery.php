<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Mapper\AnnotationMapper;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\MultiRequest;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDevicesDataQuery
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDevicesDataQuery extends AbstractDeviceQuery
{
    /**
     * @var array<AbstractCloudDevice>
     */
    protected $devices;

    /**
     * @var AbstractCloudDevice
     */
    protected $currentDevice;

    /**
     * @var array
     */
    protected $mappers;

    /**
     * GetDevicesDataQuery constructor.
     * @param array<AbstractCloudDevice> $devices
     */
    public function __construct(
        array $devices
    )
    {
        $this->devices = $devices;
        $this->mappers = [];
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        $requests = [];

        /** @var AbstractCloudDevice $device */
        foreach ($this->devices as $device) {

            $this->currentDevice = $device;

            $path = sprintf("/%s/%s/data", $this->getPath(new CloudDeviceID($device->getId(), $device->getDeviceType())), $device->getId());

            $requests[] = Request::createFromParams([
                'path' => $path
            ]);

            $this->mappers[$path] = CloudDevice::getDeviceDataDTO($device->getDeviceType());
        }

        return new MultiRequest($requests);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    public function mapResponse(ResponseInterface $response)
    {
        $respData = $response->getData();

        $deviceDataDTO = $this->mappers[$response->getRequest()->getPath()];

        AnnotationMapper::fromResponse($respData, $deviceDataDTO::fromResponse($respData));

        return $deviceDataDTO;
    }
}