<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;


use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class DeprecatedThermostatData extends AbstractData
{
    /**
     * @var int
     * @Property(key="i")
     */
    protected $deviceId;

    /**
     * @var int
     * @Property(key="cm")
     */
    protected $currentMode;

    /**
     * @var int
     * @Property(key="tm")
     */
    protected $targetMode;

    /**
     * @var int
     * @Property(key="f")
     */
    protected $fanMode;

    /**
     * @var int
     * @Property(key="l")
     */
    protected $ledStatus;

    /**
     * @var float
     * @Property(key="t")
     */
    protected $temperature;

    /**
     * @var int
     * @Property(key="tsc")
     */
    protected $absoluteCool;

    /**
     * @var int
     * @Property(key="tsh")
     */
    protected $absoluteHeat;

    /**
     * @var int
     * @Property(key="tc")
     */
    protected $targetCool;

    /**
     * @var int
     * @Property(key="th")
     */
    protected $targetHeat;

    /**
     * @var int
     * @Property(key="ts")
     */
    protected $targetSetback;

    /**
     * @var int
     * @Property(key="h")
     */
    protected $humidity;

    /**
     * @var int
     * @Property(key="hs")
     */
    protected $humiditySetpoint;

    /**
     * @var int
     * @Property(key="dd")
     */
    protected $date;

    /**
     * @var int
     * @Property(key="fo")
     */
    protected $override;

    /**
     * @var int
     * @Property(key="fh")
     */
    protected $hold;

    /**
     * @var int
     * @Property(key="fs")
     */
    protected $saveEnergy;

    /**
     * @var int
     * @Property(key="fe")
     */
    protected $energyEmergency;

    /**
     * @var int
     * @Property(key="fa")
     */
    protected $setpointEnable;

    /**
     * @var int
     * @Property(key="fu")
     */
    protected $units;

    /**
     * @var int
     * @Property(key="rssi")
     */
    protected $rssi;

    /**
     * @var int
     */
    protected $batteryLevel;

    /**
     * @return int
     */
    public function getCurrentMode()
    {
        return $this->currentMode;
    }

    /**
     * @param int $currentMode
     */
    public function setCurrentMode(int $currentMode)
    {
        $this->currentMode = $currentMode;
    }

    /**
     * @return int
     */
    public function getTargetMode()
    {
        return $this->targetMode;
    }

    /**
     * @param int $targetMode
     */
    public function setTargetMode(int $targetMode)
    {
        $this->targetMode = $targetMode;
    }

    /**
     * @return int
     */
    public function getFanMode()
    {
        return $this->fanMode;
    }

    /**
     * @param int $fanMode
     */
    public function setFanMode(int $fanMode)
    {
        $this->fanMode = $fanMode;
    }

    /**
     * @return int
     */
    public function getLedStatus()
    {
        return $this->ledStatus;
    }

    /**
     * @param int $ledStatus
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
     */
    public function setTemperature(float $temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @return int
     */
    public function getAbsoluteCool()
    {
        return $this->absoluteCool;
    }

    /**
     * @param int $absoluteCool
     */
    public function setAbsoluteCool(int $absoluteCool)
    {
        $this->absoluteCool = $absoluteCool;
    }

    /**
     * @return int
     */
    public function getAbsoluteHeat()
    {
        return $this->absoluteHeat;
    }

    /**
     * @param int $absoluteHeat
     */
    public function setAbsoluteHeat(int $absoluteHeat)
    {
        $this->absoluteHeat = $absoluteHeat;
    }

    /**
     * @return int
     */
    public function getTargetCool()
    {
        return $this->targetCool;
    }

    /**
     * @param int $targetCool
     */
    public function setTargetCool(int $targetCool)
    {
        $this->targetCool = $targetCool;
    }

    /**
     * @return int
     */
    public function getTargetHeat()
    {
        return $this->targetHeat;
    }

    /**
     * @param int $targetHeat
     */
    public function setTargetHeat(int $targetHeat)
    {
        $this->targetHeat = $targetHeat;
    }

    /**
     * @return int
     */
    public function getTargetSetback()
    {
        return $this->targetSetback;
    }

    /**
     * @param int $targetSetback
     */
    public function setTargetSetback(int $targetSetback)
    {
        $this->targetSetback = $targetSetback;
    }

    /**
     * @return int
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @param int $humidity
     */
    public function setHumidity(int $humidity)
    {
        $this->humidity = $humidity;
    }

    /**
     * @return int
     */
    public function getHumiditySetpoint()
    {
        return $this->humiditySetpoint;
    }

    /**
     * @param int $humiditySetpoint
     */
    public function setHumiditySetpoint(int $humiditySetpoint)
    {
        $this->humiditySetpoint = $humiditySetpoint;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date)
    {
        $this->date = $date;
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
    public function getHold()
    {
        return $this->hold;
    }

    /**
     * @param int $hold
     */
    public function setHold(int $hold)
    {
        $this->hold = $hold;
    }

    /**
     * @return int
     */
    public function getSaveEnergy()
    {
        return $this->saveEnergy;
    }

    /**
     * @param int $saveEnergy
     */
    public function setSaveEnergy(int $saveEnergy)
    {
        $this->saveEnergy = $saveEnergy;
    }

    /**
     * @return int
     */
    public function getEnergyEmergency()
    {
        return $this->energyEmergency;
    }

    /**
     * @param int $energyEmergency
     */
    public function setEnergyEmergency(int $energyEmergency)
    {
        $this->energyEmergency = $energyEmergency;
    }

    /**
     * @return int
     */
    public function getSetpointEnable()
    {
        return $this->setpointEnable;
    }

    /**
     * @param int $setpointEnable
     */
    public function setSetpointEnable(int $setpointEnable)
    {
        $this->setpointEnable = $setpointEnable;
    }

    /**
     * @return int
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param int $units
     */
    public function setUnits(int $units)
    {
        $this->units = $units;
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
     * @return int
     */
    public function getBatteryLevel()
    {
        return $this->batteryLevel;
    }

    /**
     * @param int $batteryLevel
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

}