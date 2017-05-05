<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Mapper\DeviceMapper;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDeviceQuery
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDeviceQuery extends AbstractDeviceQuery
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
            'path' => sprintf("/%s/%s", $this->getPath(), $this->cloudDeviceID->getId())
        ]);
    }

    /**
     * @param ResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        return DeviceMapper::fromResponse($response->getData());
    }

    /**
     * @return CloudDeviceID
     */
    public function getDevice(): CloudDeviceID
    {
        return $this->cloudDeviceID;
    }
}