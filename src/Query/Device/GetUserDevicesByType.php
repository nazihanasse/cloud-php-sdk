<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetUserDevicesByType
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetUserDevicesByType extends AbstractDeviceQuery
{
    /**
     * @var AccountInterface
     */
    protected $account;

    /**
     * @var int
     */
    protected $type;

    /**
     * GetUserDevices constructor.
     * @param AccountInterface $account
     * @param int $type
     */
    public function __construct(
        AccountInterface $account,
        int $type
    )
    {
        $this->account = $account;
        $this->type = $type;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf("/%s/", $this->getPath($this->type)),
            'query' => ['auth' => $this->account->getAuth()]
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return array|\SkyCentrics\Cloud\DTO\\Device\CloudDevice
     */
    public function mapResponse(ResponseInterface $response)
    {
        $devices = [];

        foreach ($response->getData() as $deviceData) {
            $devices[] = $this->map(AbstractCloudDevice::getDeviceClassFromType($this->type), $deviceData);
        }

        return $devices;
    }
}