<?php


namespace SkyCentrics\Cloud\DTO\Device;
use SkyCentrics\Cloud\DTO\Device\Data\ChargerData;
use SkyCentrics\Cloud\DTO\Device\Data\CTThermostatData;
use SkyCentrics\Cloud\DTO\Device\Data\PlugData;
use SkyCentrics\Cloud\DTO\Device\Data\PoolPumpData;
use SkyCentrics\Cloud\DTO\Device\Data\SkySnapData;
use SkyCentrics\Cloud\DTO\Device\Data\ThermostatData;
use SkyCentrics\Cloud\DTO\Device\Data\WaterHeaterData;
use SkyCentrics\Cloud\Exception\CloudQueryException;

/**
 * Class CloudDevice
 * @package SkyCentrics\Cloud\DTO
 */
class CloudDevice extends AbstractCloudDevice
{
    /**
     * @param $type
     * @return string
     * @throws CloudQueryException
     */
    public static function getDeviceDataDTO($type)
    {
        foreach ([
           ThermostatData::class,
           SkySnapData::class,
           PlugData::class,
           PoolPumpData::class,
           WaterHeaterData::class,
           ChargerData::class,
           CTThermostatData::class
                ] as $className){
           if(!class_exists($className)){
               throw new CloudQueryException();
           }

           if($className::supportType($type)){
               $cloudDataClass = $className;
               break;
           }
       }

       if(empty($cloudDataClass)){
           throw new CloudQueryException(sprintf("Missing data class for the type %s !", $type));
       }

       return $cloudDataClass;
    }
}