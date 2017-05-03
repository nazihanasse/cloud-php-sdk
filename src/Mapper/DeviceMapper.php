<?php


namespace SkyCentrics\Cloud\Mapper;


use SkyCentrics\Cloud\DTO\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\CloudDevice;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class DeviceMapperTrait
 * @package SkyCentrics\Cloud\Query\Device
 */
class DeviceMapper implements MapperInterface
{
    /**
     * @param array $responseData
     * @return CloudDTOInterface
     */
    public static function fromResponse(array $responseData) : CloudDTOInterface
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
     * @param CloudDTOInterface $cloudDevice
     * @return array
     */
    public static function toRequest(CloudDTOInterface $cloudDevice) : array
    {
        // @TODO: realize
    }
}