<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceInfo;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDeviceInfo
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDeviceInfo extends AbstractDeviceQuery
{
    /**
     * @var CloudDeviceID
     */
    protected $cloudDeviceId;

    /**
     * GetDeviceInfo constructor.
     * @param CloudDeviceID $cloudDeviceID
     */
    public function __construct(
        CloudDeviceID $cloudDeviceID
    )
    {
        $this->cloudDeviceId = $cloudDeviceID;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf("/%s/%s/info", $this->getPath($this->cloudDeviceId->getType()), $this->cloudDeviceId->getId())
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $this->map(CloudDeviceInfo::class, $response->getData());
    }
}