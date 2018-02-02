<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractDeviceData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

/**
 * Class CTThermostatData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class CTThermostatData extends AbstractDeviceData
{
    /**
     * @var array
     * @Property(key="temperature")
     */
    protected $temperature;

    /**
     * @var array
     * @Property(key="thermostat")
     */
    protected $thermostat;

    /**
     * @var array
     * @Property(key="fan")
     */
    protected $fan;

    /**
     * @var array
     * @Property(key="humidity")
     */
    protected $humidity;

    /**
     * @var array
     * @Property(key="setpoint")
     */
    protected $setpoint;

    /**
     * @var array
     * @Property(key="status")
     */
    protected $status;

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
    public function getThermostat()
    {
        return $this->thermostat;
    }

    /**
     * @param array $thermostat
     */
    public function setThermostat(array $thermostat)
    {
        $this->thermostat = $thermostat;
    }

    /**
     * @return array
     */
    public function getFan()
    {
        return $this->fan;
    }

    /**
     * @param array $fan
     */
    public function setFan(array $fan)
    {
        $this->fan = $fan;
    }

    /**
     * @return array
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @param array $humidity
     */
    public function setHumidity(array $humidity)
    {
        $this->humidity = $humidity;
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
     * @return array|null
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @param array $status
     */
    public function setStatus(array $status): void
    {
        $this->status = $status;
    }

    /**
     * @param int $type
     * @return bool
     */
    public static function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_30,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_80,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_32,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_50
        ],true);
    }

}