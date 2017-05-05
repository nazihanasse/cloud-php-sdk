<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;
use SkyCentrics\Cloud\Exception\CloudQueryException;
use SkyCentrics\Cloud\Query\QueryInterface;

abstract class AbstractDeviceQuery implements QueryInterface
{
    private $paths = [
        'devices' => [
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_32,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_30,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_50,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_80
        ],
        'thermostats' => [],
        'smartplugs' => []
    ];

    public function getPath() : string
    {
        $device = $this->getDevice();

        $deviceType = $device->getDeviceType();

        foreach ($this->paths as $path => $types){
            if(in_array($deviceType, $types, true)){
                return $path;
                break;
            }
        }

        throw new CloudQueryException(sprintf("Path for devices type %s doesn't exists !", $deviceType));
    }

    abstract public function getDevice() : CloudDeviceID;
}