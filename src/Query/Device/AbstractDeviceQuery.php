<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;
use SkyCentrics\Cloud\Exception\CloudQueryException;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\QueryInterface;


/**
 * Class AbstractDeviceQuery
 * @package SkyCentrics\Cloud\Query\Device
 */
abstract class AbstractDeviceQuery extends AbstractQuery
{
    private $paths = [
        'devices' => [
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_32,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_30,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_50,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_80,
            DeviceTypeInterface::TYPE_GENERIC_THERMOSTAT,
            DeviceTypeInterface::TYPE_EMERSON_SWITCH,
            DeviceTypeInterface::TYPE_EMERSON,
            DeviceTypeInterface::TYPE_SIEMENS,
            DeviceTypeInterface::TYPE_MITSUBISHI,
            DeviceTypeInterface::TYPE_ISLAND_AIRE_PTAC,
            DeviceTypeInterface::TYPE_AO_SMITH_ELECTRIC_RESISTANCE,
            DeviceTypeInterface::TYPE_AO_SMITH_HEAT_PUMP,
            DeviceTypeInterface::TYPE_GE,
            DeviceTypeInterface::TYPE_VAUGHN,
            DeviceTypeInterface::TYPE_CLIPPER_CREEK,
            DeviceTypeInterface::TYPE_PENTAIR,
            DeviceTypeInterface::TYPE_GENERIC_WATER_HEATER,
            DeviceTypeInterface::TYPE_GENERIC_EV_CHARGER,
            DeviceTypeInterface::TYPE_GENERIC_POOL_PUMP,
            DeviceTypeInterface::TYPE_SIEMENS,
            DeviceTypeInterface::TYPE_SIEMENS,
            DeviceTypeInterface::TYPE_PISNAP_3,
            DeviceTypeInterface::TYPE_6_DEPRECATED,
            DeviceTypeInterface::TYPE_DEVICE_TYPE_255
        ],
        'thermostats' => [
            DeviceTypeInterface::TYPE_THERMOSTAT_DEPRECATED
        ],
        'smartplugs' => [
            DeviceTypeInterface::TYPE_PISNAP_3_DEPRECATED,
            DeviceTypeInterface::TYPE_GENERIC_METERING_PLUG,
            DeviceTypeInterface::TYPE_SKYPLUG_110
        ],
        'cameras' => [
            0
        ],
        'meters' => [
            DeviceTypeInterface::TYPE_METERS_0
        ]
    ];

    /**
     * @param int $deviceType
     * @return string
     * @throws CloudQueryException
     */
    public function getPath(int $deviceType) : string
    {
        foreach ($this->paths as $path => $types){
            if(in_array($deviceType, $types, true)){
                return $path;
                break;
            }
        }

        throw new CloudQueryException(sprintf("Path for devices type %s doesn't exists !", $deviceType));
    }

    /**
     * @return array
     */
    public function getPaths() : array
    {
        return array_keys($this->paths);
    }
}