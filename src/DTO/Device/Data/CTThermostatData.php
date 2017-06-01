<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;


use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class CTThermostatData extends AbstractData
{
    /**
     * @var array
     */
    protected $temperature;

    /**
     * @var array
     */
    protected $thermostat;

    /**
     * @var array
     */
    protected $fan;

    /**
     * @var array
     */
    protected $humidity;

    /**
     * @var array
     */
    protected $setpoint;

    /**
     * @return array
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param array $temperature
     * @Property(property="temperature", type="array")
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
     * @Property(property="thermostat", type="array")
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
     * @Property(property="fan", type="array")
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
     * @Property(property="humidity", type="array")
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
     * @Property(property="setpoint", type="array")
     */
    public function setSetpoint(array $setpoint)
    {
        $this->setpoint = $setpoint;
    }

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_30,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_80,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_32,
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_50
        ],true);
    }

    public static function fromResponse(array $response): AbstractData
    {
        return new self(
            $response['device'],
            new \DateTime($response['time'])
        );
    }
}