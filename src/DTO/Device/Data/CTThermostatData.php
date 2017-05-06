<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;


use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class CTThermostatData extends AbstractData
{
    protected $temperature;

    protected $thermostat;

    protected $fan;

    protected $humidity;

    protected $setpoint;

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
        // TODO: Implement fromResponse() method.
    }
}