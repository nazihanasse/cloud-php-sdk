<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\Mapper\DeviceMapper;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\Request\MultiRequest;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetUserDevices
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetUserDevicesQuery implements QueryInterface
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
        foreach (DeviceRequestFactory::createRequest() as $request){
            $request->setQuery([
                'auth' => $this->account->getAuth()
            ]);
            $requests[] = $request;
        }

        return new MultiRequest($requests);
    }

    /**
     * @param ResponseInterface $response
     * @return array|\SkyCentrics\Cloud\DTO\\Device\CloudDevice
     */
    public function mapResponse(ResponseInterface $response)
    {
        if($response instanceof MultiResponseInterface){
            $devices = [];

            /** @var ResponseInterface $responseItem */
            foreach ($response as $responseItem){
                foreach ($responseItem->getData() as $deviceData){
                    $devices[] = DeviceMapper::fromResponse($deviceData);
                }
            }

            return $devices;

        }else{
            return DeviceMapper::fromResponse($response->getData());
        }
    }
}