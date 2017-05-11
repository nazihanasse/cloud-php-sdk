<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;
use SkyCentrics\Cloud\Annotation\Property;

/**
 * @Annotation
 * Class WaterHeaterData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class WaterHeaterData extends AbstractData
{
    /**
     * @var int
     */
    protected $relay;

    /**
     * @var int
     */
    protected $override;

    /**
     * @var
     */
    protected $power;

    /**
     * @var int
     */
    protected $state;

    /**
     * @var array
     */
    protected $commodity;

    /**
     * @var array
     */
    protected $commodities;

    /**
     * @var array
     */
    protected $offset;

    /**
     * @var array
     */
    protected $setpoint;

    /**
     * @return int
     */
    public function getRelay(): int
    {
        return $this->relay;
    }

    /**
     * @param int $relay
     * @Property(property="relay", method="setRelay")
     */
    public function setRelay(int $relay)
    {
        $this->relay = $relay;
    }

    /**
     * @return int
     */
    public function getOverride(): int
    {
        return $this->override;
    }

    /**
     * @param int $override
     * @Property(property="override", method="setOverride")
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
     * @Property(property="power", method="setPower")
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    /**
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @Property(property="state", method="setState")
     */
    public function setState(int $state)
    {
        $this->state = $state;
    }

    /**
     * @return array
     */
    public function getCommodity(): array
    {
        return $this->commodity;
    }

    /**
     * @param array $commodity
     * @Property(property="commodity", method="setCommodity")
     */
    public function setCommodity(array $commodity)
    {
        $this->commodity = $commodity;
    }

    /**
     * @return array
     */
    public function getCommodities(): array
    {
        return $this->commodities;
    }

    /**
     * @param array $commodities
     * @Property(property="commodities", method="setCommodities")
     */
    public function setCommodities(array $commodities)
    {
        $this->commodities = $commodities;
    }

    /**
     * @return array
     */
    public function getOffset(): array
    {
        return $this->offset;
    }

    /**
     * @param array $offset
     * @Property(property="offset", method="setOffset")
     */
    public function setOffset(array $offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return array
     */
    public function getSetpoint(): array
    {
        return $this->setpoint;
    }

    /**
     * @param array $setpoint
     * @Property(property="setpoint", method="setSetpoint")
     */
    public function setSetpoint(array $setpoint)
    {
        $this->setpoint = $setpoint;
    }

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_AO_SMITH_ELECTRIC_RESISTANCE,
            DeviceTypeInterface::TYPE_AO_SMITH_HEAT_PUMP,
            DeviceTypeInterface::TYPE_GE,
            DeviceTypeInterface::TYPE_VAUGHN,
            DeviceTypeInterface::TYPE_EMERSON_SWITCH,
            DeviceTypeInterface::TYPE_GENERIC_WATER_HEATER
        ],true);
    }

    public static function fromResponse(array $response): AbstractData
    {
        $waterHeaterData = new self(
            $response['device'],
            new \DateTime($response['time'])
        );


    }
}