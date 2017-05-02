<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\CloudDevice;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class DeviceMapperTrait
 * @package SkyCentrics\Cloud\Query\Device
 */
trait DeviceMapperTrait
{
    /**
     * @param array $responseData
     * @return CloudDevice
     */
    public function fromResponse(array $responseData)
    {
        $user = $responseData['user'] ?? $responseData['u'];
        $name = $responseData['name'] ?? $responseData['n'];
        $type = $responseData['type'] ?? $responseData['t'];
        $mac = $responseData['mac'] ?? $responseData['m'];
        $group = $responseData['group'] ?? $responseData['g'];
        $id = $responseData['id'] ?? $responseData['i'];

        $device = new CloudDevice(
            (int)$user,
            $name,
            (int)$type,
            $mac,
            (int)$group
        );

        $device->setId((int)$id);

        return $device;
    }

    /**
     * @param AbstractCloudDevice $cloudDevice
     */
    public function toRequest(AbstractCloudDevice $cloudDevice)
    {
        // @TODO: realize
    }
}