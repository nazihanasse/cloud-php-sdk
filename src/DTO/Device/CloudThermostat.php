<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\DTO\AbstractCloudDevice;

/**
 * Class ThermostatCloudDevice
 * @package SkyCentrics\Cloud\DTO\Device
 */
class CloudThermostat extends AbstractCloudDevice
{

    public static function getSupportedTypes(): array
    {
        return [];
    }
}