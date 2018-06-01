<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractDeviceData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

/**
 * @Annotation
 * Class WaterHeaterData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class WaterHeaterData extends AbstractDeviceData
{
    /**
     * @var int
     * @Property(key="relay")
     */
    protected $relay;

    /**
     * @var int
     * @Property(key="override")
     */
    protected $override;

    /**
     * @var
     * @Property(key="power")
     */
    protected $power;

    /**
     * @var int
     * @Property(key="state")
     */
    protected $state;

    /**
     * @var array
     * @Property(key="commodity")
     */
    protected $commodity;

    /**
     * @var array
     * @Property(key="commodities")
     */
    protected $commodities;

    /**
     * @var array
     * @Property(key="offset")
     */
    protected $offset;

    /**
     * @var array
     * @Property(key="setpoint")
     */
    protected $setpoint;

    /**
     * @return int
     */
    public function getRelay()
    {
        return $this->relay;
    }

    /**
     * @param int $relay
     */
    public function setRelay(int $relay)
    {
        $this->relay = $relay;
    }

    /**
     * @return int
     */
    public function getOverride()
    {
        return $this->override;
    }

    /**
     * @param int $override
     */
    public function setOverride(int $override)
    {
        $this->override = $override;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     */
    public function setState(int $state)
    {
        $this->state = $state;
    }

    /**
     * @return array
     */
    public function getCommodity()
    {
        return $this->commodity;
    }

    /**
     * @param array $commodity
     */
    public function setCommodity(array $commodity)
    {
        $this->commodity = $commodity;
    }

    /**
     * @return array
     */
    public function getCommodities()
    {
        return $this->commodities;
    }

    /**
     * @param array $commodities
     */
    public function setCommodities(array $commodities)
    {
        $this->commodities = $commodities;
    }

    /**
     * @return array
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param array $offset
     */
    public function setOffset(array $offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return array
     */
    public function getSetpoint()
    {
        return $this->setpoint;
    }

    /**
     * @param array $setpoint
     */
    public function setSetpoint(array $setpoint)
    {
        $this->setpoint = $setpoint;
    }

    public static function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_AO_SMITH_ELECTRIC_RESISTANCE,
            DeviceTypeInterface::TYPE_AO_SMITH_HEAT_PUMP,
            DeviceTypeInterface::TYPE_GE,
            DeviceTypeInterface::TYPE_VAUGHN,
            DeviceTypeInterface::TYPE_GENERIC_WATER_HEATER
        ],true);
    }
}