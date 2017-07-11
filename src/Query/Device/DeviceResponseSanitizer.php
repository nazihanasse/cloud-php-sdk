<?php


namespace SkyCentrics\Cloud\Query\Device;

/**
 * Class DeviceResponseSanitizer
 * @package SkyCentrics\Cloud\Query\Device
 */
class DeviceResponseSanitizer
{
    /**
     * @param $deviceData
     * @return array
     */
    public static function sanitize($deviceData)
    {
        $result = [];

        foreach ([
            'id' => 'i',
            'user' => 'u',
            'name' => 'n',
            'type' => 't',
            'mac' => 'm',
            'group' => 'g'
        ] as $key => $value){
            $result[$key] = $deviceData[$key] ?? $deviceData[$value];
        }

        return $result;
    }
}