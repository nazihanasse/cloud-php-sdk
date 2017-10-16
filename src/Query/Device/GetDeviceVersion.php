<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceVersion;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDeviceVersion
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDeviceVersion extends AbstractDeviceQuery
{
    /**
     * @var CloudDeviceID
     */
    protected $cloudDeviceId;

    /**
     * GetDeviceVersion constructor.
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
            'path' => sprintf("/%s/%s/version", $this->getPath($this->cloudDeviceId->getType()), $this->cloudDeviceId->getId())
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $this->map(CloudDeviceVersion::class, $response->getData());
    }
}