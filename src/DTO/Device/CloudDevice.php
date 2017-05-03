<?php


namespace SkyCentrics\Cloud\DTO\Device;

/**
 * Class CloudDevice
 * @package SkyCentrics\Cloud\DTO
 */
class CloudDevice extends AbstractCloudDevice
{
    /**
     * @return array
     */
    public static function getSupportedTypes(): array
    {
        return [];
    }
}