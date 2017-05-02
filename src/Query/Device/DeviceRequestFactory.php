<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\AbstractCloudDevice;
use SkyCentrics\Cloud\Transport\Request\Request;

class DeviceRequestFactory
{
    const PATHS = [
        'devices' => [],
        'thermostats' => [],
        'smartplugs' => []
    ];

    public static function getPaths()
    {
        return self::PATHS;
    }

    public static function createRequest(AbstractCloudDevice $cloudDevice = null)
    {
        if($cloudDevice === null){
            foreach (self::getPaths() as $path => $typeIds){
                yield Request::createFromParams([
                    'path' => sprintf("/%s/", $path)
                ]);
            }
        }else{
            foreach (self::getPaths() as $path => $typeIds){
                if(in_array($cloudDevice->getDeviceType(), $typeIds, true)){
                    return Request::createFromParams(['path' => sprintf("/%s/", $path)]);
                }
            }
        }

        return null;
    }
}