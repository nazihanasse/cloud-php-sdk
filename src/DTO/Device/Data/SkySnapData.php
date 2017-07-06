<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractDeviceData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

/**
 * Class SkySnapData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class SkySnapData extends AbstractDeviceData
{
    /**
     * @var array
     * @Property(key="ct")
     */
    protected $currentTransformers = [];

    /**
     * @var array
     * @Property(key="sensors")
     */
    protected $sensors = [];

    /**
     * @return array
     */
    public function getCurrentTransformers()
    {
        return $this->currentTransformers;
    }

    /**
     * @param array $currentTransformers
     * @Method(property="ct", type="array")
     */
    public function setCurrentTransformers(array $currentTransformers)
    {
        $this->currentTransformers = $currentTransformers;
    }

    /**
     * @return array
     */
    public function getSensors()
    {
        return $this->sensors;
    }

    /**
     * @param array $sensors
     */
    public function setSensors(array $sensors)
    {
        $this->sensors = $sensors;
    }

    public static function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_PISNAP_3
        ], true);
    }
}