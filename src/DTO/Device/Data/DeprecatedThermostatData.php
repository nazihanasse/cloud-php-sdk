<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;


use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class DeprecatedThermostatData extends AbstractData
{
    /**
     * @var int
     */
    protected $currentMode;

    /**
     * @var int
     */
    protected $targetMode;

    /**
     * @var int
     */
    protected $fanMode;

    /**
     * @var int
     */
    protected $ledStatus;

    /**
     * @var float
     */
    protected $temperature;

    /**
     * @var int
     */
    protected $absoluteCool;

    /**
     * @var int
     */
    protected $absoluteHeat;

    /**
     * @var int
     */
    protected $targetCool;

    /**
     * @var int
     */
    protected $targetHeat;

    /**
     * @var int
     */
    protected $targetSetback;

    /**
     * @var int
     */
    protected $humidity;

    /**
     * @var int
     */
    protected $humiditySetpoint;

    /**
     * @var int
     */
    protected $date;

    /**
     * @var int
     */
    protected $override;

    /**
     * @var int
     */
    protected $hold;

    /**
     * @var int
     */
    protected $saveEnergy;

    /**
     * @var int
     */
    protected $energyEmergency;

    /**
     * @var int
     */
    protected $setpointEnable;

    /**
     * @var int
     */
    protected $units;

    /**
     * @var int
     */
    protected $rssi;

    /**
     * @var int
     */
    protected $batteryLevel;

    /**
     * @return int
     */
    public function getCurrentMode(): ?int
    {
        return $this->currentMode;
    }

    /**
     * @param int $currentMode
     * @Property(property="cm", type="int")
     */
    public function setCurrentMode(int $currentMode)
    {
        $this->currentMode = $currentMode;
    }

    /**
     * @return int
     */
    public function getTargetMode(): ?int
    {
        return $this->targetMode;
    }

    /**
     * @param int $targetMode
     * @Property(property="tm", type="int")
     */
    public function setTargetMode(int $targetMode)
    {
        $this->targetMode = $targetMode;
    }

    /**
     * @return int
     */
    public function getFanMode(): ?int
    {
        return $this->fanMode;
    }

    /**
     * @param int $fanMode
     * @Property(property="f", type="int")
     */
    public function setFanMode(int $fanMode)
    {
        $this->fanMode = $fanMode;
    }

    /**
     * @return int
     */
    public function getLedStatus(): ?int
    {
        return $this->ledStatus;
    }

    /**
     * @param int $ledStatus
     * @Property(property="l", type="int")
     */
    public function setLedStatus(int $ledStatus)
    {
        $this->ledStatus = $ledStatus;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @param float $temperature
     * @Property(property="t", type="float")
     */
    public function setTemperature(float $temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @return int
     */
    public function getAbsoluteCool(): ?int
    {
        return $this->absoluteCool;
    }

    /**
     * @param int $absoluteCool
     * @Property(property="tsc", type="int")
     */
    public function setAbsoluteCool(int $absoluteCool)
    {
        $this->absoluteCool = $absoluteCool;
    }

    /**
     * @return int
     */
    public function getAbsoluteHeat(): ?int
    {
        return $this->absoluteHeat;
    }

    /**
     * @param int $absoluteHeat
     * @Property(property="tsh", type="int")
     */
    public function setAbsoluteHeat(int $absoluteHeat)
    {
        $this->absoluteHeat = $absoluteHeat;
    }

    /**
     * @return int
     */
    public function getTargetCool(): ?int
    {
        return $this->targetCool;
    }

    /**
     * @param int $targetCool
     * @Property(property="tc", type="int")
     */
    public function setTargetCool(int $targetCool)
    {
        $this->targetCool = $targetCool;
    }

    /**
     * @return int
     */
    public function getTargetHeat(): ?int
    {
        return $this->targetHeat;
    }

    /**
     * @param int $targetHeat
     * @Property(property="th", type="int")
     */
    public function setTargetHeat(int $targetHeat)
    {
        $this->targetHeat = $targetHeat;
    }

    /**
     * @return int
     */
    public function getTargetSetback(): ?int
    {
        return $this->targetSetback;
    }

    /**
     * @param int $targetSetback
     * @Property(property="ts", type="int")
     */
    public function setTargetSetback(int $targetSetback)
    {
        $this->targetSetback = $targetSetback;
    }

    /**
     * @return int
     */
    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    /**
     * @param int $humidity
     * @Property(property="h", type="int")
     */
    public function setHumidity(int $humidity)
    {
        $this->humidity = $humidity;
    }

    /**
     * @return int
     */
    public function getHumiditySetpoint(): ?int
    {
        return $this->humiditySetpoint;
    }

    /**
     * @param int $humiditySetpoint
     * @Property(property="hs", type="int")
     */
    public function setHumiditySetpoint(int $humiditySetpoint)
    {
        $this->humiditySetpoint = $humiditySetpoint;
    }

    /**
     * @return int
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @Property(property="dd", type="int")
     */
    public function setDate(int $date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getOverride(): ?int
    {
        return $this->override;
    }

    /**
     * @param int $override
     * @Property(property="fo", type="int")
     */
    public function setOverride(int $override)
    {
        $this->override = $override;
    }

    /**
     * @return int
     */
    public function getHold(): ?int
    {
        return $this->hold;
    }

    /**
     * @param int $hold
     * @Property(property="fh", type="int")
     */
    public function setHold(int $hold)
    {
        $this->hold = $hold;
    }

    /**
     * @return int
     */
    public function getSaveEnergy(): ?int
    {
        return $this->saveEnergy;
    }

    /**
     * @param int $saveEnergy
     * @Property(property="fs", type="int")
     */
    public function setSaveEnergy(int $saveEnergy)
    {
        $this->saveEnergy = $saveEnergy;
    }

    /**
     * @return int
     */
    public function getEnergyEmergency(): ?int
    {
        return $this->energyEmergency;
    }

    /**
     * @param int $energyEmergency
     * @Property(property="fe", type="int")
     */
    public function setEnergyEmergency(int $energyEmergency)
    {
        $this->energyEmergency = $energyEmergency;
    }

    /**
     * @return int
     */
    public function getSetpointEnable(): ?int
    {
        return $this->setpointEnable;
    }

    /**
     * @param int $setpointEnable
     * @Property(property="fa", type="int")
     */
    public function setSetpointEnable(int $setpointEnable)
    {
        $this->setpointEnable = $setpointEnable;
    }

    /**
     * @return int
     */
    public function getUnits(): ?int
    {
        return $this->units;
    }

    /**
     * @param int $units
     * @Property(property="fu", type="int")
     */
    public function setUnits(int $units)
    {
        $this->units = $units;
    }

    /**
     * @return int
     */
    public function getRssi(): ?int
    {
        return $this->rssi;
    }

    /**
     * @param int $rssi
     * @Property(property="rssi", type="int")
     */
    public function setRssi(int $rssi)
    {
        $this->rssi = $rssi;
    }

    /**
     * @return int
     */
    public function getBatteryLevel(): ?int
    {
        return $this->batteryLevel;
    }

    /**
     * @param int $batteryLevel
     * @Property(property="", type="int")
     */
    public function setBatteryLevel(int $batteryLevel)
    {
        $this->batteryLevel = $batteryLevel;
    }

    /**
     * @param int $type
     * @return bool
     */
    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_THERMOSTAT_DEPRECATED,
        ]);
    }

    /**
     * @param array $response
     * @return AbstractData
     */
    public static function fromResponse(array $response): AbstractData
    {
        return new self($response['i'], new \DateTime($response['time']));
    }
}