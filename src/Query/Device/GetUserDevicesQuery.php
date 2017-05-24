<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\Mapper\DeviceMapper;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\Request\MultiRequest;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetUserDevices
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetUserDevicesQuery extends AbstractDeviceQuery
{
    /**
     * @var AccountInterface
     */
    protected $account;

    /**
     * GetUserDevices constructor.
     * @param AccountInterface $account
     */
    public function __construct(
        AccountInterface $account
    )
    {
        $this->account = $account;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        $requests = [];

        /** @var RequestInterface $request */
        foreach ($this->getPaths() as $path){
            $requests[] = Request::createFromParams([
                'path' => sprintf("/%s/", $path),
                'query' => ['auth' => $this->account->getAuth()]
            ]);
        }

        return new MultiRequest($requests);
    }

    /**
     * @param ResponseInterface $response
     * @return array|\SkyCentrics\Cloud\DTO\\Device\CloudDevice
     */
    public function mapResponse(ResponseInterface $response)
    {
        $devices = [];

        foreach ($response->getData() as $deviceData){
            $devices[] = DeviceMapper::fromResponse($deviceData);
        }

        return $devices;
    }
}