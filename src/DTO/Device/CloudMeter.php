<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\Annotation\Property;

/**
 * Class CloudMeter
 * @package SkyCentrics\Cloud\DTO\Device
 */
class CloudMeter
{

    /**
     * @var CloudMeterGeneralData
     *
     * @Property(key="d", map="SkyCentrics\Cloud\DTO\Device\CloudMeterGeneralData")
     */
    protected $data;

    /**
     * @var CloudMeterInfo
     *
     * @Property(key="i", map="SkyCentrics\Cloud\DTO\Device\CloudMeterInfo")
     */
    protected $info;

    /**
     * @return CloudMeterGeneralData
     */
    public function getData(): CloudMeterGeneralData
    {
        return $this->data;
    }

    /**
     * @param CloudMeterGeneralData $data
     */
    public function setData(CloudMeterGeneralData $data): void
    {
        $this->data = $data;
    }

    /**
     * @return CloudMeterInfo
     */
    public function getInfo(): CloudMeterInfo
    {
        return $this->info;
    }

    /**
     * @param CloudMeterInfo $info
     */
    public function setInfo(CloudMeterInfo $info): void
    {
        $this->info = $info;
    }
}