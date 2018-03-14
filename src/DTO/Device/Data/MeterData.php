<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractDeviceData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

/**
 * Class MeterData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class MeterData extends AbstractDeviceData
{

    /**
     * @var float
     * @Property(key="current")
     */
    protected $current;

    /**
     * @var float
     * @Property(key="total")
     */
    protected $total;


    /**
     * @return float
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param float $current
     */
    public function setCurrent(float $current)
    {
        $this->current = $current;
    }


    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total)
    {
        $this->total = $total;
    }



    public static function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_METERS_0
        ], true);
    }
}