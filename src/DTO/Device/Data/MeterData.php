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
    protected $currentPower;

    /**
     * @var float
     * @Property(key="total")
     */
    protected $energy;

    /**
     * @return float
     */
    public function getCurrentPower(): float
    {
        return $this->currentPower;
    }

    /**
     * @param float $currentPower
     */
    public function setCurrentPower(float $currentPower): void
    {
        $this->currentPower = $currentPower;
    }

    /**
     * @return float
     */
    public function getEnergy(): float
    {
        return $this->energy;
    }

    /**
     * @param float $energy
     */
    public function setEnergy(float $energy): void
    {
        $this->energy = $energy;
    }



    public static function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_METERS_0
        ], true);
    }
}