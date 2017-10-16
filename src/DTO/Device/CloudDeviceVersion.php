<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;

/**
 * Class CloudDeviceVersion
 * @package SkyCentrics\Cloud\DTO\Device
 */
class CloudDeviceVersion implements CloudDTOInterface
{

    /**
     * @var string
     *
     * @Property(key="AFW")
     */
    protected $firmware = "";

    /**
     * @var string
     *
     * @Property(key="Build Time")
     */
    protected $buildTime;



    /**
     * @return string
     */
    public function getFirmware()
    {
        return $this->firmware;
    }

    /**
     * @return string
     */
    public function getBuildTime()
    {
        return $this->buildTime;
    }

}