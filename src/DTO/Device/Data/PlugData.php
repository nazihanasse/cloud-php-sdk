<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class PlugData extends AbstractData
{
    /**
     * @var float
     */
    protected $voltage;

    /**
     * @var float
     */
    protected $power;

    /**
     * @var float
     */
    protected $powerFactor;

    /**
     * @var float
     */
    protected $current;

    /**
     * @var float
     */
    protected $frequency;

    /**
     * @var int
     */
    protected $relay;

    /**
     * @var float
     */
    protected $totalPower;

    /**
     * @var int
     */
    protected $dimmer;

    /**
     * @var int
     */
    protected $rssi;

    /**
     * @var array
     */
    protected $sensors;

    /**
     * @var int
     */
    protected $occupancy;

    /**
     * @var int
     */
    protected $scheduler;

    /**
     * @var int
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
     * @Method(property="v", type="float")
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
     * @Method(property="p", type="float")
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
     * @Method(property="pf", type="float")
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
     * @Method(property="c", type="float")
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
     * @Method(property="f", type="float")
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
     * @Method(property="r", type="int")
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
     * @Method(property="t", type="float")
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
     * @Method(property="d", type="int")
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
     * @Method(property="rssi", type="int")
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
     * @Method(property="w", type="array")
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
     * @Method(property="ocp", type="int")
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
     * @Method(property="se", type="int")
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
     * @Method(property="uo", type="int")
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

    public static function fromResponse(array $response): AbstractData
    {
        return new self($response['i'], new \DateTime($response['time']));
    }
}