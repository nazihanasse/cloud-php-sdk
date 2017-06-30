<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

/**
 * Class PlugData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class PlugData extends AbstractData
{
    /**
     * @var int
     * @Property(key="i")
     */
    protected $deviceId;

    /**
     * @var float
     * @Property(key="v")
     */
    protected $voltage;

    /**
     * @var float
     * @Property(key="p")
     */
    protected $power;

    /**
     * @var float
     * @Property(key="pf")
     */
    protected $powerFactor;

    /**
     * @var float
     * @Property(key="c")
     */
    protected $current;

    /**
     * @var float
     * @Property(key="f")
     */
    protected $frequency;

    /**
     * @var int
     * @Property(key="r")
     */
    protected $relay;

    /**
     * @var float
     * @Property(key="t")
     */
    protected $totalPower;

    /**
     * @var int
     * @Property(key="d")
     */
    protected $dimmer;

    /**
     * @var int
     * @Property(key="rssi")
     */
    protected $rssi;

    /**
     * @var array
     * @Property(key="w")
     */
    protected $sensors;

    /**
     * @var int
     * @Property(key="ocp")
     */
    protected $occupancy;

    /**
     * @var int
     * @Property(key="se")
     */
    protected $scheduler;

    /**
     * @var int
     * @Property(key="uo")
     */
    protected $overrided;

    /**
     * @return float
     */
    public function getVoltage()
    {
        return $this->voltage;
    }

    /**
     * @param float $voltage
     */
    public function setVoltage(float $voltage)
    {
        $this->voltage = $voltage;
    }

    /**
     * @return float
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param float $power
     */
    public function setPower(float $power)
    {
        $this->power = $power;
    }

    /**
     * @return float
     */
    public function getPowerFactor()
    {
        return $this->powerFactor;
    }

    /**
     * @param float $powerFactor
     */
    public function setPowerFactor(float $powerFactor)
    {
        $this->powerFactor = $powerFactor;
    }

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
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param float $frequency
     */
    public function setFrequency(float $frequency)
    {
        $this->frequency = $frequency;
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
     * @return float
     */
    public function getTotalPower()
    {
        return $this->totalPower;
    }

    /**
     * @param float $totalPower
     */
    public function setTotalPower(float $totalPower)
    {
        $this->totalPower = $totalPower;
    }

    /**
     * @return int
     */
    public function getDimmer()
    {
        return $this->dimmer;
    }

    /**
     * @param int $dimmer
     */
    public function setDimmer(int $dimmer)
    {
        $this->dimmer = $dimmer;
    }

    /**
     * @return int
     */
    public function getRssi()
    {
        return $this->rssi;
    }

    /**
     * @param int $rssi
     */
    public function setRssi(int $rssi)
    {
        $this->rssi = $rssi;
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

    /**
     * @return int
     */
    public function getOccupancy()
    {
        return $this->occupancy;
    }

    /**
     * @param int $occupancy
     */
    public function setOccupancy(int $occupancy)
    {
        $this->occupancy = $occupancy;
    }

    /**
     * @return int
     */
    public function getScheduler()
    {
        return $this->scheduler;
    }

    /**
     * @param int $scheduler
     */
    public function setScheduler(int $scheduler)
    {
        $this->scheduler = $scheduler;
    }

    /**
     * @return int
     */
    public function getOverrided()
    {
        return $this->overrided;
    }

    /**
     * @param int $overrided
     */
    public function setOverrided(int $overrided)
    {
        $this->overrided = $overrided;
    }

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_PISNAP_3_DEPRECATED,
            DeviceTypeInterface::TYPE_SKYPLUG_110,
            DeviceTypeInterface::TYPE_GENERIC_METERING_PLUG
        ], true);
    }
}