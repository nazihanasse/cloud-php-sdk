<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

/**
 * Class ThermostatData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class ThermostatData extends AbstractData
{
    /**
     * @var array
     */
    protected $temperature;

    /**
     * @var array
     */
    protected $setpoint;

    /**
     * @var array
     */
    protected $offset;

    /**
     * @var int
     */
    protected $state;

    /**
     * @var int
     */
    protected $override;

    /**
     * @var int
     */
    protected $relay;

    /**
     * @var array
     */
    protected $commodity;

    /**
     * @var array
     */
    protected $commodities;

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

    /**
     * @return array
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param array $offset
     * @Property(property="offset", type="array")
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
     * @Property(property="state", type="int")
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
     * @Property(property="override", type="int")
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
     * @Property(property="relay", type="int")
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
     * @Property(property="commodity", type="array")
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
     * @Property(property="commodities", type="array")
     */
    public function setCommodities(array $commodities)
    {
        $this->commodities = $commodities;
    }

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_ISLAND_AIRE_PTAC,
            DeviceTypeInterface::TYPE_EMERSON,
            DeviceTypeInterface::TYPE_MITSUBISHI,
            DeviceTypeInterface::TYPE_GENERIC_THERMOSTAT
        ],true);
    }

    public static function fromResponse(array $responseData): AbstractData
    {
        return new self($responseData['device'], new \DateTime($responseData['time']));
    }
}