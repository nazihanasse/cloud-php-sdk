<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractDeviceData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

/**
 * Class ThermostatData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class ThermostatData extends AbstractDeviceData
{
    /**
     * @var array
     * @Property(key="temperature")
     */
    protected $temperature;

    /**
     * @var int|null
     * @Property(key="thermostat_mode")
     */
    protected $thermostatMode;

    /**
     * @var int|null
     * @Property(key="fan_mode")
     */
    protected $fanMode;


    /**
     * @var array
     * @Property(key="setpoint")
     */
    protected $setpoint;

    /**
     * @var array
     * @Property(key="offset")
     */
    protected $offset;

    /**
     * @var int
     * @Property(key="state")
     */
    protected $state;


    /**
     * @var int
     * @Property(key="override")
     */
    protected $override;

    /**
     * @var int
     * @Property(key="relay")
     */
    protected $relay;

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
     * @var int
     *
     * @Property(key="hold_mode.data", to_type="int")
     */
    protected $holdMode;

    /**
     * @var float
     *
     * @Property(key="commodity.cumulative", to_type="int")
     */
    protected $total;

    /**
     * @var int
     *
     * @Property(key="commodity.instantaneous", to_type="int")
     */
    protected $power;

    /**
     * @return array
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param array $temperature
     */
    public function setTemperature(array $temperature)
    {
        $this->temperature = $temperature;
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
     * @return int|null
     */
    public function getThermostatMode(): ?int
    {
        return $this->thermostatMode;
    }

    /**
     * @param int $thermostatMode
     */
    public function setThermostatMode(int $thermostatMode): void
    {
        $this->thermostatMode = $thermostatMode;
    }

    /**
     * @return int|null
     */
    public function getFanMode(): ?int
    {
        return $this->fanMode;
    }

    /**
     * @param int $fanMode
     */
    public function setFanMode(int $fanMode): void
    {
        $this->fanMode = $fanMode;
    }

    /**
     * @return int
     */
    public function getHoldMode(): int
    {
        return $this->holdMode;
    }

    /**
     * @param int $holdMode
     */
    public function setHoldMode(int $holdMode): void
    {
        $this->holdMode = $holdMode;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    public function setPower(int $power): void
    {
        $this->power = $power;
    }

    public function setPowerSource(int $power){
        $this->power = round($power/1000);
    }

    public function setTotalSource(int $total){
        $this->total = $total/1000;
    }

    public static function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_ISLAND_AIRE_PTAC,
            DeviceTypeInterface::TYPE_EMERSON,
            DeviceTypeInterface::TYPE_MITSUBISHI,
            DeviceTypeInterface::TYPE_GENERIC_THERMOSTAT
        ],true);
    }
}