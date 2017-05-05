<?php


namespace SkyCentrics\Cloud\DTO\Device;


class ThermostatData extends AbstractDeviceData
{
    protected $relay;

    public function __construct(
        int $deviceId,
        \DateTime $time
    )
    {
        parent::__construct($deviceId, $time);
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

    public static function fromResponse(array $responseData): AbstractDeviceData
    {
        $deviceData = new self($responseData['device'], new \DateTime($responseData['time']));
    }
}