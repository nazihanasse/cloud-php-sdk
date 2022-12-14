<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class CheckDeviceByMac
 * @package SkyCentrics\Cloud\Query\User
 */
class GetDeviceByMac extends AbstractDeviceQuery
{
    /**
     * @var string
     */
    protected $mac;

    /**
     * @var int
     */
    protected $type;

    /**
     * GetUserByEmail constructor.
     * @param string $mac
     * @param int $type
     */
    public function __construct(
        string $mac,
        int $type
    )
    {
        $this->mac = $mac;
        $this->type = $type;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/%s/', $this->getPath($this->type)),
            'query' => [
                'mac' => $this->mac
            ]
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
            AbstractCloudDevice::getDeviceClassFromType($this->type),
            $deviceData
        );
    }
}