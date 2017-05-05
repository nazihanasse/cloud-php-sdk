<?php


namespace SkyCentrics\Cloud\DTO\Device;


class WaterHeaterData extends AbstractDeviceData
{

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

    public static function fromResponse(array $response): AbstractDeviceData
    {

    }
}